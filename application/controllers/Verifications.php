<?php
class Verifications extends CI_Controller{
    public function index(){
        redirect(base_url('Verifications/VerifyUser'));
    }
    public function VerifyUser(){
        //load AdminVerifications views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        $this -> load -> view ('Admin/Verifications/newUser');
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