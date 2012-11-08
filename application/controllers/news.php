<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class News extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        // $this->load->scaffolding('entries');
    }

    public function index() {

        $this->load->model('News_model');

        $data['query'] = $this->News_model->get_last_ten_entries();

        $this->load->view('news_view', $data);
    }

    public function post()
    {
        if ($this->session->userdata('logged_in')) {
             $session_data = $this->session->userdata('logged_in');
             if($session_data['is_admin']==1)
             {
                  $this->load->view('news_post_view');
             }
             else
             {
                  $this->load->view('login');
             }

        }
        else
        {

        }
    }

    public function news_insert()
    {

       if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $_POST['user_id']=1;
            $_POST['user_id'] = $session_data['id'];
            $this->load->model('News_model');
            $this->News_model->insert_news();
            redirect('news/');
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    public function comments() {
        $this->load->model('News_model');
        $data['query'] = $this->News_model->get_news($this->uri->segment(3));
        $this->load->model('Comment_model');
        $data['comments'] = $this->Comment_model->get_comments($this->uri->segment(3));
        $this->load->view('comment_view', $data);
    }

    public function comment_insert() {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $_POST['author'] = $session_data['username'];
            $this->load->model('Comment_model');
            $this->Comment_model->insert_comment();
            redirect('news/comments/' . $_POST['entry_id']);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('news/', 'refresh');
    }

}

?>