<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Idol
 * @property Idol_model $idol_model
 * @property Unit_model $unit_model
 * @property Tag_model $tag_model
 * @property CI_Input $input
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
        unset(
            $_SESSION['user_type'],
            $_SESSION['access_token'],
            $_SESSION['user']
        );
        header("Location: ".config_item('root_url')."mypage");
    }
}