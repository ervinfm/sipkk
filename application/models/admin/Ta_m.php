<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ta_m extends CI_Model
{
    function get_ta($id = null)
    {
        $this->db->from('tbl_tahun_ajaran');
        if ($id != null) {
            $this->db->where('id_ta', $id);
        } else {
            $this->db->order_by('nama_ta', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function get_ta_active()
    {
        $this->db->from('tbl_tahun_ajaran');
        $this->db->where('status_ta', 1);
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'nama_ta' => $post['ta_insert'],
            'status_ta' => 0
        ];
        $this->db->insert('tbl_tahun_ajaran', $params);
    }

    function update($post)
    {
        $params = [
            'nama_ta' => $post['m_nama'],
        ];
        $this->db->where('id_ta', $post['id']);
        $this->db->update('tbl_tahun_ajaran', $params);
    }

    function delete($id)
    {
        $this->db->where('id_ta', $id);
        $this->db->delete('tbl_tahun_ajaran');
    }

    function select_active($id)
    {
        $params['status_ta'] = 1;
        $this->db->where('id_ta', $id);
        $this->db->update('tbl_tahun_ajaran', $params);
    }

    function unselect_active($id)
    {
        $params['status_ta'] = 0;
        $this->db->where('id_ta', $id);
        $this->db->update('tbl_tahun_ajaran', $params);
    }
}
