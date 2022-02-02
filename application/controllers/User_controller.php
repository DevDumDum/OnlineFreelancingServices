<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/OFS_model');
    }
    
    public function search_user(){
        
        if(empty($_POST['theInput'])){
            echo 'No data found';
        }else {
            
            $nameHolder = $_POST['theInput'];
            
            $queryHolder = $this->OFS_model->search_user($nameHolder);
            if(!$queryHolder) echo 'No results';
            else echo json_encode($queryHolder);
                
        }
        
    }

}