<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gehlen Negócios Imobiliários</title>
        <meta name="description" content="Gehlen negócios imobiliários">
        <meta name="author" content="Desenvolvido por Smart Desenvolvimento, todos os direitos reservados!">
        <!--
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        -->

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico  the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="../assets/css/normalize.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/fontello.css">
        <link href="../assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="../assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="../assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="../assets/css/price-range.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="../assets/css/owl.theme.css">
        <link rel="stylesheet" href="../assets/css/owl.transitions.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">

        <?php require_once ('../controller/cAutoload.php');?>
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->


        <?php require ('header.php');?>

        
        <!-- End of nav bar -->

        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">
                    <div class="item"><img src="../assets/img/slide1/slider-image-2.jpg" alt=""></div>
                    <div class="item"><img src="../assets/img/slide1/slider-image-1.jpg" alt=""></div>
                    <div class="item"><img src="../assets/img/slide1/slider-image-4.jpg" alt=""></div>
                </div>
            </div>
            <div class="container slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2>property Searching Just Got So Easy</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="home-lager-shearch" style="background-color: rgb(252, 252, 252); padding-top: 25px; margin-top: -125px;">
            <div class="container">
                <div class="col-md-12 large-search"> 
                    <div class="search-form wow pulse">
                        <form class=" form-inline" method="get" action="properties.php">
                            <div class="col-md-12">
                                <div class="col-md-4"> 
                                    <label for="min_value">Valor Mínimo (R$):</label>         
                                    <input type="number" step="1000.00" placeholder="Valor Mínimo..." id="lunchBegins" class="form-control" name="min_value"
                                        value="0">                         
                                </div>
                                <div class="col-md-4"> 
                                    <label for="max_value">Valor Máximo (R$):</label>         
                                    <input type="number" step="1000.00" placeholder="Valor Máximo..." id="lunchBegins" class="form-control" name="max_value"
                                        value="3000000">                         
                                </div>
                                <div class="col-md-4">   
                                    <label for="status">Status:</label>                                   
                                    <select name="status" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Status">
                                        <option value="venda">Venda </option>
                                        <option value"aluguel">Aluguel</option>
                                    </select>
                                </div>
                                <div class="col-md-4"> 
                                    <label for="cidade">Tipo Imóvel:</label>                                   
                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Tipo Imóvel" name="tipo_imovel">
                                        <?php 
                                            $TipoImovel = new TipoImovel;

                                            $resultTipoImovel = $TipoImovel->GetTipoImovel("");

                                            while($rowTipoImovel = $resultTipoImovel->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                        <option value='<?php echo $rowTipoImovel->ID; ?>'><?php echo $rowTipoImovel->NOME;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-4"> 
                                    <label for="cidade">Cidade:</label>                                   
                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Cidade" name="cidade">
                                        <?php 
                                            $Cidade = new Cidade;

                                            $resultCidade = $Cidade->GetCidadeByEstado(23);//23 = rio grande do sul

                                            while($rowCidade = $resultCidade->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                        <option value='<?php echo $rowCidade->ID; ?>'><?php echo $rowCidade->NOME;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-4">   
                                    <label for="bairro">Bairro:</label>        
                                    <input type="text" placeholder="Bairro..." id="lunchBegins" class="form-control" name="bairro">                         
                                    <!--
                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Bairro">
                                        <option>New york, CA</option>
                                        <option>Paris</option>
                                        <option>Casablanca</option>
                                        <option>Tokyo</option>
                                        <option>Marraekch</option>
                                        <option>kyoto , shibua</option>
                                    </select>
                                    -->
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="search-row">   
                                    
                                    <!-- End of  -->  

                                    <div class="col-sm-3">
                                        <label for="property-geo">Área (m2) :</label>
                                        <input type="text" class="span2" value="" data-slider-min="1" 
                                               data-slider-max="1200" data-slider-step="1" 
                                               data-slider-value="[1,1200]" id="property-geo" 
                                               name="area"><br />
                                        <b class="pull-left color">1m²</b> 
                                        <b class="pull-right color">12000m²</b>
                                    </div>
                                    <!-- End of  --> 

                                    <div class="col-sm-3">
                                        <label for="price-range">Banheiros :</label>
                                        <input type="text" class="span2" value="" data-slider-min="0" 
                                               data-slider-max="5" data-slider-step="1" 
                                               data-slider-value="[0,5]" id="min-baths" 
                                               name="banheiro"><br />
                                        <b class="pull-left color">0</b> 
                                        <b class="pull-right color">5</b>
                                    </div>
                                    <!-- End of  --> 

                                    <div class="col-sm-3">
                                        <label for="property-geo">Dormitórios :</label>
                                        <input type="text" class="span2" value="" data-slider-min="0" 
                                               data-slider-max="5" data-slider-step="1" 
                                               data-slider-value="[0,5]" id="min-bed" 
                                               name="dormitorio"><br />
                                        <b class="pull-left color">0</b> 
                                        <b class="pull-right color">5</b>
                                    </div>
                                    <!-- End of  --> 

                                </div>

                                <div class="search-row">  

                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="garagem"> Garagem(3100)
                                            </label>
                                        </div>
                                    </div>
                                    <!-- End of    

                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Dual Sinks(500)
                                            </label>
                                        </div>
                                    </div>
                                    -->
                                    <!-- End of  

                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Hurricane Shutters(99)
                                            </label>
                                        </div>
                                    </div>
                                    --> 
                                    <!-- End of  

                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Piscina(1190)
                                            </label>
                                        </div>
                                    </div>
                                    --> 
                                    <!-- End of  

                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Saída de Emergência(200)
                                            </label>
                                        </div>
                                    </div>
                                    --> 
                                    <!-- End of   

                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Quiosque(10073)
                                            </label>
                                        </div>
                                    </div>
                                    --> 
                                    <!-- End of    

                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Hidromassagem(1503)
                                            </label>
                                        </div>
                                    </div>
                                    --> 
                                    <!-- End of   

                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> 26' Ceilings(1200)
                                            </label>
                                        </div>
                                    </div>
                                    --> 
                                    <!-- End of  --> 
                                </div>   
                            </div>  
                            <div class="center">
                                <input type="submit" value="" class="btn btn-default btn-lg-sheach">
                            </div>

                            <input type="hidden" name="qtd" value="12">
                            <input type="hidden" name="order" value="AVALIACAO+DESC">
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- property area -->
        <div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Melhor Classificação</h2>
                        <p>Selecionamos os melhores imóveis para você. </p>
                    </div>
                </div>

                <div class="row">
                    <div class="proerty-th">
                        <?php

                            $Propriedade = new Propriedade;

                            $PropriedadeImg = new PropriedadeImagem;

                            $resultTopList = $Propriedade->GetPropriedadeByOrdemAndLimit("AVALIACAO DESC, DATA_CADASTRO DESC",7);

                            while ($row = $resultTopList->fetch(PDO::FETCH_OBJ)) {
                                
                        ?>
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <?php 
                                        $resultImg = $PropriedadeImg->GetImgPropriedadeByIdPropriedadeAndLimit($row->ID, 1);

                                        while($rowImg = $resultImg->fetch(PDO::FETCH_OBJ))
                                        {
                                    ?>
                                    <a href="property.php?id=<?php echo $row->ID?>" ><img src="<?php echo $rowImg->CAMINHO?>"></a>
                                    <?php }?>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property.php?id=<?php echo $row->ID?>" ><?php echo $row->NOME?> </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Área :</b> <?php echo $row->AREA_M2?>m² </span>
                                    <span class="proerty-price pull-right">R$ <?php echo $row->VALOR?></span>
                                </div>
                            </div>
                        </div>

                        <?php }?>

                        <!--
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-2.html" ><img src="assets/img/demo/property-2.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-2.html" >Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Area :</b> 120m </span>
                                    <span class="proerty-price pull-right">$ 300,000</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-3.html" ><img src="assets/img/demo/property-3.jpg"></a>

                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-3.html" >Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Area :</b> 120m </span>
                                    <span class="proerty-price pull-right">$ 300,000</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html" ><img src="assets/img/demo/property-4.jpg"></a>

                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html" >Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Area :</b> 120m </span>
                                    <span class="proerty-price pull-right">$ 300,000</span>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-3.html" ><img src="assets/img/demo/property-2.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-3.html" >Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Area :</b> 120m </span>
                                    <span class="proerty-price pull-right">$ 300,000</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-2.html" ><img src="assets/img/demo/property-4.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-2.html" >Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Area :</b> 120m </span>
                                    <span class="proerty-price pull-right">$ 300,000</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html" ><img src="assets/img/demo/property-3.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html" >Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Area :</b> 120m </span>
                                    <span class="proerty-price pull-right">$ 300,000</span>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <div class="item-tree-icon">
                                    <i class="fa fa-th"></i>
                                </div>
                                <div class="more-entry overflow">
                                    <h5><a href="properties.php?filter=false&orderData=asc" >Você Decide ? </a></h5>
                                    <button class="btn border-btn more-black" value="All properties" 
                                        onclick="window.location.href='properties.php?qtd=12&order=avaliacao%2Bdesc'">
                                         Mais propriedades
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--
        <div class="boy-sale-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6" align="center">
                        <iframe id="frmPreview" frameborder="0" scrolling="no" width="300" height="200" 
                            style="border:none;" src="https://selos.agrolink.com.br/selos/carregaselo?servico=cotacoes&uf=9839,9844,9845&p=1788,1090,9&l=&esp=&cor=rgb(255,140,0)&w=300&h=200">
                        </iframe>
                    </div>
                    <div class="col-sm-6 col-md-6" align="center">
                        <div class="col-md-4">
                            <iframe id="frmPreview" frameborder="0" scrolling="no" width="300" height="200" 
                                style="border:none;" 
                                src="https://selos.agrolink.com.br/selos/carregaselo?servico=financas&uf=&p=&l=&esp=&cor=rgb(255,140,0)&w=200&h=115">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->

          <?php require ('footer.php') ?>

        <script src="../assets/js/modernizr-2.6.2.min.js"></script>

        <script src="../assets/js/jquery-1.10.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bootstrap-select.min.js"></script>
        <script src="../assets/js/bootstrap-hover-dropdown.js"></script>

        <script src="../assets/js/easypiechart.min.js"></script>
        <script src="../assets/js/jquery.easypiechart.min.js"></script>

        <script src="../assets/js/owl.carousel.min.js"></script>        

        <script src="../assets/js/wow.js"></script>

        <script src="../assets/js/icheck.min.js"></script>
        <script src="../assets/js/price-range.js"></script>

        <script src="../assets/js/main.js"></script>
      
    </body>
</html>