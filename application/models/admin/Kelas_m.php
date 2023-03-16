<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_m extends CI_Model
{
    function get_kelas($id = null)
    {
        $this->db->from('tbl_kelas');
        if ($id != null) {
            $this->db->where('id_kelas', $id);
        } else {
            $this->db->order_by('nama_kelas', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_kelas' => random_string('numeric', 6),
            'nama_kelas' => $post['k_nama'],
            'id_guru' => $post['k_guru'],
            'tingkat_kelas' => $post['k_tingkat'],
        ];
        $this->db->insert('tbl_kelas', $params);
    }

    function update($post)
    {
        $params = [
            'nama_kelas' => $post['k_nama'],
            'id_guru' => $post['k_guru'],
            'tingkat_kelas' => $post['k_tingkat'],
        ];
        $this->db->where('id_kelas', $post['id']);
        $this->db->update('tbl_kelas', $params);
    }

    function delete($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('tbl_kelas');
    }

    function get_peserta($id_kelas, $id_ta)
    {
        $ci = &get_instance();
        $ci->db->from('tb_peserta');
        $ci->db->join('tbl_kelas', 'tb_peserta.id_kelas=tbl_kelas.id_kelas');
        $ci->db->where('tb_peserta.id_kelas', $id_kelas);
        $ci->db->where('tb_peserta.id_ta', $id_ta);
        $query = $ci->db->get();
        return $query;
    }

    function insert_peserta($id_kelas, $id_siswa, $id_ta = null)
    {
        $params = [
            'id_ta' => $id_ta,
            'id_kelas' => $id_kelas,
            'id_siswa' => $id_siswa,
        ];
        $this->db->insert('tb_peserta', $params);
    }

    function delete_peserta($id)
    {
        $this->db->where('id_peserta', $id);
        $this->db->delete('tb_peserta');
    }
}
