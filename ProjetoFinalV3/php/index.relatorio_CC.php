<!-- 
	Criado por: Guilherme Mayer
	Em: 26/11/2018
-->
<?php

	require_once("classes\class.RelatorioCCDAO.php");
	require_once("classes\class.ContaDAO.php");

	$conta = new ContaDAO();
	$contas = $conta->listar();



?>