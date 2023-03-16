<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_m extends CI_Model
{
    function get_kriteria($id = null)
    {
        $this->db->from('tbl_kriteria');
        if ($id != null) {
            $this->db->where('id_kriteria', $id);
        } else {
            $this->db->order_by('kode_kriteria', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'kode_kriteria' => $post['k_kode'],
            'nama_kriteria' => $post['k_nama'],
            'bobot_kriteria' => $post['k_bobot']
        ];
        $this->db->insert('tbl_kriteria', $params);
    }

    function update($post)
    {
        $params = [
            'kode_kriteria' => $post['k_kode'],
            'nama_kriteria' => $post['k_nama'],
            'bobot_kriteria' => $post['k_bobot']
        ];
        $this->db->where('id_kriteria', $post['id']);
        $this->db->update('tbl_kriteria', $params);
    }

    function delete($id)
    {
        $this->db->where('id_kriteria', $id);
        $this->db->delete('tbl_kriteria');
    }

    function get_sub_kriteria($id = null)
    {
        $this->db->from('tbl_sub_kriteria');
        if ($id != null) {
            $this->db->where('id_kriteria', $id);
        } else {
            $this->db->order_by('nama_sub_kriteria', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function get_sub_detail($id)
    {
        $this->db->from('tbl_sub_kriteria');
        $this->db->where('id_sub_kriteria', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function sub_insert($post)
    {
        $params = [
            'id_kriteria' => $post['id_kriteria'],
            'sub_kriteria' => $post['sk_kriteria'],
            'bobot_sub_kriteria' => $post['sk_bobot']
        ];
        $this->db->insert('tbl_sub_kriteria', $params);
    }

    function sub_update($post)
    {
        $params = [
            'sub_kriteria' => $post['sk_kriteria'],
            'bobot_sub_kriteria' => $post['sk_bobot']
        ];
        $this->db->where('id_sub_kriteria', $post['id']);
        $this->db->update('tbl_sub_kriteria', $params);
    }

    function sub_delete($id)
    {
        $this->db->where('id_sub_kriteria', $id);
        $this->db->delete('tbl_sub_kriteria');
    }
}
