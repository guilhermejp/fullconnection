<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Stores_model');
        $this->load->model('Clients_model');
        $this->load->model('Air_conditioning_model');
        $this->load->model('Eletrical_panel_model');
        $this->db->cache_off();
    }

    public function index($id_client, $msg = "") {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        $data['message'] = $msg;
        $data['data'] = "";
        $data['id_client'] = $id_client;

        $client = $this->Clients_model->get($id_client);
        $data['client_name'] = $client->name;

        $stores = $this->Stores_model->where('id_client', $id_client)->get_all();
        if (is_array($stores)) {

            foreach ($stores as $key => $value) {
                $where = array('id_client' => $id_client,
                    'id_store' => $value->id);

                $data['data'][] = array($value->id,
                    $client->name,
                    $value->name,
                    $value->manager_name,
                    $this->Air_conditioning_model->count($where) + $this->Eletrical_panel_model->count($where));
            }
        }

        $this->load->view('admin/listar_stores', $data);
    }

    public function insert($id_client) {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        $client = $this->Clients_model->get($id_client);
        $data['id_client'] = $id_client;
        $data['client_name'] = $client->name;

        $data['functions']['save'] = true;
        $data['functions']['delete'] = false;
        $data['functions']['new'] = false;

        $this->load->view('admin/edit_stores', $data);
    }

    public function get($id_client = "", $id = "") {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        if (is_numeric($id)) {

            $input = $this->input->post();
            $data['message'] = "";

            $data = (array) $this->Stores_model->get($id);

            $client = $this->Clients_model->get($id_client);
            $data['id_client'] = $id_client;
            $data['client_name'] = $client->name;

            $data['functions']['save'] = true;
            $data['functions']['delete'] = true;
            $data['functions']['new'] = true;

            $this->load->view('admin/edit_stores', $data);
        } else {
            redirect('lojas/' . $id_client);
        }
    }

    public function save($id_client) {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        if ($this->input->post()) {
            $data = array();
            $input = $this->input->post();
            $data = $input;
            $data['message'] = "";

            if (is_numeric($input['id'])) {
                $this->Stores_model->update($input, $input['id'], true);
                $data['message'] = msg("Loja alterada com sucesso!", "success");
            } else {
                $id = $this->Stores_model->insert($input);
                $data['id'] = $id;
                $data['message'] = msg("Loja cadastrada com sucesso!", "success");
            }

            $client = $this->Clients_model->get($id_client);
            $data['id_client'] = $id_client;
            $data['client_name'] = $client->name;

            $data['functions']['new'] = true;
            $data['functions']['delete'] = true;
            $data['functions']['save'] = true;

            $this->load->view('admin/edit_stores', $data);
        } else {
            redirect('lojas/' . $id_client . '/cadastrar');
        }
    }

    public function delete() {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        if ($this->input->post()) {
            $input = $this->input->post();
            $data['message'] = "";

            // Check if exists facilities before delete
            $where = array('id_store' => $input['id']);
            if (($this->Air_conditioning_model->count($where) + $this->Eletrical_panel_model->count($where)) > 0) {
                $this->index(msg("Existem equipamentos vinculados a esta loja que devem ser excluidos primeiro!", "error", 5));
            } else {

                if (!$this->Stores_model->delete($input['id'])) {
                    redirect('clientes');
                } else {
                    $this->index($input['id_client'], msg("Loja excluída com sucesso!", "success"));
                }
            }
        } else {
            redirect('lojas/' . $input['id_client']);
        }
    }

}
