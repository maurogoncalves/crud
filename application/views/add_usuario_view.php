<script src="<?php echo $this->config->base_url(); ?>assets/adm/js/jquery-1.9.1.min.js"></script>

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<a href="<?php echo $this->config->base_url(); ?>Colaboradores/listar"><i class="icon-file-alt"></i><span class="hidden-tablet"> Lista</span></a>
					</div>
					<div class="box-content">
					<form class="form-horizontal" action="<?php echo $this->config->base_url(); ?>index.php/Colaboradores/addChangeArtist"" method="post"  enctype="multipart/form-data" >
						  <fieldset>
						  <legend>Inserir</legend>
														
													  
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Nome</label>
							  <div class="controls">
								<input type="text" class="form-control" name="nome" id="nome" required  value='' >
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) CPF</label>
							  <div class="controls">
								<input type="text" class="form-control" name="cpf" id="cpf" required  value='' >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) RG</label>
							  <div class="controls">
								<input type="text" class="form-control" name="rg" id="rg" required  value='' >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Data de nascimento</label>
							  <div class="controls">
								<input type="date" class="form-control" name="data_nasc" id="data_nasc" required  value='' >
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) CEP</label>
							  <div class="controls">
								<input type="text" class="form-control" name="cep" id="cep" required  value='' >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Número</label>
							  <div class="controls">
								<input type="number" class="form-control" name="numero" id="numero" required  value='' >
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Endereço</label>
							  <div class="controls">
								<input type="text" class="form-control" name="endereco" id="endereco" required  value='' >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Cidade</label>
							  <div class="controls">
								<input type="text" class="form-control" name="cidade" id="cidade" required  value='' >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Estado</label>
							  <div class="controls">
								<input type="text" class="form-control" name="estado" id="estado" required  value='' >
							  </div>
							</div>

							<div class="form-actions">
								<input type="hidden" id="codigo"  name="codigo"  value=''>
								<input type="hidden" id="op"  name="op"  value='0'>
							  <button type="submit" class="btn btn-primary" >Inserir</button>
							</div>
						  </fieldset>
						</form>   
						           
					</div>
				</div><!--/span-->
			
			</div><!--/row-->	
		

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
<script type="text/javascript">
$(document).ready(function(){
	$("#cpf").inputmask({
		mask: '999-999-999-99',	
	});
	$("#cep").inputmask({
		mask: '99.999-999',	
	});

	$('#cep').blur(function(){
	   var cep = $("#cep").val();
		   if(cep != '__.___-___'){
				$.ajax({
					url: "<?php echo $this->config->base_url(); ?>index.php/Colaboradores/buscaCep?cep=" + cep,
					type : 'get', /* Tipo da requisi&ccedil;&atilde;o */ 
					contentType: "application/json; charset=utf-8",
					dataType: 'json', /* Tipo de transmiss&atilde;o */
					success: function(data){
					if(data !== 0){									
						$("#endereco").val(data.logradouro);
						$("#cidade").val(data.cidade);
						$("#estado").val(data.uf);
					}
				}
			});
		}		
	})
});
</script>
