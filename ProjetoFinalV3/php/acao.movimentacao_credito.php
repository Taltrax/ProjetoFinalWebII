<?php

	/*
		Criado por: João Pedro da Silva Fernandes
		Em: 05/11/2018
	*/

	require_once('../classes/class.MovimentacaoDAO.php');

	switch($_REQUEST['acao']){

		case 'cadastrar':{

			$idCentroCustos = $_POST['f_centro_custos'];
			$idConta = $_POST['f_conta'];
			$tipoMov = $_POST['f_tipo_mov'];
			$data = $_POST['f_data'];
			$descricao = $_POST['f_descricao'];
			$valor = $_POST['f_valor'];

			$credito = new Movimentacao();

			$credito->setIdCentroCustos($idCentroCustos);
			$credito->setIdConta($idConta);
			$credito->setTipoMov($tipoMov);
			$credito->setData($data);
			$credito->setDescricao($descricao);
			$credito->setValor($valor);
			
			$movDAO = new MovimentacaoDAO();

			if($movDAO->addMovimentacao($credito)){

				$sucesso = urlencode('Crédito cadastrado com sucesso!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=credito&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode('Erro ao cadastrar o crédito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=credito&erro='.$erro));
			}

			break;
		}

		case 'alterar':{

			$id = $_POST['id'];
			$idCentroCustos = $_POST['f_centro_custos'];
			$idConta = $_POST['f_conta'];
			$tipoMov = $_POST['f_tipo_mov'];
			$data = $_POST['f_data'];
			$descricao = $_POST['f_descricao'];
			$valor = $_POST['f_valor'];

			$credito = new Movimentacao();

			$credito->setId($id);
			$credito->setIdCentroCustos($idCentroCustos);
			$credito->setIdConta($idConta);
			$credito->setTipoMov($tipoMov);
			$credito->setData($data);
			$credito->setDescricao($descricao);
			$credito->setValor($valor);
			
			$movDAO = new MovimentacaoDAO();

			if($movDAO->altMovimentacao($credito)){

				$sucesso = urlencode('Sucesso ao alterar o crédito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=credito&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode('Erro ao alterar o crédito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=credito&id='.$id.'&erro='.$erro));
			}

			break;
		}

		case 'deletar':{

			$id = $_REQUEST['id'];

			$credito = new Movimentacao();
			$credito->setId($id);

			$movDAO = new MovimentacaoDAO();

			if($movDAO->delMovimentacao($credito)){

				$sucesso = urlencode('Sucesso ao excluir o crédito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=credito&sucesso='.$sucesso));

			}else{

				$erro = urlencode('Erro ao excluir o crédito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=credito&erro='.$erro));
			}

			break;
		}

		default:
			die('ação inválida');

	}

?>