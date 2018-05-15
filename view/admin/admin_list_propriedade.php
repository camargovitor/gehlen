
<?php
    $Propriedade = new Propriedade;

    $Cidade = new Cidade;
?>
<div class="content-wrapper">
	<div style="overflow-x: auto; height: 100%; width: 100%">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Propriedades</h1>
			<ol class="breadcrumb">
				<li><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#">Propriedade</a></li>
				<li class="active">Propriedades</li>
			</ol>
		</section>
    </div>
    <section class="content">
        <div class="row">
            <div class="box">
				<div class="box-header">
					<h3 class="box-title">Lista de Propriedades</h3>
				</div>
                <!-- /.box-header -->
				<div class="box-body" style ="max-width: 100%; overflow: scroll">
                    <table id="tablePropriedade" class="table table-striped table-bordered">
                        <thead>  
                            <tr>
                                <td>ID</td>
                                <td>Nome</td>
                                <td>Descrição</td>
                                <td>Cliente</td>
                                <td>Tipo Imóvel</td>
                                <td>Valor</td>
                                <td>Área</td>
                                <td>Dormitório</td>
                                <td>Banheiro</td>
                                <td>Garagem</td>
                                <td>Cidade</td>
                                <td>Estado</td>
                                <td>Avaliação</td>
                                <td>Status Propriedade</td>
                                <td>Usuário Cadastro</td>
                                <td>Data Cadastro</td>
                                <td>Alterar</td>
                                <td>Excluir</td>  
                            </tr>  
					    </thead>
                        <?php
					    	//$where = "null";
					    	//$orderby = "NOME ASC";
					    	$resultList = $Propriedade->GetPropriedadeByStatus(1);
					    	while($row = $resultList->fetch(PDO::FETCH_OBJ)) { 
					    ?>
                        
					    <tr>
                            <td  white-space: nowrap><?php echo $row->ID?> </td>
                            <td  white-space: nowrap><?php echo $row->NOME?> </td>
                            <td  white-space: nowrap><?php echo $row->DESCRICAO?> </td>
                            <td  white-space: nowrap><?php echo $row->NOME_CLIENTE?> </td>
                            <td  white-space: nowrap><?php echo $row->DESCRICAO_TIPO_IMOVEL?> </td>
                            <td  white-space: nowrap><?php echo $row->VALOR?> </td>
                            <td  white-space: nowrap><?php echo $row->AREA_M2?> </td>
                            <td  white-space: nowrap><?php echo $row->DORMITORIO?> </td>
                            <td  white-space: nowrap><?php echo $row->BANHEIRO?> </td>
                            <td  white-space: nowrap><?php echo $row->GARAGEM?> </td>
                            <td  white-space: nowrap><?php echo $row->NOME_CIDADE?> </td>
                            <td  white-space: nowrap><?php echo $row->NOME_ESTADO?> </td>
                            <td  white-space: nowrap><?php echo $row->AVALIACAO?> </td>
                            <td  white-space: nowrap><?php echo $row->STATUS_PROPRIEDADE?> </td>
                            <td  white-space: nowrap><?php echo $row->USUARIO_CADASTRO?> </td>
                            <td  white-space: nowrap><?php echo $row->DATA_CADASTRO?> </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
							    data-target="#exampleModal" 
							    data-id                 ="<?php echo $row->ID?>"
							    data-nome               ="<?php echo $row->NOME?>"
							    data-descricao          ="<?php echo $row->DESCRICAO?>"
                                data-cliente            ="<?php echo $row->CLIENTE?>"
                                data-tipoimovel         ="<?php echo $row->TIPO_IMOVEL?>"
                                data-valor              ="<?php echo $row->VALOR?>"
                                data-area               ="<?php echo $row->AREA_M2?>"
                                data-dormitorio         ="<?php echo $row->DORMITORIO?>"
							    data-banheiro           ="<?php echo $row->BANHEIRO?>"
							    data-garagem            ="<?php echo $row->GARAGEM?>"
							    data-cidade             ="<?php echo $row->CIDADE?>"
							    data-estado             ="<?php echo $row->ESTADO?>"
							    data-avaliacao          ="<?php echo $row->AVALIACAO?>"
                                data-statuspropriedade  ="<?php echo $row->STATUS_PROPRIEDADE?>"
							    >Alterar</button>
                            </td>
							<td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                    data-target ="#excluirModal"
                                    data-id ="<?php echo $row->ID?>"
                                    data-nome   ="<?php echo $row->NOME?>"
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
                <?php 
                    $Estado = new Estado; 
                    $Cliente = new Cliente;
                    $TipoImovel = new TipoImovel;
                    ?>
                <form role="form" action= <?php echo ("../../controller/cPropriedadeEdit.php") ?> 
			    method="post" enctype="multipart/form-data" name="frmCliente" onsubmit="return validar_senha(this);">
                    <div class="form-group">
                        <label>ID</label> <input type="text" class="form-control"
                            placeholder="ID ..." id="id" name="id" value="" required name=id
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Nome</label> <input type="text" class="form-control"
                            placeholder="Nome ..." id="nome" name="nome" value="" required name=nome>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label> <input type="text" class="form-control"
                            placeholder="Descrição..." id="descricao" name="descricao"
                            value="">  
                    </div>
                    <div class="form-group">
						<label>Cliente</label> 
						<select class="form-control" id="cliente" name="cliente" required name=cliente>
							<option>-</option>
							<?php 
								$result = $Cliente->getList("STATUS = 1", "NOME DESC");
								while($row = $result->fetch(PDO::FETCH_OBJ)) { 
							?>
							<option value="<?php echo $row->ID_CLIENTE ?>"><?php echo $row->NOME ?></option>
							<?php } ?>
						</select>
                    </div>	
                    <div class="form-group">
						<label>Tipo Imóvel</label> 
						<select class="form-control" id="tipo_imovel" name="tipo_imovel" required name=tipo_imovel>
							<option></option>
							<?php 
								$resultTipoImovel = $TipoImovel->GetTipoImovel("ORDER BY NOME ASC");
								while($rowTipoImovel = $resultTipoImovel->fetch(PDO::FETCH_OBJ)) { 
							?>
							<option value="<?php echo $rowTipoImovel->ID ?>"><?php echo $rowTipoImovel->NOME ?></option>
							<?php } ?>
						</select>
                    </div>
                    <div class="form-group">
                        <label>Valor R$</label>
                        <input type="number" step="0.01" class="form-control" placeholder="Valor..." id="valor" name="valor" value="" required name=valor>
                    </div>
                    <div class="form-group">
                        <label>Área m²</label>
                        <input type="number" step="0.01" class="form-control" placeholder="Área m²..." id="area" name="area" value="" required name=area>
                    </div>
                    <div class="form-group">
                        <label>Dormitório</label>
                        <input type="number" step="1.00" class="form-control" placeholder="Dormitório..." id="dormitorio" name="dormitorio" required name=dormitorio>
                    </div>
                    <div class="form-group">
                        <label>Banheiro</label>
                        <input type="number" step="1.00" class="form-control" placeholder="Banheiro..." id="banheiro" name="banheiro" required name=banheiro>
                    </div>
                    <div class="form-group">
                        <label>Garagem</label>
                        <input type="number" step="1.00" class="form-control" placeholder="Garagem..." id="garagem" name="garagem" required name=garagem>
                    </div>
                    <div class="form-group">
						<label>Avaliação</label> 
						<select class="form-control" id="avaliacao" name="avaliacao" required name=avaliacao>
							<option>5</option>
                            <option>4</option>
                            <option>3</option>
                            <option>2</option>
                            <option>1</option>
						</select>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control" id="estado" name="estado" required name=estado>
                            <option></option>
                            <?php 
						$resultState = $Estado->getStateList();
						while($dataState = $resultState->fetch(PDO::FETCH_OBJ)) { 
					    ?>
                            <option value="<?php echo $dataState->ID ?>">
                                <?php echo $dataState->NOME ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="load_cidades" class="form-group">
                        <label>Cidade</label>
                        <select class="form-control" id="cidade" name="cidade" required name=cidade>
                            <?php
                                $resultCidade = $Cidade->GetCidadeOrderbBy("NOME ASC");
                                
                                while($rowCidade = $resultCidade->fetch(PDO::FETCH_OBJ))
                                {
                            ?>
                            <option value="<?php echo $rowCidade->ID?>">
                                <?php echo $rowCidade->NOME?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
						<label>Status Propriedade</label> 
						<select class="form-control" id="statusPropriedade" name="statusPropriedade" required name=statusPropriedade>
                            <option value="ALUGUEL">Aluguel</option>
                            <option value="VENDA">Venda</option>
						</select>
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
                <h4>Deseja Excluir a Propriedade Abaixo?</h4>
                <br>                           
                <form role="form" action= "../../controller/cPropriedadeDelete.php" 
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
	  var button            = $(event.relatedTarget) // Button that triggered the modal
	  var id                = button.data('id') // Extract info from data-* attributes
	  var nome              = button.data('nome')
	  var descricao         = button.data('descricao')
      var cliente           = button.data('cliente')
	  var valor             = button.data('valor')
	  var area              = button.data('area')
	  var dormitorio        = button.data('dormitorio')
	  var banheiro          = button.data('banheiro')
	  var garagem           = button.data('garagem')
	  var cidade            = button.data('cidade')
      var estado            = button.data('estado')
      var avaliacao         = button.data('avaliacao')
      var statusPropriedade = button.data('statuspropriedade')
      var tipoImovel        = button.data('tipoimovel')
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  //modal.find('.modal-title').text('Alterar Usuário ' + nome)
	  modal.find('#id').val(id)
	  modal.find('#nome').val(nome)
	  modal.find('#descricao').val(descricao)
      modal.find('#cliente').val(cliente)
	  modal.find('#valor').val(valor)
	  modal.find('#area').val(area)
	  modal.find('#dormitorio').val(dormitorio)
	  modal.find('#banheiro').val(banheiro)
	  modal.find('#garagem').val(garagem)
	  modal.find('#cidade').val(cidade)
	  modal.find('#estado').val(estado)
      modal.find('#avaliacao').val(avaliacao)
      modal.find('#statusPropriedade').val(statusPropriedade)
      modal.find('#tipo_imovel').val(tipoImovel)

	})
</script>

<script>
    $('#excluirModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var codigo = button.data('id')
        var nome = button.data('nome') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Exluir Propriedade')
        modal.find('#codigo_excluir').val(codigo)
        modal.find('#nome_excluir').val(nome)
    })
</script>

<script>  
    $(document).ready(function(){  
      $('#tablePropriedade').dataTable( {
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