<?php

class Post_model extends CI_Model{
   
   public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('OFS/Post_model');
  }

   public function get_table(){
        $this->db->select('ID, poster_ID, profession_ID, 
        worker_count, requirements, location, timestamp,
        min_pay, max_pay, status');

        return $table = $this->db->get('post')->result_array();
   }

   public function get_posts(){
        $this->db->select('ID, poster_ID, profession_ID, 
        worker_count, requirements, location, timestamp,
        min_pay, max_pay, status');

        $this->db->where('status >', 0);

        return $table = $this->db->get('post')->result_array();
   }

   public function get_posts_ordered(){
      $this->db->order_by('timestamp', 'desc');
      $this->db->limit(5);

      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status');

      $this->db->where('status >', 0);
      return $table = $this->db->get('post')->result_array();
 }

   

   public function add_post($data){
      if($this->db->insert('post', $data))
          return true;
      else return false;
   }

   public function get_from_offset($offset){
      $this->db->order_by('timestamp', 'DESC');
      $this->db->limit(1, $offset);

      $this->db->where('status >', 0);  
      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status');
    
      return $q = $this->db->get('post')->result_array();
   }
}