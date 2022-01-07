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
        $posts = $this->Post_model->get_table();

        $this->load->model('OFS/Work_model');
        $works = $this->Work_model->get_table();

        $this->load->model('OFS/OFS_model');
        
        $table = array();
        $table['key_works'] = $works;

        $this->load->model('OFS/OFS_model');
        $users = array();
        $x = 0;
        foreach($posts as $p){
            $user_details = $this->OFS_model->get_user_details($p['poster_ID']);
            $posts[$x]['post_owner'] = $user_details[0]['first_name']." ".$user_details[0]['middle_name']." ".$user_details[0]['last_name'];
            $x++;
        }        
        $table['key_posts'] = $posts;

        // DO NOT DELETE NEXT LINE !! DO NOT DELETE NEXT LINE !! DO NOT DELETE NEXT LINE !! 
        //echo "<pre>";
        //print_r($table);


        $this -> load -> view ('OnlineFreelancingServices/NewsFeed', $table);
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

					$session_data = array(
						'email'=>$email,
                        'id'=>$id,
                        'location'=>$status->location
                        
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

    public function ForgotPassword() {
        $this->session->userdata('page');
        $this->session->set_userdata('page','Forgot Password');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/ForgotPassword');
        $this->session->set_flashdata('error',NULL);
        $this->session->set_flashdata('success',NULL);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $array_items = array('id' => '', 'email' => '');
            $this->session->unset_userdata($array_items);
			$this->form_validation->set_rules('email','Email','required');

			if($this->form_validation->run()==TRUE){
				$email = $this->input->post('email');
				

				$this->load->model('OFS/OFS_model');
				$status = $this->OFS_model->getEmail($email);
				if($status!=false){
                    $email = $status->email;
                    $code = $status->code;

					$data = array(
						'email'=>$email,
                        'id'=>$id,
                        'location'=>$status->location,
                        'code'=>$code
                        
					);

                //set up email
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'kobelames21@gmail.com', // change it to yours
                        'smtp_pass' => 'awcwsivurwadfdem', // change it to yours
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );
                    
                    $message = 	"
                    <html>
                    <head>
                        <title>Change Password Request</title>
                    </head>
                    <body>
                        <h2>Change Password.</h2>
                        <p>Please click the link below to change your account password.</p>
                        <h4><a href='".base_url()."OnlineFreelancingServices/Newpassword/".$code."'>Activate My Account</a></h4>
                    </body>
                    </html>
                    ";
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");
                            $this->email->from($config['smtp_user']); // change it to yours
                            $this->email->to($email);// change it to yours
                            $this->email->subject('Testing');
                            $this->email->message($message);
                            if($this->email->send())
                            {
                                $this->session->set_flashdata('message', 'Email sent.');
                                redirect(base_url('Loginpage'));
                            }
                            else
                        {
                            $this->session->set_flashdata('message', 'Email not sent');
                            redirect(base_url('ForgotPassword'));
                        }
                    
                }else{
                    $this->session->set_flashdata('error','Email entered is not registered');
                    redirect(base_url('ForgotPassword'));
                }
            }
        }        
    }

    public function NewPassword(){
        $code =  $this->uri->segment(3);
        $this->session->userdata('page');
        $this->session->set_userdata('page','New Password');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/NewPassword');
        $this->session->set_flashdata('error',NULL);
        $this->session->set_flashdata('success',NULL);
        if (isset($code)){
            $this->session->set_userdata('UserCode',$code);
        }


        if($_SERVER['REQUEST_METHOD']=='POST'){
            $array_items = array('id' => '', 'email' => '');
            $this->session->unset_userdata($array_items);
			$this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('confirm-pw','Password','trim|required|matches[password]');

			if($this->form_validation->run()==TRUE){
				$passwords = $this->input->post('password');

		    //fetch user details
            
            $cData = $this->session->userdata('UserCode');

		    $user = $this->OFS_model->getUser($cData);

            //if code matches
            if($user['code'] == $cData){
                //update user password
                $data['password'] = $passwords;
                $query = $this->OFS_model->newPassword($data, $cData);

                if($query){
                    $this->session->set_flashdata('message', 'Password changed!');
                    $this->session->sess_destroy();
                    redirect(base_url('LoginPage'));
                }
                else{
                    $this->session->set_flashdata('message', 'Something went wrong in changing account password');
                }
            }
            else{
                $this->session->set_flashdata('message', 'Cannot change password, User does not exist!');
            }

            $this->session->set_flashdata('message', 'Error!');
				
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

    public function Logout(){
        $array_items = array('id' => '', 'email' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('Homepage'));
    }
}