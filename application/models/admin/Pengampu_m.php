<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengampu_m extends CI_Model
{
    function get_pengampu($id = null, $id_ta = null)
    {
        $this->db->from('tb_pengampu');
        if ($id != null) {
            $this->db->where('id_pengampu', $id);
        } else {
            $this->db->where('id_ta', $id_ta);
            $this->db->order_by('id_kelas', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_ta' => $post['ta'],
            'id_mapel' => $post['mapel'],
            'id_guru' => $post['guru'],
            'id_kelas' => $post['kelas']
        ];
        $this->db->insert('tb_pengampu', $params);
    }

    function update($post)
    {
        $params = [
            'id_kelas' => $post['p_kelas'],
            'id_mapel' => $post['p_mapel'],
            'id_guru' => $post['p_guru'],
        ];
        $this->db->where('id_pengampu', $post['id']);
        $this->db->update('tb_pengampu', $params);
    }

    function delete($id)
    {
        $this->db->where('id_pengampu', $id);
        $this->db->delete('tb_pengampu');
    }
}
