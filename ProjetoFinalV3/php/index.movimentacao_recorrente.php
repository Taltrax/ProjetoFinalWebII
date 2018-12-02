<?php

	/*
		Criado por: João Pedro da Silva Fernandes
		Em: 01/12/2018
	*/

	require_once('classes/class.RecorrenteDAO.php');
	require_once('classes/class.CentroCustosDAO.php');
	require_once('classes/class.ContaDAO.php');
	
	$recDAO = new RecorrenteDAO();
	$ccDAO = new CentroCustosDAO();
	$cDAO = new ContaDAO();
	$recorrente = new Recorrente();

	if(isset($_GET['id']) and !empty($_GET['id'])){
		

		$id = $_GET['id'];

		$recorrente = $recDAO->buscarRecorrente($id);
		
		if(!$recorrente){
			die('Id inválido');
		}

	}
	$recorrentes = $recDAO->buscarRecorrentes();
	$centrosCustos = $ccDAO->listar();
	$contas = $cDAO->listar();

?>