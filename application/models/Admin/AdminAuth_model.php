<?php

class AdminAuth_model extends CI_Model{
    function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getAllUsers(){
		$query = $this->db->get('users');
		return $query->result(); 
	}

	public function getEmail($email){
		$query = $this->db->query("SELECT * FROM users WHERE email='$email'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function getUser($code){
		$query = $this->db->get_where('users',array('code'=>$code));
		return $query->row_array();
	}

	public function newPassword($data, $code){
		$this->db->where('users.code', $code);
		return $this->db->update('users', $data);
	}
	
	public function verifyUser($password,$email)
	{
		$query = $this->db->query("SELECT * FROM users WHERE password='$password' AND email='$email'AND status='1' AND (user_type='admin' OR user_type='moderator')");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}
}