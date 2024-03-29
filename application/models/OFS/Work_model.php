<?php

class Work_model extends CI_Model{

     public function get_table(){
          $this->db->select('ID, profession_type, description');
          $this->db->select('status');
          $this->db->where('status', 1);
          $this->db->order_by("profession_type", "ASC");

          return $this->db->get('profession')->result_array();
     }

     public function get_work($id){
          $this->db->select('ID, profession_type, description');
          $this->db->where('ID', $id);
          return $this->db->get('profession')->result_array();
     }

     public function get_table_all(){
          $this->db->select('ID, profession_type, description, status');
          return $this->db->get('profession')->result_array();
     }

     public function get_prof($id) {
          $this->db->select('ID, profession_type, description');
          $this->db->where('ID', $id);
          return $this->db->get('profession')->row_array();
     }

     public function add_work($data){
          if($this->db->insert($data)) {return true;}
          else {return false;}
     }

}

