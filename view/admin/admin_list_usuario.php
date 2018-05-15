<?php
    require_once '../../controller/cUsuarioLista.php';
?>
<div class="content-wrapper">
	<div style="overflow-x: auto; height: 100%; width: 100%">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Usuários</h1>
			<ol class="breadcrumb">
				<li><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#">Usuário</a></li>
				<li class="active">Usuários</li>
			</ol>
		</section>
    </div>
    <section class="content">
        <div class="row">
            <div class="box">
				<div class="box-header">
					<h3 class="box-title">Lista de Usuários</h3>
				</div>
                <!-- /.box-header -->
				<div class="box-body" style ="max-width: 100%; overflow: scroll">
                    <table id="tableUsuario" class="table table-striped table-bordered">
                        <thead>  
                            <tr>  
								<td>ID Usuário</td> 
                                <td>Codigo Usuário</td>
                                <td>Nome</td>
                                <td>RG</td>
								<td>CPF</td>
                                <td>Estado</td>
                                <td>Cidade</td>
                                <td>Endereço</td>
								<!--
                                <td>Função</td>
								-->
                                <td>Telefone</td>
								<td>E-mail</td>
								<td>Data Nascimento</td>
                                <td>Data Inclusão</td>
								<td>Alterar</td>
								<td>Excluir</td>
                            </tr>  
					    </thead>
                        <?php
					    	while($listUsuario = $resultUsuario->fetch(PDO::FETCH_OBJ)) {
					    ?>
                        
					    <tr>
							<td white-space: nowrap><?php echo $listUsuario->ID?> </td>
                            <td white-space: nowrap><?php echo $listUsuario->LOGIN?> </td>
                            <td name="name" white-space: nowrap><?php echo $listUsuario->NOME?> </td>
                            <td white-space: nowrap><?php echo $listUsuario->RG?> </td>
							<td white-space: nowrap><?php echo $listUsuario->CPF?> </td>
                            <td white-space: nowrap><?php echo $listUsuario->ESTADO_NOME?> </td>
                            <td white-space: nowrap><?php echo $listUsuario->CIDADE_NOME?> </td>
                            <td white-space: nowrap><?php echo $listUsuario->ENDERECO?> </td>
							<!--
                            <td white-space: nowrap><?php //echo $listUsuario->FUNCAO?> </td>
							-->
                            <td white-space: nowrap><?php echo $listUsuario->TELEFONE?> </td>
							<td white-space: nowrap><?php echo $listUsuario->EMAIL?> </td>
							<td white-space: nowrap><?php echo $listUsuario->DATANASC_FORMAT?></td>
                            <td white-space: nowrap><?php echo $listUsuario->DATA_INCLUSAO?></td>
							<td white-space: nowrap><button id="alterar" type="button" class="btn btn-warning btn-sm" data-toggle="modal"
							data-target="#exampleModal" 
							data-id="<?php echo $listUsuario->ID?>"
							data-codigousuario="<?php echo $listUsuario->LOGIN?>"
							data-nome="<?php echo $listUsuario->NOME?>"
							data-rg="<?php echo $listUsuario->RG?>"
							data-cpf="<?php echo $listUsuario->CPF?>"
							data-estado="<?php echo $listUsuario->ESTADO?>"
							data-cidade="<?php echo $listUsuario->CIDADE_NOME?>"
							data-endereco="<?php echo $listUsuario->ENDERECO?>"
							data-funcao="<?php echo $listUsuario->FUNCAO?>"
							data-telefone="<?php echo $listUsuario->TELEFONE?>"
							data-datanasc="<?php echo $listUsuario->DATANASC?>"
							data-email="<?php echo $listUsuario->EMAIL?>"
							>Alterar</button></td>
							<td>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
									data-target="#excluirModal" data-idusuario="<?php echo $listUsuario->ID?>"
									data-nome="<?php echo $listUsuario->NOME?>"
								>Excluir
								</button>
							</td>
					    </tr>
                        <?php } ;?>
					    
                    </table>
                </div>  
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?php $Estado = new Estado; ?>
        <form role="form" action="../../controller/cUsuarioEdit.php" 
			method="post" enctype="multipart/form-data" name="frmUsuario" onsubmit="return validar_senha(this);">
          	<div class="form-group">
          	  <label for="id_usuario" class="col-form-label">ID Usuário:</label>
          	  <input type="text" class="form-control" id="id_usuario" name="id_usuario" readOnly>
          	</div>
          	<div class="form-group">
          	  <label for="codigo_usuario" class="col-form-label">Login:</label>
          	  <input type="text" class="form-control" id="codigo_usuario" name="login">
          	</div>
			<div class="form-group">
          	  <label for="nome" class="col-form-label">Nome:</label>
          	  <input type="text" class="form-control" id="nome" name="nome">
          	</div>
			<div class="form-group">
				<label>RG</label> <input type="text" class="form-control"
					placeholder="RG..." id="rg" name="rg"
					value="" onKeyPress="MascaraRG(frmUsuario.rg);" maxlength="13" required name=rg>  
			</div>
			<div class="form-group">
				<label>CPF</label> <input type="text" class="form-control"
					placeholder="CPF..." id="cpf" name="cpf"
					value="" onKeyPress="MascaraCPF(frmUsuario.cpf);" maxlength="14"
					>
			</div>
			<div class="form-group">
				<label>Data Nascimento</label> 
				<input type="date" class="form-control"
					placeholder="Data Nascimento..." id="datanasc" name="datanasc"
					value="" required name=dataNasc
				>
			</div>
			<div class="form-group">
				<label>Estado</label> 
				<select class="form-control" id="estado" name="estado" onchange="buscar_cidades()" required name=estado>
					<option></option>
					<?php 
						$resultState = $Estado->getStateList();
						while($dataState = $resultState->fetch(PDO::FETCH_OBJ)) { 
					?>
					<option value="<?php echo $dataState->ID ?>"><?php echo $dataState->NOME ?></option>
					<?php } ?>
				</select>
			</div>			
			<div class="form-group">
				<label>Cidade</label> <input type="text"
					class="form-control" placeholder="Cidade ..." id="cidade"
					name="cidade" value="" required name=cidade>
			</div>
			<div class="form-group">
				<label>Endereço</label> <input type="text"
					class="form-control" placeholder="Endereço ..." id="endereco"
					name="endereco" value="" required name=endereco>
			</div>			
			<div class="form-group">
				<label>Telefone</label> <input type="text"
					class="form-control" placeholder="Telefone ..." id="telefone"
					name="telefone" value="" onKeyPress="MascaraTelefone(frmUsuario.telefone);" maxlength="15" required name=tel>
			</div>
			<div class="form-group">
				<label>E-mail</label> <input type="text" class="form-control"
					placeholder="E-mail ..." id="email" name="email" value="">
			</div>
			<imput name="id_usuario" type="hidden" id="id_usuario">
		  	<div class="modal-footer">
      		  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      		  <button type="submit" class="btn btn-primary">Salvar</button>
      		</div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="excluirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  	  	<div class="modal-content">
  	  	  	<div class="modal-header">
  	  	  	  	<h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
  	  	  	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  	  	  	  	  	<span aria-hidden="true">&times;</span>
  	  	  	  	</button>
  	  	  	</div>
  	  	  	<div class="modal-body">
				<h4>Deseja excluir o usuário selecionado?</h4>
				<br>
  	  	  	  	<form role="form" action="../../controller/cUsuarioDelete.php" 
					method="post" enctype="multipart/form-data" name="frmCliente">
					<div class="form-group">
						<label for="id_usuario" class="col-form-label">ID Usuário:</label>
						<input type="text" class="form-control" id="id_usuario" name="id_usuario" readOnly>
					</div>
					<div class="form-group">
						<label for="nome" class="col-form-label">Nome:</label>
						<input type="text" class="form-control" id="nome" name="nome" readOnly>
				  	</div>
					<div class="modal-footer">
  	  	  			  	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
  	  	  			  	<button type="submit" class="btn btn-danger">Excluir</button>
  	  	  			</div>
  	  	  	  	</form>
  	  	  	</div>
  	  	</div>
  	</div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript"> 
	$('#exampleModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var id_usuario = button.data('id') // Extract info from data-* attributes
	  var codigo_usuario = button.data('codigousuario')
	  var nome = button.data('nome')
	  var rg = button.data('rg')
	  var cpf = button.data('cpf')
	  var estado = button.data('estado')
	  var cidade = button.data('cidade')
	  var endereco = button.data('endereco')
	  var funcao = button.data('funcao')
	  var datanasc = button.data('datanasc')
	  var telefone = button.data('telefone')
	  var email = button.data('email')
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  //modal.find('.modal-title').text('Alterar Usuário ' + nome)
	  modal.find('#id_usuario').val(id_usuario)
	  modal.find('#codigo_usuario').val(codigo_usuario)
	  modal.find('#nome').val(nome)
	  modal.find('#rg').val(rg)
	  modal.find('#cpf').val(cpf)
	  modal.find('#estado').val(estado)
	  modal.find('#cidade').val(cidade)
	  modal.find('#endereco').val(endereco)
	  modal.find('#funcao').val(funcao)
	  modal.find('#telefone').val(telefone)
	  modal.find('#datanasc').val(datanasc)
	  modal.find('#telefone').val(telefone)
	  modal.find('#email').val(email)

	})
</script>

<script>
	$('#excluirModal').on('show.bs.modal', function (event) {
  		var button = $(event.relatedTarget) // Button that triggered the modal
  		var idUsuario = button.data('idusuario') // Extract info from data-* attributes
		var nome = button.data('nome')
  		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  		var modal = $(this)
  		//modal.find('.modal-title').text('New message to ' + recipient)
  		modal.find('#id_usuario').val(idUsuario)
		modal.find('#nome').val(nome)
	})
</script>

<script type="text/javascript">  
	 $(document).ready(function(){  
      $('#tableUsuario').dataTable( {
			"language": {
				"paginate": {
				"previous": "Anterior",
				"next": "Próximo"
				
				},
				
				"info": "Mostrando página _PAGE_ de _PAGES_",
				
				search: "Pesquisar",
				
				searchPlaceholder: "Pesquisar...",
				
				"info":           "Mostrando _START_ de _END_ total _TOTAL_ resultado",
				
				"lengthMenu":     "Mostrar _MENU_ resultados",
			}
		} );
	})
</script>

