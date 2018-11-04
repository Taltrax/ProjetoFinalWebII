<?php

	require_once('classes/class.ContaDAO.php');
	
	$contaDAO = new ContaDAO();

	$id = '';
	$nome = '';

	if(isset($_GET['id']) and !empty($_GET['id'])){
		
		$acao = 'alterar';

		$id = $_GET['id'];
		$conta = $contaDAO->buscar($id);

		$nome = $conta->getNome();
	
	}else{
		$acao = 'cadastrar';
	}

	$contas = $contaDAO->listar();

?>