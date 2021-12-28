

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Lista
						&nbsp;&nbsp;
						<a href="<?php echo $this->config->base_url(); ?>Colaboradores/add"><i class="icon-file-alt"></i><span class="hidden-tablet">Novo</span></a>
						&nbsp;
						<span style='color:#ff0000!important'> 	<?php if(!empty($mensagem)){ echo($mensagem); }?> </span>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="forj">
						  <thead>
							  <tr>
								 <th>Nome Completo</th>	
								 <th>CPF</th>	
								 <th>RG</th>	
								 <th>Data Nascimento</th>	
								 <th>Opções</th>	
							  </tr>
						  </thead>   
						  <tbody>
							<?php 
								$isArray =  is_array($usuarios) ? '1' : '0';
								if($isArray == 0){ ?>
								<?php 
								}else{
								 foreach($usuarios as $key => $usuario){ 
								 ?>
								 <tr>
								 <td ><?php echo $usuario->nomecompleto; ?> </td>
								 <td ><?php echo $usuario->cpf; ?> </td>
								 <td ><?php echo $usuario->rg; ?> </td>
								 <td ><?php echo $usuario->data_nasc_br; ?> </td>
								 <td >
								 <a  href="<?php echo $this->config->base_url(); ?>Colaboradores/editar?id=<?php echo $usuario->codigo;?>"><i class="halflings-icon pencil" style='height:20px'  title='Edit' alt='Edit'></i></a>
								 &nbsp;
								 <a  href="<?php echo $this->config->base_url(); ?>Colaboradores/apagar?id=<?php echo $usuario->codigo;?>"><i class="halflings-icon remove" style='height:20px'  title='Delete' alt='Delete'></i></a>
								 </td>
								</tr>
								<?php
								}//fim foreach
								}//fim if
								?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->	
		

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->