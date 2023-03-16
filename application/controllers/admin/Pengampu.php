<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengampu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/pengampu_m');
        admin();
    }

    public function index()
    {
        if (@$_GET['ta']) {
            $id_ta = get_ta('nama_ta', $_GET['ta'])->row()->id_ta;
        } else {
            $id_ta = null;
        }
        $data['row'] = $this->pengampu_m->get_pengampu(null, $id_ta);
        $this->template->load('admin/template', 'admin/pengampu/index', $data);
    }

    function insert()
    {
        $this->template->load('admin/template', 'admin/pengampu/form');
    }

    function update($id)
    {
        $data['row'] = $this->pengampu_m->get_pengampu($id)->row();
        $this->template->load('admin/template', 'admin/pengampu/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $error_report = 0;
            $kelas = $post['p_kelas'];
            foreach ($kelas as $key => $temp) {
                $params = [
                    'ta' => $post['id_ta'],
                    'kelas' => $temp,
                    'mapel' => $post['p_mapel'][$key],
                    'guru' => $post['p_guru'][$key],
                ];
                $this->pengampu_m->insert($params);
                if ($this->db->affected_rows() == 0) {
                    $error_report++;
                }
            }
            if ($error_report != 0) {
                $this->session->set_flashdata('warning', 'Data Pengampu Berhasil ditambahkan!<br> Tapi ada beberapa data tidak dapat ditambahkan!');
                redirect('admin/pengampu?ta=' . get_ta('id_ta', $post['id_ta'])->row()->nama_ta);
            } else if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Data Pengampu Mata Pelajaran Berhasil!');
                redirect('admin/pengampu?ta=' . get_ta('id_ta', $post['id_ta'])->row()->nama_ta);
            } else {
                $this->session->set_flashdata('error', 'Tambah Data Pengampu Mata Pelajaran Gagal!, <br> Sistem Error!');
                redirect('admin/pengampu');
            }
        } else if (isset($post['update'])) {
            $this->pengampu_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data Pengampu Mata Pelajaran Berhasil!');
                redirect('admin/pengampu?ta=' . $post['ta']);
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data Pengampu Mata Pelajaran Gagal!, <br> Sistem Error!');
                redirect('admin/pengampu/update/' . $post['id']);
            }
        } else {
            redirect('admin/pengampu');
        }
    }

    function delete($id)
    {
        $dta =  $this->pengampu_m->get_pengampu($id)->row();
        $ta = get_ta('id_ta', $dta->id_ta)->row()->nama_ta;
        $this->pengampu_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Hapus Data Pengampu Mata Pelajaran Berhasil!');
            redirect('admin/pengampu?ta=' . $ta);
        } else {
            $this->session->set_flashdata('error', 'Hapus Data Pengampu Mata Pelajaran Gagal!, <br> Sistem Error!');
            redirect('admin/pengampu?ta=' . $ta);
        }
    }
}
