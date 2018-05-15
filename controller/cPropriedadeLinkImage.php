<?php
    require_once ('cAutoload.php');

    session_start();

    $PropriedadeImagem = new PropriedadeImagem;
    $Usuario = new Usuario;

    date_default_timezone_set('America/Sao_Paulo');
    $dataAtual = date("Y-m-d H:i:s");
    $login = $_SESSION['usuario'];
    $usuarioRow = $Usuario->GetUsuarioByCodigoUsuario($login);

    while ($row = $usuarioRow->fetch(PDO::FETCH_OBJ))
    {
        $idUsuario = $row->ID;
    }

    if (isset($_POST))
    {
        try{
            
            $propriedade = $_POST['propriedade'];
            $descricao = $_POST['descricao'];

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

                    $novoNome = $descricao . '.' . $extensao;
                

                    // Concatena a pasta com o nome
                    $destino = '../img/propriedade/'.$propriedade;

                    //verificar se existe a pasta de destino
                    if(!file_exists($destino))
                    {
                        mkdir('../img/propriedade/'.$propriedade, 0777);
                    }

                    $destino = $destino.'/'.$novoNome;
                
                    // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                        //echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                        //echo ' < img src = "' . $destino . '" />';

                        $PropriedadeImagem->SetIdPropriedade($propriedade);
                        $PropriedadeImagem->SetCaminho($destino);
                        $PropriedadeImagem->SetStatus(1);
                        $PropriedadeImagem->SetUsuarioCadastro($idUsuario);
                        $PropriedadeImagem->SetDataCadastro($dataAtual);
                        $PropriedadeImagem->SetDescricao($descricao);

                        if ($PropriedadeImagem->Insert() > 0){
                            header('Location: ../view/admin/admin.php?menu=link_image&sucesso=true');
                        }
                        else{
                            header('Location: ../view/admin/admin.php?menu=link_image&sucesso=false');
                        }
                    }
                    else{
                        $Message->Alert('Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita!');
                        header('Location: ../view/admin/admin.php?menu=link_image');
                    }

                }
                else
                {
                    $Message->Alert('Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png!');
                    header('Location: ../view/admin/admin.php?menu=link_image');
                }

            }
            else{
                $Message->Alert('Você não enviou nenhum arquivo!');

                header('Location: ../view/admin/admin.php?menu=link_image');
            }
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
?>