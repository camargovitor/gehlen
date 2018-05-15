<div class="content-wrapper">
    <?php
		include_once '../../controller/cPropriedadeForm.php';

		$Propriedade = new Propriedade; 
	?>
        <section class="content-header">
            <h1>
                Vincular Imagem
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="?menu=home">
                        <i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li>
                    <a href="?menu=cad_propriedade">Propriedade</a>
                </li>
                <li class="active">Vincular Imagem</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vincular Imagem a Propriedade</h3>
                                <!-- Main content -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                    if (isset($_GET['sucesso'])) {
                                        $Alert = new Alert;

                                        $sucesso = $_GET['sucesso'];

                                        if ($sucesso == 'true'){
                                            $title = "Sucesso!";
                                            $description = "Imagem vinculada com sucesso!";

                                            echo ($Alert->Success($title, $description)) ;
                                        }
                                        elseif ($sucesso == 'false'){
                                            $title = "Falha!";
                                            $description = "Falha ao vincular imagrm";
                                            echo ($Alert->Danger($title, $description)) ;
                                        }
                                    }
                                ?>
                                <form role="form" action="../../controller/cPropriedadeLinkImage.php"
                                    method="post" name="frmCliente" enctype="multipart/form-data" onsubmit="return ValidaForm(this);">
                                    <div class="form-group col-md-6">
							        	<label>Propriedade</label> 
							        	<select class="form-control" id="propriedade" name="propriedade" required name=propriedade>
							        		<option></option>
							        		<?php 
							        			$result = $Propriedade->GetPropriedadeByStatus("1");
							        			while($row = $result->fetch(PDO::FETCH_OBJ)) { 
							        		?>
							        		<option value="<?php echo $row->ID ?>"><?php echo $row->NOME ?></option>
							        		<?php } ?>
							        	</select>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <div class="form-group col-md-6">
							        	<label>Descricao Imagem</label> <input type="text" class="form-control"
							        		placeholder="Descrição Imagem..." id="descricao" name="descricao" value="" required name=nome>
							        </div>
                                    <div class="form-group col-md-6">
                                      <label>Selecionar Imagem</label>
                                      <input type="file" id="arquivo" name="arquivo" class="custom-file-input" required name=arquivo>
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