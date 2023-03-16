<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        guru();
    }

    public function index()
    {
        $this->template->load('guru/template', 'guru/beranda');
    }
}
