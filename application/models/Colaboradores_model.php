<?php
Class Colaboradores_model extends CI_Model
{
 

 
 function add($detalhes = array()){
	if($this->db->insert('users', $detalhes)) {
		return $id = $this->db->insert_id();
	}	
}

function atualizar($dados,$id){

	$this->db->where('codigo', $id);
	$this->db->update('users', $dados); 
	//print_r($this->db->last_query());exit;
	return true;

 }

 function atualizarSalario($dados,$id){

	$this->db->where('user_id', $id);
	$this->db->update('salario', $dados); 
	//print_r($this->db->last_query());exit;
	return true;

 }

function list($id){	
  if($id == 0){
  $sql = "select u.*,DATE_FORMAT(data_nasc,'%d/%m/%Y') as data_nasc_br,s.salario,DATE_FORMAT(s.date_created,'%d/%m/%Y') as data_aumento from users u left join salario s on u.codigo = s.user_id and s.salario_atual ='yes'";
  $query = $this->db->query($sql, array());
}else{
  $sql = "select *,DATE_FORMAT(data_nasc,'%d/%m/%Y') as data_nasc_br from users   where codigo = ?";
  $query = $this->db->query($sql, array($id));
}
  
  $array = $query->result(); 
  return($array);
}

function excluir($id){

	$this->db->where('codigo', $id);
	$this->db->delete('users'); 
	//print_r($this->db->last_query());exit;
	return true;

 } 	
 
 
}
?>