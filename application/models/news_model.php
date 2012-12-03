<?php

class News_model extends CI_Model {

    var $title = '';

    // var $content = '';
    //var $date    = '';


    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function record_count() {
        return $this->db->count_all("entries");
    }

    public function fetch_newses($limit, $start) {

        $this->db->order_by('date', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get("entries");

        return $query->result();
    }

    function get_last_ten_entries() {
        //$query = $this->db->get('entries', 10);

        $this->db->select('*');
        $this->db->from('entries');
        $this->db->order_by('date', 'desc');
        $this->db->limit(6);
        $query = $this->db->get();
        // $sql = "select * from entries order by date desc limit 10";
        //$query = $this->db->query($sql);
        return $query->result();
    }

    function get_news($id) {
        $this->db->select('title,id,body,date');
        $this->db->from('entries');
        $this->db->where('id = ' . "'" . $id . "'");
        $this->db->order_by('date', 'desc');
        $this->db->limit(1);

        $query = $this->db->get();
        //$query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_news() {

        $this->title = $_POST['title']; // please read the below note
        $this->body = $_POST['body'];
        $this->user_id = $_POST['user_id'];
        $this->load->helper('date');
        $this->date = date("Y-m-d H:i:s", gmt_to_local(time(),'UP6'));
        $this->sbody = $_POST['sbody'];
        $this->db->insert('entries', $this);

        return $this->db->insert_id();
    }

    function delete_news($id) {
        $this->db->where('id', $id);
        $this->db->delete('entries');
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
