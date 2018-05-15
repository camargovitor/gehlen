<?php
    require ("cAutoload.php");

    $Alert = new Alert;

    $Usuario = new Usuario;

    $location = "<script>
                    location.href = '../view/admin/admin.php?menu=list_usuario';
                </script>";

    if (isset($_POST)){
        try{

            $idUsuario = $_POST['id_usuario'];
            $nome = $_POST['nome'];

            $Usuario->SetId($idUsuario);
            $Usuario->SetStatus(0);

            $resultUpdate = $Usuario->UsuarioUpdateStatus();

            if ($resultUpdate > 0){
                $Alert->AlertMessage("Usuário: $nome inativado com sucesso.");
            }
            else{
                $Alert->AlertMessage("Falha ao inativar Usuário: $nome !");
            }
        }
        catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
        echo($location);

    }
    else{
        $Alert->AlertMessage("Nenhum dado encontrado para deletar!");

        echo($location);
    }
?>