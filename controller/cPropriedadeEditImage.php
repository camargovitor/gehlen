<?php
    try{
        require_once ("cAutoload.php");

        //$idPropriedade = $_POST['id'];
        $location = "<script>
                                location.href = '../view/admin/admin.php?menu=edit_image';
                        </script>"; 

        $PropriedadeImagem = new PropriedadeImagem;
        $Alert = new Alert;
        
        $post = $_POST;

        $idPropriedade = $post['id_propriedade'];
        $imgPropriedade = $_POST['img_propriedade'];

        unset($post["id_propriedade"]);
        unset($post["img_propriedade"]);

        $result = $PropriedadeImagem->GetImgPropriedadeByIdPropriedade($idPropriedade);

        $pdo = $PropriedadeImagem->StartConection();

        $pdo->beginTransaction();

        while($rowImg = $result->fetch(PDO::FETCH_OBJ))
        {
            $status = -1;

            if ($rowImg->STATUS == 1)
            {
                if (!array_key_exists($rowImg->ID, $post)){
                    $status = 0;
                }
            }
            else if($rowImg->STATUS == 0)
            {
                if (array_key_exists($rowImg->ID, $post)){
                    $status = 1;
                }
            }

            if ($status >= 0)
            {
                $PropriedadeImagem->SetStatus($status);
                $PropriedadeImagem->SetId($rowImg->ID);

                $PropriedadeImagem->UpdateStatusById($pdo);
            }
        }

        $pdo->commit();

        $Alert->AlertMessage("Imagens alteradas com sucesso!");      
        
        echo ($location);
    }
    catch(PDOException $e){
        $pdo->rollBack();

        echo 'Error: ' . $e->getMessage();
    }
?>