<?php

	/*
		Criado por: João Pedro da Silva Fernandes
		Em: 22/11/2018
	*/

	require_once('classes/class.MovimentacaoDAO.php');
	require_once('classes/class.ContaDAO.php');
	
	$movDAO = new MovimentacaoDAO();
	$contaDAO = new ContaDAO();

	$debitos = $movDAO->buscarMovimentacoes("debito", 4);
	$movs = $movDAO->buscarMovimentacoes('', 4);
	$contas = $contaDAO->listar();

?>