<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paginainicial extends CI_Controller {

    public function index() {
        $this->load->view('usu/includes/topo');
        $this->load->view('usu/includes/menu');
        $this->load->view('usu/paginainicialview');
        $this->load->view('usu/includes/rodape');
    }

}
