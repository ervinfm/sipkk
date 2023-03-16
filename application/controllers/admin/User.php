<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/user_m');
        admin();
    }

    public function index()
    {
        if (@$_GET['level'] == '') {
            $data['row'] = $this->user_m->get_user_by_level(1);
        } else {
            $data['row'] = $this->user_m->get_user_by_level($_GET['level']);
        }
        $this->template->load('admin/template', 'admin/user/index', $data);
    }

    function insert()
    {
        $this->template->load('admin/template', 'admin/user/form');
    }

    function update($id)
    {
        $data['row'] = $this->user_m->get_user($id)->row();
        $this->template->load('admin/template', 'admin/user/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $this->user_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Data Admin Berhasil!');
                redirect('admin/user');
            } else {
                $this->session->set_flashdata('error', 'Tambah Data Admin Gagal!, <br> Sistem Error!');
                redirect('admin/user');
            }
        } else if (isset($post['update'])) {
            $this->user_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data Pengguna Berhasil!');
                redirect('admin/user' . ($post['level'] == 1 ? '' : '?level=' . $post['level']));
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data Pengguna Gagal!, <br> Sistem Error!');
                redirect('admin/user' . ($post['level'] == 1 ? '' : '?level=' . $post['level']));
            }
        } else {
            redirect('admin/user');
        }
    }

    function status_akun($id)
    {
        $data = $this->user_m->get_user($id)->row();
        if ($data->status_user == 1) {
            $status = 0;
        } else if ($data->status_user == 0) {
            $status = 1;
        }
        $this->user_m->activate($data->id_user, $status);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Status Akun berhasil Diperbaharui!');
            redirect('admin/user' . ($data->level_user == 1 ? '' : '?level=' . $data->level_user));
        } else {
            $this->session->set_flashdata('error', 'Status Akun Gagal Diperbaharui!!, <br> Sistem Error!');
            redirect('admin/user' . ($data->level_user == 1 ? '' : '?level=' . $data->level_user));
        }
    }
}
