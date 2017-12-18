<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class System_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    
    public function Patient_show() {
        $this->load->view('Patient_view');
    }
    
}