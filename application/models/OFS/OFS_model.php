<?php

class OFS_model extends CI_Model{

    function checkPassword($password,$email)
	{
		$query = $this->db->query("SELECT * FROM users WHERE password='$password' AND email='$email' AND status='1'");
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
		$this->db->select('id, last_name, 
				first_name, middle_name, 
				contact, profession_id, 
				location, summary, 
				calendarlist_id, status');
				
		$this->db->where('email', $email);
		
		return $this->db->get('users')->result_array();
	}
	
	public function get_user_details($id){
		$this->db->select('last_name, first_name, 
				middle_name, contact, email, 
				profession_id, location, summary, 
				calendarlist_id,status');

		$this->db->where('id', $id);
		
		return $this->db->get('users')->result_array();
	}

	//sira ka muna
	public function get_username($id){
		$this->db->select('first_name, middle_name, last_name');
		$this->db->where('id', $id);
		$name = $this->db->get('users');
		
		return $name->result_array();
	}
}

