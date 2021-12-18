<?php
class Verifications extends CI_Controller{
    public function index(){
        //$udata = $this->session->userdata('UserLoginSession');
        //$newUdata = $udata;
        //$newUdata['page']="Verificaton-User";
        //$this->session->set_userdata('UserLoginSession', $newUdata);
        $this->session->userdata('page');
        $this->session->set_userdata('page','Verification-User');
        redirect(base_url('Verifications/VerifyUser'));
    }
    public function Dashboard(){
        redirect(base_url('AdminAuth/Dashboard'));
    }

    public function Mod(){
        //$udata = $this->session->userdata('UserLoginSession');
        //$newUdata = $udata;
        //$newUdata['page']="Verification-Moderator";
        //$this->session->set_userdata('UserLoginSession', $newUdata);
        $this->session->userdata('page');
        $this->session->set_userdata('page','Verification-Moderator');
        redirect(base_url('Verifications/VerifyUser'));
    }

    public function VerifyUser(){
        //load AdminVerifications views
        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        
        $udata = $this->session->userdata('UserLoginSession');
        $page = $this->session->userdata('page');
        $this->load->model('Admin/Verification_model');
        
        /*
            MAX NUMBER OF ROWS TO ASSIGN BASED ON UID OF THE CURRENT VIEWER TYPE
        */
        $max_count = 3;

        
        if($page === 'Verification-Moderator'){
            $current = $this->Verification_model->mod_get_existing_count($udata['id']);
            if($current < $max_count){
                $this->Verification_model->set_admin_id($udata['id'], $max_count-$current);
            }
            $table = $this->Verification_model->mod_get_existing_row($udata['id']);
        }else{
            $current = $this->Verification_model->get_existing_count($udata['id']);
            if($current < $max_count){
                $this->Verification_model->set_mod_id($udata['id'], $max_count-$current);
            }
            $table = $this->Verification_model->get_existing_row($udata['id']);
        }

        $ver_table = array();
        $ver_table['key_table'] = $table;
        
        $this->load->model('OFS/OFS_model');
                
        $v_list= array();
        $x = 0;

        foreach($table as $t){

            $user_details = $this->OFS_model->get_user_details($t['content_ID']);
            
            if($udata['user_type'] == 'admin')
                $v_list[$x]['name'] = $user_details[0]['email'];
            else
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