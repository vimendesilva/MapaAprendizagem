<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mapas extends CI_Controller {

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

    public function meus_mapas($codigo) {
        $this->validar_sessao();
        $this->load->model('admin/mapas_model');

        $data['mapas'] = $this->mapas_model->get_mapa($codigo);


        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/listamapas', $data);
        $this->load->view('admin/includes/rodape');
    }

    public function cadastro_mapas() {
        $this->validar_sessao();

        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/novomapa');
        $this->load->view('admin/includes/rodape');
    }

    public function salvar_mapa($id) {
        $this->validar_sessao();
        $this->load->model('admin/mapas_model');
        $data['nome'] = $this->input->post('nome');
        $data['usuarios_id'] = $id;

        $result = $this->mapas_model->insert('mapa', $data);
        if ($result) {
            redirect('admin/mapas/meus_mapas/' . $this->session->userdata('id'));
        } else {
            redirect('admin/mapas/meus_mapas/' . $this->session->userdata('id'));
        }
    }

    public function deletar($codigo) {
        $this->validar_sessao();
        $this->load->model('admin/mapas_model');
        $result = $this->mapas_model->delete('mapa', $codigo);
        if ($result) {
            redirect('admin/mapas/meus_mapas/' . $this->session->userdata('id'));
        } else {
            redirect('admin/mapas/meus_mapas/' . $this->session->userdata('id'));
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
