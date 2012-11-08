<?php

class News_model extends CI_Model {

    var $title = '';

    // var $content = '';
    //var $date    = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries() {
        //$query = $this->db->get('entries', 10);
         $sql = "select * from entries order by date desc limit 10";
        $query=$this->db->query($sql);
        return $query->result();
    }

    function get_news($id) {
        $this->db->select('title,id,body,date');
        $this->db->from('entries');
        $this->db->where('id = ' . "'" . $id . "'");
        $this->db->limit(1);

        $query = $this->db->get();
        //$query = $this->db->get('entries', 10);
        return $query->result();

    }

    function insert_news(){

        $this->title   = $_POST['title']; // please read the below note
        $this->body = $_POST['body'];
        $this->user_id=$_POST['user_id'];
        $this->date    = date("Y-m-d H:i:s",time());
        $this->sbody    = $_POST['sbody'];
        $this->db->insert('entries', $this);

        return $this->db->insert_id();

    }


//
//    function update_entry()
//    {
//        $this->title   = $_POST['title'];
//        $this->content = $_POST['content'];
//        $this->date    = time();
//
//        $this->db->update('entries', $this, array('id' => $_POST['id']));
//    }
}

?>
