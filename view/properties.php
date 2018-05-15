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
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <?php require_once ('../controller/cPropriedadeList.php'); ?>
    </head>
    <body>
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <?php require_once ('header.php'); ?>

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Pesquise por sua melhor escolha</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">   
                <div class="row">
                    <div class="col-md-9 padding-top-40 properties-page">
                        <form method="post" action="?">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="ordenar">Ordenar Por:</label>
                                    <select class="form-control" id="campo" name="ordenar" onchange="alterURL()">
                                        <option value="AVALIACAO">Avaliação</option>
                                      <option value="DATA_CADASTRO">Data</option>
                                      <option value="VALOR">Valor</option>
                                      <option value="AREA_M2">Área</option>
                                      <option value="NOME">Nome</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ordem">Ordem:</label>
                                    <select class="form-control" id="ordem" name="ordem" onchange="alterURL()">
                                        <option value="desc">Descrescente</option>
                                        <option value="asc">Ascendente</option>
                                    </select>
                                </div>
                                <!--
                                <div class="form-group col-md-3">  
                                    <label for="send"> </label>
                                    <input class="btn-secondary" value="Ordenar" type="submit" id="send">
                                </div>
                                -->
                            </div>
                        </form>
                        
                        
                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                        </div><!--/ .layout-switcher-->
                        <div class="section clear"> 
                            <div id="list-type" class="proerty-th">
                                <?php
                                    
                                    while ($row = $result->fetch(PDO::FETCH_OBJ))
                                    {
                                        $resultImg = $PropriedadeImagem->GetImgPropriedadeByIdPropriedadeAndLimit($row->ID, 1);
                                        

                                ?>

                                <div class="col-sm-6 col-md-4 p0">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <?php while($rowImg = $resultImg->fetch(PDO::FETCH_OBJ))
                                                {
                                            ?>
                                            <a href=<?php echo("property.php?id=$row->ID") ?> ><img src='<?php echo($rowImg->CAMINHO);?>'></a>
                                            <?php } ?>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5><a href="<?php echo("property.php?id=$row->ID") ?>"> <?php echo($row->NOME)?> </a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Area :</b> <?php echo("$row->AREA_M2 m²")?> </span>
                                            <span class="proerty-price pull-right"> R$ <?php echo number_format($row->VALOR,"2",",",".");?></span>
                                            <p style="display: none;"><?php echo $row->DESCRICAO?></p>
                                            <div class="property-icon">
                                                <img src="../assets/img/icon/bed.png">(<?php echo($row->DORMITORIO)?>)|
                                                <img src="../assets/img/icon/shawer.png">(<?php echo($row->BANHEIRO)?>)|
                                                <img src="../assets/img/icon/cars.png">(<?php echo($row->GARAGEM)?>)  
                                            </div>
                                        </div> 
                                    </div>
                                </div> 
                                
                                <?php }?>

                            </div>
                        </div>
                    </div> 
                    <div class="col-md-3 pl0 padding-top-40">
                        <div class="blog-asside-right pl0">
                            <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Smart Pesquisa</h3>
                                </div>
                                <div class="panel-body search-widget">
                                    <form action="properties.php" class=" form-inline" method="get"> 
                                        <!--
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Key word">
                                                </div>
                                            </div>
                                        </fieldset>
                                        -->
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-6">

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
                                                <div class="col-xs-6">

                                                    <select id="basic" class="selectpicker show-tick form-control" name="status" title="Status">
                                                        <option value="compra">Compra </option>
                                                        <option value"aluguel">Aluguel</option>  

                                                    </select>
                                                </div>
                                                <div class="col-xs-6">
                                                <br>
                                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Tipo Imóvel" name="tipo_imovel">
                                                        <?php 
                                                            $TipoImovel = new Tipoimovel;
                                                                
                                                            $resultTipoImovel = $TipoImovel->GetTipoImovel("ORDER BY NOME ASC");//23 = rio grande do sul
                                                                
                                                            while($rowTipoImovel = $resultTipoImovel->fetch(PDO::FETCH_OBJ)){
                                                        ?>
                                                        <option value='<?php echo $rowTipoImovel->ID; ?>'><?php echo $rowTipoImovel->NOME;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="min_value">Valor Mínimo (R$):</label>         
                                                    <input type="number" step="1000.00" placeholder="Valor Mínimo..." id="lunchBegins" class="form-control" name="min_value"
                                                        value="0">
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="max_value">Valor Máximo (R$):</label>         
                                                    <input type="number" step="1000.00" placeholder="Valor Máximo..." id="lunchBegins" class="form-control" name="max_value"
                                                        value="3000000"> 
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="property-geo">Área (m2) :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="1" 
                                                           data-slider-max="1200" data-slider-step="1" 
                                                           data-slider-value="[1,1200]" id="property-geo" 
                                                           name="area"><br />
                                                    <b class="pull-left color">1m²</b> 
                                                    <b class="pull-right color">12000m²</b>                                               
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="price-range">Banheiros :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="5" data-slider-step="1" 
                                                           data-slider-value="[0,5]" id="min-baths" 
                                                           name="banheiro"><br />
                                                    <b class="pull-left color">0</b> 
                                                    <b class="pull-right color">5</b>                                                
                                                </div> 
                                                <div class="col-xs-6">  
                                                    <label for="property-geo">Dormitórios :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="5" data-slider-step="1" 
                                                           data-slider-value="[0,5]" id="min-bed" 
                                                           name="dormitorio"><br />
                                                    <b class="pull-left color">0</b> 
                                                    <b class="pull-right color">5</b>
                                                </div>                                         
                                            </div>
                                        </fieldset>                                
                                        <!--
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
                                        -->
                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="garagem"> Garagem(3100)
                                                    </label>
                                                    </div> 
                                                </div>
                                                <!--
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Dual Sinks</label>
                                                    </div>
                                                </div> 
                                                -->                                           
                                            </div>
                                        </fieldset>
                                        
                                        <!--
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
                                        -->
                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="Pesquisar" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset>                 
                                        <input type="hidden" name="qtd" value="12">
                                        <input type="hidden" name="order" value="AVALIACAO+DESC">                    
                                    </form>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>           
            </div>
        </div>

        <?php require_once ('footer.php'); ?>

        <script>
            var campo = getValueUrl("order",0);
            
            var ordem = getValueUrl("order", 1);

            $("#campo").val(campo);

            $("#ordem").val(ordem);

            //document.getElementById("campo") = campo;
            
            function getValueUrl(campo,position){
		    	var url = window.location.search
		    	var paramUrl = url.split("?")[1];
		    	var listParam = paramUrl.split("&");
		    	var getValue = "";
                
		    	for (var i = 0; i < listParam.length; i++){
		    		parametro = listParam[i].split("=");
                    
                    if (parametro[0] === campo)
                    {
                        var valor = parametro[1].split("%2B"); //%2B definie como + no get para o PHP

		    		    if (position === 0)
                            getValue = valor[0];
                        else if (position === 1)
                            getValue = valor[1];
                    }
		    			
		    	}
            
		    	return (getValue);
            }
            
            function alterURL(){
                var url = window.location.search
		        var paramUrl = url.split("?")[1];
		        var listParam = paramUrl.split("&");

		        window.location.search = "?" + createUrl(listParam);
            }

            function createUrl(listParam){
	        	var newUrl = ""
	        	for (var i = 0; i < listParam.length; i++){
	        		parametro = listParam[i].split("=");
                
	        		if (parametro[0] === "order")
                        parametro[1] = document.getElementById("campo").value + "%2B" 
                            + document.getElementById("ordem").value;

	        		newUrl += parametro[0] + "=" + parametro[1]
                
	        		//identificar ultimo registro para não adicionar o &
	        		if (! (i === (listParam.length - 1)))
	        			newUrl += "&";
                
	        		//console.log(parametro[1]);
	        	}
            
	        	return newUrl;
	        }
        </script>

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