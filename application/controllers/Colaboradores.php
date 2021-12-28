<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Colaboradores extends CI_Controller {
	
 function __construct(){
   parent::__construct();
   $this->load->model('Colaboradores_model','',TRUE);
   $this->load->library('session');
   $this->load->library('form_validation');
   $this->load->helper('url');
  
 }
 
 public function index(){
	$data['mensagem'] = $this->session->flashdata('mensagem');
	$dataHeader['mensagemInicial'] = 'Lista';
	$data['usuarios'] =  $this->Colaboradores_model->list(0);
	$this->load->view('header_view_adm',$dataHeader);	
	$this->load->view('listar_usuario_view',$data);
	$this->load->view('footer_view');
 }
 
 public function add(){
	$data['mensagem'] = $this->session->flashdata('mensagem');

	$this->load->view('header_view_adm',$data);	
	$this->load->view('add_usuario_view',$data);
	$this->load->view('footer_view',$data);	
 }

 function buscaCep(){
	$this->load->library('cep');
	$cep = $this->input->get('cep');
	$this->cep->busca_cep($cep);  
}

  public function addChangeArtist(){
	
	$nome =  $this->input->post('nome');		
	$cpf =  $this->input->post('cpf');		
	$rg =  $this->input->post('rg');		
	$data_nasc =  $this->input->post('data_nasc');		
	$cep =  $this->input->post('cep');		
	$numero =  $this->input->post('numero');		
	$endereco =  $this->input->post('endereco');		
	$cidade =  $this->input->post('cidade');		
	$estado =  $this->input->post('estado');		
	$codigo =  $this->input->post('codigo');		
	$op =  $this->input->post('op');		
	
	$dados = array(
		'nomecompleto' => $nome,
		'cpf' => $cpf,
		'rg' => $rg,
		'data_nasc' => $data_nasc,
		'cep' => $cep,
		'numero' => $numero,
		'endereco' => $endereco,
		'cidade' => $cidade,
		'estado' => $estado,

	);

	if($op == 1){
		$this->Colaboradores_model->atualizar($dados,$codigo);	
		$this->session->set_flashdata('mensagem', "O usuário foi atualizado");
	}else{
		$this->Colaboradores_model->add($dados);	
		$this->session->set_flashdata('mensagem', "O usuário foi inserido");
	}
	redirect('Colaboradores', 'refresh');
 }
 
  
 public function editar(){
	
	$id =  $this->input->get('id');
	
	$data['usuario'] =  $this->Colaboradores_model->list($id);
	
	if(count($data['usuario']) == 0 ){
		$this->session->set_flashdata('mensagem', "This artist doesn't exist");
		redirect('Colaboradores', 'refresh');	
	}
	
	$this->load->view('header_view_adm',$data);	
	$this->load->view('edit_artist_view',$data);
	$this->load->view('footer_view',$data);	
 }  
 
 public function apagar(){
	$id =  $this->input->get('id');
	
	$data['usuario'] =  $this->Colaboradores_model->list($id);
	
	if(count($data['usuario']) == 0 ){
		$this->session->set_flashdata('mensagem', "Esse usuário não existe");
		redirect('Colaboradores', 'refresh');	
	}else{
		$this->Colaboradores_model->excluir($id);				
		$this->session->set_flashdata('mensagem', "Esse usuário foi excluido");
		redirect('Colaboradores', 'refresh');	
	}
	
	
 }
 
  
	
}
