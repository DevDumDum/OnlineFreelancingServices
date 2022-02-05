<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/OFS_model');
    }
    
    public function get_works(){
        
    }

}