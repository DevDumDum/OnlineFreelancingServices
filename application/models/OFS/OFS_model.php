<?php

class OFS_model extends CI_Model{

    function checkPassword($password,$email)
	{
		$query = $this->db->query("SELECT * FROM users WHERE password='$password' AND email='$email'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}

	public function get_user_status($uid){
		$this->db->select('status');
		$this->db->from('users');
		$this->db->where('id', $uid);

		$q = $this->db->get();

		if(isset($q)) return $q;
		else return false;
	}

	public function set_user_status($uid, $status){
		$this->db->set('status', $status);
		$this->db->where('id', $uid);
		$this->db->update('users');
	}
}

