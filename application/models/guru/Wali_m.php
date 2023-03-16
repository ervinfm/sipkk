<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wali_m extends CI_Model
{
    function get_kelas($id_guru)
    {
        $this->db->from('tbl_kelas');
        $this->db->join('tbl_guru', 'tbl_kelas.id_guru=tbl_guru.id_guru');
        $this->db->where('tbl_guru.id_guru', $id_guru);
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'kode_mapel' => $post['m_kode'],
            'nama_mapel' => $post['m_nama'],
            'kelompok_mapel' => $post['m_kelompok']
        ];
        $this->db->insert('tbl_mapel', $params);
    }

    function update($post)
    {
        $params = [
            'kode_mapel' => $post['m_kode'],
            'nama_mapel' => $post['m_nama'],
            'kelompok_mapel' => $post['m_kelompok']
        ];
        $this->db->where('id_mapel', $post['id']);
        $this->db->update('tbl_mapel', $params);
    }

    function delete($id)
    {
        $this->db->where('id_mapel', $id);
        $this->db->delete('tbl_mapel');
    }
}
