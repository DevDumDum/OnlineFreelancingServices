<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Register_model');     
    }

    public function addUser() {
        
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
            
            $insert = $this->Register_model->addUser($data);
            redirect(base_url('index.php/Loginpage'));

            if ($insert) {
                
            }
            else   
                redirect(base_url('index.php/Registerpage'));
    }
}
