<?php
    require ("cAutoload.php");

    $Alert = new Alert;

    $Cidade = new Cidade;

    $Usuario = new Usuario;

    $location = "<script>
                    location.href = '../view/admin/admin.php?menu=list_usuario';
                </script>";

    if (isset($_POST))
    {
        $idUsuario = $_POST['id_usuario'];
        $login = $_POST['login'];
        $nome = $_POST['nome'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $dataNascimento = $_POST['datanasc'];
        $estado = $_POST['estado'];
        $cidadePost = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $existsEstado = $Cidade->GetCidadeByNomeCidadeByEstado($cidadePost, $estado);

        if ($existsEstado->rowCount() < 1)
        {
                $Message->Alert("Não existe cidade: $cidadePost vinculada ao estado selecionado!");
                
                echo ($location);
                //header("Location: ../home.php?menu=clientelistar&acao=clientelistar&sucesso=false&cod=1&message=$cidadePost");
        }
        else{
            while($rowResult = $existsEstado->fetch(PDO::FETCH_OBJ)){
                $cidadeGet = $rowResult->ID;
            }

            $Usuario->SetLogin($login);
            $Usuario->SetNome($nome);
            $Usuario->SetCidade($cidadeGet);
            $Usuario->SetEndereco($endereco);
            $Usuario->SetEstado($estado);
            $Usuario->SetRg($rg);
            $Usuario->SetTelefone($telefone);
            $Usuario->SetDataNasc($dataNascimento);
            $Usuario->SetEmail($email);
            $Usuario->SetCpf($cpf);
            $Usuario->SetId($idUsuario);

            $resultUpdate = $Usuario->UsuarioUpdate();

            if ($resultUpdate > 0)
            {
                $Alert->AlertMessage("Usuário: $nome alterado com sucesso.");

                echo ($location);
            }
            else{
                $Alert->AlertMessage("Falaha ao alterar Usuário: $nome !");

                echo ($location);
            }
        }
        
    }
    else{
        $Message->Alert("Nenhum dado encontrado para alteração!");

        echo ($location);
    }
?>