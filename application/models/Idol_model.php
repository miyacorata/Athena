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
class Idol_model extends CI_Model{
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
    public function get_idol($name, $type = "kan"){
        switch ($type){
            case 'kan':
                $col = "name";
                break;
            case 'yomi':
                $col = "name_y";
                break;
            case 'roma':
                $col = "name_r";
                break;
            default:
                show_error("データベースのクエリに誤りがあります");
                exit();
        }
        $col = "`".$col."`";
        $query = $this->db->query('SELECT * FROM mrapid_scp.idol WHERE '.$col.' LIKE '.$this->db->escape($name).' LIMIT 1');
        $result = $query->row();
        if(empty($result)){
            return null;
        }else{
            return $result;
        }
        //return 'SELECT * FROM mrapid_scp.idol WHERE '.$this->db->escape($col).' LIKE '.$this->db->escape($name);
    }

    public function get_idol_by_unit_id($id){
        $query = $this->db->query('SELECT * FROM mrapid_scp.idol WHERE `unit_id` = '.$this->db->escape_str($id).' ORDER BY `id` ASC');
        $result = $query->result();
        if(empty($result))return null;
        else return $result;
    }

    public function get_all_idol(){
        $query = $this->db->query('SELECT * FROM mrapid_scp.idol WHERE 1 ORDER BY `unit_id`,`id` ASC');
        $result = $query->result();
        return $result;
    }
}