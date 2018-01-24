<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nurse_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    function Nurseall() {
        $this->db->select('*')->from('pielegniarkamsfe')->where('isActive' == 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}
