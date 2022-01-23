<?php 

class Register_model extends CI_Model {

    public function __construct(){
        $this->load->database('default');
        parent::__construct();
    }

    public function addUser ($data){
        if($this->db->insert('users', $data))
            return true;
        else return false;
    }

    public function addOtherProf($op){
        $this->load->model('OFS/Work_model');
        $current_p = $this->Work_model->get_table_all();
        $count_current_p = count($current_p);
        $count_op = count($op);
        $p_id = "";
        
        for($x = 0; $x < $count_op; $x+=2){
            $pt = 1;

            foreach($current_p as  $w){
                if($op[$x] == $w["profession_type"]){
                    $pt = 0;

                    if($w["description"]==NULL || $w["description"]==""){
                        $this->db->where("profession_type", $op[$x]);
                        $data = array(
                            'description' => $op[$x+1]
                        );
                        $this->db->update('profession', $data);
                    }
                    if($p_id != ""){
                        $p_id= $p_id.",".$w["ID"];
                    }else{
                        $p_id= $w["ID"];
                    }
                    
                    $count_current_p++;
                }
            }

            if($pt == 1){
                $data = array(
                    'profession_type' => $op[$x],
                    'description' => $op[$x+1],
                    'status' => 0
                );
                $this->db->insert('profession', $data);

                $this->db->select('ID, profession_type');
                $this->db->where('profession_type', $op[$x]);
                $cur_id = $this->db->get('profession')->result_array();

                if($p_id != "") {
                    $p_id = $p_id.",".$cur_id[0]["ID"];
                } else {
                    $p_id = $cur_id[0]["ID"];
                }
                $count_current_p++;
                //put to verification
                $this->load->model('Admin/Verification_model');
                $data = array(
                    'verification_type' => 'profession',
                    'content_id' => $cur_id[0]["ID"]
                );
                $this->db->insert('verification', $data);
            }
        }
        return $p_id;
    }
}