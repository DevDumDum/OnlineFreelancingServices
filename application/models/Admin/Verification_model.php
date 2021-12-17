<?php

class Verification_model extends CI_Model{

    public function __construct(){
        $this->load->database('default');
        $this->db;
        parent::__construct();
    }

    public function get_table(){
        return $table = $this->db->get('verification')->result_array();
    }
    
    public function new_ver($id, $user_type){
        $data = array(
            'verification_type' => $user_type,
            'content_id' => $id
        );

        if($this->db->insert('verification', $data)) return true;
        else return false;
    }

    public function get_ver($id){
        $ver = $this->db->where('content_id', $id);
        
        if($ver) return $ver->result();
        else return false;
    }

    public function accept_row($id){
        $this->db->set('status', 1);
        $this->db->where('ID', $id);

        if($this->db->update('verification')) return true;
        else return false;
    }

    public function reject_row($id){
        $this->db->set('status', -1);
        $this->db->where('ID', $id);
        $this->db->update('verification');
    }

    

}