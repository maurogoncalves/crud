<?php
require(APPPATH.'/libraries/REST_Controller.php');     
class Cadastrar_Salario extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
        parent::__construct();
        $this->load->model('Colaboradores_model');
        $this->load->library('form_validation');

    }
       
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
		$input = $this->input->post();    
        $this->form_validation->set_rules('user_id', 'user_id', 'required',array('required' => 'O campo cpdigo do usuário  é obrigatório'));
        $this->form_validation->set_rules('salario', 'salario', 'required',array('required' => 'O campo email é obrigatório'));
        
        
        if(!$this->form_validation->run()){
            $array = array(
                'user_id' => strip_tags(form_error('user_id')),
                'salario' => strip_tags(form_error('salario')),
               );

            $response = [
				'status' => 400,
				'error' => true,
				'message' => 'Erros de validação',
				'data' => $array
			];
        }else{
            try {
                $dados = array(
                    'salario_atual' => 'no',                               
                );
                $this->Colaboradores_model->atualizarSalario($dados,$input['user_id']);	

                $input['date_created'] = date("Y-m-d");
                $this->db->insert('salario', $input);

               
                
                $response = [
                    'status'   => 200,
                    'error'    => false,
                    'messages' => [
                        'success' => 'Novo salário para o usuário foi inserido com sucesso'
                    ]
                ];
            } catch (\Exception $e) {
				$response = [
					'status'   => 400,
					'error'    => true,
					'messages' => [
						'error' => 'Erro ao tentar um novo salário'
					]
				];   
			}  		    
        } 
        $this->response($response);   
    } 
     
  
     
    
    	
}