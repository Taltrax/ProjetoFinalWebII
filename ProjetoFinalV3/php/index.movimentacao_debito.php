<?php

	/*
		Criado por: Guilherme Rodrigues Mayer
		Em: 08/11/2018
	*/

	require_once('classes/class.MovimentacaoDAO.php');
	require_once('classes/class.CentroCustosDAO.php');
	require_once('classes/class.ContaDAO.php');
	
	$movDAO = new MovimentacaoDAO();
	$ccDAO = new CentroCustosDAO();
	$cDAO = new ContaDAO();
	$debito = new Movimentacao();

	if(isset($_GET['id']) and !empty($_GET['id'])){
		

		$id = $_GET['id'];

		$debito = $movDAO->buscarDebito($id);
		
		if(!$debito){
			die('Id inválido');
		}

	}

	$debitos = $movDAO->buscarDebitos();
	$centrosCustos = $ccDAO->listar();
	$contas = $cDAO->listar();

?>