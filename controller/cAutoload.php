<?php
    function CarregarClasses($classe){
        require __DIR__.'/../model/'.$classe.'.class.php';
    }

    spl_autoload_register('CarregarClasses');
?>