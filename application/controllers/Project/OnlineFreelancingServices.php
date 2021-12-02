<?php

class OnlineFreelancingServices extends CI_Controller{
    public function Homepage(){
        $this -> load -> view ('OnlineFreelancingServices/Homepage');
    }
    public function NewsFeed(){
        $this -> load -> view ('OnlineFreelancingServices/NewsFeed');
    }
    public function Aboutpage(){
        $this -> load -> view ('OnlineFreelancingServices/AboutUs');
    }
    public function Contactpage(){
        $this -> load -> view ('OnlineFreelancingServices/ContactUs');
    }
    public function FAQpage(){
        $this -> load -> view ('OnlineFreelancingServices/FAQ');
    }
    public function Profilepage(){
        $this -> load -> view ('OnlineFreelancingServices/Profile');
    }
    public function Loginpage(){
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

					redirect(base_url('index.php/Project/OnlineFreelancingServices/NewsFeed'));
				}
				else
				{
					$this->session->set_flashdata('error','Username or Password is Wrong');
					redirect(base_url('index.php/Project/OnlineFreelancingServices/Loginpage'));
				}

			}
			else
			{
				$this->session->set_flashdata('error','Fill all the required fields');
				redirect(base_url('index.php/Project/OnlineFreelancingServices/Loginpage'));
			}
		}
	}
    public function Registerpage(){
        $this -> load -> view ('OnlineFreelancingServices/Register');
    }
}