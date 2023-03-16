<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_m extends CI_Model
{
    function get_mapel($id = null)
    {
        $this->db->from('tbl_mapel');
        if ($id != null) {
            $this->db->where('id_mapel', $id);
        } else {
            $this->db->order_by('kelompok_mapel', 'ASC');
            $this->db->order_by('kode_mapel', 'ASC');
        }
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
