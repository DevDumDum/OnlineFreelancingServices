<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class validation extends CI_Controller {
    
    public function accept_ver(){
        header('content-type: text/json');
        if (!isset($_POST['email'])) {
            exit;
        }
        $db = new PDO('mysql:host=localhost;dbname=loginsystem;charset=utf8mb4', 'root', '');
        $query = $db->prepare('SELECT COUNT(*) FROM users WHERE email = :name');
        $query->bindParam(':name', $_POST['email']);
        $query->execute();
        echo json_encode(array('exists' => $query->fetchColumn() > 0));
    }
}