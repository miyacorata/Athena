<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Mypage
 * @property Idol_model $idol_model
 * @property Unit_model $unit_model
 * @property User_Model $user_model
 * @property Tag_model $tag_model
 * @property CI_Input $input
 * @property CI_Session $session
 */
class Mypage extends CI_Controller {

    public function index()
    {
        $meta['load_css'] = array('mypage','idollist');
        $meta['title'] = "マイページ";
        $this->load->model('unit_model');
        $this->load->view('template/header',$meta);
        if(empty($_SESSION['user']))$this->load->view('login');
        else $this->load->view('mypage');
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
        $this->load->model('user_model');
        if($instance === "twista" && !empty($_GET['token'])){
            $token = $this->input->get('token');
            $url = config_item('twista_url')."/api/auth/session/userkey";

            $data = array(
                "appSecret" => config_item('twista_app_secret'),
                "token" => $token
            );

            $res = Post($url, $data);

            if(empty($res['user'])){
                $reason = "不正なログインです";
                if(!empty($res['error']['code'])) $reason .= " : ".$res['error']['code'];
                show_error($reason,403);
            }

            // ユーザーの確認
            if($user = $this->user_model->get_user($res['user']['username'],"twista.283.cloud")){
                $_SESSION['user'] = $user;
            }else{
                $user = array(
                    "name" => $res['user']['name'],
                    "screenname" => $res['user']['username'],
                    "instance" => "twista.283.cloud",
                    "status" => "normal",
                    "notice" => null
                );
                $_SESSION['user'] = $user;
                $this->user_model->add_user($user);
                $_SESSION['message'] = "firstlogin";
                $this->session->mark_as_flash("message");
            }
            $_SESSION['user']['type'] = "twista";
            $_SESSION['user']['avatarUrl'] = $res['user']['avatarUrl'];
            if(!empty($res['user']['tags']) && empty($_SESSION['producer']['tantou'])){
                $this->load->model('idol_model');
                foreach ($res['user']['tags'] as $tag) {
                    if ($tagidol = $this->idol_model->get_idol($tag, "kan")) $_SESSION['producer']['tantou'][] = $tagidol;
                }
            }


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