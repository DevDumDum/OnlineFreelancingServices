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
        $db = new PDO('mysql:host=localhost;dbname=loginsystem;charset=utf8mb4', 'root', '');
        $query = $db->prepare('UPDATE users SET status = 1 WHERE ID = :lala');
        $query2 = $db->prepare('UPDATE verification SET viewer_id = 0 WHERE ID = :name');
        $query->bindParam(':lala', $_POST['u_id']);
        $query2->bindParam(':name', $_POST['v_id']);
        if($query->execute() && $query2->execute()){
            echo json_encode(array('msg' => "Success"));
        }else{
            echo json_encode(array('msg' => "Error"));
        }
    }
    
    public function reject_ver(){
        header('content-type: text/json');
        if (!isset($_POST['v_id']) || !isset($_POST['u_id']) ) {
            exit;
        }
        $db = new PDO('mysql:host=localhost;dbname=loginsystem;charset=utf8mb4', 'root', '');
        $query = $db->prepare('UPDATE users SET status = -1 WHERE ID = :lala');
        $query2 = $db->prepare('UPDATE verification SET viewer_id = 0 WHERE ID = :name');
        $query->bindParam(':lala', $_POST['u_id']);
        $query2->bindParam(':name', $_POST['v_id']);
        $query->execute();
        $query2->execute();
        if($query->execute() && $query2->execute()){
            echo json_encode(array('msg' => "Success"));
        }else{
            echo json_encode(array('msg' => "Error"));
        }
    }

}