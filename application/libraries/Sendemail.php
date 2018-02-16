<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail {

    private $CI;
    
    function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->library('email');
        
        $config['wordwrap'] = TRUE;
        $config['validate'] = TRUE;
        $config['mailtype'] = 'html';
        
        $this->CI->email->initialize($config);
        
        $this->CI->email->from('checklist@fullconnection.com.br', 'FullConnection Checklist');
        
    }

    function send_checklist_fullconnection($data, $attach="") {

        //$this->CI->email->to('amanda@agenciamplan.com.br', 'Amanda');
        $this->CI->email->to('demian@fullconnection.com.br', 'Demian');
        $this->CI->email->bcc('guilherme@gcoder.com.br', 'Guilherme');
        //$this->CI->email->to('guilherme@gcoder.com.br', 'Guilherme');
        $this->CI->email->subject('Full Connection - Checklist');
        $this->CI->email->message("Cliente:".$data['client']
                . "<br>Loja:".$data['store']
                . "<br>OS:".$data['os']
                . "<br>Gerente:".$data['manager_name']
                . "<br>Status: APROVADO"
                . "<br>Checklist em anexo!");
        if (is_array($attach)) {
            foreach ($attach as $value) {
                $this->CI->email->attach($value);
            }
        }

        if (!$this->CI->email->send()) {
            log_message('error', 'Sendemail::send_checklist_fullconnection() - Erro ao enviar o e-mail: '.preg_replace( "/\r|\n/", "<br>", $this->CI->email->print_debugger()));
            return false;
        }

    }
    
    /*
     * data = array(    'manager_name'
     *                  'os'
     *                  'client_name'
     *                  'store_desc'
     *                  'token'
     */
    function send_checklist_manager($attach, $data) {

        $this->CI->email->from('checklist@fullconnection.com.br', 'FullConnection Checklist');
        $this->CI->email->to($data['manager_email'],$data['manager_name']);
        //$this->CI->email->cc('demian@fullconnection.com.br', 'Demian');
        //$this->CI->email->bcc('guilherme@gcoder.com.br', 'Guilherme');
        //$this->CI->email->to('guilherme@gcoder.com.br', 'Guilherme');
        $this->CI->email->subject('Full Connection - Checklist');
        
        $this->CI->email->message($this->CI->load->view('email/manager',$data, TRUE));
        
        if (is_array($attach)) {
            foreach ($attach as $value) {
                $this->CI->email->attach($value);
            }
        }

        if (!$this->CI->email->send()) {
            log_message('error', 'Sendemail::send_checklist_manager() - Erro ao enviar o e-mail: '.preg_replace( "/\r|\n/", "<br>", $this->CI->email->print_debugger(array('headers'))));
            return false;
        }

    }
    
}
