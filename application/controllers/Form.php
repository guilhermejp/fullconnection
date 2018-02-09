<?php

ini_set("upload_max_filesize", "1G");
ini_set("post_max_size", "1G");
ini_set("memory_limit", "1G");
ini_set('max_execution_time', 600);

defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Checklists_model');
        $this->load->model('Clients_model');
        $this->load->model('Stores_model');
        $this->load->model('Air_conditioning_model');
        $this->load->model('Eletrical_panel_model');
        $this->load->model('Receipts_model');
    }

    public function index() {
        
        $clients = $this->Clients_model->get_all();
        if(!is_object($clients)){
            log_message('debug', 'Form::index() - Nenhum cliente retornado');
        }
        $data['clients'] = $clients;

        $this->load->view('form', $data);
    }

    public function load_stores() {
        $data = "";
        if ($this->input->post()) {
            $input = $this->input->post();
            $stores = $this->Stores_model->where('id_client', $input['cliente'])->get_all();
            if (is_array($stores)) {
                foreach ($stores as $value) {
                    $data[] = array($value->id, $value->name);
                }
            }else{
                log_message('debug', 'Form::load_stores() - Sem lojas para apresentar do cliente: '.$input['cliente']);
            }
        }else{
            log_message('debug', 'Form::load_stores() - Chamada não foi contém POST');
        }
            
        echo json_encode($data);
    }

    public function load_facilities() {
        $data = "";
        if ($this->input->post()) {
            $input = $this->input->post();
            $air_cond = $this->Air_conditioning_model->where(array('id_client' => $input['cliente'], 'id_store' => $input['cidade']))->get_all();
            $panel = $this->Eletrical_panel_model->where(array('id_client' => $input['cliente'], 'id_store' => $input['cidade']))->get_all();
            $data['ac'] = $air_cond;
            $data['ep'] = $panel;
        }else{
            log_message('debug', 'Form::load_facilities() - Chamada não foi contém POST');
        }
        echo json_encode($data);
    }

    public function checklist() {
        if ($this->input->post()) {
            $input = $this->input->post();

            $input['cliente'] = ( $input['cliente'] == "" ? "nao_informado" : $input['cliente']);
            $input['datai'] = ( $input['datai'] == "" ? date("Y-m-d") : $input['datai']);
            $input['cidade'] = ( $input['cidade'] == "" ? "loja" : $input['cidade']);
            $input['os'] = ( $input['os'] == "" ? "OS" : $input['os']);

            $client = $this->Clients_model->get($input['cliente']);
            if(!$client){
                log_message('error', 'Form::checklist() - Erro ao obter o cliente ('.$input['cliente'].'): '.$this->db->db_debug);
            }
            $input['cliente'] = $client->name;
            $input['logo'] = $client->logo;
            $store = $this->Stores_model->get($input['cidade']);
            if(!$store){
                log_message('error', 'Form::checklist() - Erro ao obter a loja ('.$input['cidade'].'): '.$this->db->db_debug);
            }
            $input['cidade'] = $store->name;

            // Create token
            $datai = $input['datai'];
            $input['datai'] = date("d/m/Y", strtotime($input['datai']));
            $dataf = $input['dataf'];
            $input['dataf'] = date("d/m/Y", strtotime($input['dataf']));

            $date_start = date('Y-m-d ', strtotime($datai)) . $input['hora_inicial'];
            $date_end = date('Y-m-d ', strtotime($dataf)) . $input['hora_final'];
            // Token is necessary for manager access the checklist and approval
            $token = md5($client->id . $store->id . $input['os'] . $date_start . $date_end . date('YmdHis'));

            /* $caminho_arquivo = "files/" . $input['cliente'] . "/" . date("Y-m", strtotime($input['datai'])) . "/";
              $nome_arquivo = str_replace(" ", "-", $input['cliente']) .
              "_" . str_replace(" ", "-", $input['cidade'])
              . "_" . str_replace(" ", "-", $input['os'])
              . "_" . date("Y-m-d", strtotime($input['datai']));

              if (!is_dir($caminho_arquivo)) {
              mkdir($caminho_arquivo, 0750, true);
              } */
            /* if ($_FILES['assinatura_tecnico']['size'] > 0) {
              $config['upload_path'] = './assets/uploads/';
              $config['allowed_types'] = 'jpg|png|gif|bmp';
              $config['encrypt_name'] = TRUE;
              $config['max_size'] = 0;
              $this->upload->initialize($config);
              if ($this->upload->do_upload('assinatura_tecnico')) {
              $image_details = $this->upload->data();
              $input['assinatura_tecnico'] = $image_details['full_path'];
              }
              }

              if ($_FILES['assinatura_gerente']['size'] > 0) {
              $config['upload_path'] = './assets/uploads/';
              $config['allowed_types'] = 'jpg|png|gif|bmp';
              $config['encrypt_name'] = TRUE;
              $config['max_size'] = 0;
              $this->upload->initialize($config);
              if ($this->upload->do_upload('assinatura_gerente')) {
              $image_details = $this->upload->data();
              $input['assinatura_gerente'] = $image_details['full_path'];
              }
              } */

            $filesCount = count($_FILES['comprovante']['name']);

            $attach = "";
            for ($i = 0; $i <= $filesCount; $i++) {
                if (@$_FILES['comprovante']['size'][$i] > 0) {
                    $_FILES['comp']['name'] = $_FILES['comprovante']['name'][$i];
                    $_FILES['comp']['type'] = $_FILES['comprovante']['type'][$i];
                    $_FILES['comp']['tmp_name'] = $_FILES['comprovante']['tmp_name'][$i];
                    $_FILES['comp']['error'] = $_FILES['comprovante']['error'][$i];
                    $_FILES['comp']['size'] = $_FILES['comprovante']['size'][$i];
                    $config['upload_path'] = "files/";
                    $config['allowed_types'] = 'jpg|png|gif|bmp';
                    $config['max_size'] = 0;
                    //$config['encrypt_name'] = TRUE;
                    $config['file_name'] = $token . "_" . $i;
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('comp')) {
                        $image_details = $this->upload->data();
                        $attach[] = $config['upload_path'] . $image_details['file_name'];
                    }else{
                        log_message('debug', 'Form::checklist() - Erro ao efetuar o upload: '.$this->upload->display_errors());
                    }
                }else{
                    log_message('debug', 'Form::checklist() - Arquivo para upload está vazio');
                }
            }

            $tela = false;
        } else {
            log_message('debug', 'Form::checklist() - Chamada não foi contém POST');
            // Apenas para testes
            $input['datai'] = "99/99/9999";
            $input['dataf'] = "99/99/9999";
            $tela = true;
        }

        $this->load->library('pdfgenerator');

        $html = $this->load->view('checklist', $input, true);
        $filename = 'report_' . time();
        $pdf = $this->pdfgenerator->generate($html, $filename, $tela, 'A4', 'portrait');
        if(!$pdf){
            log_message('debug', 'Form::checklist() - Erro ao gerar o PDF (pdfgenerator->generate)');
        }

        $arq_saida = "files/" . $token . ".pdf";

        file_put_contents($arq_saida, $pdf);
        $attach[] = $arq_saida;

        $this->load->library('sendemail');
        //$this->sendemail->send_checklist_fullconnection($attach);  Cancelado o envio de e-mail por enquanto
        // Apagar as imagens com upload
        //@unlink($input['assinatura_tecnico']);
        //@unlink($input['assinatura_gerente']);
        if (isset($input['comprovante'])) {
            foreach (@$input['comprovante'] as $value) {
                @unlink($value);
            }
        }

        // Insert the checklist generate into database
        $insert = array('id_client' => $client->id,
            'id_store' => $store->id,
            'os' => $input['os'],
            'date_start' => $date_start,
            'date_end' => $date_end,
            'technicians' => $input['tecnicos'],
            'status' => 0,
            'file' => $arq_saida,
            'token' => $token);
        $checklist = $this->Checklists_model->insert($insert);
        if(!$checklist){
            log_message('error', 'Form::checklist() - Erro ao inserir checklist na base: '.$this->db->db_debug);
        }

        foreach ($attach as $value) {
            if (substr($value, -3) != "pdf") {
                if(!$this->Receipts_model->insert(array('id_checklist' => $checklist, 'file' => $value))){
                    log_message('error', 'Form::checklist() - Erro ao inserir comprovantes na base: '.$this->db->db_debug);
                }
            }
        }

        $data_email = array('manager_name' => $store->manager_name,
            'manager_email' => $store->manager_email,
            'os' => $input['os'],
            'client_name' => $client->name,
            'store_desc' => $store->name,
            'token' => $token);

        $this->sendemail->send_checklist_manager($attach, $data_email);

        //$this->load->view('email/manager',$data_email); return true;

        redirect(base_url('concluido'), 'refresh');
    }

    public function checklist_view() {
        if ($this->input->post()) {
            $input = $this->input->post();
        } else {
            $input['data'] = "99/99/9999";
        }

        $html = $this->load->view('checklist', $input);
    }

    public function concluido() {
        $html = $this->load->view('concluido');
    }

    /* private function sendEmail($attach) {
      $this->load->library('email');

      //         $config['protocol'] = "smtp";
      //          $config['smtp_host'] = "208.84.244.140";
      //          $config['smtp_user'] = "checklist@fullconnection.com.br";
      //          $config['smtp_pass'] = "senhapadrao1";
      //          $config['smtp_port'] = "587";
      $config['wordwrap'] = TRUE;
      $config['validate'] = TRUE;
      $config['mailtype'] = 'html';

      $this->email->initialize($config);
      $this->email->from('checklist@fullconnection.com.br', 'FullConnection Checklist');
      $this->email->to('amanda@agenciamplan.com.br', 'Amanda');
      $this->email->cc('demian@fullconnection.com.br', 'Demian');
      $this->email->bcc('guilherme@gcoder.com.br', 'Guilherme');
      //$this->email->to('guilherme@gcoder.com.br', 'Guilherme');
      $this->email->subject('Full Connection - Checklist');
      $this->email->message("Novo checklist em anexo!");
      if (is_array($attach)) {
      foreach ($attach as $value) {
      $this->email->attach($value);
      }
      }

      if (!$this->email->send()) {
      @file_put_contents("sistema.txt", date('d/m/Y H:i:s') . " => Erro ao enviar o e-mail: " . $data['email'] . " " . $this->email->print_debugger(), FILE_APPEND);
      return false;
      }

      return true;
      } */

    public function upload() {

        $input = $this->input->post();

        $input['cliente'] = ( $input['cliente'] == "" ? "nao_informado" : $input['cliente']);
        $input['datai'] = ( $input['datai'] == "" ? date("Y-m-d") : $input['datai']);
        $input['cidade'] = ( $input['cidade'] == "" ? "loja" : $input['cidade']);
        $input['os'] = ( $input['os'] == "" ? "os" : $input['os']);

        $caminho_arquivo = "files/" . $input['cliente'] . "/" . date("Y-m", strtotime($input['datai'])) . "/";
        $nome_arquivo = str_replace(" ", "-", $input['cliente']) .
                "_" . str_replace(" ", "-", $input['cidade'])
                . "_" . str_replace(" ", "-", $input['os'])
                . "_" . date("Y-m-d", strtotime($input['datai']));

        if (!is_dir($caminho_arquivo)) {
            mkdir($caminho_arquivo, 0750, true);
            log_message('debug', 'Form::upload() - Criado diretório:'.$caminho_arquivo);
        }

        if (@$_FILES['comprovante']['size'] > 0) {
            $_FILES['comp']['name'] = $_FILES['comprovante']['name'];
            $_FILES['comp']['type'] = $_FILES['comprovante']['type'];
            $_FILES['comp']['tmp_name'] = $_FILES['comprovante']['tmp_name'];
            $_FILES['comp']['error'] = $_FILES['comprovante']['error'];
            $_FILES['comp']['size'] = $_FILES['comprovante']['size'];
            $config['upload_path'] = "./" . $caminho_arquivo;
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 0;
            //$config['file_name'] = $nome_arquivo . "_comprovante_" . $i;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('comp')) {
                $image_details = $this->upload->data();
                echo json_encode(array("imagem" => $config['upload_path'] . $image_details['file_name'],
                    "retorno" => true));
                return true;
            }else{
                log_message('error', 'Form::upload() - Erro ao efetuar upload: '.$this->upload->display_errors());
            }
        }
        echo json_encode(array("retorno" => false, "tamanho" => $_FILES['comprovante']['size'], "error" => $this->upload->display_errors()));
        return false;
    }

}
