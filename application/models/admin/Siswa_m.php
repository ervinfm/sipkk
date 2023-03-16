<?php defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_m extends CI_Model
{
    function get_siswa($id = null)
    {
        $this->db->from('tbl_siswa');
        if ($id != null) {
            $this->db->where('id_siswa', $id);
        } else {
            $this->db->order_by('nisn_siswa', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_siswa' => random_string('alnum', 20),
            'nisn_siswa' => $post['s_nisn'],
            'nama_siswa' => $post['s_nama'],
            'ttl_siswa' => $post['s_ttl'],
            'gender_siswa' => $post['s_gender'],
            'agama_siswa' => $post['s_agama'],
            'asal_siswa' => $post['s_asal'],
            'orang_tua_siswa' => $post['s_ortu'],
            'pekerjaan_ortu_siswa' => $post['s_kerja'],
            'telp_ortu_siswa' => $post['s_telp'],
            'alamat_siswa' => $post['s_alamat'],
        ];
        $this->db->insert('tbl_siswa', $params);
    }

    function update($post)
    {
        $params = [
            'nisn_siswa' => $post['s_nisn'],
            'nama_siswa' => $post['s_nama'],
            'ttl_siswa' => $post['s_ttl'],
            'gender_siswa' => $post['s_gender'],
            'agama_siswa' => $post['s_agama'],
            'asal_siswa' => $post['s_asal'],
            'orang_tua_siswa' => $post['s_ortu'],
            'pekerjaan_ortu_siswa' => $post['s_kerja'],
            'telp_ortu_siswa' => $post['s_telp'],
            'alamat_siswa' => $post['s_alamat'],
        ];
        $this->db->where('id_siswa', $post['id']);
        $this->db->update('tbl_siswa', $params);
    }

    function delete($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete('tbl_siswa');
    }

    function akun($post)
    {
        $this->db->insert('tbl_user', $post);
    }

    function update_akun_siswa($id_siswa, $id_user)
    {
        $params['id_user'] = $id_user;
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('tbl_siswa', $params);
    }
}
