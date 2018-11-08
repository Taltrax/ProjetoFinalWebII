<?php

	require_once('classes/class.CentroCustosDAO.php');
	
	$ccDAO = new CentroCustosDAO();

	$id = '';
	$nome = '';

	if(isset($_GET['id']) and !empty($_GET['id'])){
		
		$acao = 'alterar';

		$id = $_GET['id'];
		$cc = $ccDAO->buscar($id);

		$nome = $cc->getNome();
	
	}else{
		$acao = 'cadastrar';
	}

	$ccs = $ccDAO->listar();

?>