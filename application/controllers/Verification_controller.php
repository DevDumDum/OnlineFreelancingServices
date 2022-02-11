<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Verification_controller extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Admin/Verification_model');
        $this->load->model('OFS/OFS_model');
    }

    public function accept_ver(){
        header('content-type: text/json');
        if (!isset($_POST['v_id']) || !isset($_POST['u_id']) ) {
            exit;
        }
        $this->load->model('Admin/Verification_model');
        $result = $this->Verification_model->a_ver($_POST['v_id'],$_POST['u_id']);
        echo $result;
    }
    
    public function reject_ver(){
        header('content-type: text/json');
        if (!isset($_POST['v_id']) || !isset($_POST['u_id']) ) {
            exit;
        }
        $this->load->model('Admin/Verification_model');
        $result = $this->Verification_model->d_ver($_POST['v_id'],$_POST['u_id']);
        echo $result;
    }

    public function accept_ver_prof(){
        header('content-type: text/json');
        if (!isset($_POST['v_id']) || !isset($_POST['u_id']) ) {
            exit;
        }
        $this->load->model('Admin/Verification_model');
        $result = $this->Verification_model->a_ver_prof($_POST['v_id'],$_POST['u_id']);
        echo $result;
        return 0;
    }
    
    public function reject_ver_prof(){
        header('content-type: text/json');
        if (!isset($_POST['v_id']) || !isset($_POST['u_id']) ) {
            exit;
        }
        $this->load->model('Admin/Verification_model');
        $result = $this->Verification_model->d_ver_prof($_POST['v_id'],$_POST['u_id']);
        echo $result;
        return 0;
    }

    public function accept_ver_rep(){
        header('content-type: text/json');
        if (isset($_POST['v_id']) && isset($_POST['u_id'])) {
            $this->load->model('Admin/Verification_model');
            $result = $this->Verification_model->a_ver_rep($_POST['v_id'],$_POST['u_id'], $_POST['type']);
            echo $result;
        }
    }
    
    public function reject_ver_rep(){
        header('content-type: text/json');
        if (isset($_POST['v_id']) && isset($_POST['u_id'])) {
            $this->load->model('Admin/Verification_model');
            $result = $this->Verification_model->d_ver_rep($_POST['v_id'],$_POST['u_id']);
            echo $result;
        }
    }
}