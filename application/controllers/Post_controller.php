<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Post_model');
    }
    
    public function add_post(){
        $poster_id = $_POST['poster_ID'];
        $work = $_POST['work'];
        $desc = $_POST['desc'];
        $w_count = $_POST['worker_count'];
        $loc = $_POST['location'];
        $min_p = ($_POST['min_pay']>0)? $_POST['min_pay'] : null; 
        $max_p = $_POST['max_pay'];
        $status = 1;
        $time = time();
        //echo date("M j Y", $timestamp)." ".date("h:iA", $timestamp);
        
        $data = array(
            'poster_ID' => $poster_id,
            'profession_ID' => $work,
            'worker_count' => $w_count,
            'requirements' => $desc,
            'location' => $loc,
            'min_pay' => $min_p,
            'max_pay' => $max_p,
            'status' => $status,
            'timestamp'=> $time
        );

        if($this->Post_model->add_post($data)){
            redirect(base_url('NewsFeed'));
        }
    }

    public function deactivate_post(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $post = $this->input->post("post_ID");

            $this->load->model('Admin/Verification_model');
            $q = $this->Post_model->close_posts($post);
            return $q;
        }
    }

    public function get_a_post(){
        $this->load->model('OFS/Post_model');
        $this->load->model('OFS/Work_model');
        $this->load->model('OFS/OFS_model');

        if(isset($_POST["id"])) {
            $posts = $this->Post_model->fetch_a_post($_POST["id"]);
            foreach($posts as $p){
                $temp = "";

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
    
                $user_details = $this->OFS_model->get_user_details($p['poster_ID']);
                
                // POSTER NAME
                $n_post[0] = $user_details[0]['first_name']." ".$user_details[0]['middle_name']." ".$user_details[0]['last_name'];
                $n_post[0] = (empty($n_post[0]))
                    ? " "
                    : $n_post[0];
    
                if($p['requirements'] == "") {$p['requirements'] = "No requirements.";}
                    
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
    
                $n_post[8] = $p['location'];
                $n_post[9] = $p['min_pay'];
                $n_post[10] = $p['max_pay'];
                $n_post[11] = $p['timestamp'];
            }
            echo json_encode($n_post);
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
            $n_post[13] = $user_details[0]['ProfPic'];
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

            //date("M j Y", $p['timestamp'])." ".date("h:iA", $p['timestamp']);
            $n_post[12] = date("M j Y", $p['timestamp'])." ".date("h:i A", $p['timestamp']); //$p['timestamp'];
            
        }
        
        if(empty($n_post)) echo " ";
        else echo json_encode($n_post);
    }

    public function get_from_offset_filtered(){
        
        $this->load->model('OFS/Work_model');
        $this->load->model('OFS/OFS_model');

        if(isset($_POST['postIndex'])) $offset = $_POST['postIndex'];
        else $offset = 0;

        $posts = array();
        
        if(isset($_POST['location']) && $_POST['work_ID'] != "null") {
            $posts = $this->Post_model->get_from_offset_lw($offset, $_POST['location'], $_POST['work_ID']);
        } else if (isset($_POST['location']) && $_POST['work_ID'] == "null") {
            $posts = $this->Post_model->get_from_offset_l($offset, $_POST['location']);

        } else if (!(isset($_POST['location'])) && isset($_POST['work_ID'])) {
            $posts = $this->Post_model->get_from_offset_w($offset, $_POST['work_ID']);

        } else {
            $posts = $this->Post_model->get_from_offset($offset);
        }

        //echo '<pre>';
        //print_r($posts);
        // NEW_POST[] = {POSTER_NAME, PROFFESION_NAME, POST_ID, POSTER_ID}
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
            $n_post[13] = $user_details[0]['ProfPic'];

            //date("M j Y", $p['timestamp'])." ".date("h:iA", $p['timestamp']);
            $n_post[12] = date("M j Y", $p['timestamp'])." ".date("h:i A", $p['timestamp']); //$p['timestamp'];
        }
        
        if(empty($n_post)) echo " ";
        else echo json_encode($n_post);
    }

    public function get_post(){
        if(isset($_POST['post_ID'])) {

            $post = array();
            $post = $this->Post_model->get_post_from_id($_POST['post_ID']);
            
            if(empty($post)) echo null;
            else echo json_encode($post);


        }else {echo null;}
     
    }

    public function update_post(){    
        
        $post_u = array(
            'worker_count' => $_POST['worker_count'],
            'requirements' => $_POST['requirements'],
            'location' => $_POST['location'],
            'min_pay' => $_POST['min_pay'],
            'max_pay' => $_POST['max_pay']
        );

        $q = $this->Post_model->update_post($_POST['post_ID'], $post_u);
        echo $q;
    }
}