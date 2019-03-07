<?php
/**
 * Created by PhpStorm.
 * User: miyano
 * Date: 2019/03/07
 * Time: 午後 5:18
 */

/**
 * Class Idol_model
 * @property CI_DB_mysqli_driver $db
 */
class Tag_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_tags_by_idolname($name){
        $query = $this->db->query("SELECT * FROM metainfo WHERE idolname = '".$this->db->escape_str($name)."' ORDER BY category ASC");
        $result = $query->result();
        if(empty($result))return null;
        else return $result;
    }
}