<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Register_model');
        $this->load->model('OFS/OFS_model');

        //get all users
        $this->data['users'] = $this->OFS_model->getAllUsers();
    }

    public function addUser() {
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email],');
            $this->form_validation->set_rules('first-name','First name','alpha|trim|required');
            $this->form_validation->set_rules('last-name','Last name','alpha|trim|required');
            $this->form_validation->set_rules('middle-name','Middle name','alpha|trim');
            $this->form_validation->set_rules('contact','Contact Number','integer|trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('confirm-pw','Password','trim|required|matches[password]');

            $this->form_validation->set_rules('profession_id','profession_id','trim');
            
            if($this->form_validation->run()==TRUE){
                $fn = $this->input->post('first-name');
                $sn = $this->input->post('last-name');
                $mn = $this->input->post('middle-name');
                $contact = $this->input->post('contact');
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $profession_id = $this->input->post('profession_id');

                $status = NULL;
                $user_type = 'user';
                $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $code = substr(str_shuffle($set), 0, 12);

                $data = array (
                    'first_name' => $fn,
                    'last_name' => $sn,
                    'middle_name' => $mn,
                    'contact' => $contact,
                    'email' => $email,
                    'password' => $password,
                    'status' => $status,
                    'code' => $code,
                    'user_type' => $user_type,
                    'profession_id' => $profession_id
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
                      <title>Verification Code</title>
                  </head>
                  <body>
                      <h2>Thank you for Registering.</h2>
                      <p>Please click the link below to activate your account.</p>
                      <h4><a href='".base_url()."Register_controller/activate/".$code."'>Activate My Account</a></h4>
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
                        }
                        else
                       {
                        $this->session->set_flashdata('message', 'Email not sent');
                       }

                if ($this->Register_model->addUser($data)) {

                    $this->load->helper('url');
                    $this->load->model('Admin/Verification_model');
                    
                    $status = $this->OFS_model->checkPassword($password,$email);
                    
                    //login
                    if($status!=false){
                        $session_data = array(
                            'email'=>$email,
                            'id'=>$status->$id,
                            'user_type'=>$user_type
                        );
                        
                        $this->Verification_model->new_ver($status->id, $user_type);
                        $this->session->set_userdata('UserLoginSession',$session_data);
                        redirect(base_url('NewsFeed'));

                    }else{
                        $this->load->helper('url');
                        $this->session->set_flashdata('error','Session Error.');
                        redirect(base_url('Registerpage'));
                    }

                }else{
                    $this->load->helper('url');
                    $this->session->set_flashdata('error','Error query.');
                }
                
            }else {
                $this->session->set_flashdata('error','Error Input data');
                redirect(base_url('Registerpage'));
            }
        }        
    }

    public function activate(){
        $code =  $this->uri->segment(3);
	

		//fetch user details
		$user = $this->OFS_model->getUser($code);

		//if code matches
		if($user['code'] == $code){
			//update user active status
			$data['status'] = 0;
			$query = $this->OFS_model->activate($data, $code);

			if($query){
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}

		redirect(base_url('Loginpage'));

	}

    public function addMod() {
    

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $this->form_validation->set_rules('companyid','CompanyID','trim|required|is_unique[users.email],');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');

            if($this->form_validation->run()==TRUE){
                $email = $this->input->post('companyid');
                $password = $this->input->post('password');
                $status = 0;

                $data = array (
                    'email' => $email,
                    'password' => $password,
                    'status' => $status,
                    'user_type' => 'moderator'
                );

                // insert to db
                if ($this->Register_model->addUser($data)) {

                    $this->load->helper('url');                
                    $this->load->model('Admin/AdminAuth_model');
                    $this->load->model('Admin/Verification_model');

                    $ver = $this->AdminAuth_model->verifyUser($password,$email);
                    if($ver!=false){
                        $email = $ver->email;
                        $id = $ver->id;
                        $user_type = $ver->user_type;                        
                        
                        $session_data = array(
                            'email'=>$email,
                            'id'=>$id,
                            'user_type'=>$user_type
                        );

                        // move data to verify
                        $this->Verification_model->new_ver($id, $user_type);
                        
                        // set as login session
                        $this->session->set_userdata('UserLoginSession',$session_data);
                        redirect(base_url('AdminAuth/Dashboard'));

                    }else{
                        $this->load->helper('url');
                        $this->session->set_flashdata('error','Session Error.');
                        redirect(base_url('AdminAuth/AdminRegister'));
                    }

                }else{
                    $this->load->helper('url');
                    $this->session->set_flashdata('error','Error query.');
                }
            }else {
                $this->session->set_flashdata('error','Error Input data');
                redirect(base_url('AdminAuth/AdminRegister'));
            }
        }
    }
}