<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminAuth extends CI_Controller{
    public function index(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','Dashboard');
        redirect(base_url('AdminAuth/Dashboard'));
    }

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin/AdminAuth_model');

        //get all users
        $this->data['users'] = $this->AdminAuth_model->getAllUsers();
    }

    public function AdminLogin(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','Login Page');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('AdminAuth/Dashboard'));
        }
        $this->load->helper('url');
        
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/Login');

        $this->session->set_flashdata('error',NULL);
        $this->session->set_flashdata('success',NULL);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $array_items = array('id' => '', 'email' => '','user_type'=>'');
            $this->session->unset_userdata($array_items);
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				

				$this->load->model('Admin/AdminAuth_model');
				$status = $this->AdminAuth_model->verifyUser($password,$email);
				if($status!=false){
					$email = $status->email;
                    $id = $status->id;
                    $user_type = $status->user_type;

					$session_data = array(
						'email'=>$email,
                        'id'=>$id,
                        'user_type'=>$user_type,
                        'page'=>'Dashboard'
					);
                    
					$this->session->set_userdata('UserLoginSession',$session_data);
                    redirect(base_url('AdminAuth/Dashboard'));
				}else{
					$this->session->set_flashdata('error','Unverified Account or Email / Password is Wrong');
                    $this->load->helper('url');
                    redirect(base_url('AdminAuth/AdminLogin'));
				}
			}else{
				$this->session->set_flashdata('error','Fill all the required fields');
				$this->load->helper('url');
                redirect(base_url('AdminAuth/AdminLogin'));
			}
		}
    }

    public function AdminLogout(){
        $array_items = array('id' => '', 'email' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('AdminAuth/AdminLogin'));
    }

    public function AdminRegister(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','Register Page');
        //load AdminRegister views     
        $this -> load -> view ('Admin/inc/header');  
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('AdminAuth/Dashboard'));
        }
        $this -> load -> view ('Admin/Register');
    }

    public function AdminFP()
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page','Admin Change Password');
        //load AdminFPS views     
        $this -> load -> view ('Admin/inc/header');  
        $this -> load -> view ('Admin/AdminFPS');
        $this->session->set_flashdata('error', NULL);
        $this->session->set_flashdata('success', NULL);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $array_items = array('id' => '', 'email' => '');
            $this->session->unset_userdata($array_items);
            $this->form_validation->set_rules('email', 'Email', 'required');

            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email');


                $this->load->model('OFS/OFS_model');
                $status = $this->OFS_model->getEmail($email);
                if ($status != false) {
                    $email = $status->email;
                    $code = $status->code;

                    $data = array(
                        'email' => $email,
                        'id' => $status->id,
                        'location' => $status->location,
                        'code' => $code

                    );

                    //set up email
                    $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'kobelames21@gmail.com',
                        'smtp_pass' => 'awcwsivurwadfdem',
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );

                    $message =     "
                    <html>
                    <head>
                        <title>Change Password Request</title>
                    </head>
                    <body>
                        <h2>Change Password.</h2>
                        <p>Please click the link below to change your account password.</p>
                        <h4><a href='" . base_url() . "OnlineFreelancingServices/Newpassword/" . $code . "'>Change Password</a></h4>
                    </body>
                    </html>
                    ";
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($config['smtp_user']);
                    $this->email->to($email);
                    $this->email->subject('Testing');
                    $this->email->message($message);
                    if ($this->email->send()) {
                        $this->session->set_flashdata('message', 'Email sent.');
                        redirect(base_url('AdminAuth/AdminLogin'));
                    } else {
                        $this->session->set_flashdata('message', 'Email not sent');
                        redirect(base_url('AdminAuth/AdminFP'));
                    }
                } else {
                    $this->session->set_flashdata('error', 'Email entered is not registered');
                    redirect(base_url('AdminAuth/AdminFP'));
                }
            }
        }
    }

    public function AdminCP()
    {
        $code =  $this->uri->segment(3);
        $this->session->userdata('page');
        $this->session->set_userdata('page','Change Password');
        //load AdminCPS views     
        $this -> load -> view ('Admin/inc/header');  
        $this -> load -> view ('Admin/AdminCPS');
        $this->session->set_flashdata('error', NULL);
        $this->session->set_flashdata('success', NULL);
        if (isset($code)) {
            $this->session->set_userdata('UserCode', $code);
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $array_items = array('id' => '', 'email' => '');
            $this->session->unset_userdata($array_items);
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm-pw', 'Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == TRUE) {
                $passwords = $this->input->post('password');

                //fetch user details

                $cData = $this->session->userdata('UserCode');

                $user = $this->OFS_model->getUser($cData);

                //if code matches
                if ($user['code'] == $cData) {
                    //update user password
                    $data['password'] = $passwords;
                    $query = $this->OFS_model->newPassword($data, $cData);

                    if ($query) {
                        $this->session->set_flashdata('message', 'Password changed!');
                        $this->session->sess_destroy();
                        redirect(base_url('AdminAuth/AdminLogin'));
                    } else {
                        $this->session->set_flashdata('message', 'Something went wrong in changing account password');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Cannot change password, User does not exist!');
                }

                $this->session->set_flashdata('message', 'Error!');
            }
        }
    }

    public function Dashboard(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','Dashboard');
        //load AdminDashboard views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        $this -> load -> view ('Admin/Dashboard');
    }

    public function ManageUser(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','ManageUser');
        //load AdminManageUser views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        $this -> load -> view ('Admin/ManageUser');
    }

    public function ViewLogs(){
        $this->session->userdata('page');
        $this->session->set_userdata('page','ViewLogs');
        //load AdminViewLogs views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        $this -> load -> view ('Admin/ViewLogs');
    }


}