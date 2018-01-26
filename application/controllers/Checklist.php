<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Checklists_model');
        $this->load->model('Clients_model');
        $this->load->model('Stores_model');
        $this->db->cache_off();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->library('session');
    }
    
    public function index($msg = "") {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        $data['message'] = $msg;
        $data['data'] = "";

        $checklists = $this->Checklists_model->get_all();
        if (is_array($checklists)) {
            foreach ($checklists as $value) {
                $client = $this->Clients_model->get($value->id_client);
                $store = $this->Stores_model->get($value->id_store);

                $data['data'][] = array($value->id,
                    date('d/m/Y H:i:s', strtotime($value->create)),
                    $client->name,
                    $store->name,
                    $value->technicians,
                    $value->status,
                    date('d/m/Y H:i:s', strtotime($value->update)),
                    $value->file);
            }
        }

        $this->load->view('admin/listar_checklist', $data);
    }

}
