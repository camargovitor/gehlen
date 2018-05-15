<?php
    if(isset($_GET['id']))
    {
        require_once ('cAutoload.php');

        $id = $_GET['id'];

        $Propriedade = new Propriedade;

        $PropriedadeImg = new PropriedadeImagem;

        $result = $Propriedade->GetPropriedadeById($id);

        $rowPropriedade = $result->fetch(PDO::FETCH_OBJ);

        $resultImg =  $PropriedadeImg->GetImgPropriedadeByIdPropriedadeAndStatus($id, 1);
    }
?>