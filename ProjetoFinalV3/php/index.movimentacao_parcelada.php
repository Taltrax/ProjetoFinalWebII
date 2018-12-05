<?php

	/*
		Criado por: Guilherme Mayer
		Em: 04/12/2018
	*/

	require_once('classes/class.ParcelaDAO.php');
	require_once('classes/class.CentroCustosDAO.php');
	require_once('classes/class.ContaDAO.php');
	require_once('classes/class.ItemDAO.php');

	date_default_timezone_set('America/Sao_Paulo');
	$data = date('Y-m-d');
	
	$parDAO = new ParcelaDAO();
	$ccDAO = new CentroCustosDAO();
	$cDAO = new ContaDAO();
	$iDAO = new ItemDAO();
	$parcelada = new Parcela();

	if(isset($_GET['id']) and !empty($_GET['id'])){
		

		$id = $_GET['id'];

		$parcelada = $parDAO->buscar($id);
		$vezes = explode("/", $parcelada->getParcela());
		$parcelada->setParcela($vezes[1]);

		if(!$parcelada){
			die('Id inválido');
		}

	}

	$parceladas = $parDAO->listar($data);
	$centrosCustos = $ccDAO->listar();
	$item = $iDAO->buscarItens();
	$contas = $cDAO->listar();
		
?>