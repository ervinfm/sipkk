<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
    }

    public function index()
    {
        $this->template->load('admin/template', 'admin/laporan/index');
    }

    public function cetak()
    {
        $post = $this->input->post(null, true);
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => $post['l_ukuran'],
            'orientation' => 'L'
        ]);

        $datas['row'] = $post['l_jenis'];
        $html = $this->load->view('admin/laporan/cetak', $datas, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
