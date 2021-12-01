<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('register_model');

        parent::__construct();
       
    }

    public function index() {
        $arrData['register_detail'] = $this->register_model->get_all_register_detail();
        $this->load->view('list', $arrData);
    }

    public function add() {
        //if ($this->input->post('submit')) {
            //$arrData['first-name'] = $this->input->post('first-name');
            //$arrData['last-name'] = $this->input->post('last-name');
            //$arrData['address'] = $this->input->post('middle-name');
            //$arrData['contact'] = $this->input->post('contact');
            //$arrData['email'] = $this->input->post('email-address');
            //$arrData['pasword'] = $this->input->post('email-address');
            
            $fn = $this->input->post('first-name');
            $sn = $this->input->post('last-name');
            $mn = $this->input->post('middle-name')
            $data = array (
                'name' => $fn." ".$mn." ".$sn
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email-address'),
                'pasword' => $this->input->post('password')
            )

            $insert = $this->register_model->addUser($data);

            if ($insert) {
                
            }
        //}
    }
