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

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
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
        <link rel="stylesheet" href="../assets/css/lightslider.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">

        <?php require_once ('../controller/cPropertyList.php')?>
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <?php require_once ('header.php');?>

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"><?php echo ($rowPropriedade->NOME)?> </h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-1 ">
                        <div class="row">
                            <div class="light-slide-item">            
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i> 
                                        </a>
                                    </div> 

                                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                        <?php
                                            while($rowImg = $resultImg->fetch(PDO::FETCH_OBJ))
                                            {
                                        ?>
                                        <li data-thumb="<?php echo $rowImg->CAMINHO?>"> 
                                            <img src="<?php echo $rowImg->CAMINHO?>" width="850" height="570"/>
                                        </li>
                                        <?php } ?>                                                   
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-property-wrapper">
                            <div class="single-property-header">                                          
                                <h1 class="property-title pull-left"><?php echo $rowPropriedade->NOME?></h1>
                                <span class="property-price pull-right">R$<?php echo $rowPropriedade->VALOR?></span>
                            </div>

                            <div class="property-meta entry-meta clearfix ">   

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <?php 
                                        $icon = "";
                                        $statusPropriedade = "";

                                        if ($rowPropriedade->STATUS_PROPRIEDADE == "COMPRA")
                                        {
                                            $icon = "../assets/img/icon/sale-orange.png";
                                        }
                                        else if ($rowPropriedade->STATUS_PROPRIEDADE == "VENDA")
                                        {
                                            $icon = "../assets/img/icon/sale-orange.png";
                                        }
                                        else if ($rowPropriedade->STATUS_PROPRIEDADE == "ALUGUEL"){
                                            $icon = "../assets/img/icon/rent-orange.png";
                                        }
                                    ?>
                                    <span class="property-info-icon icon-tag">                                        
                                        <img src="<?php echo $icon?>">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Status</span>
                                        <span class="property-info-value"><?php 
                                            echo ucfirst(strtolower($rowPropriedade->STATUS_PROPRIEDADE));
                                            ?>
                                        </span>
                                    </span>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info icon-area">
                                        <img src="../assets/img/icon/room-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Área M²</span>
                                        <span class="property-info-value"><?php echo $rowPropriedade->AREA_M2?></span>
                                    </span>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-bed">
                                        <img src="../assets/img/icon/bed-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Domitório</span>
                                        <span class="property-info-value"><?php echo $rowPropriedade->DORMITORIO?></span>
                                    </span>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-bed">
                                        <img src="../assets/img/icon/cars-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Garagem</span>
                                        <span class="property-info-value"><?php echo $rowPropriedade->GARAGEM?></span>
                                    </span>
                                </div>
                                <!--
                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-bath">
                                        <img src="../assets/img/icon/os-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Bathrooms</span>
                                        <span class="property-info-value">3.5</span>
                                    </span>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-garage">
                                        <img src="../assets/img/icon/room-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Garages</span>
                                        <span class="property-info-value">2</span>
                                    </span>
                                </div>
                                -->
                                <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-garage">
                                        <img src="../assets/img/icon/shawer-orange.png">
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label">Banheiro</span>
                                        <span class="property-info-value"><?php echo $rowPropriedade->BANHEIRO?></span>
                                    </span>
                                </div>


                            </div>
                            <!-- .property-meta -->

                            <div class="section">
                                <h4 class="s-property-title">Descricao</h4>
                                <div class="s-property-content">
                                    <p><?php echo $rowPropriedade->DESCRICAO?></p>
                                </div>
                            </div>
                            <!-- End description area  -->

                            <div class="section additional-details">

                                <h4 class="s-property-title">Detalhes Adicionais</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Modelo 1</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Yes</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Construido Em</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">2003</span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Modelo 2</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Descrição Modelo 2</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Modelo 3</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Descrição Modelo 3</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Modelo 4</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Descrição Modelo 4</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Modelo 5</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Descrição Modelo 5</span>
                                    </li> 

                                </ul>
                            </div>  
                            <!-- End additional-details area  

                            <div class="section property-features">      

                                <h4 class="s-property-title">Características</h4>                            
                                <ul>
                                    <li><a href="properties.html">Modelo 1</a></li>   
                                    <li><a href="properties.html">Modelo 2</a></li>
                                    <li><a href="properties.html">Modelo 3</a></li>
                                    <li><a href="properties.html">Modelo 4</a></li>
                                    <li><a href="properties.html">Modelo 5</a></li>
                                    <li><a href="properties.html">Modelo 6</a></li>
                                </ul>

                            </div>
                            -->
                            <!-- End features area  -->
                            
                            <!--
                            <div class="section property-share"> 
                                <h4 class="s-property-title">Share width your friends </h4> 
                                <div class="roperty-social">
                                    <ul> 
                                        <li><a title="Share this on dribbble " href="#"><img src="../assets/img/social_big/dribbble_grey.png"></a></li>                                         
                                        <li><a title="Share this on facebok " href="#"><img src="assets/img/social_big/facebook_grey.png"></a></li> 
                                        <li><a title="Share this on delicious " href="#"><img src="assets/img/social_big/delicious_grey.png"></a></li> 
                                        <li><a title="Share this on tumblr " href="#"><img src="assets/img/social_big/tumblr_grey.png"></a></li> 
                                        <li><a title="Share this on digg " href="#"><img src="assets/img/social_big/digg_grey.png"></a></li> 
                                        <li><a title="Share this on twitter " href="#"><img src="assets/img/social_big/twitter_grey.png"></a></li> 
                                        <li><a title="Share this on linkedin " href="#"><img src="assets/img/social_big/linkedin_grey.png"></a></li>                                        
                                    </ul>
                                </div>
                            </div>
                             End video area  -->
                            
                        </div>
                    </div>


                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">

                                        <div class="clear">
                                            <div class="col-xs-8 col-sm-8 ">
                                                <h3 class="dealer-name">
                                                    <span><h3>Moisés Gehlen</h3></span> 
                                                    <span>Negócios Imobiliários</span>        
                                                </h3>
                                                <!--
                                                <div class="dealer-social-media">
                                                    
                                                    <a class="twitter" target="_blank" href="">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    
                                                    <a class="facebook" target="_blank" href="https://www.facebook.com/imobiliariagehlen.com.br/">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    
                                                    <a class="gplus" target="_blank" href="">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                    <a class="linkedin" target="_blank" href="">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a> 
                                                    <a class="instagram" target="_blank" href="">
                                                        <i class="fa fa-instagram"></i>
                                                    
                                                    </a>       
                                                </div>
                                                -->
                                            </div>
                                        </div>

                                        <div class="clear">
                                            <ul class="dealer-contacts">                                       
                                                <li><i class="pe-7s-map-marker strong"> </i> Av Alto Jacuí Nº 676 - Não Me Toque, RS, Brasil</li>
                                                <li><i class="pe-7s-mail strong"> </i>  gehlennegociosimobiliarios@hotmail.com</li>
                                                <li><i class="pe-7s-call strong"> </i> (54) 99141-9160</li>
                                            </ul>
                                            <p>Duis mollis  blandit tempus porttitor curabiturDuis mollis  blandit tempus porttitor curabitur , est non…</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                          

                            <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Parceiros  </h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <img src="../assets/img/ads.jpg">
                                </div>
                            </div>
                            <!--
                            <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Smart search</h3>
                                </div>
                                <div class="panel-body search-widget">
                                    <form action="" class=" form-inline"> 
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Key word">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-6">

                                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">

                                                        <option>New york, CA</option>
                                                        <option>Paris</option>
                                                        <option>Casablanca</option>
                                                        <option>Tokyo</option>
                                                        <option>Marraekch</option>
                                                        <option>kyoto , shibua</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6">

                                                    <select id="basic" class="selectpicker show-tick form-control">
                                                        <option> -Status- </option>
                                                        <option>Rent </option>
                                                        <option>Boy</option>
                                                        <option>used</option>  

                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">Price range ($):</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[0,450]" id="price-range" ><br />
                                                    <b class="pull-left color">2000$</b> 
                                                    <b class="pull-right color">100000$</b>                                                
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="property-geo">Property geo (m2) :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[50,450]" id="property-geo" ><br />
                                                    <b class="pull-left color">40m</b> 
                                                    <b class="pull-right color">12000m</b>                                                
                                                </div>                                            
                                            </div>
                                        </fieldset>                                

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">Min baths :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[250,450]" id="min-baths" ><br />
                                                    <b class="pull-left color">1</b> 
                                                    <b class="pull-right color">120</b>                                                
                                                </div>

                                                <div class="col-xs-6">
                                                    <label for="property-geo">Min bed :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[250,450]" id="min-bed" ><br />
                                                    <b class="pull-left color">1</b> 
                                                    <b class="pull-right color">120</b>

                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Fire Place</label>
                                                    </div> 
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Dual Sinks</label>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Swimming Pool</label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> 2 Stories </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label><input type="checkbox"> Laundry Room </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Emergency Exit</label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox" checked> Jog Path </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> 26' Ceilings </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-12"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> Hurricane Shutters </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="Search" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset>                                     
                                    </form>
                                </div>
                            </div>
                            -->

                        </aside>
                    </div>
                </div>

            </div>
        </div>


          <!-- Footer area-->
        <?php require_once ('footer.php')?>
          
        
        
        <script src="../assets/js/vendor/modernizr-2.6.2.min.js"></script>
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
        <script type="text/javascript" src="../assets/js/lightslider.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script>
            $(document).ready(function () {

                $('#image-gallery').lightSlider({
                    gallery: true,
                    item: 1,
                    thumbItem: 9,
                    slideMargin: 0,
                    speed: 500,
                    auto: true,
                    loop: true,
                    onSliderLoad: function () {
                        $('#image-gallery').removeClass('cS-hidden');
                    }
                });
            });
        </script>

    </body>
</html>