<?php
/**
 * Created by PhpStorm.
 * User: Aslan
 * Date: 18.10.2018
 * Time: 15:16
 */
class AdminLoginModel extends CI_Model{

    public function getAdmin($username, $password){
        $query = $this->db->select('admin_id')->get_where('admin', array('admin_username' => $username, 'admin_password' => $password));
        return $query;
    }

}