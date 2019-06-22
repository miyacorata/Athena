<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(empty($_SESSION['user']['status']) || $_SESSION['user']['status'] !== 'admin'){
            show_error('権限がありません',403,'Administrator Only');
        }
    }

    public function index(){
        $this->load->view('template/header');
        $this->load->view('admin/home');
        $this->load->view('template/footer');
    }
}