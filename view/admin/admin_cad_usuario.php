<script language="JavaScript" type="text/javascript" src="../../dist/js/request.js"></script>
<div class="content-wrapper">
	<?php
        //include 'controller/cUsuarioForm.php';
        
        $Estado = new Estado;
	?>
	<section class="content-header">
		<h1>
			Usuário
		</h1>
		<ol class="breadcrumb">
			<li><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#">Usuário</a></li>
			<li class="active">Cadastro Usuário</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Cadastro de Usuário</h3>
						<!-- Main content -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<?php
                        $usuario = $_SESSION['usuario'];

                        $Alert = new Alert;
        
                        if (isset($_GET['sucesso'])) {
                            $sucesso = $_GET['sucesso'];
                            $usuario = $_GET['usuario'];

                            if ($sucesso == 'true'){
                                $title = "Sucesso!";
                                $description = "Usuário $usuario cadastrado com sucesso!!";

                                echo ($Alert->Success($title, $description)) ;
                            }
                            elseif ($sucesso == 'false'){
                                $title = "Falha!";
                                $description = "Falha ao cadastrar usuário $usuario!";
                                echo ($Alert->Danger($title, $description)) ;
                            }
                        }
                         ?>
						<form role="form" action= <?php echo ("../../controller/cUsuarioCadastro.php") ?> 
							method="post" enctype="multipart/form-data" name="frmCliente" onsubmit="return validar_senha(this);">
                            <div class="form-group col-md-4">
								<label>Login</label> <input type="text" class="form-control"
									placeholder="Login ..." id="login" name="login" value="" required name=login>
							</div>
							<div class="form-group col-md-6">
								<label>Nome</label> <input type="text" class="form-control"
									placeholder="Nome ..." id="nome" name="nome" value="" required name=nome>
							</div>
							<div class="form-group col-md-12"></div>
							<div class="form-group col-md-3">
								<label>RG</label> <input type="text" class="form-control"
									placeholder="RG..." id="rg" name="rg"
									value="" onKeyPress="MascaraRG(frmCliente.rg);" maxlength="13" required name=rg>  
							</div>
							<div class="form-group col-md-3">
								<label>CPF</label> <input type="text" class="form-control"
									placeholder="CPF..." id="cpf" name="cpf"
									value="" onKeyPress="MascaraCPF(frmCliente.cpf);" maxlength="14" required name=cpf
									>
							</div>
							<div class="form-group col-md-3">
								<label>Data Nascimento</label> <input type="date" class="form-control"
									placeholder="Data Nascimento..." id="dataNasc" name="dataNasc"
									value="" required name=dataNasc
									>
							</div>
							<div class="form-group col-md-6">
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
							<div id="load_cidades" class="form-group col-md-6">
								<label>Cidade</label> 
								<select class="form-control" id="cidade" name="cidade" required name=cidade>
									<option value=""></option>
								</select>
							</div>	
							<div class="form-group col-md-6">
								<label>Endereço</label> <input type="text"
									class="form-control" placeholder="Endereço ..." id="endereco"
									name="endereco" value="" required name=endereco>
							</div>			
							<div class="form-group col-md-6">
								<label>Telefone</label> <input type="text"
									class="form-control" placeholder="Telefone ..." id="telefone"
									name="telefone" value="" onKeyPress="MascaraTelefone(frmCliente.telefone);" maxlength="15" required name=tel>
							</div>
							<div class="form-group col-md-6">
								<label>E-mail</label> <input type="email" class="form-control"
									placeholder="E-mail ..." id="email" name="email" value="">
							</div>
							<div class="form-group col-md-12"></div>
                            <div class="form-group col-md-6">
								<label>Senha</label> <input type="password" class="form-control"
									placeholder="Senha ..." id="senha" name="senha" value="">
							</div>
                            <div class="form-group col-md-6">
								<label>Repertir Senha</label> <input type="password" class="form-control"
									placeholder="Digite novamente a senha ..." id="senha2" name="senha2" value="">
							</div>
                            <div class="form-group col-md-6">
                              <label>Selecionar Imagem (160x160)</label>
                              <input type="file" id="arquivo" name="arquivo" class="custom-file-input">
                            </div>
							<br><br>
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
			
			
	


