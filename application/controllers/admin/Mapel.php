<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mapel_m');
        admin();
    }

    public function index()
    {
        $data['row'] = $this->mapel_m->get_mapel();
        $this->template->load('admin/template', 'admin/mapel/index', $data);
    }

    function insert()
    {
        $this->template->load('admin/template', 'admin/mapel/form');
    }

    function update($id)
    {
        $data['row'] = $this->mapel_m->get_mapel($id)->row();
        $this->template->load('admin/template', 'admin/mapel/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $this->mapel_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Data Mata Pelajaran Berhasil!');
                redirect('admin/mapel');
            } else {
                $this->session->set_flashdata('error', 'Tambah Data Mata Pelajaran Gagal!, <br> Sistem Error!');
                redirect('admin/mapel');
            }
        } else if (isset($post['update'])) {
            $this->mapel_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data Mata Pelajaran Berhasil!');
                redirect('admin/mapel/');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data Mata Pelajaran Gagal!, <br> Sistem Error!');
                redirect('admin/mapel/update/' . $post['id']);
            }
        } else {
            redirect('admin/mapel');
        }
    }

    function delete($id)
    {
        $this->mapel_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Hapus Data Mata Pelajaran Berhasil!');
            redirect('admin/mapel');
        } else {
            $this->session->set_flashdata('error', 'Hapus Data Mata Pelajaran Gagal!, <br> Sistem Error!');
            redirect('admin/mapel');
        }
    }
}
