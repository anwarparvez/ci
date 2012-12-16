<?php

class Comment_model extends CI_Model {

    // var $content = '';
    //var $date    = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('date');
    }

    function get_comments($entry_id) {
//        $this->db->select('author,body');
//        $this->db->from('comments');
//        $this->db->where('entry_id = ' . "'" . $entry_id . "'");
//
//       // $query = $this->db->get();
        $sql = "select author,body,date,id from comments where entry_id = ? order by date asc";

        $query = $this->db->query($sql, array($entry_id));
        return $query->result();
    }

    function insert_comment() {
        $this->author = $_POST['author']; // please read the below note
        $this->body = $_POST['body'];
        $this->entry_id = $_POST['entry_id'];

        $this->date = date("Y-m-d H:i:s", gmt_to_local(time(), 'UP6'));
        //$this->date = date("Y-m-d H:i:s", time());

        $this->db->insert('comments', $this);
        return $this->db->insert_id();
    }

    function delete_comment_by_news_id($news_id) {

        $this->db->where('entry_id', $news_id);
        $this->db->delete('comments');
    }

    function delete_comment_by_id($comment_id) {

        $this->db->where('id', $comment_id);
        $this->db->delete('comments');
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
