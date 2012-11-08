<?php

Class User_model extends CI_Model {

    function insert_user() {
        $this->name = $_POST['name']; // please read the below note
        $this->email = $_POST['email'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->date = date("Y-m-d H:i:s", time());
        $this->db->insert('users', $this);
        return $this->db->insert_id();
    }

    function user_exist($username) {
        $this->db->select('id, username ');
        $this->db->from('users');
        $this->db->where('username = ' . "'" . $username . "'");
        //$this -> db -> where('password = ' . "'" . MD5($password) . "'");
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function login($username, $password) {
        $this->db->select('id, username, password, is_admin');
        $this->db->from('users');
        $this->db->where('username = ' . "'" . $username . "'");
        //$this -> db -> where('password = ' . "'" . MD5($password) . "'");
        $this->db->where('password = ' . "'" . $password . "'");
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_profileInfo($username) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username = ' . "'" . $username . "'");
        $this->db->limit(1);

        $query = $this->db->get();
        //$query = $this->db->get('entries', 10);
        return $query->result();
    }

}

?>
