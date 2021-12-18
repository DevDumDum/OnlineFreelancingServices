<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Register_model');
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
            
            if($this->form_validation->run()==TRUE){
                $fn = $this->input->post('first-name');
                $sn = $this->input->post('last-name');
                $mn = $this->input->post('middle-name');
                $contact = $this->input->post('contact');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $status = 0;
                $user_type = 'user';

                $data = array (
                    'first_name' => $fn,
                    'last_name' => $sn,
                    'middle_name' => $mn,
                    'contact' => $contact,
                    'email' => $email,
                    'password' => $password,
                    'status' => $status,
                    'user_type' => $user_type
                );

                if ($this->Register_model->addUser($data)) {

                    $this->load->helper('url');
                    $this->load->model('OFS/OFS_model');
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
