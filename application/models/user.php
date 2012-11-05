<?php

Class User extends CI_Model {

    function insert_user() {
        $this->name = $_POST['name']; // please read the below note
        $this->email = $_POST['email'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->date = time();
        $this->db->insert('users', $this);
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
        $this->db->select('id, username, password');
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

}

?>
