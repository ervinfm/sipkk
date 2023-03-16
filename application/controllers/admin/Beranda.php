<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/siswa_m');
        admin();
    }

    public function index()
    {
        $data['row'] = $this->siswa_m->get_siswa();
        $this->template->load('admin/template', 'admin/beranda', $data);
    }
}
