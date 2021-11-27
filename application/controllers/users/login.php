<?php

class Login extends CI_Controller {
    
    public function logins() {
        $this -> load -> view('users/login');
    }

}
