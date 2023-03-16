<?php defined('BASEPATH') or exit('No direct script access allowed');

class Guru_m extends CI_Model
{
    function get_guru($id = null)
    {
        $this->db->from('tbl_guru');
        if ($id != null) {
            $this->db->where('id_guru', $id);
        } else {
            $this->db->order_by('nip_guru', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function update($post)
    {
        $params = [
            'nama_guru' => $post['g_nama'],
            'pendidikan_guru' => $post['g_pendidikan'],
            'tugas_guru' => $post['g_tugas'],
        ];
        $this->db->where('id_guru', $post['g_id']);
        $this->db->update('tbl_guru', $params);
    }

    function delete($id)
    {
        $this->db->where('id_guru', $id);
        $this->db->delete('tbl_guru');
    }
}
