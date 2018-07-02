<?php
/**
 * Created by PhpStorm.
 * User: COD3R
 * Date: 9/16/2015
 * Time: 4:23 PM
 */

/**
 * @property CI_DB_driver db
 */

class Configuration_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        //$this->load->library('Datatables');
    }


    public function update_backup($zipFileName){
        $this->db->query("UPDATE settings SET backup = '$zipFileName' LIMIT 1");
        return $this->db->affected_rows();
    }
}