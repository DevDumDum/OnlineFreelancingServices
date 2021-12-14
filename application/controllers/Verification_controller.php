<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Verification_controller extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Admin/Verification_model');
    }

    // verifyee ID = {userID,postID,workID};
    public function setVerification($verType, $verifyeeID){
        if($this->db->insert()){}


    }

    public function getVerification($id){
        
        
        return true;
    }

}