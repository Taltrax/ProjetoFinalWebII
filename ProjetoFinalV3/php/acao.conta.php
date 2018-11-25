<?php

	/*
		Criado por Guilherme Mayer
		Em: 17/10/2018
		Rev 1: 22/11/2018
	*/

	require_once('..\classes\class.ContaDAO.php');

	switch ($_REQUEST['acao']) {
			
		case 'cadastrar':{
		
			$nova_conta = new Conta();
			$nova_conta->setNome($_POST['nova_conta']);
			$nova_contaDAO = new ContaDAO();
			$result = $nova_contaDAO->addConta($nova_conta);
			
			if($result){

				$sucesso = urlencode('Conta <b>'.$nova_conta->getNome().'</b> cadastrada com sucesso!');
				die(header('Location: ..\index.php?secao=manter&modulo=conta&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode('Erro ao cadastrar a conta!');
				die(header('Location: ..\index.php?secao=manter&modulo=conta&erro='.$erro));
			}
			
			break;

		}
			
		case 'alterar':{

			$up_ca = new Conta();
			$up_ca->setId($_POST['id']);
			$up_ca->setNome($_POST['nova_conta']);
			$saldo = str_replace(['.',','],['','.'],$_POST['saldo']);
			$up_ca->setSaldo($saldo);
				
			$upDAO = new ContaDAO();
			$result = $upDAO->altConta($up_ca);
				
			if($result){

				$sucesso = urlencode('Sucesso ao alterar a conta!');
				die(header('Location: ..\index.php?secao=manter&modulo=conta&sucesso='.$sucesso));
			
			}else{
				
				$erro = urlencode('Erro ao alterar a conta!');
				die(header('Location: ..\index.php?secao=manter&modulo=conta&id='.$up_ca->getId().'&erro='.$erro));

			}
			
			break;
		}
			
		case 'deletar':{
		
			$ca = new Conta();
			$ca->setId($_GET['id']);

			$delDAO = new ContaDAO();
			$result = $delDAO->delConta($ca);

			if($result){

				$sucesso = urlencode('Sucesso ao excluir a conta!');
				die(header('Location: ..\index.php?secao=manter&modulo=conta&sucesso='.$sucesso));
			
			}else{
				
				$erro = urlencode('Erro ao excluir a conta!');
				die(header('Location: ..\index.php?secao=manter&modulo=conta&erro='.$erro));

			}
		
			break;
		}

		default:
			die('Ação inválida');
		
	}
	
?>
