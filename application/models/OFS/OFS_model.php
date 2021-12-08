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
	function checkExistEmail($email){
		$query = $this->db->query("SELECT * FROM users WHERE email='$email'");
		if($query->num_rows()==1){
			return true;
		}else{
			return false;
		}

	}
}

