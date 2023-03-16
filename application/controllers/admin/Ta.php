<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ta extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/ta_m');
        admin();
    }

    public function index()
    {
        $data['row'] = $this->ta_m->get_ta();
        $this->template->load('admin/template', 'admin/ta/index', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            if ((cek_ta_already($post['ta_insert'])->num_rows() == 0)) {
                $this->ta_m->insert($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('succes', 'Tambah Data Tahun Ajaran Berhasil!');
                    redirect('admin/ta');
                } else {
                    $this->session->set_flashdata('error', 'Tambah Data Tahun Ajaran Gagal!, <br> Sistem Error!');
                    redirect('admin/ta');
                }
            } else {
                $this->session->set_flashdata('warning', 'Tambah Data Tahun Ajaran Gagal!, <br> Data Tahun Ajaran tersebut sudah ada!');
                redirect('admin/ta');
            }
        } else if (isset($post['update'])) {
            $this->ta_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data Tahun Ajaran Berhasil!');
                redirect('admin/ta/');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data Tahun Ajaran Gagal!, <br> Sistem Error!');
                redirect('admin/ta/');
            }
        } else {
            redirect('admin/ta');
        }
    }

    function delete($id)
    {
        $this->ta_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Hapus Data Tahun Ajaran Berhasil!');
            redirect('admin/ta');
        } else {
            $this->session->set_flashdata('error', 'Hapus Data Tahun Ajaran Gagal!, <br> Sistem Error!');
            redirect('admin/ta');
        }
    }

    function change($id)
    {
        $data = $this->ta_m->get_ta_active()->row();
        $this->ta_m->unselect_active($data->id_ta);
        $this->ta_m->select_active($id);
        redirect('admin/ta');
    }
}
