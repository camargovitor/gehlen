<script language="JavaScript" type="text/javascript" src="../../dist/js/request.js"></script>
<div class="content-wrapper">
    <?php
		include_once '../../controller/cPropriedadeForm.php';

		$Cliente = new Cliente; 
	?>
        <section class="content-header">
            <h1>
                Propriedade
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="?menu=home">
                        <i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li>
                    <a href="?menu=cad_propriedade">Propriedade</a>
                </li>
                <li class="active">Cadastro Propriedade</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Cadastro de Propriedade</h3>
                                <!-- Main content -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php

                                    $Alert = new Alert;

                                    if (isset($_GET['sucesso'])) {
                                        $sucesso = $_GET['sucesso'];
                                        $propriedade = $_GET['propriedade'];
                                    
                                        if ($sucesso == 'true'){
                                            $title = "Sucesso!";
                                            $description = "Propriedade $propriedade cadastrada com sucesso!!";
                                        
                                            echo ($Alert->Success($title, $description)) ;
                                        }
                                        elseif ($sucesso == 'false'){
                                            $title = "Falha!";
                                            $description = "Falha ao cadastrar propriedade $propriedade!";
                                            echo ($Alert->Danger($title, $description)) ;
                                        }
                                    }
                                ?>
                                <form role="form" action="../../controller/cPropriedadeCadastro.php"
                                    method="post" name="frmCliente" onsubmit="return ValidaForm(this);">
                                    <div class="form-group col-md-6">
                                        <label>Nome Propriedade</label>
                                        <input type="text" class="form-control" placeholder="Nome Propriedade..." id="nome" name="nome" value="" required name=nome>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Descrição</label>
                                        <input type="text" class="form-control" placeholder="Descrição..." id="descricao" name="descricao" value="">
                                    </div>
                                    <div class="form-group col-md-6">
							        	<label>Cliente</label> 
							        	<select class="form-control" id="cliente" name="cliente" required name=cliente>
							        		<option></option>
							        		<?php 
							        			$result = $Cliente->getList("STATUS = 1", "NOME DESC");
							        			while($row = $result->fetch(PDO::FETCH_OBJ)) { 
							        		?>
							        		<option value="<?php echo $row->ID_CLIENTE ?>"><?php echo $row->NOME ?></option>
							        		<?php } ?>
							        	</select>
                                    </div>	
                                    <div class="form-group col-md-6">
                                        <label>Estado</label>
                                        <select class="form-control" id="estado" name="estado" onchange="buscar_cidades()" required name=estado>
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
                                    <div id="load_cidades" class="form-group col-md-6">
                                        <label>Cidade</label>
                                        <select class="form-control" id="cidade" name="cidade" required name=cidade>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" placeholder="Endereço ..." id="endereco" name="endereco" value="" required name=endereco>
                                    </div>
                                    <div class="form-group col-md-6">
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
                                    <div class="form-group col-md-6">   
                                        <label for="status">Status</label>                                   
                                        <select name="statusPropriedade" class="form-control" required name=statusPropriedade>
                                            <option value="">-</option>
                                            <option value"ALUGUEL">Aluguel</option>
                                            <option value="VENDA">Venda </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Valor R$</label>
                                        <input type="number" step="0.01" class="form-control" placeholder="Valor..." id="valor" name="valor" value="" required name=valor>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Área m²</label>
                                        <input type="number" step="0.01" class="form-control" placeholder="Área m²..." id="area" name="area" value="" required name=area>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Dormitório</label>
                                        <input type="number" step="1.00" class="form-control" placeholder="Dormitório..." id="dormitorio" name="dormitorio" required name=dormitorio>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Banheiro</label>
                                        <input type="number" step="1.00" class="form-control" placeholder="Banheiro..." id="banheiro" name="banheiro" required name=banheiro>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Garagem</label>
                                        <input type="number" step="1.00" class="form-control" placeholder="Garagem..." id="garagem" name="garagem" required name=garagem>
                                    </div>
                                    <div class="form-group col-md-3">
							        	<label>Avaliação</label> 
							        	<select class="form-control" id="avaliacao" name="avaliacao" required name=avaliacao>
                                            <option></option>
							        		<option>5</option>
                                            <option>4</option>
                                            <option>3</option>
                                            <option>2</option>
                                            <option>1</option>
							        	</select>
                                    </div>	
                                    <br>
                                    <div class="col-md-12">

                                        <div class="col-md-3"> </div>
                                        <div class="col-md-3">
                                            <input type="reset" class="btn btn-block btn-danger" value="Cancelar">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" class="btn btn-block btn-success" value="Salvar">
                                        </div>
                                        <div class="col-md-3"> </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
            </div>

        </section>
</div>  