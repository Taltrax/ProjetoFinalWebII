<?php 

	//Criado por Guilherme Mayer em 29/11/2018
	//Modificado por João Pedro da Silva Fernandes em 01/12/2018

	require_once("classes\class.RelatorioCCDAO.php");
	require_once("classes\class.RelatorioCC.php");
	require_once("classes\class.ContaDAO.php");

	$conta = new ContaDAO();
	$contas = $conta->listar(); 

	$busca = new RelatorioCCDAO();
	
	$filtro_tipoMov = '';
	$filtro_conta = '';
	$filtro_mes = '';
	$filtro_ano = '';

	if(isset($_POST['f_conta']) && !empty($_POST['f_conta'])){
		$filtro_conta = $_POST['f_conta'];
	}

	if(isset($_POST['f_mes']) && !empty($_POST['f_mes'])){
		$filtro_mes = $_POST['f_mes'];
	}

	if(isset($_POST['f_ano']) && !empty($_POST['f_ano'])){
		$filtro_ano = $_POST['f_ano'];
	}

	if(isset($_POST['f_tipo_mov']) && !empty($_POST['f_tipo_mov'])){
		$filtro_tipoMov = $_POST['f_tipo_mov'];
		$cc_resultados = $busca->listarCC($filtro_mes , $filtro_ano, $filtro_conta, $filtro_tipoMov);

	}else{

		$cc_creditos = $busca->listarCC($filtro_mes , $filtro_ano, $filtro_conta, "credito");
		$cc_debitos = $busca->listarCC($filtro_mes , $filtro_ano, $filtro_conta, "debito");
	}
	
?>