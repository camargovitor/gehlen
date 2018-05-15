<?php
    require ("cAutoload.php");

    $Alert = new Alert;

    $Cliente = new Cliente;

    $location = "<script>
                    location.href = '../view/admin/admin.php?menu=list_cliente';
                </script>";

    if (isset($_POST)){
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];

        $Cliente->setIdCliente($codigo);
        $Cliente->setStatus(0);

        $resultUpdate = $Cliente->UpdateClienteStatus();

        if ($resultUpdate > 0)
        {
            $Alert->AlertMessage("Cliente: $nome inativado com sucesso.");

        }
        else{
            $Alert->AlertMessage("Falha ao inativar Cliente: $nome !");
        }
        echo ($location);
    }
    else{
        $Message->Alert("Nenhum dado encontrado para deletar!");

        echo($location);
    }
?>