<?php
$udata = $this->session->userdata('UserLoginSession');
            
if(!empty($key_posts)){

    foreach($key_posts as $p) {

        $post = array();
        $post['id'] = $p['ID'];
        $post['name_id'] = $p['poster_ID'];
        $post['name'] = ($p['post_owner'] == '')
            ? "Anonymous"
            : strval($p['post_owner']);
        $post['work'] = ($p['profession_ID'] != 0) 
            ? $post['work'] = $key_works[$p['profession_ID']-1]['profession_type']
            : $post['work'] = $key_works[0]['profession_type'];

            $post['requirements'] = $p["requirements"];
            $post['worker_count'] = $p["worker_count"];
            $post['applicants'] = $p["applicants"];
            $post['accepted'] = $p['accepted'];
            $post['apply_status'] = $p['apply_status'];

            $post['location'] = $p['location'];
            $post['min_pay'] = $p['min_pay'];
            $post['max_pay'] = $p['max_pay'];
            $post['timestamp'] = $p['timestamp'];

        echo'<script>'; 
        echo 'initPost('.json_encode($post).');';
        echo '</script>';
    }
}

?>