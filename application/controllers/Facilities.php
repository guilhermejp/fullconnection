<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Facilities extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Air_conditioning_model');
        $this->load->model('Eletrical_panel_model');
        $this->load->model('Stores_model');
        $this->load->model('Clients_model');
        $this->db->cache_off();
        $this->load->library('session');
    }

    public function index($id_store, $msg = "") {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        $data['message'] = $msg;
        $data['data'] = "";
        $data['id_store'] = $id_store;

        $store = $this->Stores_model->get($id_store);
        $data['store_name'] = $store->name;
        $data['id_store'] = $store->id;

        $client = $this->Clients_model->get($store->id_client);
        $data['client_name'] = $client->name;
        $data['id_client'] = $client->id;

        $air_conditioning = $this->Air_conditioning_model->where(array('id_client' => $client->id, 'id_store' => $store->id))->get_all();
        if (is_array($air_conditioning)) {
            foreach ($air_conditioning as $key => $value) {
                $data['data'][] = array($value->id,
                    $client->name,
                    $store->name,
                    $value->name,
                    "Ar Condicionado",
                    $value->site,
                    "A");
            }
        }

        $eletrical_panel = $this->Eletrical_panel_model->where(array('id_client' => $client->id, 'id_store' => $store->id))->get_all();
        if (is_array($eletrical_panel)) {
            foreach ($eletrical_panel as $key => $value) {
                $data['data'][] = array($value->id,
                    $client->name,
                    $store->name,
                    $value->name,
                    "Quadro Elétrico",
                    $value->site,
                    "Q");
            }
        }

        $this->load->view('admin/listar_facilities', $data);
    }

    public function insert($id_store) {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        $store = $this->Stores_model->get($id_store);
        $data['id_store'] = $store->id;
        $data['store_name'] = $store->name;

        $client = $this->Clients_model->get($store->id_client);
        $data['id_client'] = $client->id;
        $data['client_name'] = $client->name;

        $data['functions']['save'] = true;
        $data['functions']['delete'] = false;
        $data['functions']['new'] = false;

        $this->load->view('admin/edit_facilities', $data);
    }

    public function get($typef = "", $id = "") {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        if (is_numeric($id) && ($typef == "A" || $typef == "Q")) {
            $input = $this->input->post();
            $data['message'] = "";

            if ($typef == "A") {
                $data = (array) $this->Air_conditioning_model->get($id);
            } elseif ($typef == "Q") {
                $data = (array) $this->Eletrical_panel_model->get($id);
            }

            $data['typef'] = $typef;

            $store = $this->Stores_model->get($data['id_store']);
            $data['store_name'] = $store->name;
            $data['id_store'] = $store->id;

            $client = $this->Clients_model->get($data['id_client']);
            $data['client_name'] = $client->name;
            $data['id_client'] = $client->id;

            $data['functions']['save'] = true;
            $data['functions']['delete'] = true;
            $data['functions']['new'] = true;

            $this->load->view('admin/edit_facilities', $data);
        } else {
            redirect('equipamentos/' . $id_client);
        }
    }

    public function save($id_store) {
        if (!$this->session->userdata('username')) {
            redirect('login');
            return false;
        }

        if ($this->input->post()) {
            $data = array();
            $input = $this->input->post();
            $data = $input;
            $data['message'] = "";
            $data['typef'] = $typef = $input['typef'];
            unset($input['typef']);

            // Check if update or insert
            if (is_numeric($input['id'])) {
                // Check if Air_conditioning or Eletrical_panal
                if ($typef == "A") {
                    $this->Air_conditioning_model->update($input, $input['id'], true);
                    $data['message'] = msg("Equipamento alterado com sucesso!", "success");
                } elseif ($typef == "Q") {
                    $this->Eletrical_panel_model->update($input, $input['id'], true);
                    $data['message'] = msg("Equipamento alterado com sucesso!", "success");
                }
            } else {
                // Check if Air_conditioning or Eletrical_panel
                if ($typef == "A") {
                    $id = $this->Air_conditioning_model->insert($input);
                    $data['id'] = $id;
                    $data['message'] = msg("Equipamento cadastrado com sucesso!", "success");
                } elseif ($typef == "Q") {
                    $id = $this->Eletrical_panel_model->insert($input);
                    $data['id'] = $id;
                    $data['message'] = msg("Equipamento cadastrado com sucesso!", "success");
                }
            }

            $store = $this->Stores_model->get($id_store);
            $data['store_name'] = $store->name;
            $data['id_store'] = $store->id;

            $client = $this->Clients_model->get($store->id_client);
            $data['client_name'] = $client->name;
            $data['id_client'] = $client->id;

            $data['functions']['new'] = true;
            $data['functions']['delete'] = true;
            $data['functions']['save'] = true;

            $this->load->view('admin/edit_facilities', $data);
        } else {
            redirect('equipamentos/' . $id_store . '/cadastrar');
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

            if ($input['typef'] == "A") {
                if (!$this->Air_conditioning_model->delete($input['id'])) {
                    redirect('clientes');
                } else {
                    $this->index($input['id_store'], msg("Equipamento excluído com sucesso!", "success"));
                }
            } elseif ($input['typef'] == "Q") {
                if (!$this->Eletrical_panel_model->delete($input['id'])) {
                    redirect('clientes');
                } else {
                    $this->index($input['id_store'], msg("Equipamento excluído com sucesso!", "success"));
                }
            }
        } else {
            redirect('lojas/' . $input['id_client']);
        }
    }

}
