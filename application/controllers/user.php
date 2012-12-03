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


    function ulist() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $username = $data['username'] = $session_data['username'];
            $this->load->library('pagination');
            $config['base_url'] = base_url() . '/index.php/user/ulist/';
            $config['total_rows'] = $this->User_model->record_count();
            $limit = $config['per_page'] = 10;
            $start = $this->uri->segment(3);
            $data['query'] = $this->User_model->fetch_users($limit, $start);

            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $this->load->view('user_list_view', $data);
            // echo $this->pagination->create_links();
        } else {
            redirect('user/login', 'refresh');
        }
    }

    function delete() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if ($session_data['is_admin'] == 1) {
                $username = $data['username'] = $session_data['username'];
                // $this->load->model('user');
                $u_id = $this->uri->segment(3);
                // if($u_id!=$session_data['id']){
                $data['query'] = $this->User_model->delete_user($u_id);

                redirect('user/ulist', 'refresh');
            }
        } else {
            redirect('user/login', 'refresh');
        }
    }

    function edit() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $username = $data['username'] = $session_data['username'];
            // $this->load->model('user');
            $query = $this->User_model->get_profileInfo($username);
            foreach ($query as $row) {
                $data['user'] = $row;
            }
            $this->load->helper('url');
            $this->load->helper('form');

            $this->load->view('edit_profile_view', $data);
        } else {
            $this->load->helper(array('form', 'url'));
            redirect('user/login', 'refresh');
        }
    }

    function verifyedit() {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('opassword', 'Password', 'trim|required|xss_clean|callback_check_password');
        $this->form_validation->set_rules('npassword', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean|callback_match_password');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        // $data

        $session_data = $this->session->userdata('logged_in');
        $username = $data['username'] = $session_data['username'];
        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            // $this->load->model('user');
            $query = $this->User_model->get_profileInfo($username);
            foreach ($query as $row) {
                $data['user'] = $row;
            }
            $data['user']->name = $this->input->post('name');
            $data['email']->name = $this->input->post('email');

            $this->load->view('edit_profile_view', $data);
        } else {
            //Go to private area
            $this->User_model->edit_user($username);
            redirect('user', 'refresh');
        }
    }

    function check_password($old_password) {
        $session_data = $this->session->userdata('logged_in');
        $username = $data['username'] = $session_data['username'];
        $query = $this->User_model->get_profileInfo($username);
        foreach ($query as $row) {
            if ($row->password == $old_password)
                return true;
        }

        $this->form_validation->set_message('check_password', 'Old Password must be matched');
        return false;
    }

    function match_password($cpassword) {
        $password = $this->input->post('npassword');
        if ($password == $cpassword) {
            return true;
        } else {
            $this->form_validation->set_message('match_password', 'Password must be matched');
            return false;
        }
    }

    function registration() {

    }

    function login() {
        $this->load->helper(array('form', 'url'));
        $this->load->view('login_view');
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('news/', 'refresh');
    }

}

?>
