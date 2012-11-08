<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class User extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('User_model', '', TRUE);
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $username = $data['username'] = $session_data['username'];
            // $this->load->model('user');
            $data['query'] = $this->User_model->get_profileInfo($username);

            $this->load->view('profile_view', $data);
        } else {

            $this->load->helper(array('form', 'url'));

            $this->load->view('registration_view');
        }
    }

    function edit() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $username = $data['username'] = $session_data['username'];
            // $this->load->model('user');
            $data['query'] = $this->User_model->get_profileInfo($username);
            $this->load->helper('url');
            $this->load->helper('form');

            $this->load->view('edit_profile_view', $data);
        } else {

            $this->load->helper(array('form', 'url'));

            $this->load->view('registration_view');
        }
    }

    function verifyedit() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean|callback_match_password');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('registration_view');
        } else {
            //Go to private area
            $this->User_model->insert_user();
            redirect('login', 'refresh');
        }
    }

    function match_password($cpassword) {
        $password = $this->input->post('password');
        if ($password == $cpassword) {
            return true;
        } else {
            $this->form_validation->set_message('match_password', 'Password must be matched');
            return false;
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

    function registration() {

    }

}

?>
