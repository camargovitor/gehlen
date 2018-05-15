<?php
if (isset ( $_GET ['menu'] )) {
	
	$menu = $_GET ['menu'];
} else {
	
	$menu = "Comando Não Encontrado";
}
/*
 * if (isset ( $_GET ['acao'] )) {
 *
 * $acao = $_GET ['acao'];
 * } else {
 *
 * $acao = "Comando N�o Encontrado";
 * }
 */
switch ($menu) {
	case 'home':
	{
		include_once ('admin_home.php');
		break;
	}
	
	case 'cad_cliente':
	{
		include_once ('admin_cad_cliente.php');
		break;
	}

	case 'cad_usuario':
	{
		include_once ('admin_cad_usuario.php');
		break;
	}

	case 'cad_propriedade':
	{
		include_once ('admin_cad_propriedade.php');
		break;
	}

	case 'list_cliente':
	{
		include_once ('admin_list_cliente.php');
		break;
	}

	case 'list_usuario':
	{
		include_once ('admin_list_usuario.php');
		break;
	}

	case 'link_image':
	{
		include_once ('admin_link_imagem.php');
		break;
	}

	case 'edit_image':
	{
		include_once ('admin_edit_imagem.php');
		break;
	}

	case 'list_propriedade':
	{
		include_once ('admin_list_propriedade.php');
		break;
	}
}

?>