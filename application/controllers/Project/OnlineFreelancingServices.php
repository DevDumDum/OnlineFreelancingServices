<?php

class OnlineFreelancingServices extends CI_Controller{
    public function Homepage(){
        $this -> load -> view ('OnlineFreelancingServices/Homepage');
    }
    public function NewsFeed(){
        $this -> load -> view ('OnlineFreelancingServices/NewsFeed');
    }
    public function Aboutpage(){
        $this -> load -> view ('OnlineFreelancingServices/AboutUs');
    }
    public function Contactpage(){
        $this -> load -> view ('OnlineFreelancingServices/ContactUs');
    }
    public function FAQpage(){
        $this -> load -> view ('OnlineFreelancingServices/FAQ');
    }
}