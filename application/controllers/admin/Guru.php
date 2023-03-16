<?php defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('admin/guru_m');
    }

    public function index()
    {
        $data['row'] = $this->guru_m->get_guru();
        $this->template->load('admin/template', 'admin/guru/index', $data);
    }

    public function insert()
    {
        $this->template->load('admin/template', 'admin/guru/form');
    }

    public function update($id)
    {
        $data['row'] = $this->guru_m->get_guru($id)->row();
        $this->template->load('admin/template', 'admin/guru/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $id = $post['id'];
            foreach ($id as $key => $id_guru) {
                $id_user = random_string('numeric', 20);
                $params = [
                    'id_guru' => $id_guru,
                    'nip_guru' => $post['g_nip'][$key],
                    'nama_guru' => $post['g_nama'][$key],
                    'pendidikan_guru' => $post['g_pendidikan'][$key],
                    'tugas_guru' => $post['g_tugas'][$key],
                    'id_user' => $id_user,
                ];
                $this->db->insert('tbl_guru', $params);
                $users = [
                    'id_user' => $id_user,
                    'username_user' => $post['g_nip'][$key],
                    'password_user' => sha1($post['g_nip'][$key]),
                    'nama_user' => $post['g_nama'][$key],
                    'level_user' => 2,
                    'status_user' => 1,
                    'is_online' => 0,
                ];
                $this->db->insert('tbl_user', $users);
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Data Guru Berhasil!');
                redirect('admin/guru');
            } else {
                $this->session->set_flashdata('error', 'Tambah Data Guru Gagal!, <br> Sistem Error!');
                redirect('admin/guru');
            }
        } else if (isset($post['update'])) {
            $this->guru_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data Guru Berhasil!');
                redirect('admin/guru');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data Guru Gagal!, <br> Sistem Error!');
                redirect('admin/guru');
            }
        } else {
            redirect('admin/guru');
        }
    }

    function delete($id)
    {
        $this->guru_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Hapus Data Guru Berhasil!');
            redirect('admin/guru');
        } else {
            $this->session->set_flashdata('error', 'Hapus Data Guru Gagal!, <br> Sistem Error!');
            redirect('admin/guru');
        }
    }
}
