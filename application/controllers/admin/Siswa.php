<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('admin/siswa_m');
    }

    public function index()
    {
        $data['row'] = $this->siswa_m->get_siswa();
        $this->template->load('admin/template', 'admin/siswa/index', $data);
    }

    public function insert()
    {
        $this->template->load('admin/template', 'admin/siswa/form');
    }

    public function update($id)
    {
        $data['row'] = $this->siswa_m->get_siswa($id)->row();
        $this->template->load('admin/template', 'admin/siswa/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $this->siswa_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Tambah Data siswa Berhasil!');
                redirect('admin/siswa');
            } else {
                $this->session->set_flashdata('error', 'Tambah Data siswa Gagal!, <br> Sistem Error!');
                redirect('admin/siswa');
            }
        } else if (isset($post['update'])) {
            $this->siswa_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data siswa Berhasil!');
                redirect('admin/siswa');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data siswa Gagal!, <br> Sistem Error!');
                redirect('admin/siswa');
            }
        } else if (isset($post['upload'])) {
            $file_mimes = array('application/vnd.ms-excel', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
                $arr_file = explode('.', $_FILES['upload_file']['tmp_name']);
                $extension = end($arr_file);
                if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                $error_upload = 0;
                for ($i = 1; $i < count($sheetData); $i++) {
                    $id = random_string('alnum', 20);
                    if ($sheetData[$i]['0'] != null) {
                        $data = [
                            'id_siswa' => $id,
                            'nisn_siswa' => $sheetData[$i]['0'],
                            'nama_siswa' =>  $sheetData[$i]['1'],
                            'ttl_siswa' => $sheetData[$i]['2'],
                            'gender_siswa' => ($sheetData[$i]['3'] == 'L' ? '1' : '0'),
                            'agama_siswa' => $sheetData[$i]['4'],
                            'asal_siswa' => $sheetData[$i]['5'],
                            'orang_tua_siswa' => $sheetData[$i]['6'],
                            'pekerjaan_ortu_siswa' => $sheetData[$i]['7'],
                            'telp_ortu_siswa' => $sheetData[$i]['8'],
                            'alamat_siswa' => $sheetData[$i]['9'],
                        ];
                        $this->db->insert('tbl_siswa', $data);
                        if (@$post['create_akun'] == 1) {
                            $this->akun($id, TRUE);
                        }
                    } else {
                        $error_upload++;
                    }
                }
                if ($this->db->affected_rows() > 0) {
                    if ($error_upload > 0) {
                        $this->session->set_flashdata('warning', 'Data Siswa Berhasil di Unggah! <br> Namun ada beberapa data yang tidak lolos preprocessing data!');
                        redirect('admin/siswa');
                    } else {
                        $this->session->set_flashdata('succes', 'Data Siswa Berhasil di Unggah!');
                        redirect('admin/siswa');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Data Siswa Gagal di Unggah, <br> Silahkan Periksa dataset anda!');
                    redirect('admin/siswa');
                }
            } else {
                $this->session->set_flashdata('error', 'Data Siswa Gagal di Unggah, <br> Silahkan Periksa dataset anda!');
                redirect('admin/siswa');
            }
        } else {
            redirect('admin/siswa');
        }
    }

    function delete($id)
    {
        $data = $this->siswa_m->get_siswa($id)->row();
        delete_user_siswa($data->id_user);
        $this->siswa_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Hapus Data siswa Berhasil!');
            redirect('admin/siswa');
        } else {
            $this->session->set_flashdata('error', 'Hapus Data siswa Gagal!, <br> Sistem Error!');
            redirect('admin/siswa');
        }
    }

    function akun($id, $nodir = false)
    {
        $data = $this->siswa_m->get_siswa($id)->row();
        $id_user = random_string('numeric', 20);
        $params = [
            'id_user' => $id_user,
            'username_user' => $data->nisn_siswa,
            'password_user' => sha1($data->nisn_siswa),
            'nama_user' => $data->nama_siswa,
            'level_user' => 3,
            'status_user' => 1,
            'is_online' => 0,
        ];
        $this->siswa_m->akun($params);

        update_user_insiswa($id, $id_user);
        if ($nodir == false) {
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembuatan Akun siswa Berhasil!');
                redirect('admin/siswa');
            } else {
                $this->session->set_flashdata('error', 'Pembuatan Akun siswa Gagal!, <br> Sistem Error!');
                redirect('admin/siswa');
            }
        }
    }
}
