<?php

class Verification_model extends CI_Model{

    public function __construct(){
        $this->load->database('default');
        $this->db;
        parent::__construct();
    }
    
    public function new_ver($id, $ver_type){
        $data = array(
            'verification_type' => $ver_type,
            'content_id' => $id
        );

        if($this->db->insert('verification', $data)) return true;
        else return false;
    }

    public function get_table(){
        return $table = $this->db->get('verification')->result_array();
    }

    public function get_ver($id){
        $ver = $this->db->where('content_id', $id);
        
        if($ver) return $ver->result();
        else return false;
    }

    // user    
    public function get_existing_row($id){
        $this->db->select('ID, verification_type, content_ID');
        $this->db->where('viewer_id', $id);
        $this->db->where('verification_type', 'user');
        $q = $this->db->get('verification');
        return $q->result_array();
    }

    public function mod_get_existing_row($id){
        $this->db->select('ID, verification_type, content_ID');
        $this->db->where('viewer_id', $id);
        $this->db->where('verification_type', 'moderator');
        $q = $this->db->get('verification');
        return $q->result_array();
    }

    public function get_existing_count($id){
        $this->db->select('ID, verification_type, content_ID');
        $this->db->where('viewer_id', $id);
        $this->db->where('verification_type', 'user');
        $q = $this->db->get('verification');

        return $q->num_rows();
    }

    public function mod_get_existing_count($id){
        $this->db->select('ID, verification_type, content_ID');
        $this->db->where('verification_type', 'moderator');
        $this->db->where('viewer_id', $id);
        $q = $this->db->get('verification');
        return $q->num_rows();
    }

    public function set_mod_id($id, $count){        
        $this->db->set('viewer_id', $id);
        $this->db->where('viewer_id', NULL);
        $this->db->where('verification_type', 'user');
        $this->db->limit($count);
        $this->db->update('verification');
    }
    
    public function set_admin_id($id, $count){        
        $this->db->set('viewer_id', $id);
        $this->db->where('viewer_id', NULL);
        $this->db->where('verification_type', 'moderator');
        $this->db->limit($count);
        $this->db->update('verification');
    }

    // POST 
    public function post_get_existing_row($id){
        $this->db->select('ID, verification_type, content_ID');
        $this->db->where('viewer_id', $id);
        $this->db->where('verification_type', 'post');
        $q = $this->db->get('verification');
        return $q->result_array();
    }

    public function post_get_existing_count($id){
        $this->db->select('ID, verification_type, content_ID');
        $this->db->where('viewer_id', $id);
        $this->db->where('verification_type', 'post');
        $q = $this->db->get('verification');

        return $q->num_rows();
    }

    public function post_set_mod_id($id, $count){        
        $this->db->set('viewer_id', $id);
        $this->db->where('viewer_id', NULL);
        $this->db->where('verification_type', 'post');
        $this->db->limit($count);
        $this->db->update('verification');
    }
    
}