<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	
	
	public function insert($tabela, $data) {
		$result = $this->db->insert($tabela, $data);
		return $result;
	}
	
	/*public function update($tabela, $data, $codigo) {
		$this->db->where('cod_noticia', $codigo);
		$result = $this->db->update($tabela, $data);
		return $result;
	}
	
	public function delete($tabela, $codigo) {
		$this->db->where('cod_noticia', $codigo);
		$result = $this->db->delete($tabela);
		return $result;
	}*/
	
}


