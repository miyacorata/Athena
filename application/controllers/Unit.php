<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Idol
 * @property Idol_model $idol_model
 * @property Unit_model $unit_model
 */
class Unit extends CI_Controller {

    public function index(){
        $this->load->model('unit_model');
        $data['units'] = $this->unit_model->get_all_unit();
        $meta['title'] = "ユニット一覧";
        $meta['load_css'] = array("unit");
        $this->load->view('template/header',$meta);
        $this->load->view('unitlist',$data);
        $this->load->view('template/footer');
    }

    public function detail($name = null)
    {
        if($name === null){
            show_error("ユニット名が指定されていません",400,"URLの指定に誤りがあります");
        }
        $this->load->model('unit_model');
        $this->load->model('idol_model');
        $meta['load_css'] = array("unit");
        $data['unit'] = $this->unit_model->get_unit($name,"slug");
        if(empty($data['unit'])){
            show_error("URL等に誤りがないか確認の上、もう一度お試しください。リンク切れ等の場合は管理者までご連絡ください。",404,"該当するユニットが見つかりませんでした");
        }
        $data['member'] = $this->idol_model->get_idol_by_unit_id($data['unit']->id);
        $meta['title'] = hsc($data['unit']->name);
        $this->load->view('template/header',$meta);
        $this->load->view('unit',$data);
        $this->load->view('template/footer');
    }
}

