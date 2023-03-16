<?php defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/siswa_m');
        $this->load->helper('saw');
        admin();
    }

    public function index()
    {
        if (@$_GET['tingkat']) {
            $data['saw'] = artisan('tingkat', $_GET['tingkat']);
        } else {
            $data = null;
        }
        $this->template->load('admin/template', 'admin/proses/index', $data);
    }

    public function hasil()
    {
        $peserta = array();
        foreach (get_kelas_spesifik('tingkat_kelas', 1)->result() as $key => $kelas) {
            foreach (get_pesert_byid_kelas($kelas->id_kelas, get_ta('status_ta', 1)->row()->id_ta)->result() as $key => $siswa) {
                array_push($peserta, $siswa->id_siswa);
            }
        }
        $analisis = analisis($peserta);
        $normalisasi = normalisasi($analisis);
        $rank = rank($normalisasi);
        $short = short($rank);

        echo "<pre>";
        print_r($short);
        echo "</pre>";
    }
}
