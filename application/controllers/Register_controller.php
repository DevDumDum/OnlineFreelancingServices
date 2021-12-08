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

            $this->form_validation->set_rules('email-address','Email','trim|required|valid_email|is_unique[users.email],');
            $this->form_validation->set_rules('first-name','First name','alpha|trim|required');
            $this->form_validation->set_rules('last-name','Last name','alpha|trim|required');
            $this->form_validation->set_rules('middle-name','Middle name','alpha|trim|required');
            $this->form_validation->set_rules('contact','Contact Number','integer|trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('confirm-pw','Password','trim|required|matches[password]');

            if($this->form_validation->run()==TRUE){
                $fn = $this->input->post('first-name');
                $sn = $this->input->post('last-name');
                $mn = $this->input->post('middle-name');
                $contact = $this->input->post('contact');
                $email = $this->input->post('email-address');
                $password = $this->input->post('password');
                $status = true;

                $data = array (
                    'first_name' => $fn,
                    'last_name' => $sn,
                    'middle_name' => $mn,
                    'contact' => $contact,
                    'email' => $email,
                    'password' => $password,
                    'status' => $status
                );
                
                if ($this->Register_model->addUser($data)) {
                    $this->load->helper('url');
                    $this->load->model('OFS/OFS_model');
                    $status = $this->OFS_model->checkPassword($password,$email);
                    if($status!=false){
                        $session_data = array(
                            'email'=>$email,
                            'id'=>$id,
                        );
                        $this->session->set_userdata('UserLoginSession',$session_data);
                    }
                    redirect(base_url('index.php/NewsFeed'));
                }else{
                    $this->load->helper('url');
                    $this->session->set_flashdata('error','Error query.');
                }
            }else {
                $this->load->view('OnlineFreelancingServices/Register.php');
            }

        }        
    }

    public function addMod() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $this->form_validation->set_rules('companyid','CompanyID','trim|required|valid_email|is_unique[users.email],');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');

            if($this->form_validation->run()==TRUE){
                $email = $this->input->post('companyid');
                $password = $this->input->post('password');
                $status = true;

                $data = array (
                    'email' => $email,
                    'password' => $password,
                    'status' => $status
                );

                // insert to db
                if ($this->Register_model->addUser($data)) {
                    $this->load->helper('url');

                    //login
                    $this->load->model('OFS/OFS_model');
                    $status = $this->OFS_model->checkPassword($password,$email);
                    if($status!=false){
                        $session_data = array(
                            'email'=>$email,
                            'id'=>$id,
                        );
                        $this->session->set_userdata('UserLoginSession',$session_data);
                    }//end login

                    redirect(base_url('AdminAuth/Dashboard'));

                }else{
                    $this->load->helper('url');
                    $this->session->set_flashdata('error','Error query.');
                }
            }else {
                $this->load->view('Admin/Register.php');
            }
        }
    }
}
