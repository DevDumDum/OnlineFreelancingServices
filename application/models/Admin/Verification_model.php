<?php

class Verification_model extends CI_Model{

    public function __construct(){
        $this->load->database('default');
        $this->db;
        parent::__construct();
    }

    public function get_table(){
        return ['verification_type'=>'user', 'content_ID'=>1];
    }

    // status sa users table
	public function get_user_status($uid){
		$this->db->select('status');
		$this->db->from('users');
		$this->db->where('id', $uid);

		$q = $this->db->get();

		if(isset($q)) return $q;
		else return false;
	}

    //pending = 0
    //accept = 1 
    private function set_ver_status_accept($uid){
        set_user_status($uid, 1);
    }

    //deny = 2
    private function set_ver_status_deny($uid){
        set_user_status($uid, 2);
    }


	private function set_ver_status($uid, $status){
		$this->db->set('status', $status);
		$this->db->where('id', $uid);
		$this->db->update('users');
	}


    // sa verification table
    // verifyee ID = {userID,postID,workID};
    public function new_ver($verType, $cid){
        $data = array(
            'verification_type' => $verType,
            'content_id' => $cid
        );

        return ins_ver($data);
    }

    public function get_ver($id){
        $ver = $this->db->where('content_id', $id);
        
        if(isset($ver)) return $ver->row();
        else return false;
    }

    private function del_ver($id){
        if($this->db->delete('verification', array('id' => $id))) return true;
        else return false;
    }
    
    private function ins_ver($data){
        if($this->db->insert('verification', $data)) return true;
        else return false;
    }

    

}