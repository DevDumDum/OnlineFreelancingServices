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
        $this->load->model('OFS/OFS_model');

        $this->load->model('OFS/Work_model');
        $works = $this->Work_model->get_table();
        $table = array();
        $table['key_works'] = $works;

        // DO NOT DELETE NEXT LINE !! DO NOT DELETE NEXT LINE !! DO NOT DELETE NEXT LINE !! 
        //echo "<pre>";
        //print_r($posts);


        $this -> load -> view ('OnlineFreelancingServices/NewsFeed', $table);
        //$this -> load -> view ('OnlineFreelancingServices/inc/postResult', $table);
        
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
        
        $udata = $this->session->userdata('UserLoginSession');

        if(isset($_GET['id'])) {
            
            echo $_GET['id'];
            $this->load->model('OFS/OFS_model');

            $user_details = $this->OFS_model->get_user_from_search($_GET['id']);
            if(isset($user_details)){
                $data['full_name'] = $user_details['full_name'];
                $data['contact'] = $user_details['contact'];
                $data['email'] = $user_details['email'];
                $data['location'] = $user_details['location'];
                $data['summary'] = $user_details['summary'];
                $data['education_id'] = $user_details['education_id'];
                $this->load->model('OFS/Work_model');
                $temp = array();
                $x=0;
                foreach(explode(',', $user_details['profession_id']) as $t){
                    $holder = $this->Work_model->get_prof($t);
                    $temp[$x++] = $holder['profession_type'];
                }
                $data['work'] = implode(', ', $temp);
                $x=null;            

                print_r($data);

                $this -> load -> view ('OnlineFreelancingServices/inc/header');
                $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
                $this -> load -> view ('OnlineFreelancingServices/Profile',$data);
            }
        } else 
            redirect(base_url('NewsFeed'));             
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
                    $id = $status->id;
                    $user_type = $status->user_type;
                    $email = $status->email;
                    $profession_id = $status->profession_id;
                    $jobs = $status->jobs;
                    $apply = $status->apply;

					$session_data = array(
                        'id'=>$id,
                        'user_type'=>$user_type,
						'email'=>$email,
                        'profession_id'=>$profession_id,
                        'jobs'=>$jobs,
                        'apply'=>$apply
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
        $this->load->model('OFS/Work_model');
        $works = $this->Work_model->get_table();
        $table = array();
        $table['key_works'] = $works;

        $this->session->userdata('page');
        $this->session->set_userdata('page','Register Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/Register',$table);
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
    public function report(){
        header('content-type: text/json');
        $this->load->model('OFS/Post_model');
        $udata = $this->session->userdata('UserLoginSession');
        $uid = $udata['id'];
        $rid = $this->input->post('r_id');
        $type = $this->input->post('type');
        $desc = $this->input->post('desc');
        
        $data = array(
            'id_reported' => $rid,
            'user_id' => $uid,
            'description' => $desc
        );

        $result = $this->Post_model->report_post($data, $type, $uid);
        echo json_encode($result);
    }

    public function checkE(){
        header('content-type: text/json');
        if (!isset($_POST['email'])) {
            exit;
        }
        $this->load->model('OFS/Register_model');
        $result = $this->Register_model->checker();

        echo json_encode(array('exists' => $result > 0));
    }

     public function Logout(){
        $array_items = array('id' => '', 'email' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('Homepage'));
    }
}