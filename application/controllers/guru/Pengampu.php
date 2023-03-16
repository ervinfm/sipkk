<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengampu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('guru/wali_m', 'guru/pengampu_m'));
        guru();
    }

    public function index()
    {
        $data = [
            'ampu' => $this->pengampu_m->get_pengampu(profil()->id_guru, get_ta('status_ta', 1)->row()->id_ta),
        ];
        $this->template->load('guru/template', 'guru/pengampu/index', $data);
    }

    public function nilai($id)
    {
        $data = [
            'row' => $this->pengampu_m->get_penilaian($id)->row(),
        ];
        $this->template->load('guru/template', 'guru/pengampu/nilai', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $this->pengampu_m->insert_nilai($post);
            redirect('guru/pengampu/nilai/' . $post['id_pengampu']);
        } else if (isset($post['update'])) {
            $this->pengampu_m->update_nilai($post);
            redirect('guru/pengampu/nilai/' . $post['id_pengampu']);
        } else {
            redirect('guru/pengampu');
        }
    }
}
