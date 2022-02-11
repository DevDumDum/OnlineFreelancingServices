<?php

use function PHPSTORM_META\type;

class Verification_model extends CI_Model{

    public function __construct(){
        $this->load->database('default');
        $this->db;
        parent::__construct();
    }

    public function get_table(){
        $this->db->select("*");
        return $this->db->get('verification')->result_array();
    }

    public function get_prof_current($id){
        $this->db->select('*');
        $this->db->where('viewer_id', $id);
        $this->db->where('verification_type', 'profession');
        return $this->db->get('verification')->result_array();
    }
    
    public function get_existing_row($id, $type){
        $this->db->select('ID, verification_type, content_ID');
        $this->db->where('viewer_id', $id);
        $this->db->where('verification_type', $type);
        $q = $this->db->get('verification');
        return $q->result_array();
    }

    public function get_existing_count($id, $type){
        $this->db->select('ID, verification_type, content_ID');
        $this->db->where('viewer_id', $id);
        $this->db->where('verification_type', $type);
        $q = $this->db->get('verification');

        return $q->num_rows();
    }


    public function set_mod_id($id, $count, $type){        
        $this->db->set('viewer_id', $id);
        $this->db->where('viewer_id', NULL);
        $this->db->where('verification_type', $type);
        $this->db->limit($count);
        $this->db->update('verification');
    }
    
    public function new_ver($id, $user_type){
        $data = array(
            'verification_type' => $user_type,
            'content_id' => $id
        );

        if($this->db->insert('verification', $data)) {
            $r = true;
        } else {
            $r = false;
        }
        return $r;
    }

    public function get_ver($id){
        $ver = $this->db->where('content_id', $id);
        
        if($ver) {
            $r = $ver->result();
        } else {
            $r = false;
        }
        return $r;
    }


    public function a_ver($v_id,$u_id){
        header('content-type: text/json');
        $this->db->set('status', 1);
        $this->db->where('id', $u_id);
        $query = $this->db->update('users');

        $this->db->set('viewer_id', 0);
        $this->db->where('ID',  $v_id);
        $query2 = $this->db->update('verification');
        
        if($query && $query2){
            $r = json_encode(array('msg' => "Success"));
        }else{
            $r = json_encode(array('msg' => "Error"));
        }
        return $r;
    }

    public function d_ver($v_id,$u_id){
        header('content-type: text/json');
        
        $this->db->set('status', -1);
        $this->db->where('id', $u_id);
        $query = $this->db->update('users');

        $this->db->set('viewer_id', 0);
        $this->db->where('ID',  $v_id);
        $query2 = $this->db->update('verification');
        
        if($query && $query2){
            $r = json_encode(array('msg' => "Success"));
        }else{
            $r = json_encode(array('msg' => "Error"));
        }
        return $r;
    }


    public function a_ver_prof($v_id,$u_id){
        header('content-type: text/json');
        $this->db->set('status', '1');
        $this->db->where('ID', $u_id);
        $query = $this->db->update('profession');
        $this->db->set('viewer_id', 0);
        $this->db->where('ID',  $v_id);
        $query2 = $this->db->update('verification');
        if($query && $query2){
            $r = json_encode(array('msg' => "Success"));
        }else{
            $r = json_encode(array('msg' => "Error"));
        }
        return $r;
    }

    public function d_ver_prof($v_id,$u_id){
        header('content-type: text/json');
        $this->db->set('status', '-1');
        $this->db->where('ID', $u_id);
        $query = $this->db->update('profession');

        
        $this->db->set('viewer_id', 0);
        $this->db->where('ID',  $v_id);
        $query2 = $this->db->update('verification');
        if($query && $query2){
            $r = json_encode(array('msg' => "Success"));
        }else{
            $r = json_encode(array('msg' => "Error"));
        }
        return $r;
    }

    public function a_ver_rep($v_id,$u_id, $type){
        header('content-type: text/json');
        if($type == "report-p"){
            $this->db->set('status', -1);
            $this->db->where('ID', $u_id);
            $query = $this->db->update('post');
        }else{
            $this->db->select('*');
            $this->db->where('id', $u_id);
            $q = $this->db->get('report')->result_array();
            $this->db->set('status', -1);
            $this->db->where('id', $q[0]["id_reported"]);
            $query = $this->db->update('users');
        }

        $this->db->set('viewer_id', 0);
        $this->db->where('ID',  $v_id);
        $query2 = $this->db->update('verification');
        
        if($query && $query2){
            $r = json_encode(array('msg' => "Success"));
        }else{
            $r = json_encode(array('msg' => "Error"));
        }
        return $r;
    }

    public function d_ver_rep($v_id,$u_id){
        header('content-type: text/json');
        
        $this->db->set('viewer_id', 0);
        $this->db->where('ID',  $v_id);
        $query2 = $this->db->update('verification');
        
        if($query2){
            $r = json_encode(array('msg' => "Success"));
        }else{
            $r = json_encode(array('msg' => "Error"));
        }
        return $r;
    }

    public function a_ver_rep($v_id,$u_id, $type){
        header('content-type: text/json');
        if($type == "report-p"){
            $this->db->set('status', -1);
            $this->db->where('ID', $u_id);
            $query = $this->db->update('post');
        }else{
            $this->db->select('*');
            $this->db->where('id', $u_id);
            $q = $this->db->get('report')->result_array();
            $this->db->set('status', -1);
            $this->db->where('id', $q[0]["id_reported"]);
            $query = $this->db->update('users');
        }

        $this->db->set('viewer_id', 0);
        $this->db->where('ID',  $v_id);
        $query2 = $this->db->update('verification');
        
        if($query && $query2){
            return json_encode(array('msg' => "Success"));
        }else{
            return json_encode(array('msg' => "Error"));
        }
    }

    public function d_ver_rep($v_id,$u_id){
        header('content-type: text/json');
        
        $this->db->set('viewer_id', 0);
        $this->db->where('ID',  $v_id);
        $query2 = $this->db->update('verification');
        
        if($query2){
            return json_encode(array('msg' => "Success"));
        }else{
            return json_encode(array('msg' => "Error"));
        }
    }
}