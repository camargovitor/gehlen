<div class="content-wrapper">
    <?php
		include_once '../../controller/cClienteForm.php';
	?>
        <section class="content-header">
            <h1>
                Imagens
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="?menu=home">
                        <i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li>
                    <a href="#">Propriedade</a>
                </li>
                <li class="active">Editar Image</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Imagens</h3>
                            <!-- Main content -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php
                                require_once ('../../controller/cPropriedadeFormEditImage.php');

                                $usuario = $_SESSION['usuario'];

                                $Alert = new Alert;
        
                                if (isset($_GET['sucesso'])) {
                                    $sucesso = $_GET['sucesso'];
                                    $cliente = $_GET['cliente'];

                                    if ($sucesso == 'true'){
                                        $title = "Sucesso!";
                                        $description = "$cliente cadastrado com sucesso!";

                                        echo ($Alert->Success($title, $description)) ;
                                    }
                                    elseif ($sucesso == 'false'){
                                        $title = "Falha!";
                                        $description = "Falha ao cadastrar cliente $cliente!";
                                        echo ($Alert->Danger($title, $description)) ;
                                    }
                                }
                            ?>
                            <?php 
                                if(empty($_POST))
                                {
                            ?>
                            <form role="form" action=<?php echo ( "?menu=edit_image") ?>
                                method="post">
                                <div class="form-group col-md-6">
							        <label for="propriedade">Propriedade</label> 
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
                                <br>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-block btn-success" value="Pesquisar">
                                </div>
                            </form>
                            
                            <?php 
                                }

                                else 
                                {
                                    $idPropriedade = $_POST['propriedade'];
                                    $idPropriedade2 = 0;
                                    $nomePropriedade = "";

                                    if (! empty($idPropriedade)){
                                        $resultPropriedade = $Propriedade->GetPropriedadeById($idPropriedade);
                                
                                        while ($row = $resultPropriedade->fetch(PDO::FETCH_OBJ)){
                                            $nomePropriedade = $row->NOME;
                                
                                            $idPropriedade2 = $row->ID;
                                        }
                                    }
                            ?>
                                  
                                <div class="form-group col-md-3">
                                    <label>ID Propriedade</label>
                                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $idPropriedade2 ?>" ReadOnly >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Propriedade</label>
                                    <input type="text" class="form-control" id="propriedade" name="propriedade" value="<?php echo $nomePropriedade ?> " ReadOnly>
                                </div>
                                
                                <div class="col-md-12"></div>
                                <div class="card-deck">
                                <?php 
                                    $resultImg = $PropriedadeImagem->GetImgPropriedadeByIdPropriedade($idPropriedade2);
                                    while($rowImg = $resultImg->fetch(PDO::FETCH_OBJ))
                                    {
                                        $nameForm = 'form'.$rowImg->ID;
                                        $onChange = "$('#$nameForm').submit();";

                                        
                                ?>
                                    <form role="form" action=<?php echo ( "../../controller/cPropriedadeEditImage.php") ?> method="post" 
                                        name="<?php echo "form"?>" id="<?php echo "form"?>">
                                        <input type="hidden" name="id_propriedade" id="id_propriedade" value="<?php echo $idPropriedade2 ?>" >
                                        <div class="card col-md-3">
                                            <img class="card-img-top" src="<?php echo "../$rowImg->CAMINHO"?>" alt="Card image cap" width="259" height="180">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $rowImg->DESCRICAO?></h5>
                                                <div class="custom-control custom-checkbox">
                                                    <?php
                                                        $checked = "";
                                                        $status = $rowImg->STATUS;
                                                        if ($status == 1)
                                                            $checked = "checked=checked";
                                                    ?>
                                                    <input type="checkbox" class="custom-control-input" id="checkbox" name=<?php echo $rowImg->ID?> 
                                                        <?php echo $checked;?> onchange="getIdPropriedade()" data-value="<?php echo $rowImg->ID?>">
                                                    <label class="custom-control-label">Ativo
                                                    </label>
                                                    <input type="hidden" name="img_propriedade" id="img_propriedade" value="<?php echo $rowImg->ID ?>" >
                                                </div>
                                                <br>
                                            </div>
                                        
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12" align="center">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-md-3" align="center">
                                                <input type="submit" class="btn btn-block btn-success" value="Salvar">
                                            </div>
                                        </div>
                                        
                                    </form>
                                
                                
                            <?php }?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
</div>
<script>
    function getIdPropriedade(){
        var imgPropriedade = document.getElementById("checkbox").value;
        var idPropriedade = article.dataset.value
    }
</script>