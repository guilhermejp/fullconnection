<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Clients_model');
        $this->load->model('Stores_model');
        $this->load->model('Air_conditioning_model');
        $this->load->model('Eletrical_panel_model');
        $this->db->cache_off();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->library('session');
    }

    public function index($msg = "") {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Clients::index() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        $data['message'] = $msg;
        $data['data'] = "";

        $clients = $this->Clients_model->get_all();
        if (is_array($clients)) {
            foreach ($clients as $key => $value) {
                $where = array('id_client' => $value->id);

                $data['data'][] = array($value->id,
                    $value->name,
                    $this->Stores_model->count($where),
                    $this->Air_conditioning_model->count($where) + $this->Eletrical_panel_model->count($where),
                    $value->logo);
            }
        } else {
            log_message('debug', 'Client::index() - Não há clientes a listar ou erro: ' . $this->db->db_debug);
        }

        $this->load->view('admin/listar_clientes', $data);
    }

    public function insert() {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Clients::insert() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        $data['functions']['save'] = true;
        $data['functions']['delete'] = false;
        $data['functions']['new'] = false;

        $this->load->view('admin/edit_clients', $data);
    }

    public function get($id) {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Clients::get() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        if (is_numeric($id)) {
            $input = $this->input->post();
            $data['message'] = "";

            $data = (array) $this->Clients_model->get($id);
            if (!$data) {
                log_message('error', 'Clients::get() - Erro ao obter o cliente (' . $id . ') :' . $this->db->db_debug);
            }

            $data['functions']['save'] = true;
            $data['functions']['delete'] = true;
            $data['functions']['new'] = true;

            $this->load->view('admin/edit_clients', $data);
        } else {
            redirect('clientes');
        }
    }

    public function save() {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Clients::save() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        if ($this->input->post()) {

            $data = array();
            $input = $this->input->post();
            $data = $input;
            $data['message'] = "";

            // Check if exists fc_temp_logo_ar
            if(!isset($input['temp_only_ar'])){
                $input['temp_only_ar'] = 0;
            }

            // Check if exists image to upload
            if ($image_detail = $this->upload_file('logo')) {
                if (is_array($image_detail)) {
                    $data['logo'] = $input['logo'] = "assets/logo/" . $image_detail['file_name'];
                } else {
                    $data['logo'] = $input['logo_temp'];
                    unset($input['logo']);
                    $data['message'] = msg($image_detail, 'error');
                }
            } else {
                $data['logo'] = $input['logo_temp'];
                unset($input['logo']);
            }
            unset($input['logo_temp']);

            if (is_numeric($input['id'])) {
                if(!$this->Clients_model->update($input, $input['id'], true)){
                    log_message('error', 'Clients::save() - Erro ao atualizar o cliente ('.$input['id'].'):' . $this->db->db_debug);
                }
                $data['message'] = ($data['message'] == "" ? msg("Cliente alterado com sucesso!", "success") : $data['message']);
            } else {
                $id = $this->Clients_model->insert($input);
                if (!$id) {
                    log_message('error', 'Clientes::save() - Erro ao inserir o cliente:' . $this->db->db_debug);
                }
                $data['id'] = $id;
                $data['message'] = ($data['message'] == "" ? msg("Cliente cadastrado com sucesso!", "success") : $data['message']);
            }

            $data['functions']['new'] = true;
            $data['functions']['delete'] = true;
            $data['functions']['save'] = true;

            $this->load->view('admin/edit_clients', $data);
        } else {
            log_message('error', 'Clients::save() - Acesso indevido sem POST!');
            redirect('clientes/cadastrar');
        }
    }

    public function delete() {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Clients::delete() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        if ($this->input->post()) {
            $input = $this->input->post();
            $data['message'] = "";

            // Check if exists stores before delete
            $where = array('id_client' => $input['id']);
            if ($this->Stores_model->count($where) > 0) {
                log_message('error', 'Clients::delete() - Existem lojas vinculadas a este clientes que devem ser excluidas primeiro ('.$input['id'].'):' . $this->db->db_debug);
                $this->index(msg("Existem lojas vinculadas a este clientes que devem ser excluidas primeiro!", "error", 5));
            } else {

                $where = array('id_client' => $input['id']);
                if ($this->Stores_model->count($where) > 0) {
                    log_message('error', 'Clients::delete() - Não é possível excluir o cliente pois existem checklists vinculados a ele ('.$input['id'].'):' . $this->db->db_debug);
                    $this->index(msg("Não é possível excluir o cliente pois existem checklists vinculados a ele!", "error", 5));
                } else {
                    if (!$this->Clients_model->delete($input['id'])) {
                        redirect('clientes');
                    } else {
                        log_message('error', 'Clients::delete() - Erro ao remover o cliente ('.$input['id'].'):' . $this->db->db_debug);
                        $this->index(msg("Cliente excluído com sucesso!", "success"));
                    }
                }
            }
        } else {
            log_message('error', 'Clients::delete() - Acesso indevido sem POST!');
            redirect('clientes');
        }
    }

    private function upload_file($name_file) {
        if ($_FILES[$name_file]['size'] > 0) {
            $this->load->library('upload');
            $config['upload_path'] = './assets/logo/';
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 2048; // max 2MB
            // Instanciar a classe upload, não está no autoload nem na construct para evitar sobrecarga inútil
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($name_file)) {
                return $this->upload->display_errors();
            } else {
                log_message('error', 'Clients::upload_file() - Erro ao salvar logo do cliente: ' . $this->upload->display_errors());
                return $this->upload->data();
            }
        } else {
            log_message('error', 'Clients::upload_file() - Logo a ser salva está com tamanho zerado.');
            return false;
        }
    }

}
