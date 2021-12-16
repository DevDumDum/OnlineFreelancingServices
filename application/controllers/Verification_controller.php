<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Verification_controller extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Admin/Verification_model');
        $this->load->model('OFS/OFS_model');
    }

    }

}