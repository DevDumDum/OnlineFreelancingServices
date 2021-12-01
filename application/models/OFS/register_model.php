<?php 

class register_model extends CI_Model {

    public function __construct(){
        $this->load->database('default');
        $this->load->library('session');

        parent::__construct();
    }

    public function addUser ($arrData){
        if($this->db->insert('register', $arrData))
            return true;
        else return false;
    }
}