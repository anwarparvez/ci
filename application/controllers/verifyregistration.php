<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyRegistration extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    function match_password($cpassword)
    {
        $password = $this->input->post('password');
        if($password==$cpassword)
        {
            return true;

        }
        else
        {
               $this->form_validation->set_message('match_password', 'Password must be matched');
            return false;
        }

    }
    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_user');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean|callback_match_password');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('registration_view');
        } else {
            //Go to private area
            $this->User_model->insert_user();
            redirect('user/login', 'refresh');
        }
    }

    function check_user($username) {
        //Field validation succeeded.  Validate against database
        //query the database
       //  $username = $this->input->post('username');
        $result = $this->User_model->user_exist($username);

        if ($result) {
            $this->form_validation->set_message('check_user', 'Username exist');
            return false;
        } else {

            return TRUE;
        }
    }

}

?>
