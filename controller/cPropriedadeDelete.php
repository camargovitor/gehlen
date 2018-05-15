<?php
    require_once ('cAutoload.php');

    if (isset($_POST)){
        $id     = $_POST['codigo'];
        $nome   = $_POST['nome'];
        
        try{
            $Propriedade = new Propriedade;
            $Alert = new Alert;

            $location = "<script>
                                location.href = '../view/admin/admin.php?menu=list_propriedade';
                        </script>";

            $pdo = $Propriedade->StartConection();

            $pdo->beginTransaction();

            $Propriedade->SetId($id);

            $Propriedade->DeletePropriedade($pdo);

            $pdo->commit();

            $Alert->AlertMessage("Propriedade: $nome excluida com sucesso!");        
                
            echo ($location);
        }
        catch(PDOException $e){
            $pdo->rollBack();

            echo 'Error: ' . $e->getMessage();
        }
    }

?>