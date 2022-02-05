<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Work_model');
    }
    
    public function count_work_id(){
        $work_ID = $_GET['work_ID'];

        $this->load->model('OFS/Post_model');
        $count = $this->Post_model->count_work_id($work_ID);

        echo $count;
    }
    
    public function count_work_loc(){
        $location = $_GET['location'];

        $this->load->model('OFS/Post_model');
        $count = $this->Post_model->count_work_location($location);

        echo $count;
    }
}