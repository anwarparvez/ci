<?php

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index() {
        $this->load->view('upload_form_view', array('error' => ' '));
    }

    function photo() {
        $this->load->view('upload_form_view', array('error' => ' '));
    }

    function do_upload() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = '100';
//        $config['max_width'] = '1024';
//        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form_view', $error);
        } else {

            $image = $this->upload->data();
            $this->load->model('News_model');
            $this->News_model->upload_photo($this->uri->segment(3), $image['file_name']);
             redirect('news/detail/' . $this->uri->segment(3));
        }
    } 

}

?>