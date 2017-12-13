<?php

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

            $input['data'] = date("d/m/Y", strtotime($input['data']));
            $input['data_aceite'] = date("d/m/Y", strtotime($input['data_aceite']));

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

            for ($i = 0; $i <= $filesCount; $i++) {
                if (@$_FILES['comprovante']['size'][$i] > 0) {
                    $_FILES['comp']['name'] = $_FILES['comprovante']['name'][$i];
                    $_FILES['comp']['type'] = $_FILES['comprovante']['type'][$i];
                    $_FILES['comp']['tmp_name'] = $_FILES['comprovante']['tmp_name'][$i];
                    $_FILES['comp']['error'] = $_FILES['comprovante']['error'][$i];
                    $_FILES['comp']['size'] = $_FILES['comprovante']['size'][$i];
                    $config['upload_path'] = './assets/uploads/';
                    $config['allowed_types'] = 'jpg|png|gif|bmp';
                    $config['encrypt_name'] = TRUE;
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('comp')) {
                        $image_details = $this->upload->data();
                        $input['comprovante'][] = $image_details['full_path'];
                    }
                }
            }

            $tela = false;
        } else {
            // Apenas para testes
            $input['data'] = "99/99/9999";
            $tela = true;
        }

        $this->load->library('pdfgenerator');

        $html = $this->load->view('checklist', $input, true);
        $filename = 'report_' . time();
        $pdf = $this->pdfgenerator->generate($html, $filename, $tela, 'A4', 'portrait');

        $arq_saida = "pdf/saida.pdf";
        file_put_contents($arq_saida, $pdf);
        $this->sendEmail($arq_saida);

        // Apagar as imagens recebidas
        unlink($input['assinatura_tecnico']);
        unlink($input['assinatura_gerente']);
        foreach (@$input['comprovante'] as $value) {
            unlink($value);
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

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.ipage.com";
        $config['smtp_user'] = "noreply@gcoder.com.br";
        $config['smtp_pass'] = "noReplay@2018";
        $config['smtp_port'] = "587";
        $config['wordwrap'] = TRUE;
        $config['validate'] = TRUE;
        $config['mailtype'] = 'html';

        $this->email->initialize($config);
        $this->email->from('noreply@gcoder.com.br', 'Gcoder');
        $this->email->to('guilherme@gcoder.com.br', 'Guilherme Silva');
        $this->email->subject('Full Connection - Novo Checklist');
        $this->email->message("Novo checklist em anexo!");
        $this->email->attach($attach);

        if (!$this->email->send()) {
            @file_put_contents("sistema.txt", date('d/m/Y H:i:s') . " => Erro ao enviar o e-mail: " . $data['email'] . " " . $this->email->print_debugger(), FILE_APPEND);
            return false;
        }

        return true;
    }

}
