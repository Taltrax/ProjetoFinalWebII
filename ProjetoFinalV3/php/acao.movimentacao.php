<?php

	/*
		Criado por: João Pedro da Silva Fernandes
		Em: 05/11/2018
	*/

	require_once('../classes/class.MovimentacaoDAO.php');

	$tipo = $_REQUEST['f_tipo_mov'] == 'credito' ? 'crédito' : 'débito'; 
	

	switch($_REQUEST['acao']){

		case 'cadastrar':{

			$idCentroCustos = $_POST['f_centro_custos'];
			$idConta = $_POST['f_conta'];
			$tipoMov = $_POST['f_tipo_mov'];
			$data = $_POST['f_data'];
			$descricao = $_POST['f_descricao'];
			
			$valor = str_replace(['.',','], ['','.'], $_POST['f_valor']);

			$movimentacao = new Movimentacao();

			$movimentacao->getCentroCustos()->setId($idCentroCustos);
			$movimentacao->getConta()->setId($idConta);
			$movimentacao->setTipoMov($tipoMov);
			$movimentacao->setData($data);
			$movimentacao->setDescricao($descricao);
			$movimentacao->setValor($valor);
			
			$movDAO = new MovimentacaoDAO();

			if($movDAO->addMovimentacao($movimentacao)){

				$sucesso = urlencode("$tipo cadastrado com sucesso!");
				die(header('Location: ../index.php?secao=movimentacao&modulo='.$tipoMov.'&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode("Erro ao cadastrar o $tipo!");
				die(header('Location: ../index.php?secao=movimentacao&modulo='.$tipoMov.'&erro='.$erro));
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

			$valor = str_replace(['.',','], ['','.'], $_POST['f_valor']);

			$movimentacao = new Movimentacao();

			$movimentacao->setId($id);
			$movimentacao->getCentroCustos()->setId($idCentroCustos);
			$movimentacao->getConta()->setId($idConta);
			$movimentacao->setTipoMov($tipoMov);
			$movimentacao->setData($data);
			$movimentacao->setDescricao($descricao);
			$movimentacao->setValor($valor);
			
			$movDAO = new MovimentacaoDAO();

			if($movDAO->altMovimentacao($movimentacao)){

				$sucesso = urlencode("Sucesso ao alterar o $tipo!");
				die(header('Location: ../index.php?secao=movimentacao&modulo='.$tipoMov.'&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode("Erro ao alterar o $tipo!");
				die(header('Location: ../index.php?secao=movimentacao&modulo='.$tipoMov.'&id='.$id.'&erro='.$erro));
			}

			break;
		}

		case 'deletar':{

			$id = $_REQUEST['id'];
			$tipoMov = $_REQUEST['f_tipo_mov'];

			$movimentacao = new Movimentacao();
			$movimentacao->setId($id);

			$movDAO = new MovimentacaoDAO();

			if($movDAO->delMovimentacao($movimentacao)){

				$sucesso = urlencode("Sucesso ao excluir o $tipo!");
				die(header('Location: ../index.php?secao=movimentacao&modulo='.$tipoMov.'&sucesso='.$sucesso));

			}else{

				$erro = urlencode("Erro ao excluir o $tipo!");
				die(header('Location: ../index.php?secao=movimentacao&modulo='.$tipoMov.'&erro='.$erro));
			}

			break;
		}

		default:
			die('ação inválida');

	}

?>