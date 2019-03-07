<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Idol
 * @property Idol_model $idol_model
 * @property Unit_model $unit_model
 * @property Tag_model $tag_model
 */
class Idol extends CI_Controller {

    public function index()
    {
        $this->load->model('idol_model');
        $this->load->model('unit_model');
        $data['idols'] = $this->idol_model->get_all_idol();
        $data['units'] = $this->unit_model->get_all_unit();
        $meta['load_css'] = array("idollist");
        $meta['title'] = "アイドル一覧";
        $this->load->view('template/header',$meta);
        $this->load->view('idollist',$data);
        $this->load->view('template/footer');
    }

    /*public function table()
    {
        $this->load->view('template/header');
        $this->load->view('idol');
        $this->load->view('template/footer');
    }*/

    public function detail($name = null)
    {
        if($name === null){
            show_error("アイドル名が指定されていません",400,"URLの指定に誤りがあります");
        }
        $this->load->model('idol_model');
        $this->load->model('unit_model');
        $this->load->model('tag_model');
        $meta['load_css'] = array("idol");
        $data['idol'] = $this->idol_model->get_idol($name,"roma");
        $data['tags'] = $this->tag_model->get_tags_by_idolname($data['idol']->name);
        if(empty($data['idol'])){
            show_error("URL等に誤りがないか確認の上、もう一度お試しください。リンク切れ等の場合は管理者までご連絡ください。",404,"該当するアイドルが見つかりませんでした");
        }
        $data['unit'] = $this->unit_model->get_unit($data['idol']->unit_id);
        $meta['title'] = hsc($data['idol']->name);

        $this->load->view('template/header',$meta);
        $this->load->view('idol',$data);
        $this->load->view('template/footer');
    }
}

