<?php
    require_once ('cAutoload.php');

    $Propriedade =  new Propriedade;

    $PropriedadeImagem = new PropriedadeImagem;

    $valorMin = 0;
    $valorMax = 3000000;
    $status = "";
    $cidade = "";
    $bairro = "";
    $areaMin = 0; //valor minimo definido no slider
    $areaMax = 600; //valor máximo definido no slider
    $dormitorioMin = 0; //valor minimo definido no slider
    $dormitorioMax = 5; //valor máximo definido no slider
    $banheiroMin = 0; //valor minimo definido no slider
    $banheiroMax = 5; //valor máximo definido no slider
    $limit = ""; //limite default
    $ordem = "";
    $tipoImovel = 0;


    if (!empty($_GET['min_value']))
        $valorMin   = $_GET['min_value'];
    if (!empty($_GET['max_value']))
        $valorMax   = $_GET['max_value'];
    if (!empty($_GET['status']))
        $status     = $_GET['status'];
    if (!empty($_GET['cidade']))
        $cidade     = $_GET['cidade'];
    if (!empty($_GET['bairro']))
        $bairro     = $_GET['bairro'];
    if (!empty($_GET['tipo_imovel']))
        $tipoImovel     = $_GET['tipo_imovel'];
    if (!empty($_GET['area']))
    {
        $area       = $_GET['area'];
        $area = explode(",", $area);
        $areaMin = $area[0];
        $areaMax = $area[1];
    }
    if (!empty($_GET['dormitorio']))
    {
        $dormitorio = $_GET['dormitorio'];
        $dormitorio = explode(",", $dormitorio);
        $dormitorioMin = $dormitorio[0];
        $dormitorioMax = $dormitorio[1];
    }
    if (!empty($_GET['banheiro']))
    {
        $banheiro   = $_GET['banheiro'];
        $banheiro = explode(",", $banheiro);
        $banheiroMin = $banheiro[0];
        $banheiroMax = $banheiro[1];
    }

    if (!empty($_GET['order'])){
        $getOrdem = $_GET['order'];
        $getOrdem = explode("+", $getOrdem);
        $ordem = $getOrdem[0] . " " . $getOrdem[1];
    }

    $result = 
    $Propriedade->GetPropriedades(
        $valorMax
        , $valorMin
        , $cidade
        , $status
        , $bairro
        , $areaMin
        , $areaMax
        , $banheiroMin
        , $banheiroMax
        , $dormitorioMin
        , $dormitorioMax
        , $tipoImovel
        , $ordem
        , $limit
    );
    
?>