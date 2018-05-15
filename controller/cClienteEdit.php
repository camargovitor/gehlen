<?php
        require ("cAutoload.php");
        $Cidade = new Cidade;
        $Cliente = new Cliente;
        $Alert = new Alert;
        
        $location = "<script>
                                location.href = '../view/admin/admin.php?menu=list_cliente';
                        </script>";     
        if (isset($_POST))
        {
                $idCliente = $_POST['codigo'];
                $nome = $_POST['nome'];
                $sexo = $_POST['sexo'];
                $rg = $_POST['rg'];
                $cpf = $_POST['cpf'];
                $dataNascimento = $_POST['dataNasc'];
                $estado = $_POST['estado'];
                $cidadePost = $_POST['cidade'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['tel'];
                $email = $_POST['email'];       
                $existsEstado = $Cidade->GetCidadeByNomeCidadeByEstado($cidadePost, $estado);   
                if ($existsEstado->rowCount() < 1)
                {
                        $Alert->AlertMessage("Não existe cidade: $cidadePost vinculada ao estado selecionado!");
                        
                        echo ($location);
                        //header("Location: ../home.php?menu=clientelistar&acao=clientelistar&sucesso=false&cod=1&message=$cidadePost");
                }
                else{
                        while($rowResult = $existsEstado->fetch(PDO::FETCH_OBJ)){
                                $cidadeGet = $rowResult->ID;
                        }       
                        $Cliente->setIdCliente($idCliente);
                        $Cliente->setName($nome);
                        $Cliente->setSexo($sexo);
                        $Cliente->setRg($rg);
                        $Cliente->setCpf($cpf);
                        $Cliente->setState($estado);
                        $Cliente->setCity($cidadeGet);
                        $Cliente->setAdress($endereco);
                        $Cliente->setPhone($telefone);
                        $Cliente->setEmail($email);
                        $Cliente->setBirthDate($dataNascimento);        
                        $Cliente->UpdateClient();       
                        $Alert->AlertMessage("Cliente: $nome alterado com sucesso!");        
                        echo ($location);
                }       
        }
        else{
                $Alert->AlertMessage("Nenhum dado encontrado para alteração!");      
                echo ($location);       
        }
?>