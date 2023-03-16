<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        siswa();
    }

    public function index()
    {
        $this->template->load('siswa/template', 'siswa/beranda');
    }
}
