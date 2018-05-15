<?php
    require 'cAutoload.php';
    session_start();

    $nome= $_POST ['nome'];
    $sexo = $_POST['sexo'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf_ie'];
    $estado= $_POST ['estado'];
    $cidade= $_POST ['cidade'];
    $endereco= $_POST ['endereco'];
    $tel= $_POST ['tel'];
    $email= $_POST ['email'];   
    $dataNasc = $_POST ['dataNasc'];
    $user = $_SESSION['usuario'];
    
    $cliente = new Cliente;

    $cliente->setName($nome);
    $cliente->setSexo($sexo);
    $cliente->setRg($rg);
    $cliente->setCity($cidade);
    $cliente->setCpf($cpf);
    $cliente->setState($estado);
    $cliente->setAdress($endereco);
    $cliente->setPhone($tel);
    $cliente->setEmail($email);
    $cliente->setBirthDate($dataNasc);
    $cliente->setUser($user);

    
    if($cliente->InsertClient()){
        header('Location: ../view/admin/admin.php?menu=cad_cliente&sucesso=true&cliente='.$nome);
    }
    else{
        header('Location: ../view/admin/admin.php?menu=cad_cliente&sucesso=false&cliente='.$nome);
    }
    
    

    exit;
    //echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/ProjectErp/view/body/home.php?menu=clientecadastro&acao=clientecadastro">';
    
    //echo $cliente->getName();



?>