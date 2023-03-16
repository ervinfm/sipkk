<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    function get_user($id = null)
    {
        $this->db->from('tbl_user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        } else {
            $this->db->order_by('level_user', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function get_user_by_level($level)
    {
        $this->db->from('tbl_user');
        $this->db->where('level_user', $level);
        $this->db->order_by('nama_user', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_user' => random_string('numeric', 20),
            'email_user' => $post['u_mail'],
            'nama_user' => $post['u_nama'],
            'username_user' => $post['u_user'],
            'password_user' => sha1($post['u_pass']),
            'level_user' => 1,
        ];
        $this->db->insert('tbl_user', $params);
    }

    function update($post)
    {
        $params = [
            'email_user' => $post['u_mail'],
            'nama_user' => $post['u_nama'],
            'username_user' => $post['u_user'],
        ];
        if ($post['u_pass']) {
            $params['password_user'] = sha1($post['u_pass']);
        }
        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $params);
    }

    function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
    }

    function activate($id, $status)
    {
        $params['status_user'] = $status;
        $this->db->where('id_user', $id);
        $this->db->update('tbl_user', $params);
    }
}
