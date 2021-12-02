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

            $data = array (
                'name' => $fn." ".$mn." ".$sn,
                'contact' => $contact,
                'email' => $email,
                'password' => $password
            );
            
            $this->load->model('register_model');
            $insert = $this->register_model->addUser($data);

            if ($insert) {
                
                redirect(base_url('OnlineFreelancingServices/Loginpage'));
            }
    }
}
