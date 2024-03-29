<?php

class Post_model extends CI_Model{
   
   public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('OFS/Post_model');
   }

   public function get_post_from_id($id){
      $this->db->select('*');

      $this->db->where('ID', $id);
      $q = $this->db->get('post');

      if($q->num_rows()>0) return $q->row_array();
      else return false;
   }

   public function get_table(){
      $this->db->select('*');
      return $this->db->get('post')->result_array();
   }

   public function get_posts(){
      $this->db->select('ID, worker_count, applicants');
      $this->db->where('status', 1);
      $posts = $this->db->get('post')->result_array();

      $x=0;
      foreach($posts as $p){
         $totalApplicants=0;
         #Checking applicants status
         if(isset($posts[$x]['applicants'])) {
            $a_arr = explode(",",$posts[$x]['applicants']);
            
            while(True) {
               if(isset($a_arr[$totalApplicants])) {
                  $totalApplicants++;
               } else {
                  break;
               }
            }
         }
         if($totalApplicants >= $posts[$x]['worker_count']) {
            $this->Post_model->close_posts($posts[$x]["ID"]);
         }
        $x++;
      }
      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status, applicants, accepted');

      $this->db->where('status', 1);

      return $posts = $this->db->get('post')->result_array();
   }

   public function close_posts($id){
      $this->db->set('status', 0);
      $this->db->where('ID', $id);
      return $this->db->update('post');
   }

   public function fetch_a_post($id){
      $this->db->select('*');
      $this->db->where("ID", $id);
      return $this->db->get('post')->result_array();
   }

   public function add_applicant($id,$uid,$ujob){
      $this->db->select('ID, worker_count, applicants');
      $this->db->where('ID', $id);
      $posts = $this->db->get('post')->row_array();

      $totalAccepted=0;
      #Checking applicants status
      $a_arr="";
      $n_a_arr="";

      if(isset($posts['accepted'])) {
         $a_arr = explode(",",$posts['accepted']);

         while(True) {
            if(isset($a_arr[$totalAccepted])) {
               if($a_arr[$totalAccepted] == $uid) {
                  return false;
               }
               $totalAccepted++;
            } else {
               $a_arr[$totalAccepted] = $uid;
               $n_a_arr=implode(",",$a_arr);
               break;
            }
         }
      } else {
         $a_arr = $uid;
         $n_a_arr = $a_arr;
      }
      

      if($totalAccepted >= $posts['worker_count']) {
         $this->Post_model->close_posts($posts["ID"]);
      }else{
         $this->db->set('applicants',$n_a_arr);
         $this->db->where('ID', $id);
         $this->db->update('post');


         #listing Jobs
         $totalJobs=0;

         $a_arr="";
         $n_a_arr="";
         if(isset($ujob)){
            $a_arr = explode(",",$ujob);
            while(True) {
               if(isset($a_arr[$totalJobs])) {
                  $totalJobs++;
               } else {
                  $a_arr[$totalJobs] = $id;
                  $n_a_arr=implode(",",$a_arr);
                  break;
               }
            }
         } else {
            $a_arr = $id;
            $n_a_arr = $a_arr;
         }

         $this->db->set('apply',$n_a_arr);
         $this->db->where('id', $uid);
         $query = $this->db->update('users');
         if($query){
            $udata = $this->session->userdata('UserLoginSession');
            $udata['apply'] = $n_a_arr;
            $this->session->set_userdata('UserLoginSession', $udata);  
            return true;
         }else{
            return false;
         }
      }
   }

   public function get_posts_ordered(){
      $this->db->order_by('timestamp', 'desc');
      $this->db->limit(5);

      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status');

      $this->db->where('status >', 0);
      return $this->db->get('post')->result_array();
   }

   public function report_post($data,$type,$uid) {
      $this->db->select('ID');
      $this->db->where('id_reported', $data['id_reported']);
      $this->db->where('user_id', $uid);
      $this->db->where('type', $type);
      $cur_id = $this->db->get('report')->result_array();
      if((int)$cur_id > 0) {
         $response = "Already reported";
      } else {

         if($this->db->insert('report', $data)) {

            $this->db->select('ID');
            $this->db->where('id_reported', $data['id_reported']);

            $cur_id = $this->db->get('report')->result_array();

            $data2 = array(
               'verification_type' => $type,
               'content_ID' => (int)$cur_id[0]["ID"]
            );
            $this->db->insert('verification', $data2);

            $response = "Reported successfully";
         } else {
            $response = "Error";
         }
      }
      return $response;
   }

   public function add_post($data) {
      if($this->db->insert('post', $data)) {
         $response = true;
      } else {
         $response = false;
      }
      return $response;
   }

   public function get_from_offset($offset){
      $offset -=1;
      
      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status, applicants, accepted');
      $this->db->limit(1, $offset);
      $this->db->where('status >', 0);
      $this->db->order_by('timestamp', 'DESC');
      return $this->db->get('post')->result_array();
   }

   public function get_from_offset_l($offset, $location){
      $offset -=1;
      
      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status, applicants, accepted');
      $this->db->limit(1, $offset);
      $this->db->where('status >', 0);
      $this->db->like('location', $location, "after");
      $this->db->order_by('timestamp', 'DESC');
      $q = $this->db->get('post')->result_array();
      return $q;
   }
   
   public function get_from_offset_w($offset, $work_ID){
      $offset -=1;
      
      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status, applicants, accepted');
      $this->db->limit(1, $offset);
      $this->db->where('status >', 0);
      $this->db->where('profession_ID', $work_ID);
      $this->db->order_by('timestamp', 'DESC');
      $q = $this->db->get('post')->result_array();
      return $q;
   }
   
   public function get_from_offset_lw($offset, $location, $work_ID){
      $offset -=1;
      
      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status, applicants, accepted');
      $this->db->limit(1, $offset);
      $this->db->where('status >', 0);
      $this->db->like('location', $location, "after");
      $this->db->where('profession_ID', $work_ID);
      $this->db->order_by('timestamp', 'DESC');
      $q = $this->db->get('post')->result_array();
      return $q;
   }
   
   public function update_post($id, $data){
      
      $this->db->set($data);
      $this->db->where('ID', $id);
      $this->db->update('post');

      if($this->db->affected_rows() > 0) return true;
      else return false;
      
   }

   public function count_work_id($work_ID){
      $this->db->where('profession_ID', $work_ID);
      $this->db->from('post');
      return $this->db->count_all_results();
   }

   public function count_work_location($location){
      $this->db->like('location', $location);
      $this->db->from('post');
      return $this->db->count_all_results();
   }

   public function get_jobs($poster_id)
   {
      return $this->db
         ->select('post.*, profession.profession_type, profession.description as profession_description')
         ->where('post.poster_ID', $poster_id)
         // ->where('post.status', $status)
         // ->group_start()
         // ->where('accepted', 0)
         // ->or_where('accepted', null)
         // ->group_end()
         ->join('profession', 'profession.ID = post.profession_ID')
         ->get('post')->result();
   }

   public function accept_applicant($post_id, $applicant_id)
   {
      $post = $this->db->where('ID', $post_id)->get('post')->row();
      if (!$post) {
         return false;
      }
      $accepted = $post->accepted;
      $accepted_value = "";
      if ($accepted == null) {
         $accepted_value = $applicant_id;
      } else {
         $accepted_value = $accepted . "," . $applicant_id;
      }
      $this->db->set('accepted', $accepted_value);
      $this->db->set('status', 1);
      $this->db->where('ID', $post_id);
      return $this->db->update('post');
   }

   public function get_job_details($post_id)
   {
      return $this->db
         ->select('post.*, profession.profession_type, profession.description as profession_description')
         ->where('post.ID', $post_id)
         ->where('post.status', 0)
         ->join('profession', 'profession.ID = post.profession_ID')
         ->get('post')->row();
   }
}