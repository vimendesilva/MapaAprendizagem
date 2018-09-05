<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('security');
    }
    public function index() {
        
        $this->load->view('usu/includes/topo');
        //$this->load->view('usu/includes/menu');
        $this->load->view('usu/cadastro_usuario');
        $this->load->view('usu/includes/rodape');
    }

    public function cadastrar() {
        $this->load->model('usu/usuario_model');
        $data['nome'] = $this->input->post('nome');
        $data['email'] = $this->input->post('email');
        $data['senha'] = do_hash($this->input->post('senha'), 'MD5');

        $result = $this->usuario_model->insert('usuarios', $data);
        if ($result) {          
            $mensagem = array('msg' => 'insert-ok', 'tipo' => 'success');
            $this->session->set_flashdata('msg', $mensagem);
            redirect('usu/paginainicial/');
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
            $this->session->set_flashdata('msg', $mensagem);
            redirect('usu/paginainicial/');
        }
    }

     public function msg($alert) {
        $str = '';
        if ($alert == 1)
            $str = 'success- Mapa cadastrado com sucesso!';
        else if ($alert == 2)
            $str = 'danger-Não foi possível cadastrar o mapa. Por favor, tente novamente!';
        else if ($alert == 3)
            $str = 'success- Mapa removido com sucesso!';
        else if ($alert == 4)
            $str = 'danger-Não foi possível remover o mapa. Por favor, tente novamente!';
        elseif ($alert == 5)
            $str = 'success- Mapa atualizado com sucesso!';
        else if ($alert == 6)
            $str = 'danger-Não foi possível atualizar o mapa. Por favor, tente novamente!';
        else
            $str = null;
        return $str;
    }
}


