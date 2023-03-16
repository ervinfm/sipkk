<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('admin/kelas_m');
    }

    public function index()
    {
        $data['row'] = $this->kelas_m->get_kelas();
        $this->template->load('admin/template', 'admin/kelas/index', $data);
    }

    public function insert()
    {
        $this->template->load('admin/template', 'admin/kelas/form');
    }

    public function update($id)
    {
        $data['row'] = $this->kelas_m->get_kelas($id)->row();
        $this->template->load('admin/template', 'admin/kelas/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $this->kelas_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Data kelas Berhasil!');
                redirect('admin/kelas');
            } else {
                $this->session->set_flashdata('error', 'Tambah Data kelas Gagal!, <br> Sistem Error!');
                redirect('admin/kelas');
            }
        } else if (isset($post['update'])) {
            $this->kelas_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data kelas Berhasil!');
                redirect('admin/kelas');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data kelas Gagal!, <br> Sistem Error!');
                redirect('admin/kelas');
            }
        } else if (isset($post['tambah_peserta'])) {
            foreach ($post['member'] as $key => $peserta) {
                $this->kelas_m->insert_peserta($post['id_kelas'], $peserta, $post['id_ta']);
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Peserta Kelas Berhasil!');
                redirect('admin/kelas/peserta/' . $post['id_kelas'] . '?ta=' . get_ta('id_ta', $post['id_ta'])->row()->nama_ta);
            } else {
                $this->session->set_flashdata('error', 'Tambah Peserta Kelas Gagal!, <br> Sistem Error!');
                redirect('admin/kelas/peserta/' . $post['id_kelas'] . '?ta=' . get_ta('id_ta', $post['id_ta'])->row()->nama_ta);
            }
        } else {
            redirect('admin/kelas');
        }
    }

    function delete($id)
    {
        delete_peserta_with_kelas($id);
        $this->kelas_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Hapus Data kelas Berhasil!');
            redirect('admin/kelas');
        } else {
            $this->session->set_flashdata('error', 'Hapus Data kelas Gagal!, <br> Sistem Error!');
            redirect('admin/kelas');
        }
    }

    // Part of Management Member

    function peserta($id)
    {
        $data['row'] = $this->kelas_m->get_peserta($id, get_ta('nama_ta', $_GET['ta'])->row()->id_ta);
        $this->template->load('admin/template', 'admin/kelas/peserta', $data);
    }

    public function peserta_insert($id)
    {
        $this->template->load('admin/template', 'admin/kelas/peserta_form');
    }

    function peserta_delete($id, $id_kelas)
    {
        $this->kelas_m->delete_peserta($id);
        redirect('admin/kelas/peserta/' . $id_kelas . '?ta=' . @$_GET['ta']);
    }
}
