<?php

class Comment_model extends CI_Model {


    // var $content = '';
    //var $date    = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }


    function get_comments($entry_id) {
        $this->db->select('author,body');
        $this->db->from('comments');
        $this->db->where('entry_id = ' . "'" . $entry_id . "'");
        $query = $this->db->get();
        return $query->result();

    }

    function insert_comment()
    {
        $this->author   = $_POST['author']; // please read the below note
        $this->body = $_POST['body'];
        $this->entry_id=$_POST['entry_id'];
       // $this->date    = time();

        $this->db->insert('comments', $this);
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
