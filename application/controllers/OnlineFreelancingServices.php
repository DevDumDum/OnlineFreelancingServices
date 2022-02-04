<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineFreelancingServices extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Register_model');
        $this->load->model('OFS/OFS_model');

        //get all users
        $this->data['users'] = $this->OFS_model->getAllUsers();
    }

    public function index()
    {
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
        redirect(base_url('Homepage'));
	}
    public function Homepage()
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page','HomePage');

        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/Homepage');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }
    public function NewsFeed()
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page', 'NewsFeed');
        $this->load->helper('url');

        $this->load->view('OnlineFreelancingServices/inc/header');
        $this->load->view('OnlineFreelancingServices/inc/navbar');

        $this->load->model('OFS/Post_model');
        $posts = $this->Post_model->get_posts();
        $this->load->model('OFS/OFS_model');

        $this->load->model('OFS/Work_model');
        $works = $this->Work_model->get_table();
        $table = array();
        $table['key_works'] = $works;


        $udata = $this->session->userdata('UserLoginSession');
        #check if already applied on the post


        $a_arr = "";
        if (isset($udata['jobs'])) {
            $a_arr = explode(",", $udata['jobs']);
        }

        $x = 0;
        foreach ($posts as $p) {
            $temp = "";
            $posts[$x]['apply_status'] = 1;

            $s_while = true;
            $j_count = 0;
            while ($s_while) {
                if (isset($a_arr[$j_count])) {
                    if ($a_arr[$j_count] == $posts[$x]['ID']) {
                        $posts[$x]['apply_status'] = 0;
                    }
                    $j_count++;
                } else {
                    $s_while = false;
                }
            }
            if ($p['applicants'] != NULL) {
                $temp = explode(",", $p['applicants']);
                $posts[$x]['applicants'] = $temp;
            } else {
                $posts[$x]['applicants'] = 0;
            }

            if ($p['accepted'] != NULL) {
                $temp = explode(",", $p['accepted']);
                $posts[$x]['accepted'] = $temp;
            } else {
                $posts[$x]['accepted'] = 0;
            }

            $user_details = $this->OFS_model->get_user_details($p['poster_ID']);
            if ($posts[$x]['requirements'] == "") {
                $posts[$x]['requirements'] = "No requirements.";
            }
            $posts[$x]['post_owner'] = $user_details[0]['first_name'] . " " . $user_details[0]['middle_name'] . " " . $user_details[0]['last_name'];
            $x++;
        }
        $table['key_posts'] = $posts;

        // DO NOT DELETE NEXT LINE !! DO NOT DELETE NEXT LINE !! DO NOT DELETE NEXT LINE !! 
        //echo "<pre>";
        //print_r($posts);


        $this->load->view('OnlineFreelancingServices/NewsFeed', $table);
        $this->load->view('OnlineFreelancingServices/inc/postResult', $table);
    }
    public function Aboutpage()
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page','About Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/AboutUs');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }
    public function Contactpage()
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page','Contact Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/ContactUs');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }
    public function FAQpage()
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page','FAQ Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/inc/navbar');
        $this -> load -> view ('OnlineFreelancingServices/FAQ');
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
    }

    public function sendEmail() {
        $data = json_decode(file_get_contents("php://input"));
        $email = $data->email;
        $post_id = $data->post_id;
        $message = $data->message;
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'kobelames21@gmail.com',
            'smtp_pass' => 'awcwsivurwadfdem',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject('Applicant Email (Job #' . $post_id . ')');
        $this->email->message($message);
        $sent = $this->email->send();
        if ($sent) {
            $this->db->where('ID', $post_id)->update('post', array('email_client' => 1));
        }
        die(json_encode(array('sent' => $sent, 'message' => $sent ? 'Email sent' : 'Email not sent')));
    }

    public function upload_profile()
    {
        $form_data = $_POST;
        $file_type = $form_data['file_type'];
        $config['upload_path'] = './uploads/users/' . $this->session->userdata('UserLoginSession')['id'] . '/';
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }
        $file_name = '';
        if ($file_type == 'profile') {
            $file_name = 'profile_pic';
        } else if ($file_type == 'cover') {
            $file_name = 'cover_pic';
        }
        if ($file_name !== '') {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '15000';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $file_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $upload = $this->upload->do_upload('file');
            $data = array('upload_data' => $this->upload->data());
            if ($upload) {
                $user = $this->db->where('id', $_POST['user_id'])->get('users')->row();

                if ($user) {

                    if ($file_type == 'profile') {
                        if ($user->ProfPic !== '' and $user->ProfPic !== $data['upload_data']['file_name']) {
                            unlink(FCPATH . 'uploads/users/' . $user->id . '/' . $user->ProfPic);
                        }
                        $this->db->where('id', $user->id)->update('users', array('ProfPic' => $data['upload_data']['file_name']));
                    } else if ($file_type == 'cover') {
                        if ($user->ProfBanner !== '' and $user->ProfBanner !== $data['upload_data']['file_name']) {
                            unlink(FCPATH . 'uploads/users/' . $user->id . '/' . $user->ProfBanner);
                        }
                        $this->db->where('id', $user->id)->update('users', array('ProfBanner' => $data['upload_data']['file_name']));
                    }
                }
                chmod($config['upload_path'] . $data['upload_data']['file_name'], 0777);
            }
            die(json_encode(array('status' => $upload, 'data' => $upload ? $data : $this->upload->display_errors())));
        }
    }

    public function Profilepage()
    {
        if ($this->input->post() or $this->input->get()) {
            echo json_encode($_FILES);
            echo "<hr />";
            die(json_encode($this->input->post()));
        }
        $this->session->userdata('page');
        $this->session->set_userdata('page', 'Profile Page');
        $this->load->helper('url');
        $udata = $this->session->userdata('UserLoginSession');
        if (isset($_GET['id']) || $this->session->userdata('UserLoginSession')) {
            echo "Welcome to userspage!";
        } else {
            redirect(base_url('NewsFeed'));
        }
        $uid = $udata['id'];
        $user = $this->db->where('id', $uid)->get('users')->row();
        // die(json_encode($user));
        $this->load->view('OnlineFreelancingServices/inc/header');
        $this->load->view('OnlineFreelancingServices/inc/navbar');
        $this->load->view('OnlineFreelancingServices/Profile', array('user' => $user));
    }
    public function Loginpage()
    {
        if($this->session->userdata('UserLoginSession')){
            redirect(base_url('NewsFeed'));
        }
        $this->session->userdata('page');
        $this->session->set_userdata('page','Login Page');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/Login');
        $this->session->set_flashdata('error',NULL);
        $this->session->set_flashdata('success',NULL);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $array_items = array('id' => '', 'email' => '');
            $this->session->unset_userdata($array_items);
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				

				$this->load->model('OFS/OFS_model');
				$status = $this->OFS_model->checkPassword($password,$email);
				if($status!=false){
                    $id = $status->id;
                    $user_type = $status->user_type;
                    $email = $status->email;
                    $profession_id = $status->profession_id;
                    $jobs = $status->jobs;
                    $accepted = $status->accepted;
                    $posts = $status->posts;

					$session_data = array(
                        'id'=>$id,
                        'user_type'=>$user_type,
						'email'=>$email,
                        'profession_id'=>$profession_id,
                        'jobs'=>$jobs,
                        'accepted'=>$accepted,
                        'posts'=>$posts
					);

					$this->session->set_userdata('UserLoginSession',$session_data);

					$this->load->helper('url');
                    redirect(base_url('NewsFeed'));
				}else{
					$this->session->set_flashdata('error','Unverified Account or Email / Password is Wrong');
                    $this->load->helper('url');
                    redirect(base_url('Loginpage'));
				}
			}else{
				$this->session->set_flashdata('error','Fill all the required fields');
				$this->load->helper('url');
                redirect(base_url('Loginpage'));
			}
		}
    }

    public function ForgotPassword() 
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page','Forgot Password');
        $this->load->helper('url');
        $this -> load -> view ('OnlineFreelancingServices/inc/header');
        $this -> load -> view ('OnlineFreelancingServices/ForgotPassword');
        $this->session->set_flashdata('error',NULL);
        $this->session->set_flashdata('success',NULL);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $array_items = array('id' => '', 'email' => '');
            $this->session->unset_userdata($array_items);
			$this->form_validation->set_rules('email','Email','required');

			if($this->form_validation->run()==TRUE){
				$email = $this->input->post('email');


				$this->load->model('OFS/OFS_model');
				$status = $this->OFS_model->getEmail($email);
				if($status!=false){
                    $email = $status->email;
                    $code = $status->code;

					$data = array(
						'email'=>$email,
                        'id'=>$id,
                        'location'=>$status->location,
                        'code'=>$code

					);

                //set up email
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'kobelames21@gmail.com', 
                        'smtp_pass' => 'awcwsivurwadfdem', 
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );

                    $message = 	"
                    <html>
                    <head>
                        <title>Change Password Request</title>
                    </head>
                    <body>
                        <h2>Change Password.</h2>
                        <p>Please click the link below to change your account password.</p>
                        <h4><a href='".base_url()."OnlineFreelancingServices/Newpassword/".$code."'>Activate My Account</a></h4>
                    </body>
                    </html>
                    ";
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");
                            $this->email->from($config['smtp_user']); 
                            $this->email->to($email);
                            $this->email->subject('Testing');
                            $this->email->message($message);
                            if($this->email->send()) {
                                $this->session->set_flashdata('message', 'Email sent.');
                                redirect(base_url('Loginpage'));
                            } else{
                            $this->session->set_flashdata('message', 'Email not sent');
                            redirect(base_url('ForgotPassword'));
                        }
                }else{
                    $this->session->set_flashdata('error','Email entered is not registered');
                    redirect(base_url('ForgotPassword'));
                }
            }
        }        
    }

    public function NewPassword()
    {
        $code =  $this->uri->segment(3);
        $this->session->userdata('page');
        $this->session->set_userdata('page', 'New Password');
        $this->load->helper('url');
        $this->load->view('OnlineFreelancingServices/inc/header');
        $this->load->view('OnlineFreelancingServices/NewPassword');
        $this->session->set_flashdata('error', NULL);
        $this->session->set_flashdata('success', NULL);
        if (isset($code)) {
            $this->session->set_userdata('UserCode', $code);
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $array_items = array('id' => '', 'email' => '');
            $this->session->unset_userdata($array_items);
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm-pw', 'Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == TRUE) {
                $passwords = $this->input->post('password');

                //fetch user details

                $cData = $this->session->userdata('UserCode');

                $user = $this->OFS_model->getUser($cData);

                //if code matches
                if ($user['code'] == $cData) {
                    //update user password
                    $data['password'] = $passwords;
                    $query = $this->OFS_model->newPassword($data, $cData);

                    if ($query) {
                        $this->session->set_flashdata('message', 'Password changed!');
                        $this->session->sess_destroy();
                        redirect(base_url('LoginPage'));
                    } else {
                        $this->session->set_flashdata('message', 'Something went wrong in changing account password');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Cannot change password, User does not exist!');
                }

                $this->session->set_flashdata('message', 'Error!');
            }
        }
    }

    public function Registerpage()
    {
        $this->load->model('OFS/Work_model');
        $works = $this->Work_model->get_table();
        $table = array();
        $table['key_works'] = $works;

        $this->session->userdata('page');
        $this->session->set_userdata('page', 'Register Page');
        $this->load->helper('url');
        $this->load->view('OnlineFreelancingServices/inc/header');
        $this->load->view('OnlineFreelancingServices/Register', $table);
        $this->session->set_flashdata('error', NULL);
        $this->session->set_flashdata('success', NULL);
        if ($this->session->userdata('UserLoginSession')) {
            redirect(base_url('NewsFeed'));
        }
    }
    public function add_applicant(){
        header('Content-type: application/json');
        $udata = $this->session->userdata('UserLoginSession');

        $id = $_POST["a_id"];
        $uid = $_POST["u_id"];
        $this->load->model('OFS/Post_model');

        $query = $this->Post_model->add_applicant($id,$uid,$udata['jobs']);
        if($query) {
            $response_array['status'] = 'success'; 
        } else {
            $response_array['status'] = 'Error';  
        }
        echo json_encode($response_array);
        
        //if($id!=NULL)
            //return $this->db->insert('post.applicants', $id);
            //redirect(base_url('Profilepage'));
        //else //return $this->db->insert('post.applicants', 0000);           
    }
    public function report(){
        header('content-type: text/json');
        $this->load->model('OFS/Post_model');
        $udata = $this->session->userdata('UserLoginSession');
        $uid = $udata['id'];
        $rid = $this->input->post('r_id');
        $type = $this->input->post('type');
        $desc = $this->input->post('desc');
        
        $data = array(
            'id_reported' => $rid,
            'user_id' => $uid,
            'description' => $desc
        );

        $result = $this->Post_model->report_post($data, $type, $uid);
        echo json_encode($result);
    }

    public function checkE()
    {
        header('content-type: text/json');
        if (!isset($_POST['email'])) {
            exit;
        }
        $this->load->model('OFS/Register_model');
        $result = $this->Register_model->checker();

        echo json_encode(array('exists' => $result > 0));
    }

    public function AcceptedJob()
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page', 'Accepted Jobs');
        $this->load->helper('url');
        $this->load->view('OnlineFreelancingServices/inc/header');
        $this->load->view('OnlineFreelancingServices/AcceptedJobs');
        $this->load->model('OFS/Post_model');
        $udata = $this->session->userdata('UserLoginSession');

        #use jobs in db users
        #add full name in post db for easy fetch
        $a_arr = "";
        if (isset($udata['accepted'])) {
            $a_arr = explode(",", $udata['accepted']);
            // echo json_encode($udata);
            // die;
        }

        #fetch details in post, indicated in AcceptedJobs views


    }

    public function PostedJob()
    {
        if ($this->input->post()) {
            $email_recipient = $this->input->post('applicant_email');
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'kobelames21@gmail.com', // change it to yours
                'smtp_pass' => 'awcwsivurwadfdem', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->model('OFS/Post_model');
            $job_details = $this->Post_model->get_job_details($this->input->post('post_id'));
            $message = "Your job application #" . $job_details->ID . " has been accepted<hr /><b>" . $job_details->profession_type . "</b><br />Requirements: " . $job_details->requirements;
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']); // change it to yours
            $this->email->to($email_recipient); // change it to yours
            $this->email->subject('Job Application #' . $job_details->ID . ' accepted');
            $this->email->message($message);
            // $send = $this->email->send();
            $send = true;
            if ($send) {
                $accepted = $this->Post_model->accept_applicant($this->input->post('post_id'), $this->input->post('applicant_id'));
                if ($accepted) {
                    $this->session->set_flashdata('success', 'Job application accepted');
                } else {
                    $this->session->set_flashdata('error', 'Error accepting job application');
                }
                redirect(base_url('PostedJob'));
            } else {
                $this->session->set_flashdata('error', 'Error in accepting job application');
                redirect(base_url('PostedJob'));
            }
        }
        $this->session->userdata('page');
        $this->session->set_userdata('page', 'Applied Jobs');
        $this->load->helper('url');
        $this->load->view('OnlineFreelancingServices/inc/header');
        $this->load->view('OnlineFreelancingServices/PostedJobs');
        $this->load->model('OFS/Post_model');
        $udata = $this->session->userdata('UserLoginSession');

        #use posts in db users
        $a_arr = "";
        if (isset($udata['postedjob'])) {
            $a_arr = explode(",", $udata['posts']);
        }

        #fetch details in post, indicated in PostedJobs views
    }

    public function AppliedJob()
    {
        $this->session->userdata('page');
        $this->session->set_userdata('page', 'Posted Jobs');
        $this->load->helper('url');
        $this->load->view('OnlineFreelancingServices/inc/header');
        $this->load->view('OnlineFreelancingServices/AppliedJobs');
        $this->load->model('OFS/Post_model');
        $udata = $this->session->userdata('UserLoginSession');

        #use apply in db users
        $a_arr = "";
        if (isset($udata['jobs'])) {
            $a_arr = explode(",", $udata['jobs']);
        }

        #fetch details in post, indicated in AppliedJobs views
    }

    public function Logout()
    {
        $array_items = array('id' => '', 'email' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('Homepage'));
    }
}