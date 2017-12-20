<?php

ini_set("upload_max_filesize", "2056M");
ini_set("post_max_size", "2056M");
ini_set("memory_limit", "2056M");
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
    public function index() {
        $this->load->view('form');
    }

    public function checklist() {
        if ($this->input->post()) {
            $input = $this->input->post();

            $input['cliente'] = ( $input['cliente'] == "" ? "nao_informado" : $input['cliente']);
            $input['datai'] = ( $input['datai'] == "" ? date("Y-m-d") : $input['datai']);
            $input['cidade'] = ( $input['cidade'] == "" ? "loja" : $input['cidade']);
            $input['os'] = ( $input['os'] == "" ? "os" : $input['os']);
            
            $caminho_arquivo = "checklists/".$input['cliente']."/".date("Y-m", strtotime($input['datai']))."/";
            $nome_arquivo = str_replace(" ","-",$input['cliente']).
                    "_".str_replace(" ","-",$input['cidade'])
                    ."_".str_replace(" ","-",$input['os'])
                    ."_".date("Y-m-d", strtotime($input['datai']));
            
            if(!is_dir($caminho_arquivo)){
                mkdir($caminho_arquivo, 0750, true);
            }
            if ($_FILES['assinatura_tecnico']['size'] > 0) {
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|png|gif|bmp';
                $config['encrypt_name'] = TRUE;
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
                $this->upload->initialize($config);
                if ($this->upload->do_upload('assinatura_gerente')) {
                    $image_details = $this->upload->data();
                    $input['assinatura_gerente'] = $image_details['full_path'];
                }
            }

            $filesCount = count($_FILES['comprovante']['name']);

            $attach = "";
            for ($i = 0; $i <= $filesCount; $i++) {
                if (@$_FILES['comprovante']['size'][$i] > 0) {
                    $_FILES['comp']['name'] = $_FILES['comprovante']['name'][$i];
                    $_FILES['comp']['type'] = $_FILES['comprovante']['type'][$i];
                    $_FILES['comp']['tmp_name'] = $_FILES['comprovante']['tmp_name'][$i];
                    $_FILES['comp']['error'] = $_FILES['comprovante']['error'][$i];
                    $_FILES['comp']['size'] = $_FILES['comprovante']['size'][$i];
                    $config['upload_path'] = "./".$caminho_arquivo;
                    $config['allowed_types'] = 'jpg|png|gif|bmp';
                    //$config['encrypt_name'] = TRUE;
                    $config['file_name'] = $nome_arquivo."_comprovante_".$i;
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('comp')) {
                        $image_details = $this->upload->data();
                        $attach[] = $config['upload_path'] . $image_details['file_name'];
                    }
                }
            }

            $tela = false;
        } else {
            // Apenas para testes
            $input['datai'] = "99/99/9999";
            $input['dataf'] = "99/99/9999";
            $tela = true;
        }

        $input['datai'] = date("d/m/Y", strtotime($input['datai']));
        $input['dataf'] = date("d/m/Y", strtotime($input['dataf']));
        $input['data_aceite'] = date("d/m/Y", strtotime($input['data_aceite']));

        $this->load->library('pdfgenerator');

        $html = $this->load->view('checklist', $input, true);
        $filename = 'report_' . time();
        $pdf = $this->pdfgenerator->generate($html, $filename, $tela, 'A4', 'portrait');

        $arq_saida = $caminho_arquivo.$nome_arquivo.".pdf";
        file_put_contents($arq_saida, $pdf);
        $attach[] = $arq_saida;
        $this->sendEmail($attach);

        // Apagar as imagens recebidas
        @unlink($input['assinatura_tecnico']);
        @unlink($input['assinatura_gerente']);
        if (isset($input['comprovante'])) {
            foreach (@$input['comprovante'] as $value) {
                @unlink($value);
            }
        }

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

    private function sendEmail($attach) {
        $this->load->library('email');

        /* $config['protocol'] = "smtp";
          $config['smtp_host'] = "208.84.244.140";
          $config['smtp_user'] = "checklist@fullconnection.com.br";
          $config['smtp_pass'] = "senhapadrao1";
          $config['smtp_port'] = "587"; */
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
    }

}
