<?php

	/*
		Criado por: João Pedro da Silva Fernandes
		Em: 05/11/2018
	*/

	require_once('classes/class.MovimentacaoDAO.php');
	require_once('classes/class.CentroCustosDAO.php');
	require_once('classes/class.ContaDAO.php');
	
	$movDAO = new MovimentacaoDAO();
	$ccDAO = new CentroCustosDAO();
	$cDAO = new ContaDAO();
	$credito = new Movimentacao();

	if(isset($_GET['id']) and !empty($_GET['id'])){
		

		$id = $_GET['id'];

		$credito = $movDAO->buscarCredito($id);
		
		if(!$credito){
			die('Id inválido');
		}

	}

	$creditos = $movDAO->buscarCreditos();
	$centrosCustos = $ccDAO->listar();
	$contas = $cDAO->listar();

?>