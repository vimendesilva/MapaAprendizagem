<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Questionario_model extends CI_Model {
	
        public function get_dimensoes() {
		$result = $this->db->get('dimensoes')->result();
		return $result;
	}
        
        public function get_perguntas($id) {      
                $this->db->select('perguntas.nome_pergunta, dimensoes.id, perguntas.id_pergunta');
		$this->db->join('modelo', 'perguntas.id_pergunta = modelo.perguntas_id', 'inner');
                $this->db->join('dimensoes', 'modelo.dimensoes_id = dimensoes.id', 'inner');
                $this->db->where('dimensoes.id', $id);
		$result = $this->db->get('perguntas')->result();
		return $result;
	}
	
        public function nome_dimensao($dimensao) {
                $this->db->select('nome_dimensao');
                $this->db->where('id', $dimensao);
		$result = $this->db->get('dimensoes')->result();
		return $result;
	}
        
	public function insert($tabela, $data) {
		$result = $this->db->insert($tabela, $data);
		return $result;
	}
	
	public function update($tabela, $data, $codigo) {
		$this->db->where('cod_noticia', $codigo);
		$result = $this->db->update($tabela, $data);
		return $result;
	}
	
	public function delete($tabela, $codigo) {
		$this->db->where('cod_noticia', $codigo);
		$result = $this->db->delete($tabela);
		return $result;
	}
	
}
