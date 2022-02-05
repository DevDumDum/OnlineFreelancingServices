<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Register_model');
        $this->load->model('OFS/OFS_model');

        //get all users
        $this->data['users'] = $this->OFS_model->getAllUsers();
    }

    public function addUser() {
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email],');
            $this->form_validation->set_rules('first-name','First name','alpha|trim|required');
            $this->form_validation->set_rules('last-name','Last name','alpha|trim|required');
            $this->form_validation->set_rules('middle-name','Middle name','alpha|trim');
            $this->form_validation->set_rules('contact','Contact Number','integer|trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('confirm-pw','Password','trim|required|matches[password]');

            $this->form_validation->set_rules('profession_id','profession_id','trim');
            $this->form_validation->set_rules('other_profession_id','other_profession_id','trim');
            
            if($this->form_validation->run()==TRUE){
                $fn = $this->input->post('first-name');
                $sn = $this->input->post('last-name');
                $mn = $this->input->post('middle-name');
                $contact = $this->input->post('contact');
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $profession_id = $this->input->post('profession_id');
                $other_profession_id = $this->input->post('other_profession_id');

                $temp_op = explode(",", $other_profession_id);

                
                for($x = 0; $x < count($temp_op); $x++){
                    $temp_op[$x] = str_replace('"','' ,$temp_op[$x]);
                }
                
                $r_op = $this->Register_model->addOtherProf($temp_op);
                if($profession_id != null && $profession_id != 0) {
                    $profession_id = $profession_id.",".$r_op;
                } else {
                    $profession_id = $r_op;
                }


                $status = NULL;
                $user_type = 'user';
                $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $code = substr(str_shuffle($set), 0, 12);

                $data = array (
                    'first_name' => $fn,
                    'last_name' => $sn,
                    'middle_name' => $mn,
                    'contact' => $contact,
                    'email' => $email,
                    'password' => $password,
                    'status' => $status,
                    'code' => $code,
                    'user_type' => $user_type,
                    'profession_id' => $profession_id
                );

                //set up email
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'kobelames21@gmail.com', // change it to yours
                    'smtp_pass' => 'awcwsivurwadfdem', // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                  );
                  
                  $message = 	"
                  <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Bungee+Shade&family=Poppins:wght@100;200;300&family=Rampart+One&family=Sora:wght@200;300&display=swap' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <link rel='stylesheet'  href='https://drive.google.com/file/d/1I3nTTenEIMcWysPxbw6covB0312IVVpp/view?usp=sharing'/>
    <title>Register_controller - Verification</title>

<!---------------------- User Authentication ---------------------->    

</head>
<body class='UA-bg'>
    <div class='container-fluid p-0 m-0 align-items-center justify-content-center d-flex' style='min-height: 90vh;'>
        <div class='UA-text text-center'>
            <img src='https://drive.google.com/uc?export=view&id=1P7vWMLSu-vlebOVXvGDOJzuHj5zjRtP7' class='rounded mx-auto d-block' alt='...'>
            <h2 class='UA-h2 mb-2'><span>(</span> Thank you for Registering. <span>)</span></h2>
            <p class='UA-p mb-4'>Please click the button below to activate your account.</p>
            <button type='button' class='UAbutton btn btn-light'>
            <h4><a href='".base_url()."Register_controller/activate/".$code."'>Activate My Account</a></h4>
            </button>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>
</html>
                  ";
                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from($config['smtp_user']); // change it to yours
                        $this->email->to($email);// change it to yours
                        $this->email->subject('Testing');
                        $this->email->message($message);
                        if($this->email->send())
                        {
                            $this->session->set_flashdata('message', 'Email sent.');
                        }
                        else
                       {
                        $this->session->set_flashdata('message', 'Email not sent');
                       }

                if ($this->Register_model->addUser($data)) {

                    $this->load->helper('url');
                    $this->load->model('Admin/Verification_model');
                    
                    $status = $this->OFS_model->checkPassword($password,$email);
                    
                    //login
                    if($status!=false){
                        $id = $status->id;
                        $user_type = $status->user_type;
                        $email = $status->email;
                        $profession_id = $status->profession_id;
                        $jobs = $status->jobs;
                        $apply = $status->apply;

                        $session_data = array(
                            'id'=>$id,
                            'user_type'=>$user_type,
                            'email'=>$email,
                            'profession_id'=>$profession_id,
                            'jobs'=>$jobs,
                            'apply'=>$apply
                        );
                        
                        $this->Verification_model->new_ver($status->id, $user_type);
                        $this->session->set_userdata('UserLoginSession',$session_data);
                        redirect(base_url('NewsFeed'));

                    }else{
                        $this->load->helper('url');
                        $this->session->set_flashdata('error','Session Error.');
                        redirect(base_url('Registerpage'));
                    }

                }else{
                    $this->load->helper('url');
                    $this->session->set_flashdata('error','Error query.');
                }
            } else {
                $this->session->set_flashdata('error','Error Input data');
                redirect(base_url('Registerpage'));
            }
        }        
    }

    public function activate(){
        $code =  $this->uri->segment(3);
	

		//fetch user details
		$user = $this->OFS_model->getUser($code);

		//if code matches
		if($user['code'] == $code){
			//update user active status
			$data['status'] = 0;
			$query = $this->OFS_model->activate($data, $code);

			if($query){
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}

		redirect(base_url('Loginpage'));

	}

    public function addMod() {
    

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $this->form_validation->set_rules('companyid','CompanyID','trim|required|is_unique[users.email],');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');

            if($this->form_validation->run()==TRUE){
                $email = $this->input->post('companyid');
                $password = $this->input->post('password');
                $status = 0;

                $data = array (
                    'email' => $email,
                    'password' => $password,
                    'status' => $status,
                    'user_type' => 'moderator'
                );

                // insert to db
                if ($this->Register_model->addUser($data)) {

                    $this->load->helper('url');                
                    $this->load->model('Admin/AdminAuth_model');
                    $this->load->model('Admin/Verification_model');

                    $ver = $this->AdminAuth_model->verifyUser($password,$email);
                    if($ver!=false){
                        $email = $ver->email;
                        $id = $ver->id;
                        $user_type = $ver->user_type;                        
                        
                        $session_data = array(
                            'email'=>$email,
                            'id'=>$id,
                            'user_type'=>$user_type
                        );

                        // move data to verify
                        $this->Verification_model->new_ver($id, $user_type);
                        
                        // set as login session
                        $this->session->set_userdata('UserLoginSession',$session_data);
                        redirect(base_url('AdminAuth/Dashboard'));

                    }else{
                        $this->load->helper('url');
                        $this->session->set_flashdata('error','Session Error.');
                        redirect(base_url('AdminAuth/AdminRegister'));
                    }

                }else{
                    $this->load->helper('url');
                    $this->session->set_flashdata('error','Error query.');
                }
            }else {
                $this->session->set_flashdata('error','Error Input data');
                redirect(base_url('AdminAuth/AdminRegister'));
            }
        }
    }
}