<?php 

class Register_model extends CI_Model {

    public function __construct(){
        $this->load->database('default');
        parent::__construct();
    }

    public function addUser ($data){
        if($this->db->insert('users', $data))
            return true;
        else return false;
    }
}