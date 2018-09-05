<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acesso extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->helper('security');
    }
	public function validar_sessao() {
		if (!$this->session->userdata('LOGADO')) {
			redirect('usu/paginainicial');
		}
		return true;
	}
	
	public function index() {
		
		if ($this->validar_sessao()) {
			$this->load->view('admin/includes/topo');
			$this->load->view('admin/includes/menu');
			$this->load->view('admin/painelview');
			$this->load->view('admin/includes/rodape');
		} else {
			redirect('usu/paginainicial');
		}
	}
	
	public function login($alert = null) {
		if ($this->session->userdata('LOGADO'))
			redirect('admin');
			$dados = null;
			if ($alert != null)
				$dados['alert'] = $this->msg($alert);
				$this->load->view('usu/paginainicial', $dados);
	}
	
	public function logar() {
		
		$this->load->model('admin/acesso_model');
		
		$email = $this->input->post('email');
		$senha = do_hash($this->input->post('senha'), 'MD5');
		$usuario = $this->acesso_model->logar($email, $senha);
		
		if (count($usuario) === 1) {
			$dados['id'] = $usuario[0]->id;
			$dados['nome'] = $usuario[0]->nome;
			$dados['LOGADO'] = TRUE;
			
			$this->session->set_userdata($dados);
			redirect("admin/acesso");
		} else {
                        $mensagem = array('msg' => 'login', 'tipo' => 'danger');
			$this->session->set_flashdata('msg', $mensagem);
			redirect("usu/paginainicial/");
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect("usu/Paginainicial");
	}
	
	public function configuracoes() {
		$this->validar_sessao();
		
		$this->load->view('admin/includes/topo');
		$this->load->view('admin/includes/menu');
		$this->load->view('admin/configuracoesview');
		$this->load->view('admin/includes/rodape');
		
	}
	
	public function msg($alert) {
		$str = '';
		if ($alert == 1)
			$str = 'success- Login realizado com sucesso!';
			else if ($alert == 2)
				$str = 'danger-Não foi possível entrar. Verifique o email e a senha e tente novamente!';
				else
					$str = null;
					return $str;
	}
	
}

