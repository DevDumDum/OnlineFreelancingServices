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
        if (!isset($_POST['v_id'])) {
            exit;
        }
        $db = new PDO('mysql:host=localhost;dbname=loginsystem;charset=utf8mb4', 'root', '');
        $query = $db->prepare('UPDATE verification SET status = 1 WHERE ID = :name');
        $query->bindParam(':name', $_POST['v_id']);
        $query->execute();
    }
    
    public function reject_ver(){
        header('content-type: text/json');
        if (!isset($_POST['v_id'])) {
            exit;
        }
        $db = new PDO('mysql:host=localhost;dbname=loginsystem;charset=utf8mb4', 'root', '');
        $query = $db->prepare('UPDATE verification SET status = -1 WHERE ID = :name');
        $query->bindParam(':name', $_POST['v_id']);
        $query->execute();
    }













    public function aaaccept_ver(){
        $v_id = $_POST['v_id'];
        
        if($this->Verification_model->accept_row($v_id)){

        }else{
            redirect(base_url('Verifications'));
        }
    }

}