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
        //echo date("M j Y", $timestamp)." ".date("h:iA", $timestamp);
        
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
        $this->load->model('OFS/Work_model');
        $this->load->model('OFS/OFS_model');

        if(isset($_POST['postIndex'])) $offset = $_POST['postIndex'];
        else $offset = 0;
        
        $posts = $this->Post_model->get_from_offset($offset);

        //echo '<pre>';
        //print_r($posts);
        
        // NEW_POST[] = {POSTER_NAME, PROFFESION_NAME, POST_ID, POSTER_ID}
        $n_post=array();
        $udata = $this->session->userdata('UserLoginSession');
        $a_arr="";
        if(isset($udata['jobs'])){
            $a_arr = explode(",",$udata['jobs']);
        }
        $x=0;
        $p['apply_status'] = 1;
        $p['applicants'] = 0;
        $p['accepted'] = 0;
        foreach($posts as $p){
            $temp = "";
            $p['apply_status'] = 1;
            $s_while=true;
            $j_count=0;
            while($s_while) {
                if(isset($a_arr[$j_count])) {
                    if($a_arr[$j_count] == $p['ID']){
                        $p['apply_status'] = 0;
                    }
                    $j_count++;
                } else {
                    $s_while = false;
                }
            }
            if($p['applicants'] != NULL){
                $temp = explode(",", $p['applicants']);
                $p['applicants'] = $temp;
            } else {
                $p['applicants'] = 0;
            }

            if($p['accepted'] != NULL){
                $temp = explode(",", $p['accepted']);
                $p['accepted'] = $temp;
            } else {
                $p['accepted'] = 0;
            }
            $x++;

            $user_details = $this->OFS_model->get_user_details($p['poster_ID']);
            
            // POSTER NAME
            $n_post[0] = $user_details[0]['first_name']." ".$user_details[0]['middle_name']." ".$user_details[0]['last_name'];
            $n_post[0] = (empty($n_post[0]))
                ? " "
                : $n_post[0];

            if($p['requirements'] == "") 
                $p['requirements'] = "No requirements.";
                
            // PROFESSION NAME
        
            if ($p['profession_ID'] > 0) {
                $works = $this->Work_model->get_work($p['profession_ID']);
            } else {
                $works = $this->Work_model->get_work($p['profession_ID']-1);
            }
            $n_post[1] = $works[0]['profession_type'];

            // POST ID
            $n_post[2] = $p['ID'];

            // POSTER ID
            $n_post[3] = $p['poster_ID'];

            $n_post[4] = $p["requirements"];
            $n_post[5] = $p["worker_count"];
            $n_post[6] = $p["applicants"];
            $n_post[7] = $p['accepted'];
            $n_post[8] = $p['apply_status'];

            $n_post[9] = $p['location'];
            $n_post[10] = $p['min_pay'];
            $n_post[11] = $p['max_pay'];
            $n_post[12] = $p['timestamp'];
        }
        
        if(empty($n_post)) echo " ";
        else echo json_encode($n_post);
    }

}