<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wali extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('guru/wali_m');
        $this->load->helper('saw');
        guru();
    }

    public function index()
    {
        $data = [
            'kelas' => $this->wali_m->get_kelas(profil()->id_guru)->row(),
            'ta' => get_ta('status_ta', 1)->row(),
        ];
        $this->template->load('guru/template', 'guru/wali/index', $data);
    }

    public function penilaian()
    {
        $data = [
            'kelas' => $this->wali_m->get_kelas(profil()->id_guru)->row(),
            'ta' => get_ta('status_ta', 1)->row(),
        ];
        $this->template->load('guru/template', 'guru/wali/index', $data);
    }

    public function ekstra()
    {
        $data = [
            'kelas' => $this->wali_m->get_kelas(profil()->id_guru)->row(),
            'ta' => get_ta('status_ta', 1)->row(),
        ];
        $this->template->load('guru/template', 'guru/wali/index', $data);
    }

    public function komentar()
    {
        $data = [
            'kelas' => $this->wali_m->get_kelas(profil()->id_guru)->row(),
            'ta' => get_ta('status_ta', 1)->row(),
        ];
        $this->template->load('guru/template', 'guru/wali/index', $data);
    }

    public function rekomendasi()
    {
        $data = [
            'kelas' => $this->wali_m->get_kelas(profil()->id_guru)->row(),
            'ta' => get_ta('status_ta', 1)->row(),
        ];
        $this->template->load('guru/template', 'guru/wali/index', $data);
    }
}
