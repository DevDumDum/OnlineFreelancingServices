<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineFreelancingServices extends CI_Controller{
    public function index(){
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
        redirect(base_url('Homepage'));
	}
    public function Homepage(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','HomePage');

        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/Homepage');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }
    public function NewsFeed(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','NewsFeed');
        $this->load->helper('url');

        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');

        $this->load->model('OFS/Post_model');
        $posts = $this->Post_model->get_posts();

        $this->load->model('OFS/Work_model');
        $works = $this->Work_model->get_table();

        $this->load->model('OFS/OFS_model');
        
        $table = array();
        $table['key_works'] = $works;

        
        $udata = $this->session->userdata('UserLoginSession');
        #check if already applied on the post
        
         
        $a_arr="";
        if(isset($udata['jobs'])){
            $a_arr = explode(",",$udata['jobs']);
        }

        $x = 0;
        foreach($posts as $p){
            $posts[$x]['apply_status'] = 1;
            
            $s_while=true;
            $j_count=0;
            while($s_while) {
                if(isset($a_arr[$j_count])) {
                    if($a_arr[$j_count] == $posts[$x]['ID']){
                        $posts[$x]['apply_status'] = 0;
                    }
                    $j_count++;
                } else {
                    $s_while = false;
                }
            }

            $user_details = $this->OFS_model->get_user_details($p['poster_ID']);
            if($posts[$x]['requirements'] == "") {$posts[$x]['requirements'] = "No requirements.";}
            $posts[$x]['post_owner'] = $user_details[0]['first_name']." ".$user_details[0]['middle_name']." ".$user_details[0]['last_name'];
            $x++;
        }
        $table['key_posts'] = $posts;

        // DO NOT DELETE NEXT LINE !! DO NOT DELETE NEXT LINE !! DO NOT DELETE NEXT LINE !! 
        //echo "<pre>";
        //print_r($posts);


        $this -> load -> view ('OnlineFreelancingServices/NewsFeed', $table);
        $this -> load -> view ('OnlineFreelancingServices/inc/postResult', $table);
    }
    public function Aboutpage(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','About Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/AboutUs');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }
    public function Contactpage(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','Contact Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/ContactUs');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }
    public function FAQpage(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','FAQ Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/FAQ');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }
    public function Profilepage(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','Profile Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/Profile');
    }
    public function Loginpage(){
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
        $this->session->userdata('page');
        $this->session->set_userdata('page','Login Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/Login');
        $this->session->set_flashdata('error',NULL);
        $this->session->set_flashdata('success',NULL);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $array_items = array('id' => '', 'email' => '');
            $this->session->unset_userdata($array_items);
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				

				$this->load->model('OFS/OFS_model');
				$status = $this->OFS_model->checkPassword($password,$email);
				if($status!=false){
                    $email = $status->email;
                    $id = $status->id;
                    $user_type = $status->user_type;
                    $jobs = $status->jobs;

					$session_data = array(
						'email'=>$email,
                        'user_type'=>$user_type,
                        'id'=>$id,
                        'location'=>$status->location,
                        'jobs'=>$jobs
                        
					);

					$this->session->set_userdata('UserLoginSession',$session_data);

					$this->load->helper('url');
                    redirect(base_url('NewsFeed'));
				}else{
					$this->session->set_flashdata('error','Unverified Account or Email / Password is Wrong');
                    $this->load->helper('url');
                    redirect(base_url('Loginpage'));
				}
			}else{
				$this->session->set_flashdata('error','Fill all the required fields');
				$this->load->helper('url');
                redirect(base_url('Loginpage'));
			}
		}
    }

    public function Registerpage(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','Register Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/Register');
        $this->session->set_flashdata('error',NULL);
        $this->session->set_flashdata('success',NULL);
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }

    public function add_applicant(){
        header('Content-type: application/json');
        $udata = $this->session->userdata('UserLoginSession');

        $id = $_POST["a_id"];
        $uid = $_POST["u_id"];
        $this->load->model('OFS/Post_model');
        $query = $this->Post_model->add_applicant($id,$uid,$udata['jobs']);

        if($query) {
            $response_array['status'] = 'success'; 
        } else {
            $response_array['status'] = 'Error';  
        }
        echo json_encode($response_array);
        
        //if($id!=NULL)
            //return $this->db->insert('post.applicants', $id);
            //redirect(base_url('Profilepage'));
        //else //return $this->db->insert('post.applicants', 0000);           
     }

    public function Logout(){
        $array_items = array('id' => '', 'email' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('Homepage'));
    }
}