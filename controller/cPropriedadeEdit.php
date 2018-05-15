<?php
    require ('cAutoload.php');

    if (isset($_POST)){

        $Propriedade = new Propriedade;
        $Alert = new Alert;

        $id                 = $_POST['id']; 
        $nome               = $_POST['nome'];
        $descricao          = $_POST['descricao'];
        $valor              = $_POST['valor'];
        $area               = $_POST['area'];
        $dormitorio         = $_POST['dormitorio'];
        $banheiro           = $_POST['banheiro'];
        $garagem            = $_POST['garagem'];
        $cidade             = $_POST['cidade'];
        $estado             = $_POST['estado'];
        $avaliacao          = $_POST['avaliacao'];
        $statusPropriedade  = $_POST['statusPropriedade'];
        $cliente            = $_POST['cliente'];
        $tipoImovel         =$_POST['tipo_imovel'];

        $location = "<script>
                                location.href = '../view/admin/admin.php?menu=list_propriedade';
                        </script>"; 

        $pdo = $Propriedade->StartConection();

        try{
            $pdo->beginTransaction();
            
            $Cidade = new Cidade;

            $existsCidade = $Cidade->GetCidadeByCidadeAndEstado($cidade, $estado);

            if ($existsCidade->rowCount() > 0)
            {
                $Propriedade->SetId($id);
                $Propriedade->SetNome($nome);
                $Propriedade->SetDescricao($descricao);
                $Propriedade->SetCliente($cliente);
                $Propriedade->SetValor($valor);
                $Propriedade->SetArea($area);
                $Propriedade->SetDormitorio($dormitorio);
                $Propriedade->SetBanheiro($banheiro);
                $Propriedade->SetGaragem($garagem);
                $Propriedade->SetCidade($cidade);
                $Propriedade->SetEstado($estado);
                $Propriedade->SetAvaliacao($avaliacao);
                $Propriedade->SetStatusPropriedade($statusPropriedade);
                $Propriedade->SetTipoImovel($tipoImovel);

                $Propriedade->UpdatePropriedade($pdo);

                $pdo->commit();

                $Alert->AlertMessage("Propriedade: $nome alterada com sucesso!");        
                
                echo ($location);
            }
            else{
                $pdo->rollBack();

                $Alert->AlertMessage("Cidade não está vinculada ao estado selecionado!");
                        
                echo ($location);
            }
            

        }
        catch(PDOException $e){
            $pdo->rollBack();

            echo 'Error: ' . $e->getMessage();
        }
    }

?>