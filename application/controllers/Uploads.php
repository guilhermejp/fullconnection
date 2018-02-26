<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->library('session');
    }

    public function index($msg = "") {
        $pasta = 'assets/teste/';
        $arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp}", GLOB_BRACE);
        $data['files'] = "";
        foreach ($arquivos as $img) {
            $data['files'][] = $img;
        }

        $this->load->view('uploads', $data);
    }

    public function save() {
        // Check if exists image to upload
        $filesCount = count($_FILES['comprovante']['name']);

        for ($i = 0; $i <= $filesCount; $i++) {
                if (@intval($_FILES['comprovante']['size'][$i]) > 0) {
                    $_FILES['comp']['name'] = $_FILES['comprovante']['name'][$i];
                    $_FILES['comp']['type'] = $_FILES['comprovante']['type'][$i];
                    $_FILES['comp']['tmp_name'] = $_FILES['comprovante']['tmp_name'][$i];
                    $_FILES['comp']['error'] = $_FILES['comprovante']['error'][$i];
                    $_FILES['comp']['size'] = $_FILES['comprovante']['size'][$i];
                    $config['upload_path'] = "assets/teste/";
                    $config['allowed_types'] = 'jpg|png|gif|bmp';
                    $config['max_size'] = 0;
                    //$config['encrypt_name'] = TRUE;
                    $config['file_name'] = date('d-m-Y H-m-s ').$_FILES['comp']['name'];
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('comp')) {
                        $image_details = $this->upload->data();
                        $attach[] = $config['upload_path'] . $image_details['file_name'];
                    }else{
                        print_r($this->upload->display_errors());
                        exit();
                    }
                }
            }

        redirect('uploads');
    }
    
    public function limpar() {
        $pasta = 'assets/teste/';
        $arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp}", GLOB_BRACE);
        $data['files'] = "";
        foreach ($arquivos as $img) {
            unlink($img);
        }

        redirect('uploads');
    }

    private function upload_file($name_file) {
        if ($_FILES[$name_file]['size'] > 0) {
            $this->load->library('upload');
            $config['upload_path'] = './assets/teste/';
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 2048; // max 2MB
            // Instanciar a classe upload, não está no autoload nem na construct para evitar sobrecarga inútil
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($name_file)) {
                return $this->upload->display_errors();
            } else {
                print_r($this->upload->display_errors());
                exit();
            }
        } else {
            echo "tamanho veio zerado";
            exit();
        }
    }

}
