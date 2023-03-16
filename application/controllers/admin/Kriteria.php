<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/kriteria_m');
        admin();
    }

    public function index()
    {
        $data['row'] = $this->kriteria_m->get_kriteria();
        $this->template->load('admin/template', 'admin/kriteria/index', $data);
    }

    function insert()
    {
        $this->template->load('admin/template', 'admin/kriteria/form');
    }

    function update($id)
    {
        $data['row'] = $this->kriteria_m->get_kriteria($id)->row();
        $this->template->load('admin/template', 'admin/kriteria/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $this->kriteria_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Data Kriteria Berhasil!');
                redirect('admin/kriteria');
            } else {
                $this->session->set_flashdata('error', 'Tambah Data Kriteria Gagal!, <br> Sistem Error!');
                redirect('admin/kriteria');
            }
        } else if (isset($post['update'])) {
            $this->kriteria_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data Kriteria Berhasil!');
                redirect('admin/kriteria/');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data Kriteria Gagal!, <br> Sistem Error!');
                redirect('admin/kriteria/update/' . $post['id']);
            }
        } else {
            redirect('admin/kriteria');
        }
    }

    function delete($id)
    {
        $this->kriteria_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Hapus Data Kriteria Berhasil!');
            redirect('admin/kriteria');
        } else {
            $this->session->set_flashdata('error', 'Hapus Data Kriteria Gagal!, <br> Sistem Error!');
            redirect('admin/kriteria');
        }
    }

    public function sub_kriteria($id_kriteria)
    {
        $data['row'] = $this->kriteria_m->get_sub_kriteria($id_kriteria);
        $this->template->load('admin/template', 'admin/kriteria/sub', $data);
    }

    function sub_insert($id)
    {
        $this->template->load('admin/template', 'admin/kriteria/sub_form');
    }

    function sub_update($id)
    {
        $data['row'] = $this->kriteria_m->get_sub_detail($id);
        $this->template->load('admin/template', 'admin/kriteria/sub_form', $data);
    }

    function sub_proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['sub_insert'])) {
            $this->kriteria_m->sub_insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Data Sub Kriteria Berhasil!');
                redirect('admin/kriteria/sub_kriteria/' . $post['id_kriteria']);
            } else {
                $this->session->set_flashdata('error', 'Tambah Data Sub Kriteria Gagal!, <br> Sistem Error!');
                redirect('admin/kriteria/sub_kriteria/' . $post['id_kriteria']);
            }
        } else if (isset($post['sub_update'])) {
            $this->kriteria_m->sub_update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data Sub Kriteria Berhasil!');
                redirect('admin/kriteria/sub_kriteria/' . $post['id_kriteria']);
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data Sub Kriteria Gagal!, <br> Sistem Error!');
                redirect('admin/kriteria/update/' . $post['id']);
            }
        } else {
            redirect('admin/kriteria');
        }
    }

    function sub_delete($id, $sub)
    {
        $this->kriteria_m->sub_delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Hapus Data Sub Kriteria Berhasil!');
            redirect('admin/kriteria/sub_kriteria/' . $sub);
        } else {
            $this->session->set_flashdata('error', 'Hapus Data Sub Kriteria Gagal!, <br> Sistem Error!');
            redirect('admin/kriteria/sub_kriteria/' . $sub);
        }
    }
}
