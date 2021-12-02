<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineFreelancingServices extends CI_Controller{
    public function index(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
		$this -> load -> view ('OnlineFreelancingServices/Homepage');
	}
    public function Homepage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/Homepage');
    }
    public function NewsFeed(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/NewsFeed');
    }
    public function Aboutpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/AboutUs');
    }
    public function Contactpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/ContactUs');
    }
    public function FAQpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/FAQ');
    }
    public function Profilepage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/Profile');
    }
    public function Loginpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/Login');
    }
    public function Registerpage(){
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/Register');
    }
}