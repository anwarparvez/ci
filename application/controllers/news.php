<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class News extends CI_Controller {

    var $ages = array();

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');

        // $this->load->scaffolding('entries');
    }

    public function index() {

        redirect('news/home/');
    }

    function home() {

        $this->load->library('pagination');
        $this->load->model('News_model');
        $config['base_url'] = base_url() . '/index.php/news/home/';
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

    function editorial() {
        $this->load->library('pagination');
        $this->load->model('News_model');
        $config['base_url'] = base_url() . '/index.php/news/editorial';
        $config['total_rows'] = $this->News_model->count_news_by_category(0);
        $limit = $config['per_page'] = 5;
        $start = $this->uri->segment(3);
        $data['query'] = $this->News_model->fetch_newses_by_category($limit, $start, 0);
        $data['nquery'] = $this->News_model->get_last_ten_entries();
        ;

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('news_list_view', $data);
    }

    function national() {
        $this->load->library('pagination');
        $this->load->model('News_model');
        $config['base_url'] = base_url() . '/index.php/news/editorial';
        $config['total_rows'] = $this->News_model->count_news_by_category(1);
        $limit = $config['per_page'] = 5;
        $start = $this->uri->segment(3);
        $data['query'] = $this->News_model->fetch_newses_by_category($limit, $start, 1);
        $data['nquery'] = $this->News_model->get_last_ten_entries();
        ;

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('news_list_view', $data);
    }

    function international() {
        $this->load->library('pagination');
        $this->load->model('News_model');
        $config['base_url'] = base_url() . '/index.php/news/international';
        $config['total_rows'] = $this->News_model->count_news_by_category(2);
        $limit = $config['per_page'] = 5;
        $start = $this->uri->segment(3);
        $data['query'] = $this->News_model->fetch_newses_by_category($limit, $start, 2);
        $data['nquery'] = $this->News_model->get_last_ten_entries();
        ;

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('news_list_view', $data);
    }

    function business() {
        $this->load->library('pagination');
        $this->load->model('News_model');
        $config['base_url'] = base_url() . '/index.php/news/editorial';
        $config['total_rows'] = $this->News_model->count_news_by_category(3);
        $limit = $config['per_page'] = 5;
        $start = $this->uri->segment(3);
        $data['query'] = $this->News_model->fetch_newses_by_category($limit, $start, 3);
        $data['nquery'] = $this->News_model->get_last_ten_entries();
        ;

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('news_list_view', $data);
    }

    function arts_entertainment() {
        $this->load->library('pagination');
        $this->load->model('News_model');
        $config['base_url'] = base_url() . '/index.php/news/editorial';
        $config['total_rows'] = $this->News_model->count_news_by_category(4);
        $limit = $config['per_page'] = 5;
        $start = $this->uri->segment(3);
        $data['query'] = $this->News_model->fetch_newses_by_category($limit, $start, 4);
        $data['nquery'] = $this->News_model->get_last_ten_entries();
        ;

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('news_list_view', $data);
    }

    function sports() {
        $this->load->library('pagination');
        $this->load->model('News_model');
        $config['base_url'] = base_url() . '/index.php/news/editorial';
        $config['total_rows'] = $this->News_model->count_news_by_category(5);
        $limit = $config['per_page'] = 5;
        $start = $this->uri->segment(3);
        $data['query'] = $this->News_model->fetch_newses_by_category($limit, $start, 5);
        $data['nquery'] = $this->News_model->get_last_ten_entries();
        ;

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('news_list_view', $data);
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
                redirect('upload/photo/' . $news_id);
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

    public function comment_delete() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $news_id = $this->uri->segment(3);
            $comment_id = $this->uri->segment(4);
            $this->load->model('Comment_model');
            $this->Comment_model->delete_comment_by_id($comment_id);
            redirect('news/detail/' . $news_id);
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

    function tnews() {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if ($session_data['is_admin'] == 1) {
                $this->load->library('pagination');
                $this->load->model('News_model');
                $config['base_url'] = base_url() . '/index.php/news/tnews/';
                $config['total_rows'] = $this->News_model->record_count();
                $limit = $config['per_page'] = 5;
                $start = $this->uri->segment(3);
                $data['query'] = $this->News_model->fetch_newses($limit, $start);


                $this->pagination->initialize($config);
                $data["links"] = $this->pagination->create_links();
                $this->load->view('news_table', $data);
            } else {
                redirect('user/login', 'refresh');
            }
        } else {

        }
    }

}

?>