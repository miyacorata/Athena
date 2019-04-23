<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Idol
 * @property Idol_model $idol_model
 * @property Unit_model $unit_model
 * @property Tag_model $tag_model
 * @property CI_Input $input
 * @property CI_Session $session
 */
class Mypage extends CI_Controller {

    public function index()
    {
        $meta['load_css'] = array('mypage','idollist');
        $meta['title'] = "マイページ";
        $this->load->model('idol_model');
        $this->load->model('unit_model');
        $data['units'] = $this->unit_model->get_all_unit();
        if(!empty($_SESSION['user']['tags']) && empty($_SESSION['producer']['tantou'])){
            foreach ($_SESSION['user']['tags'] as $tag) {
                if ($tagidol = $this->idol_model->get_idol($tag, "kan")) $_SESSION['producer']['tantou'][] = $tagidol;
            }
        }
        $this->load->view('template/header',$meta);
        $this->load->view('mypage',$data);
        $this->load->view('template/footer');
    }

    public function login($instance = null)
    {
        if($instance === "twista"){
            $data = array(
                "appSecret" => config_item('twista_app_secret')
            );
            $url = config_item('twista_url')."/api/auth/session/generate";
            $res = Post($url,$data);

            header('Location: '.$res['url']);
        }
        else{
            show_error("インスタンスのタイプが指定されていません",400);
        }
    }

    public function callback($instance = null)
    {
        if($instance === "twista" && !empty($_GET['token'])){
            $token = $this->input->get('token');
            $url = config_item('twista_url')."/api/auth/session/userkey";

            $data = array(
                "appSecret" => config_item('twista_app_secret'),
                "token" => $token
            );

            $res = Post($url, $data);

            $_SESSION['user_type'] = "twista";
            $_SESSION['access_token'] = $res['accessToken'];
            $_SESSION['user'] = $res['user'];

            header("Location: ".config_item('root_url')."mypage");
        }
        else{
            show_error("コールバックのインスタンス指定が正しくありません",400);
        }
    }

    public function logout(){
        $_SESSION = array();
        session_regenerate_id();
        $_SESSION['message'] = "logout";
        $this->session->mark_as_flash("message");
        header("Location: ".config_item('root_url')."mypage");
    }
}