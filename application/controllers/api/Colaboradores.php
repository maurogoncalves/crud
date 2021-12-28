<?php
require(APPPATH.'/libraries/REST_Controller.php');     
class Colaboradores extends REST_Controller {
    
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
	public function index_get($id = 0)
	{
		
		if($id){
			 $r = $this->Colaboradores_model->list($id);  
		   }else{
			 $r = $this->Colaboradores_model->list(0);  
		   }
		   
        $this->response($r, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
		$input = $this->input->post();    
        $this->form_validation->set_rules('nomeCompleto', 'nomeCandidato', 'required',array('required' => 'O campo nome  é obrigatório'));
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]',array('required' => 'O campo email é obrigatório','is_unique' => 'Já existe esse email em nossa base de dados','valid_email'=>'O formato do email é inválido'));
        $this->form_validation->set_rules('cpf', 'cpf', 'required|is_unique[users.cpf]',array('required' => 'O campo cpf é obrigatório','is_unique' => 'Já existe esse cpfCnpj em nossa base de dados'));
        
        if(!$this->form_validation->run()){
            $array = array(
                'nomeCompleto' => strip_tags(form_error('nomeCompleto')),
                'email' => strip_tags(form_error('email')),
                'cpfCnpj' => strip_tags(form_error('cpf'))
               );

            $response = [
				'status' => 400,
				'error' => true,
				'message' => 'Erros de validação',
				'data' => $array
			];
        }else{
            try {
                $this->db->insert('users', $input);

                $response = [
                    'status'   => 200,
                    'error'    => false,
                    'messages' => [
                        'success' => 'Usuário foi criado com sucesso'
                    ]
                ];
            } catch (\Exception $e) {
				$response = [
					'status'   => 400,
					'error'    => true,
					'messages' => [
						'error' => 'Erro ao tentar criar um usuário'
					]
				];   
			}  		    
        } 
        $this->response($response);   
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put()
    {        
        $input = $this->put();

        $this->form_validation->set_data($this->put());
        
        $this->form_validation->set_rules('codigo', 'codigo', 'required',array('required' => 'O campo codigo é obrigatório'));
        $this->form_validation->set_rules('nomeCompleto', 'nomeCandidato', 'required',array('required' => 'O campo nome  é obrigatório'));
        $this->form_validation->set_rules('email', 'email', 'required|valid_email',array('required' => 'O campo email é obrigatório'));
        $this->form_validation->set_rules('cpf', 'cpf', 'required',array('required' => 'O campo cpf é obrigatório'));
        
        
        if ($this->form_validation->run() === TRUE) {
            try {
                $id = $input['codigo'];
                $dtCandidato = $this->Colaboradores_model->list($id);  
                if($dtCandidato){
                    $this->db->update('users', $input, array('codigo'=>$id));
                    $response = [
                        'status'   => 200,
                        'error'    => false,
                        'messages' => [
                            'success' => 'Usuário foi atualizado com sucesso'
                        ]
                    ];
                }else{
                    $response = [
						'status'   => 400,
						'error'    => true,
						'messages' => [
						'error' => 'O id do usuário não existe'
						]
					];   
                }    

            } catch (\Exception $e) {
				$response = [
					'status'   => 400,
					'error'    => true,
					'messages' => [
						'error' => 'Erro ao tentar atualizar um usuário'
					]
				];   
			}  

            
        }else{
            $array = array(
                'codigo' => strip_tags(form_error('codigo')),
                'nomeCompleto' => strip_tags(form_error('nomeCompleto')),
                'email' => strip_tags(form_error('email')),
                'cpf' => strip_tags(form_error('cpf'))
               );

            $response = [
				'status' => 400,
				'error' => true,
				'message' => 'Erros de validação',
				'data' => $array
			];
            		    
        } 
        $this->response($response);  
      
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id = 0)
    {
        try {
            $response = [
                'status'   => 400,
                'error'    => true,
                'messages' => [
                'error' => 'O id do usuário não existe'
                ]
            ];   
            if($id <> 0){
                $dtCandidato = $this->Colaboradores_model->list($id); 
                if($dtCandidato){
                    $this->db->delete('users', array('codigo'=>$id)); 
                    $response = [
                        'status'   => 200,
                        'error'    => false,
                        'messages' => [
                            'success' => 'Usuário foi excluído com sucesso'
                        ]
                    ];
                }
            }

        } catch (\Exception $e) {
            $response = [
                'status'   => 400,
                'error'    => true,
                'messages' => [
                    'error' => 'Erro ao tentar excluir um candidato'
                ]
            ];   
        }  
        $this->response($response);  

    }
    	
}