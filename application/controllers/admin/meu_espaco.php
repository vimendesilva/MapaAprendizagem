<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Meu_espaco extends CI_Controller {

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
