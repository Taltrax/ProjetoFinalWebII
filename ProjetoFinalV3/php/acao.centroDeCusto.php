<?php

	/*
		Criado por Guilherme Mayer
		Em: 17/10/2018
	*/
	require_once('..\classes\class.CentroCustosDAO.php');

	switch ($_REQUEST['acao']) {
			
		case 'cadastrar':{
		
			$novo_cc = new CentroCustos();
			$novo_cc->setNome($_POST['novo_cc']);
			$novo_ccDAO = new CentroCustosDAO();
			$result = $novo_ccDAO->addCentroCustos($novo_cc);
			
			if($result){

				$sucesso = urlencode('Centro de custo <b>'.$novo_cc->getNome().'</b> cadastrado com sucesso!');
				die(header('Location: ..\index.php?secao=manter&modulo=centroDeCusto&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode('Erro ao cadastrar a centro de custo!');
				die(header('Location: ..\index.php?secao=manter&modulo=centroDeCusto&erro='.$erro));
			}
			
			break;

		}
			
		case 'alterar':{

			$up_cc = new CentroCustos();
			$up_cc->setId($_POST['id']);
			$up_cc->setNome($_POST['novo_cc']);
				
			$upDAO = new CentroCustosDAO();
			$result = $upDAO->altCentroCustos($up_cc);
				
			if($result){

				$sucesso = urlencode('Sucesso ao alterar o centro de custo!');
				die(header('Location: ..\index.php?secao=manter&modulo=centroDeCusto&sucesso='.$sucesso));
			
			}else{
				
				$erro = urlencode('Erro ao alterar o centro de custo!');
				die(header('Location: ..\index.php?secao=manter&modulo=centroDeCusto&id='.$up_cc->getId().'&erro='.$erro));

			}
			
			break;
		}
			
		case 'deletar':{
		
			$cc = new CentroCustos();
			$cc->setId($_GET['id']);

			$delDAO = new CentroCustosDAO();
			$result = $delDAO->delCentroCustos($cc);

			if($result){

				$sucesso = urlencode('Sucesso ao excluir o centro de custo!');
				die(header('Location: ..\index.php?secao=manter&modulo=centroDeCusto&sucesso='.$sucesso));
			
			}else{
				
				$erro = urlencode('Erro ao excluir o centro de custo!');
				die(header('Location: ..\index.php?secao=manter&modulo=centroDeCusto&erro='.$erro));

			}
		
			break;
		}

		default:
			die('Ação inválida');
		
	}
	
?>
