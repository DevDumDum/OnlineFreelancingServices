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
        $table = $this->Verification_model->get_table();
        $ver_table = array();
        $ver_table['key_table'] = $table;
        
        $this->load->model('OFS/OFS_model');
                
        $v_list= array();
        $x = 0;


        foreach($table as $t){

            $user_details = $this->OFS_model->get_user_details($t['content_ID']);
            
            $v_list[$x]['name'] = $user_details[0]['first_name']." ".$user_details[0]['middle_name']." ".$user_details[0]['last_name'];
            $v_list[$x]['u_id'] = $t['content_ID'];
            $v_list[$x]['v_id'] = $t['ID'];
            $x++;
        }
        $v_list_x['key_v_list'] = $v_list;
        
        $this -> load -> view ('Admin/Verifications/newUser',$v_list_x);
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