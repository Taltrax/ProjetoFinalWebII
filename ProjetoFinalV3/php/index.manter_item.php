<?php

	require_once('classes/class.ItemDAO.php');
	
	$itemDAO = new ItemDAO();

	$idItem = '';
	$descricao = '';

	if(isset($_GET['idItem']) and !empty($_GET['idItem'])){
		
		$acao = 'alterar';

		$idItem = $_GET['idItem'];
		$item = $itemDAO->buscarItem($idItem);

		$descricao = $item->getDescricao();
	
	}else{
		$acao = 'cadastrar';
	}

	$itens = $itemDAO->buscarItens();

?>