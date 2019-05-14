<?php

/**
 * Class Idol_model
 * @property CI_DB_mysqli_driver $db
 */
class User_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_user($screenname,$instance){
        $screenname = $this->db->escape_str($screenname);
        $instance = $this->db->escape_str($instance);
        $sql = "SELECT * FROM user WHERE screenname LIKE ? AND instance LIKE ? LIMIT 1";
        $result = $this->db->query($sql,array($screenname,$instance))->row_array();
        if(empty($result))return null;
        else return $result;
    }

    public function add_user($user){
        if(empty($user['name']) || empty($user['screenname']) || empty($user['instance'])){
            show_error('登録するべき情報が不足しています',400);
            return false;
        }
        if($this->get_user($user['screenname'],$user['instance'])){
            show_error('すでに登録されているユーザーです',400);
            return false;
        }
        $data = array(
            "name" => $user['name'],
            "screenname" => $user['screenname'],
            "instance" => $user['instance'],
            "status" => 'normal'
        );
        if($this->db->insert("user",$data))return true;
        else return false;
    }

    public function get_user_settings($id,$attribute){
        //TODO:検証する
        $sql = "SELECT * FROM user_settings WHERE user_id = ? AND attribute LIKE ?";
        $result = $this->db->query($sql,array($id,$attribute));
        return $result;
    }
}