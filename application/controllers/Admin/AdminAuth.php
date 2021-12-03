<?php

class AdminAuth extends CI_Controller{

    public function Login(){
        
        //load AdminLogin views
        $this -> load -> view ('Admin/Login');
    }

    public function Register(){

        //load AdminRegister views
        $this -> load -> view ('Admin/Register');
    }

    public function Dashboard(){
        
        //load AdminDashboard views
        $this -> load -> view ('Admin/Dashboard');
    }

    public function ManageUser(){
        
        //load AdminManageUser views
        $this -> load -> view ('Admin/Dashboard/ManageUser');
    }

    public function Verifications(){
        
        //load AdminVerifications views
        $this -> load -> view ('Admin/Dashboard/Verifications');
    }

    public function ViewLogs(){
        
        //load AdminViewLogs views
        $this -> load -> view ('Admin/Dashboard/ViewLogs');
    }


}