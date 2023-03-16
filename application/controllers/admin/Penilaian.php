<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('admin/kelas_m', 'admin/penilaian_m', 'admin/mapel_m'));
        admin();
    }

    public function index()
    {
        $data['row'] = $this->kelas_m->get_kelas();
        $this->template->load('admin/template', 'admin/penilaian/index', $data);
    }

    public function kelas($id, $ta)
    {
        $data = [
            'row' => $this->penilaian_m->get_peserta($id, $ta),
        ];
        $this->template->load('admin/template', 'admin/penilaian/kelas', $data);
    }

    public function siswa($id, $kelas, $ta)
    {
        $data = [
            'row' => $this->penilaian_m->get_nilai_by_siswa($id, $ta),
            'siswa' => get_siswa_all($id)->row(),
        ];
        $this->template->load('admin/template', 'admin/penilaian/siswa', $data);
    }

    public function rekapitulasi($ta)
    {
        $data = [];
        $this->template->load('admin/template', 'admin/penilaian/rekapitulasi', $data);
    }
}
