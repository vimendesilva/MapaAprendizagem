<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Validacao_model extends CI_Model {
	
        public function get_respostas() {
		$result = $this->db->get('dimensoes')->result();
		return $result;
	}
        
        public function get_perguntas($id) {         
		$this->db->join('modelo', 'perguntas.id = modelo.perguntas_id', 'inner');
                $this->db->join('dimensoes', 'modelo.dimensoes_id = dimensoes.id', 'inner');
                $this->db->where('dimensoes.id', $id);
		$result = $this->db->get('perguntas')->result();
		return $result;
	}
	
        public function get_dados_relatorio($id_usuario,$dimensao,$mapa) {
            $this->db->where('mapa_usuarios_id', $id_usuario);
            $this->db->where('modelo_dimensoes_id', $dimensao);
            $this->db->where('mapa_id', $mapa);
            $result = $this->db->get('validacao')->result_array();
            return $result;
        }
        
	public function insert($tabela, $data) {
		$result = $this->db->insert($tabela, $data);
		return $result;
	}
	
        /*
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
	*/
}
