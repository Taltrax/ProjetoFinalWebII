<?php

	/*
		Criado por: João Pedro da Silva Fernandes
		Em: 29/11/2018
	*/

	require_once('classes/class.RelatorioExtratoDAO.php');
	require_once('classes/class.ContaDAO.php');
	
	$extratoDAO = new RelatorioExtratoDAO();
	$extrato = new RelatorioExtrato();
	$contaDAO = new ContaDAO();

	$mes_filtro = '';
	$ano_filtro = '';
	$conta_filtro = '';

	if(isset($_POST['f_mes']) && !empty($_POST['f_mes'])){
		$mes_filtro = $_POST['f_mes'];
	}

	if(isset($_POST['f_ano']) && !empty($_POST['f_ano'])){
		$ano_filtro = $_POST['f_ano'];
	}

	if(isset($_POST['f_conta']) && !empty($_POST['f_conta'])){
		$conta_filtro = $_POST['f_conta'];	
	}

	$extrato->setMovimentacoes($extratoDAO->gerarExtrato($mes_filtro, $ano_filtro, $conta_filtro));
	$extrato->setSaldo($extratoDAO->gerarSaldoExtrato($mes_filtro, $ano_filtro, $conta_filtro));
	$contas = $contaDAO->listar();

?>