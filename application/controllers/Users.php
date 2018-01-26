<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
        $this->db->cache_off();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->library('session');
    }

    public function login() {
        $this->session->unset_userdata('username');

        $this->load->view('admin/login');
    }
    
    public function logon(){
            
            $this->session->unset_userdata('username');
            $data['message'] = "";

            if($this->input->post()){
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->Users_model->get(array('user' => $username, 'password' => sha1(md5($password))));

                if(isset($user->status) && $user->status == "1"){
                    $this->session->set_userdata('username',$user->user);
                    redirect('dashboard');
                }else if(isset($user->status) && $user->status == "0"){
                    $data['message'] = "Usuário não está ativo!";
                    $data['return'] = false;
                    $this->load->view('admin/login',$data);
                }else{
                    $data['message'] = "Usuário e/ou senha Inválidos";
                    $data['return'] = false;
                    $this->load->view('admin/login',$data);
                }
            }

        }
        
        public function senha($codigo=""){
            $this->session->unset_userdata('username');
            
            if($codigo == ""){
                redirect('users/login'); return false;
            }else{
                echo sha1(md5($codigo));
            }
	}

}
