<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Checklists_model');
        $this->load->model('Clients_model');
        $this->load->model('Stores_model');
        $this->load->model('Receipts_model');
        $this->db->cache_off();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->library('session');
    }

    public function index($msg = "") {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Checklist::index() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        $data['message'] = $msg;
        $data['data'] = "";

        $checklists = $this->Checklists_model->order_by('create', 'DESC')->get_all();
        if (is_array($checklists)) {
            foreach ($checklists as $value) {
                $client = $this->Clients_model->get($value->id_client);
                $store = $this->Stores_model->get($value->id_store);

                $data['data'][] = array($value->id,
                    "<span style=\"display:none\">".$value->create."</span>".date('d/m/Y', strtotime($value->create)),
                    $client->name,
                    $store->name,
                    $value->os,
                    $value->technicians,
                    $value->status,
                    date('d/m/Y H:i:s', strtotime($value->update)));
            }
        } else {
            log_message('error', 'Checklist::index() - Não há checklists a listar, ou erro: ' . $this->db->db_debug);
        }

        $this->load->view('admin/listar_checklist', $data);
    }

    public function approval($token = "") {
        if ($token != "") {
            $checklist = $this->Checklists_model->where('token', $token)->get();
            $checklist->date_start = date("d/m/Y H:i:s", strtotime($checklist->date_start));
            $checklist->date_end = date("d/m/Y H:i:s", strtotime($checklist->date_end));

            $store = $this->Stores_model->get($checklist->id_store);
            if (!$store) {
                log_message('error', 'Checklist::approval() - Erro ao obter a loja (' . $checklist->id_store . '): ' . $this->db->db_debug);
            }
            $data = $checklist;
            $data->manager_name = $store->manager_name;
            if ($checklist->status == '0') {
                $this->load->view('approval', $data);
            } else {
                $this->load->view('approved', $data);
            }
        } else {
            log_message('error', 'Checklist::approval() - Token deve ser preenchido, acesso indevido!');
        }
    }

    public function approval_confirm() {
        if ($this->input->post()) {
            $input = $this->input->post();
            // Get checklist by token
            $checklist = $this->Checklists_model->where('token', $input['token'])->get();
            if (!$checklist) {
                log_message('error', 'Checklist::approval_confirm() - Erro ao obter o checklist com token(' . $input['token'] . '): ' . $this->db->db_debug);
            }
            $store = $this->Stores_model->get($checklist->id_store);
            $client = $this->Clients_model->get($checklist->id_client);
            if (!$store) {
                log_message('error', 'Checklist::approval_confirm() - Erro ao obter o a loja (' . $checklist->id_store . '): ' . $this->db->db_debug);
            }

            $input['manager_email'] = $store->manager_email;
            $input['os'] = $checklist->os;
            $input['manager_name'] = $store->manager_name;
            $input['technicians'] = $checklist->technicians;
            $input['date_start'] = date("d/m/Y H:i:s", strtotime($checklist->date_start));
            $input['date_end'] = date("d/m/Y H:i:s", strtotime($checklist->date_end));
            $input['date_approval'] = date("d/m/Y H:i:s");
            $input['ip_approval'] = @$_SERVER['REMOTE_ADDR'];

            // Generate pdf temporary
            $this->load->library('pdfgenerator');

            $html = $this->load->view('checklist_approval', $input, true);
            $filename = 'report_' . time();
            $pdf = $this->pdfgenerator->generate($html, $filename, false, 'A4', 'portrait');
            if(!$pdf){
                log_message('error', 'Checklist::approval_confirm() - Erro ao gerar PDF de autorização >pdfgenerator->generate ');
            }

            $arq_saida1 = 'files/' . $checklist->token . "_temp.pdf";
            $arq_saida2 = 'files/' . $checklist->token . ".pdf";
            file_put_contents($arq_saida1, $pdf);

            // Concat pdfs
            $this->load->library('concat_pdf');
            $this->concat_pdf->setFiles(array($arq_saida2, $arq_saida1));
            $this->concat_pdf->concat();
            if(!$this->concat_pdf->Output($arq_saida2)){
                log_message('error', 'Checklist::approval_confirm() - Erro ao concatenar os PDFs output');
            }

            // Alter status
            if(!$this->Checklists_model->where('token', $input['token'])->update(array('status' => '1'))){
                log_message('error', 'Checklist::approval_confirm() - Erro ao atualizar o status do checklist, token ('.$input['token'].'): '. $this->db->db_debug);
            }

            // Send e-mail to Demian with checklist approved
            $data_email = array('manager_name' => $store->manager_name,
                'os' => $checklist->os,
                'client' => $client->name,
                'store' => $store->name);

            // Attach
            $attach[] = $checklist->file;
            $receipts = $this->Receipts_model->where('id_checklist', $checklist->id)->get_all();
            if (is_array($receipts)) {
                foreach ($receipts as $value) {
                    $attach[] = $value->file;
                }
            }
            $this->load->library('sendemail');
            $this->sendemail->send_checklist_fullconnection($data_email, $attach);
            
            $data['os'] = $checklist->os;
            $this->load->view('approved', $data);
        } else {
            log_message('error', 'Checklist::approval_confirm() - Acesso indevido sem POST!');
        }
    }

    public function resend_approval() {
        if ($this->input->post()) {
            $input = $this->input->post();
            // Get checklist by token
            $checklist = $this->Checklists_model->get($input['id']);
            if(!$checklist){
                log_message('error', 'Checklist::resend_approval() - Erro obter o checklist ('.$input['id'].'): '. $this->db->db_debug);
            }
            $store = $this->Stores_model->get($checklist->id_store);
            if(!$store){
                log_message('error', 'Checklist::resend_approval() - Erro obter a loja ('.$checklist->id_store.'): '. $this->db->db_debug);
            }
            $client = $this->Clients_model->get($checklist->id_client);
            if(!$client){
                log_message('error', 'Checklist::resend_approval() - Erro obter o cliente ('.$checklist->id_client.'): '. $this->db->db_debug);
            }

            $data_email = array('manager_name' => $store->manager_name,
                'manager_email' => $store->manager_email,
                'os' => $checklist->os,
                'client_name' => $client->name,
                'store_desc' => $store->name,
                'token' => $checklist->token);

            $this->load->library('sendemail');
            $this->sendemail->send_checklist_manager(array($checklist->file), $data_email);

            $this->index(msg("E-mail enviado para " . $store->manager_name . " - " . $store->manager_email, "success", 5));
        } else {
            log_message('error', 'Checklist::approval_confirm() - Acesso indevido sem POST!');
        }
        redirect('checklists');
    }

    public function load_files() {
        if (!$this->session->userdata('username')) {
            log_message('error', 'Checklist::load_files() - Tentativa de acesso sem efetuar login!');
            redirect('login');
            return false;
        }

        if ($this->input->post()) {
            $input = $this->input->post();
            $checklist = $this->Checklists_model->get($input['id']);
            $receipts = $this->Receipts_model->where('id_checklist', $input['id'])->get_all();

            $data['checklist'] = $checklist->file;

            if (is_array($receipts)) {
                foreach ($receipts as $value) {
                    $data['receipts'][] = $value->file;
                }
            } else {
                log_message('error', 'Checklist::load_files() - Não há comprovantes a listar, ou erro: ' . $this->db->db_debug);
            }

            echo json_encode($data);
            return true;
        } else {
            log_message('error', 'Checklist::approval_confirm() - Acesso indevido sem POST!');
        }
    }

}
