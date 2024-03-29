<?php

class OFS_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getAllUsers(){
		$query = $this->db->get('users');
		return $query->result(); 
	}

	public function insert($user){
		$this->db->insert('users', $user);
		return $this->db->insert_id(); 
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

	public function activate($data, $code){
		$this->db->where('users.code', $code);
		return $this->db->update('users', $data);
	}

	public function newPassword($data, $code){
		$this->db->where('users.code', $code);
		return $this->db->update('users', $data);
	}

    function checkPassword($password,$email)
	{
		$query = $this->db->query("SELECT * FROM users WHERE password='$password' AND email='$email' AND user_type='user'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}

	public function get_user_details_from_email($email){
		$this->db->select('last_name, first_name, 
				middle_name, full_name, contact, email, 
				profession_id, education_id, location, summary, 
				calendarlist_id,code,status, ProfPic, ProfBanner');
				
		$this->db->where('email', $email);
		
		return $this->db->get('users')->result_array();
	}
	
	public function get_user_details($id){
		$this->db->select('last_name, first_name, 
				middle_name, full_name, contact, email, 
				profession_id, education_id, location, summary, 
				calendarlist_id,code,status, ProfPic, ProfBanner');

		$this->db->where('id', $id);
		
		return $this->db->get('users')->result_array();
	}

	public function get_user_from_search($id){
		$this->db->select('last_name, first_name, 
				middle_name, full_name, contact, email, 
				profession_id, education_id, location, summary, 
				calendarlist_id,code,status, ProfPic, ProfBanner');

		$this->db->where('id', $id);
		$q = $this->db->get('users');
		
		if($q->num_rows()>0) return $q->row_array();
		else return false;
	}

	public function search_user($nameHolder){
		$this->db->select('ID, full_name');
		$this->db->like('full_name', $nameHolder);
		$this->db->limit(5);

		$q = $this->db->get('users');

		if($q->num_rows()>0) return $q->result_array();
		else return false;
	}

	public function get_report($id) {
		$this->db->select('*');
		$this->db->where('ID', $id);
		return $this->db->get('report')->result_array();
	 }

	//sira ka muna
	public function get_username($id){
		$this->db->select('first_name, middle_name, last_name');
		$this->db->where('id', $id);
		$name = $this->db->get('users');
		
		return $name->result_array();
	}
}