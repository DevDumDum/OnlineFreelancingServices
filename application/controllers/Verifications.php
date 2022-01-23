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
            $current = $this->Verification_model->get_existing_count($udata['id'], 'moderator');
            if($current < $max_count){
                $this->Verification_model->set_mod_id($udata['id'], $max_count-$current, 'moderator');
            }
            $table = $this->Verification_model->get_existing_row($udata['id'], 'moderator');
        }else{
            $current = $this->Verification_model->get_existing_count($udata['id'], 'users');
            if($current < $max_count){
                $this->Verification_model->set_mod_id($udata['id'], $max_count-$current, 'user');
            }
            $table = $this->Verification_model->get_existing_row($udata['id'], 'user');
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
        $this->load->model('Admin/Verification_model');
        $this->load->model('OFS/Work_model');

        $this -> load -> view ('Admin/inc/header');
        $this -> load -> view ('Admin/inc/navbar');
        $udata = $this->session->userdata('UserLoginSession');

        
        /*
            MAX NUMBER OF ROWS TO ASSIGN BASED ON UID OF THE CURRENT VIEWER TYPE
        */
        $max_count = 3;

        $current = $this->Verification_model->get_existing_count($udata['id'], 'profession');

        if($current < $max_count){
            $this->Verification_model->set_mod_id($udata['id'], $max_count-$current, 'profession');
        }
        $table = $this->Verification_model->get_existing_row($udata['id'], 'profession');

        $ver_table = array();
        $ver_table['key_table'] = $table;
        
        $this->load->model('OFS/OFS_model');
                
        $v_list= array();
        
        $x = 0;
        foreach($table as $t){
            $prof_details = $this->Work_model->get_prof($t['content_ID']);
            
            $v_list[$x]['ID'] = $prof_details[0]['ID'];
            $v_list[$x]['profession_type'] = $prof_details[0]['profession_type'];
            $v_list[$x]['description'] = $prof_details[0]['description'];
            $v_list[$x]['u_id'] = $t['content_ID'];
            $v_list[$x]['v_id'] = $t['ID'];
            $x++;
        }
        $v_list_x['key_v_list'] = $v_list;
        
        $this -> load -> view ('Admin/Verifications/jobCategory',$v_list_x);
    }
}