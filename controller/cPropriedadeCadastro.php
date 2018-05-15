<?php
    if (isset($_POST))
    {
        require_once ('cAutoload.php');

        session_start();
        $login = $_SESSION['usuario'];

        $propriedade = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $cliente = $_POST['cliente'];
        $valor = $_POST['valor'];
        $area = $_POST['area'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $garagem = $_POST['garagem'];
        $dormitorio = $_POST['dormitorio'];
        $banheiro = $_POST['banheiro'];
        $avaliacao = $_POST['avaliacao'];
        $statusPropriedade = $_POST['statusPropriedade'];
        $tipoImovel = $_POST['tipo_imovel'];

        $Propriedade = new Propriedade;
        $Usuario = new Usuario;

        $getUsuario = $Usuario->GetUsuarioByCodigoUsuario($login);

        while ($row = $getUsuario->fetch(PDO::FETCH_OBJ))
        {
            $idUsuario = $row->ID;
        }

        $Propriedade->SetNome($propriedade);
        $Propriedade->SetDescricao($descricao);
        $Propriedade->SetCliente($cliente);
        $Propriedade->SetValor($valor);
        $Propriedade->SetArea($area);
        $Propriedade->SetUsuarioCadastro($idUsuario);
        $Propriedade->SetStatus(1);
        $Propriedade->SetDormitorio($dormitorio);
        $Propriedade->SetBanheiro($banheiro);
        $Propriedade->SetGaragem($garagem);
        $Propriedade->SetCidade($cidade);
        $Propriedade->SetEstado($estado);
        $Propriedade->SetAvaliacao($avaliacao);
        $Propriedade->SetStatusPropriedade($statusPropriedade);
        $Propriedade->SetTipoImovel($tipoImovel);

        if ($Propriedade->Insert() > 0){
            header('Location: ../view/admin/admin.php?menu=cad_propriedade&sucesso=true&propriedade='.$propriedade);
        }
        else{
            header('Location: ../view/admin/admin.php?menu=cad_propriedade&sucesso=true&propriedade='.$propriedade);
        }
    }
?>