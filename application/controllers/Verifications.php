<?php
class Verifications extends CI_Controller{
    public function index(){
        redirect(base_url('Verifications/VerifyUser'));
    }
    public function Dashboard(){
        redirect(base_url('AdminAuth/Dashboard'));
    }

    public function VerifyUser(){
        //load AdminVerifications views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');

        $this->load->model('Admin/Verification_model');
        $verification = $this->Verification_model->get_table();
        $data = array();
        $data['verification'] = $verification;

        //print_r($data);
        // TESTING //  TESTING //  TESTING //  TESTING //  TESTING //  TESTING //  TESTING // 
        
        $this->load->model('OFS/OFS_model');
        $data2 = array();
        $name = $this->OFS_model->get_username(3);
        $data2['name'] = $name;
    
      
        print_r($name);
        

        // TESTING //  TESTING //  TESTING //  TESTING //  TESTING //  TESTING //  TESTING // 

        $this -> load -> view ('Admin/Verifications/newUser', $data);
    }

    public function VerifyRequest(){
        //load AdminVerifications views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        $this -> load -> view ('Admin/Verifications/deactivateRequest');
    }
    public function VerifyReports(){
        //load AdminVerifications views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        $this -> load -> view ('Admin/Verifications/reports');
    }
    public function VerifyJobCategory(){
        //load AdminVerifications views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        $this -> load -> view ('Admin/Verifications/jobCategory');
    }
    
    public function AdminLogout(){
        redirect(base_url('AdminAuth/AdminLogout'));
    }
}