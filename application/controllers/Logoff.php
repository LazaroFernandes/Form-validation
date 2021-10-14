<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logoff extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('logged');
        $this->logged->get_logged();
    }

    public function index() {
        $this->session->sess_destroy();
        redirect(site_url(), 'refresh');
    }

}
