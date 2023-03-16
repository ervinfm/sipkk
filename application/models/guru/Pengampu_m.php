<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengampu_m extends CI_Model
{
    function get_pengampu($id_guru, $id_ta)
    {
        $this->db->from('tb_pengampu');
        $this->db->where('id_guru', $id_guru);
        $this->db->where('id_ta', $id_ta);
        $query = $this->db->get();
        return $query;
    }

    function get_penilaian($id_pengampu)
    {
        $this->db->from('tb_pengampu');
        $this->db->where('id_pengampu', $id_pengampu);
        $query = $this->db->get();
        return $query;
    }

    function insert_nilai($post)
    {
        $params = [
            'id_siswa' => $post['siswa'],
            'id_ta' => $post['ta'],
            'id_mapel' => $post['mapel'],
            'nilai_tugas' => $post['tugas'],
            'nilai_uts' => $post['uts'],
            'nilai_uas' => $post['uas'],
            'nilai_kehadiran' => $post['kehadiran'],
            'nilai_uh' => $post['uh'],
        ];
        $this->db->insert('tb_nilai', $params);
    }

    function update_nilai($post)
    {
        $params = [
            'nilai_tugas' => $post['tugas'],
            'nilai_uts' => $post['uts'],
            'nilai_uas' => $post['uas'],
            'nilai_kehadiran' => $post['kehadiran'],
            'nilai_uh' => $post['uh'],
        ];
        $this->db->where('id_nilai', $post['id']);
        $this->db->update('tb_nilai', $params);
    }
}
