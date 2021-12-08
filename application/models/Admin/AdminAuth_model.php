<?php

class AdminAuth_model extends CI_Model{
    function verifyUser($password,$email)
	{
		$query = $this->db->query("SELECT * FROM users WHERE password='$password' AND email='$email' AND (user_type='admin' OR user_type='moderator')");
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