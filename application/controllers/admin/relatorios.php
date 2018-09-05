<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

    public function validar_sessao() {
        if (!$this->session->userdata('LOGADO')) {
            redirect('usu/paginainicial');
        }
        return true;
    }

    public function index($alert = null) {

        $this->validar_sessao();

        $data = null;
        if ($alert != null)
            $data['alert'] = $this->msg($alert);

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/relatorios', $data);
        $this->load->view('admin/includes/rodape');
    }

    public function dados($id) {

        $this->validar_sessao();

        $this->load->model('admin/mapas_model');
        $data['mapas'] = $this->mapas_model->get_mapa($id);

        $this->load->model('admin/questionario_model');
        $data['dimensoes'] = $this->questionario_model->get_dimensoes();

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/relatorios', $data);
        $this->load->view('admin/includes/rodape');
    }

    public function mostra_relatorio() {
        $this->load->model('admin/validacao_model');
        $id_usuario = $this->input->post('usuario');
        $dimensao = $this->input->post('dimensoes');
        $mapa = $this->input->post('mapas');

        $result = $this->validacao_model->get_dados_relatorio($id_usuario, $dimensao, $mapa);
        
        $data = array();
        foreach ($result as $r) {
            $data[] = array($r['modelo_perguntas_id'], $r['resposta']);
        }
        //var_dump($data);
        
        // Carregamos a library PHPlot
        $this->load->library('PHPlot');
        //Definindo os dados do gráfico
        $this->phplot->SetDataValues($data);
        //Imprimindo o gráfico na tela
        $this->phplot->DrawGraph();
        
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
