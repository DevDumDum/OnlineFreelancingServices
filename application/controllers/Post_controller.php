<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_controller extends CI_Controller {

    $this->load->model('OFS/Post_model');
    $posts = $this->Post_model->get_table();
    $table = array();

    $table['key_posts'] = $table;
}