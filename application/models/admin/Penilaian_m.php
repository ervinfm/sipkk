<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_m extends CI_Model
{
    function get_peserta($id_kelas, $id_ta)
    {
        $this->db->from('tb_peserta');
        $this->db->where('id_kelas', $id_kelas);
        $this->db->where('id_ta', $id_ta);
        $query = $this->db->get();
        return $query;
    }

    function get_nilai_by_siswa($id_siswa, $id_ta)
    {
        $this->db->from('tb_nilai');
        $this->db->where('id_siswa', $id_siswa);
        $this->db->where('id_ta', $id_ta);
        $query = $this->db->get();
        return $query;
    }
}
