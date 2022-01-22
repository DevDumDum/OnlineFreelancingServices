<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Post_model');
    }
    
    public function addPost(){
        $poster_id = $this->input->post('poster_name');
        $work = $this->input->post('work');
        $desc = $this->input->post('description');
        $w_count = $this->input->post('worker-count');
        $loc = $this->input->post('location');
        $min_p = $this->input->post('min-pay');
        $max_p = $this->input->post('max-pay');
               
        $data = array(
            'poster_ID' => $poster_id,
            'profession_ID' => $work,
            'worker_count' => $w_count,
            'requirements' => $desc,
            'location' => $loc,
            'min_pay' => $min_p,
            'max_pay' => $max_p,
            'timestamp'=> time()
        );

        if($this->Post_model->add_post($data)){
            redirect(base_url('NewsFeed'));
        }else {

        }
    }

    public function deact_post(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $post = $this->input->post("post_ID");

            $this->load->model('Admin/Verification_model');
            $this->Verification_model->new_ver($post, 'post');

            redirect(base_url('NewsFeed'));
        }
    }


    public function get_from_offset(){

        if(isset($_POST['postIndex'])) $offset = $_POST['postIndex'];
        else $offset = 0;

        
        $posts = $this->Post_model->get_from_offset($offset);
        
        $this->load->model('OFS/Work_model');
        $works = $this->Work_model->get_table();

        $this->load->model('OFS/OFS_model');
        $users = array();
        
        foreach($posts as $p){

            $user_details = $this->OFS_model->get_user_details($p['poster_ID']);
            $posts[0]['post_owner'] = $user_details[0]['first_name']." ".$user_details[0]['middle_name']." ".$user_details[0]['last_name'];

            if($posts[0]['requirements'] == "") 
                $posts[0]['requirements'] = "No requirements.";
        }     


        // NEW_POST[] = {POSTER_NAME, PROFFESION_NAME, POST_ID, POSTER_ID}
        $n_post=array();

        // POSTER NAME
        $n_post[0] = $posts[0]['post_owner'];

        // PROFESSION NAME
        $n_post[1] = ($posts[0]['profession_ID'] != 0) 
            ? $works[$posts[0]['profession_ID']-1]['profession_type']
            : $works[$posts[0]['profession_ID']]['profession_type'];

        // POST ID
        $n_post[2] = $posts[0]['ID'];

        // POSTER ID
        $n_post[3] = $posts[0]['poster_ID'];

        
        if($posts == null) echo [];
        else echo json_encode($n_post);
    }
}