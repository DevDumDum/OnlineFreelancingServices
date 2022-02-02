<?php

class Post_model extends CI_Model
{
   
   public function __construct()
   {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('OFS/Post_model');
  }

   public function get_table()
   {
      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status, applicants, accepted');

        return $table = $this->db->get('post')->result_array();
   }

   public function get_posts()
   {
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

   public function close_posts($id)
   {
      $this->db->set('status', 0);
      $this->db->where('ID', $id);
      return $this->db->update('post');
   }


   public function add_applicant($id,$uid,$ujob)
   {
      $this->db->select('ID, worker_count, applicants');
      $this->db->where('ID', $id);
      $posts = $this->db->get('post')->row_array();

      $totalApplicants=0;
      #Checking applicants status
      $a_arr="";
      $n_a_arr="";

      if(isset($posts['applicants'])) {
         $a_arr = explode(",",$posts['applicants']);

         while(True) {
            if(isset($a_arr[$totalApplicants])) {
               if($a_arr[$totalApplicants] == $uid) {
                  return false;
               }
               $totalApplicants++;
            } else {
               $a_arr[$totalApplicants] = $uid;
               $n_a_arr=implode(",",$a_arr);
               break;
            }
         }
      } else {
         $a_arr = $uid;
         $n_a_arr = $a_arr;
      }
      

      if($totalApplicants >= $posts['worker_count']) {
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

   public function get_posts_ordered()
   {
      $this->db->order_by('timestamp', 'desc');
      $this->db->limit(5);

      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status');

      $this->db->where('status >', 0);
      return $table = $this->db->get('post')->result_array();
   }

   public function add_post($data)
   {
      if($this->db->insert('post', $data))
          return true;
      else return false;
   }

   public function get_from_offset($offset)
   {
      $offset -=1;
      
      $this->db->select('ID, poster_ID, profession_ID, 
      worker_count, requirements, location, timestamp,
      min_pay, max_pay, status, applicants, accepted');
      $this->db->limit(1, $offset);
      $this->db->where('status >', 0);
      $this->db->order_by('timestamp', 'DESC');
      $q = $this->db->get('post')->result_array();
      return $q;
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
}