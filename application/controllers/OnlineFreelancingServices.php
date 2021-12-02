<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineFreelancingServices extends CI_Controller{
    public function index(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
		$this -> load -> view ('OnlineFreelancingServices/Homepage');
	}
    public function Homepage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/Homepage');
    }
    public function NewsFeed(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/NewsFeed');
    }
    public function Aboutpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/AboutUs');
    }
    public function Contactpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/ContactUs');
    }
    public function FAQpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/FAQ');
    }
    public function Profilepage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/Profile');
    }
    public function Loginpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/Login');
    }
    function loginnow()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE)
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				

				$this->load->model('OFS/OFS_model');
				$status = $this->OFS_model->checkPassword($password,$username);
				if($status!=false)
				{
					$username = $status->username;

					$session_data = array(
						'username'=>$username,
					);

					$this->session->set_userdata('UserLoginSession',$session_data);

					redirect(base_url('OnlineFreelancingServices/NewsFeed'));
				}
				else
				{
					$this->session->set_flashdata('error','Username or Password is Wrong');
					redirect(base_url('OnlineFreelancingServices/Login'));
				}

			}
			else
			{
				$this->session->set_flashdata('error','Fill all the required fields');
				redirect(base_url('OnlineFreelancingServices/Login'));
			}
		}
	}
    public function Registerpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/Register');
    }
}