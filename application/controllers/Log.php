<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('Checklists_model');
        //$this->db->cache_off();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->library('session');
    }

    public function listar() {
        if(!$this->session->userdata('username')){ redirect('login'); return false; }

        $this->load->view('admin/listar_log');
    }

}
