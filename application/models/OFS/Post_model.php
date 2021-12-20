<?php

class Post_model extends CI_Model{

   public function get_table(){
        $this->db->select('ID, poster_ID, profession_ID, worker_count, requirements, location, date, status');
        return $table = $this->db->get('post')->result_array();
   }
}

