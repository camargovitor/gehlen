<?php
    require_once '../../controller/cClienteLista.php';
?>
<div class="content-wrapper">
	<div style="overflow-x: auto; height: 100%; width: 100%">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Clientes</h1>
			<ol class="breadcrumb">
				<li><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#">Cliente</a></li>
				<li class="active">Clientes</li>
			</ol>
		</section>
    </div>
    <section class="content">
        <div class="row">
            <div class="box">
				<div class="box-header">
					<h3 class="box-title">Lista de Clientes</h3>
				</div>
                <!-- /.box-header -->
				<div class="box-body" style ="max-width: 100%; overflow: scroll">
                    <table id="tableCliente" class="table table-striped table-bordered">
                        <thead>  
                            <tr>
                                <td>Codigo Cliente</td>
                                <td>Nome</td>
                                <td>RG/CNPJ</td>
                                <td>CPF/IE</td>
                                <td>Sexo</td>
                                <td>Estado</td>
                                <td>Cidade</td>
                                <td>Endereço</td>
                                <td>Telefone</td>
                                <td>E-mail</td>
                                <td>Habilitado</td>
                                <td>Data Nascimento</td>
                                <td>Data Inclusão</td>
                                <td>Alterar</td>
                                <td>Excluir</td>  
                            </tr>  
					    </thead>
                        <?php
					    	//$where = "null";
					    	//$orderby = "NOME ASC";
					    	$resultList = $cliente->getList("STATUS = 1", "NOME ASC");
					    	while($listCliente = $resultList->fetch(PDO::FETCH_OBJ)) { 
					    ?>
                        
					    <tr>
                            <td  white-space: nowrap><?php echo $listCliente->ID_CLIENTE?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->NOME?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->RG_CNPJ?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->CPF_IE?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->SEXO?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->NOME_ESTADO?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->NOME_CIDADE?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->ENDERECO?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->TELEFONE?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->EMAIL?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->STATUS?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->DATA_NASCIMENTO_FORMAT?> </td>
                            <td  white-space: nowrap><?php echo $listCliente->DATA_INCLUSAO_FORMAT?> </td>

                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
							    data-target="#exampleModal" 
							    data-codigo="<?php echo $listCliente->ID_CLIENTE?>"
							    data-nome="<?php echo $listCliente->NOME?>"
							    data-rgcnpj="<?php echo $listCliente->RG_CNPJ?>"
                                data-cpfie="<?php echo $listCliente->CPF_IE?>"
                                data-sexo="<?php echo $listCliente->SEXO?>"
							    data-estado="<?php echo $listCliente->ESTADO?>"
							    data-cidade="<?php echo $listCliente->NOME_CIDADE?>"
							    data-endereco="<?php echo $listCliente->ENDERECO?>"
							    data-telefone="<?php echo $listCliente->TELEFONE?>"
							    data-datanasc="<?php echo $listCliente->DATA_NASCIMENTO?>"
                                data-email="<?php echo $listCliente->EMAIL?>"
							    >Alterar</button>
                            </td>
							<td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                    data-target="#excluirModal"
                                    data-codigo="<?php echo $listCliente->ID_CLIENTE?>"
                                    data-nome="<?php echo $listCliente->NOME?>"
                                >Excluir</button>
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
                <form role="form" action= <?php echo ("../../controller/cClienteEdit.php") ?> 
			    method="post" enctype="multipart/form-data" name="frmCliente" onsubmit="return validar_senha(this);">
                    <div class="form-group">
                        <label>Código Cliente</label> <input type="text" class="form-control"
                            placeholder="Código Cliente ..." id="codigo" name="codigo" value="" required name=codigo
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Nome</label> <input type="text" class="form-control"
                            placeholder="Nome ..." id="nome" name="nome" value="" required name=nome>
                    </div>
                    <div class="form-group">
                        <label>RG</label> <input type="text" class="form-control"
                            placeholder="RG..." id="rg" name="rg"
                            value="" onKeyPress="MascaraRG(frmCliente.rg);" maxlength="13" required name=rg>  
                    </div>
                    <div class="form-group">
                        <label>CPF</label> <input type="text" class="form-control"
                            placeholder="CPF..." id="cpf" name="cpf"
                            value="" onKeyPress="MascaraCPF(frmCliente.cpf);" maxlength="14" required name=cpf_ie
                            >
                    </div>
                    <div class="form-group">
                        <label>Sexo</label> <select class="form-control" id="sexo" name="sexo" required name=sexo>
                            <option></option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data Nascimento</label> <input type="date" class="form-control"
                            placeholder="Data Nascimento..." id="data_nasc" name="dataNasc"
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
                    <!--			
                    <div id="load_cidades" class="form-group">
                        <label>Cidade</label> 
                        <select class="form-control" id="cidade" name="cidade" required name=cidade>
                            <option value=""></option>
                        </select>
                    </div>	
                    -->
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
                            class="form-control" placeholder="Telefone ..." id="tel"
                            name="tel" value="" onKeyPress="MascaraTelefone(frmCliente.tel);" maxlength="15" required name=tel>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label> <input type="text" class="form-control"
                            placeholder="E-mail ..." id="email" name="email" value="" required name=email>
                    </div>
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
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Deseja Excluir o Cliente Abaixo?</h4>
                <br>                           
                <form role="form" action= "../../controller/cClienteDelete.php" 
			    method="post" enctype="multipart/form-data" name="frmClienteDelete">
                    <div class="form-group">
                      <label for="codigo" class="col-form-label">Código Cliente:</label>
                      <input type="text" class="form-control" id="codigo_excluir" name="codigo" readonly>
                    </div>
                    <div class="form-group">
                      <label for="nome" class="col-form-label">Nome:</label>
                      <input type="text" class="form-control" id="nome_excluir" name="nome" readonly>
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
	  var codigo = button.data('codigo') // Extract info from data-* attributes
	  var nome = button.data('nome')
	  var sexo = button.data('sexo')
	  var rgcnpj = button.data('rgcnpj')
	  var cpfie = button.data('cpfie')
	  var estado = button.data('estado')
	  var cidade = button.data('cidade')
	  var endereco = button.data('endereco')
	  var datanasc = button.data('datanasc')
      var telefone = button.data('telefone')
      var email = button.data('email')
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  //modal.find('.modal-title').text('Alterar Usuário ' + nome)
	  modal.find('#codigo').val(codigo)
	  modal.find('#nome').val(nome)
	  modal.find('#sexo').val(sexo)
	  modal.find('#rg').val(rgcnpj)
	  modal.find('#cpf').val(cpfie)
	  modal.find('#estado').val(estado)
	  modal.find('#cidade').val(cidade)
	  modal.find('#endereco').val(endereco)
	  modal.find('#tel').val(telefone)
	  modal.find('#data_nasc').val(datanasc)
      modal.find('#tel').val(telefone)
      modal.find('#email').val(email)

	})
</script>

<script>
    $('#excluirModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var codigo = button.data('codigo')
        var nome = button.data('nome') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Exluir Cliente')
        modal.find('#codigo_excluir').val(codigo)
        modal.find('#nome_excluir').val(nome)
    })
</script>

<script>  
    $(document).ready(function(){  
      $('#tableCliente').dataTable( {
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