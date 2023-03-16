<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    function get_username($post)
    {
        $this->db->from('tbl_user');
        $this->db->where('username_user', $post['u_name']);
        $this->db->or_where('email_user', $post['u_name']);
        $query = $this->db->get();
        return $query;
    }

    function get_password($post)
    {
        $this->db->from('tbl_user');
        $this->db->where('id_user', $post['id']);
        $this->db->where('password_user', sha1($post['u_pass']));
        $query = $this->db->get();
        return $query;
    }
}
