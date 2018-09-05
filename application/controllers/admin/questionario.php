<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Questionario extends CI_Controller {

    public function validar_sessao() {
        if (!$this->session->userdata('LOGADO')) {
            redirect('usu/paginainicial');
        }
        return true;
    }

    public function index($alert = null) {
        $this->validar_sessao();

        if ($alert != null)
            $data['alert'] = $this->msg($alert);

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/meu_espaco');
        $this->load->view('admin/includes/rodape');
    }

    //Seleciona todos os mapas para iniciar a validacao
    public function mapa() {
        $this->validar_sessao();
        $usu = $this->session->userdata('id');
        
        $this->load->model('admin/mapas_model', 'mapa');
        $data['mapas'] = $this->mapa->get_mapa($usu);
        $data['dimensao'] = 0;

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/nova_validacao', $data);
        $this->load->view('admin/includes/rodape');
    }

    /*
    public function perguntas($id) {
        $this->validar_sessao();

        $this->load->model('admin/questionario_model', 'dimensoes');
        $data['dimensoes'] = $this->dimensoes->get_dimensoes();

        $this->load->model('admin/questionario_model', 'perguntas');
        $data['perguntas'] = $this->perguntas->get_perguntas($id);
        
        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/formulario_validacao', $data);
        $this->load->view('admin/includes/rodape');
    }*/
    
    //Constroi os dados para a primeira tela de validacao, com a primeira dimensao e
    //o mapa escolhido
    public function dimensoes_mapas($dimensao){
        $this->validar_sessao();
        $this->load->model('admin/questionario_model');
        $data['mapa'] = $this->input->post('mapas');
        
        $this->load->model('admin/questionario_model', 'dimensoes');
        $data['nome_dimensao'] = $this->dimensoes->nome_dimensao($dimensao+1);
        
        $this->load->model('admin/questionario_model', 'perguntas');
        $data['perguntas'] = $this->perguntas->get_perguntas($dimensao+1);
        
        $data['dimensao'] = $dimensao+1;
        
        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/formulario_validacao', $data);
        $this->load->view('admin/includes/rodape');
    }
    
    //Constroi os dados para a continuacao da validacao, com a proxima dimensao e
    //o mapa escolhido
    public function carrega($dimensao,$mapa){
        $this->validar_sessao();
        $this->load->model('admin/questionario_model');
        $data['mapa'] = $mapa;
        
        $this->load->model('admin/questionario_model', 'dimensoes');
        $data['nome_dimensao'] = $this->dimensoes->nome_dimensao($dimensao+1);
        
        $this->load->model('admin/questionario_model', 'perguntas');
        $data['perguntas'] = $this->perguntas->get_perguntas($dimensao+1);
        
        $data['dimensao'] = $dimensao+1;
        
        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/formulario_validacao', $data);
        $this->load->view('admin/includes/rodape');
    }
    
    //Salva os dados vindos do questionario da validacao
    public function salvar($dimensao) {
        $this->validar_sessao();
        $cont = $this->input->post('cont');
        $i = 1;
        
        //while feito para colocar todas as respostas no banco de dados, cada uma em 
        //uma linha do banco
        while($i <= $cont){
            $this->load->model('admin/questionario_model');
            $data['mapa_id'] = $this->input->post('mapa');
            $data['mapa_usuarios_id'] = $this->input->post('usuario');
            $data['modelo_versao_id'] = 1;
            $data['modelo_dimensoes_id'] = $dimensao;
            $data['modelo_perguntas_id'] = $this->input->post('pergunta'.$i);
            $data['resposta'] = $this->input->post('check'.$i);
            $this->questionario_model->insert('validacao', $data);
            $i++;
        }
        
        $nova_dimensao = $dimensao++;
        $mapa = $this->input->post('mapa');

        if($nova_dimensao < 8){
            redirect('admin/questionario/carrega/' . $nova_dimensao  . '/' . $mapa);
        }
        else{
            redirect('admin/meu_espaco');
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
