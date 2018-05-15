<?php
    session_start();
    require "cAutoload.php";
    if (isset($_POST['ok'])):
        
        $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

        $senha = sha1($senha).strlen($login);
        
        $l = new Login;
        $l->setLogin($login);
        $l->setSenha($senha);
        
        if($l->logar()):
            header("Location: ../admin/admin.php?menu=home");
        else:
            $erro = "Erro ao logar";
        endif;
    endif;
        
    if(isset($_SESSION['logado'])):
        //header("Location: view/body/home.php");
        //echo '<script> window.location.href = "http://localhost/ProjectErp/view/body/home.php" <script>';
        header('Location: ../view/admin/admin.php?menu=home');
    else: 
        header("Location: ../view/login.php?sucess=false");
    endif;
?>
