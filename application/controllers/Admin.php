<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function index(){
        if($_SESSION[''])
        $this->load->view('template/header');
        $this->load->view('admin/home');
        $this->load->view('template/footer');
    }
}