<?php
    require_once ('cAutoload.php');

    $login = $_POST['login'];
    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $dataNasc = $_POST['dataNasc'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

        $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
        $nomeArquivo = $_FILES[ 'arquivo' ][ 'name' ];

        // Pega a extensão
        $extensao = pathinfo ( $nomeArquivo, PATHINFO_EXTENSION );

        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );

        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = $login . '.' . $extensao;
        
            // Concatena a pasta com o nome
            $destino = '../img/usuario/' . $novoNome;
        
            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                //echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                //echo ' < img src = "' . $destino . '" />';

                $Usuario = new Usuario();

                $senha = sha1($senha).strlen($login);

                $Usuario->Setlogin($login);
                $Usuario->SetNome($nome);
                $Usuario->SetRg($rg);
                $Usuario->SetCpf($cpf);
                $Usuario->SetDataNasc($dataNasc);
                $Usuario->SetEstado($estado);
                $Usuario->SetCidade($cidade);
                $Usuario->SetEndereco($endereco);
                $Usuario->SetTelefone($telefone);
                $Usuario->SetEmail($email);
                $Usuario->SetSenha($senha);
                $Usuario->SetImagem("img/usuario/$novoNome");

                if ($Usuario->InsertUsuario()){
                    header('Location: ../view/admin/admin.php?menu=cad_usuario&sucesso=true&usuario='.$nome);
                }
                else{
                    header('Location: ../view/admin/admin.php?menu=cad_usuario&sucesso=false&usuario='.$nome);
                }
            }
            else{
                $Message->Alert('Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita!');

                header('Location: ../view/admin/admin.php?menu=cad_usuario');
            }
                
        }
        else
        {
            $Message->Alert('Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png!');

            header('Location: ../view/admin/admin.php?menu=cad_usuario');
        }
        
    }
    else{
        $Message->Alert('Você não enviou nenhum arquivo!');

        header('Location: ../view/admin/admin.php?menu=cad_usuario');
    }
    

?>