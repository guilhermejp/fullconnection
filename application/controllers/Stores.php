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
            log_message('error', 'Stores::index() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        $data['message'] = $msg;
        $data['data'] = "";
        $data['id_client'] = $id_client;

        $client = $this->Clients_model->get($id_client);
        if (!$client) {
            log_message('error', 'Stores::index() - Erro ao obter o cliente (' . $id_client . ') :' . $this->db->db_debug);
        }
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
        } else {
            log_message('debug', 'Stores::index() - Não há Lojas a listar ou erro:' . $this->db->db_debug);
        }

        $this->load->view('admin/listar_stores', $data);
    }

    public function insert($id_client) {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Stores::insert() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        $client = $this->Clients_model->get($id_client);
        if (!$client) {
            log_message('error', 'Stores::insert() - Erro ao obter o cliente (' . $id_client . ') :' . $this->db->db_debug);
        }

        $data['id_client'] = $id_client;
        $data['client_name'] = $client->name;

        $data['functions']['save'] = true;
        $data['functions']['delete'] = false;
        $data['functions']['new'] = false;

        $this->load->view('admin/edit_stores', $data);
    }

    public function get($id_client = "", $id = "") {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Stores::get() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        if (is_numeric($id)) {

            $input = $this->input->post();
            $data['message'] = "";

            $data = (array) $this->Stores_model->get($id);
            if (!$data) {
                log_message('error', 'Stores::get() - Erro ao obter a loja (' . $id . '):' . $this->db->db_debug);
            }

            $client = $this->Clients_model->get($id_client);
            if (!$client) {
                log_message('error', 'Stores::get() - Erro ao obter o cliente (' . $id_client . '):' . $this->db->db_debug);
            }

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
            log_message('error', 'Stores::save() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        if ($this->input->post()) {
            $data = array();
            $input = $this->input->post();
            $data = $input;
            $data['message'] = "";

            if (is_numeric($input['id'])) {
                if (!$this->Stores_model->update($input, $input['id'], true)) {
                    log_message('error', 'Store::save() - Erro ao atualizar Lojas (' . $input['id'] . '): ' . $this->db->db_debug);
                }
                $data['message'] = msg("Loja alterada com sucesso!", "success");
            } else {
                $id = $this->Stores_model->insert($input);
                if (!$id) {
                    log_message('error', 'Stores::save() - Erro ao inserir nova loja:' . $this->db->db_debug);
                }
                $data['id'] = $id;
                $data['message'] = msg("Loja cadastrada com sucesso!", "success");
            }

            $client = $this->Clients_model->get($id_client);
            if (!$client) {
                    log_message('error', 'Stores::save() - Erro ao obter o Cliente ('.$id_client.'):' . $this->db->db_debug);
                }
            $data['id_client'] = $id_client;
            $data['client_name'] = $client->name;

            $data['functions']['new'] = true;
            $data['functions']['delete'] = true;
            $data['functions']['save'] = true;

            $this->load->view('admin/edit_stores', $data);
        } else {
            log_message('error', 'Stores::save() - Acesso indevido sem POST!');
            redirect('lojas/' . $id_client . '/cadastrar');
        }
    }

    public function delete() {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Stores::delete() - Tentativa de acesso sem efetuar login!');
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
                    log_message('error', 'Stores::delete() - Erro ao remover loja ('.$input['id'].'):' . $this->db->db_debug);
                    redirect('clientes');
                } else {
                    $this->index($input['id_client'], msg("Loja excluída com sucesso!", "success"));
                }
            }
        } else {
            log_message('error', 'Stores::delete() - Acesso indevido sem POST!');
            redirect('lojas/' . $input['id_client']);
        }
    }

}
