<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Ttime extends CI_Controller {

    function __construct() {
        parent::__construct();

        // $this->load->scaffolding('entries');
    }

    public function index() {

        $timezone = "Asia/Dacca";
        if (function_exists('date_default_timezone_set'))
            date_default_timezone_set($timezone);
        echo date('d-m-Y H:i:s');


        $this->load->helper('date');

        //  echo timezone_menu('UP6');

        echo timezone_menu();

        $timestamp = time();
        $timezone = 'UP6';


        echo gmt_to_local($timestamp, $timezone, $daylight_saving);

        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
        $time = time();

       // echo mdate($datestring, gmt_to_local(time(), $));
    }

}

?>