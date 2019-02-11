<?php
/**
 * Created by PhpStorm.
 * User: miyano
 * Date: 2019/01/11
 * Time: 午後 12:47
 */

/**
 * Class Idol_model
 * @property CI_DB_mysqli_driver $db
 */
class Unit_model extends CI_Model{
    /**
     * Idol_model constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param $name
     * @param string $type
     * @return mixed
     */
    public function get_unit($search, $type = "id"){
        switch ($type){
            case 'name':
                $col = "name";
                break;
            case 'slug':
                $col = "slug";
                break;
            case 'id':
                $col = "id";
                break;
            default:
                show_error("データベースのクエリに誤りがあります",500,"Database Error occurred");
                exit();
        }
        $col = "`".$col."`";
        $query = $this->db->query('SELECT * FROM mrapid_scp.unit WHERE '.$col.' = '.$this->db->escape($search).' LIMIT 1');
        $result = $query->row();
        if(empty($result)){
            return null;
        }else{
            return $result;
        }
        //return 'SELECT * FROM mrapid_scp.idol WHERE '.$this->db->escape($col).' LIKE '.$this->db->escape($name);
    }

    public function get_all_unit($order = "id"){
        switch ($order){
            case 'id':
                $col = 'id';
                break;
            default:
                show_error("データベースのクエリに誤りがあります",500,"Database Error occurred.");
                exit();
        }
        $col = "`".$col."`";
        $query = $this->db->query('SELECT * FROM mrapid_scp.unit ORDER BY '.$col.' ASC');
        $result = $query->result();
        if(empty($result)){
            return null;
        }else{
            return $result;
        }
    }
}