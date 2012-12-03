<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class News extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');

        // $this->load->scaffolding('entries');
    }

    public function index() {
//        $this->load->model('News_model');
//        $data['query'] = $this->News_model->get_last_ten_entries();
//        $this->load->view('news_list_view', $data);
        redirect('news/page/');
    }

    function page() {

            $this->load->library('pagination');
            $this->load->model('News_model');
            $config['base_url'] = base_url() . '/index.php/news/page/';
            $config['total_rows'] = $this->News_model->record_count();
            $limit = $config['per_page'] = 5;
            $start = $this->uri->segment(3);
            $data['query'] = $this->News_model->fetch_newses($limit, $start);
            $data['nquery'] = $this->News_model->get_last_ten_entries();

            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $this->load->view('news_list_view', $data);
            // echo $this->pagination->create_links();
 
    }

    public function post() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if ($session_data['is_admin'] == 1) {
                $this->load->view('news_post_view');
            } else {
                redirect('user/login', 'refresh');
            }
        } else {

        }
    }

    public function news_insert() {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if ($session_data['is_admin'] == 1) {
                $_POST['user_id'] = $session_data['id'];
                $this->load->model('News_model');
                $news_id = $this->News_model->insert_news();
                redirect('news/detail/' . $news_id);
            } else {
                redirect('news/');
            }
        } else {
            //If no session, redirect to login page
            redirect('user/login', 'refresh');
        }
    }

    public function detail() {
        $this->load->model('News_model');
        $data['query'] = $this->News_model->get_news($this->uri->segment(3));
        $this->load->model('Comment_model');
        $data['comments'] = $this->Comment_model->get_comments($this->uri->segment(3));
        $this->load->view('news_detail_view', $data);
    }

    public function comment_insert() {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $_POST['author'] = $session_data['username'];
            $this->load->model('Comment_model');
            $this->Comment_model->insert_comment();
            redirect('news/detail/' . $_POST['entry_id']);
        } else {
            //If no session, redirect to login page
            redirect('user/login', 'refresh');
        }
    }

    function delete() {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if ($session_data['is_admin'] == 1) {
                //$_POST['user_id'] = $session_data['id'];
                $this->load->model('News_model');
                $news_id = $this->uri->segment(3);
                $this->load->model('Comment_model');
                $this->Comment_model->delete_comment_by_news_id($news_id);
                $this->News_model->delete_news($news_id);
                redirect('news/', 'refresh');
            } else {
                redirect('news/', 'refresh');
            }
        } else {
            //If no session, redirect to login page
            redirect('user/login', 'refresh');
        }
    }

}

?>