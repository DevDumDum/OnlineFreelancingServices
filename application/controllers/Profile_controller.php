<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/OFS_model');
    }
    
    public function search_user(){
        $user = $_GET['search-id'];

        $user_details = $this->OFS_model->get_user_from_search($user);
        echo "<pre>";
        print_r($user_details);
    }

}