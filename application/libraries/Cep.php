<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cep {
	
	public function __construct(){

    }
	
    public function busca_cep($cep){
		$cep = str_replace(".", "", $cep);	
		$cep = str_replace("-", "", $cep);	
		
		$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
	 
		$obj['sucesso'] = (string) $reg->resultado;
		$obj['logradouro']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
		$obj['bairro']  = (string) $reg->bairro;
		$obj['cidade']  = (string) $reg->cidade;
		$obj['uf']  = (string) $reg->uf;
		echo(json_encode($obj));
		
    }
}

/* End of file Someclass.php */