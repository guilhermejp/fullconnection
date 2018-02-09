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

    public function listar($date = "") {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Log::listar() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }
        $data['log'] = "";

        // Check if date is empty
        if ($date == "") {
            $date = date('Y-m-d');
        }

        $data['date'] = date('d/m/Y', strtotime($date));

        $file = APPPATH . 'logs/log-' . $date . '.php';

        if (file_exists($file)) {
            $open = fopen($file, "r");
            // ignore first line
            $line = fgets($open);
            $i = 0;
            do {
                $line = fgets($open);
                if (trim($line) != "") {
                    $i++;
                    $data['log'][$i]['type'] = trim(substr($line, 0, 5));
                    $data['log'][$i]['date'] = trim(substr($line, 7, 20));
                    $data['log'][$i]['message'] = trim(substr($line, 31));
                }
            } while (!feof($open));
            fclose($open);
        }

        $this->load->view('admin/listar_log', $data);
    }

}
