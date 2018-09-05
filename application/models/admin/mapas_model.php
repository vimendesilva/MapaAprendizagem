<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mapas_model extends CI_Model {
	

        public function get_mapa($codigo) {
                $this->db->where('usuarios_id', $codigo);
		$result = $this->db->get('mapa')->result();
		return $result;
	}

	public function insert($tabela, $data) {
		$result = $this->db->insert($tabela, $data);
		return $result;
	}
	
	public function update($tabela, $data, $codigo) {
		$this->db->where('id', $codigo);
		$result = $this->db->update($tabela, $data);
		return $result;
	}
	
	public function delete($tabela, $codigo) {
		$this->db->where('id', $codigo);
		$result = $this->db->delete($tabela);
		return $result;
	}
	
}
