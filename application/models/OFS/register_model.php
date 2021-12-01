<?php 

class Register extends CI_Model {

    public function __construct(){
        $this->load->database('default');
        $this->load->library('session');

        parent::__construct();
    }

    public function addUser ($arrData){
        if($this->db->insert('register_controller', $arrData))
            return true;
        else return false;
    }
}