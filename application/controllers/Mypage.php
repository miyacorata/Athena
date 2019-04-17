<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Idol
 * @property Idol_model $idol_model
 * @property Unit_model $unit_model
 * @property Tag_model $tag_model
 */
class Mypage extends CI_Controller {

    public function index()
    {
        $meta['load_css'] = array('mypage');
        $meta['title'] = "マイページ";
        $this->load->view('template/header',$meta);
        $this->load->view('mypage');
        $this->load->view('template/footer');
    }
}