<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		already();
		$this->template->load('auth/template', 'auth/login');
	}

	public function forgot()
	{
		already();
		$this->template->load('auth/template', 'auth/forgot');
	}

	function proses()
	{
		$post = $this->input->post(null, true);
		if (isset($post['login'])) {
			$this->load->model('auth_m');
			$log = $this->auth_m->get_username($post);
			if ($log->num_rows() > 0) {
				$post['id'] = $log->row()->id_user;
				if ($this->auth_m->get_password($post)->num_rows() > 0) {
					$cek_pass = $this->auth_m->get_password($post);
					if ($cek_pass->row()->status_user == 1) {
						$user = [
							'user_id' => $cek_pass->row()->id_user,
							'nama' => $cek_pass->row()->nama_user,
							'level' => $cek_pass->row()->level_user,
						];
						$this->session->set_userdata($user);
						if ($cek_pass->row()->level_user == 1) {
							logged(1);
							redirect('admin/beranda');
						} else if ($cek_pass->row()->level_user == 2) {
							logged(1);
							redirect('guru/beranda');
						} else if ($cek_pass->row()->level_user == 3) {
							logged(1);
							redirect('beranda');
						} else {
							$this->session->sess_destroy();
							redirect('login');
						}
					} else {
						$this->session->set_flashdata('warning', 'Akun Anda Terkunci!');
						$this->session->set_flashdata('User', $post['u_name']);
						$this->session->set_flashdata('Pass', $post['u_pass']);
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('error', 'Password tidak dikenal oleh sistem!');
					$this->session->set_flashdata('User', $post['u_name']);
					$this->session->set_flashdata('Pass', $post['u_pass']);
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('error', 'Username atau Email tidak dikenal oleh sistem!');
				$this->session->set_flashdata('User', $post['u_name']);
				$this->session->set_flashdata('Pass', $post['u_pass']);
				redirect('auth');
			}
		} else {
			redirect('login');
		}
	}

	function logout()
	{
		logged(0);
		$this->session->sess_destroy();
		redirect('login');
	}

	function profil()
	{
		if ($this->session->userdata('user_id')) {
			$this->template->load(($this->session->userdata('level') == 1 ? 'admin' : 'guru') . '/template', 'auth/profil');
		} else {
			redirect('auth');
		}
	}
}
