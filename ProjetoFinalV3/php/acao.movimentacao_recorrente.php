<?php

	/*
		Criado por: João Pedro da Silva Fernandes
		Em: 01/12/2018
	*/

	require_once('../classes/class.RecorrenteDAO.php');

	switch($_REQUEST['acao']){

		case 'cadastrar':{

			$idCentroCustos = $_POST['f_centro_custos'];
			$idConta = $_POST['f_conta'];
			$tipoMov = $_POST['f_tipo_mov'];
			$dia = $_POST['f_dia'];
			$descricao = $_POST['f_descricao'];
			
			$valor = str_replace(['.',','], ['','.'], $_POST['f_valor']);

			$recorrente = new Recorrente();

			$recorrente->getCentroCustos()->setId($idCentroCustos);
			$recorrente->getConta()->setId($idConta);
			$recorrente->setTipoMov($tipoMov);
			$recorrente->setDia($dia);
			$recorrente->setDescricao($descricao);
			$recorrente->setValor($valor);

			$recDAO = new RecorrenteDAO();

			if($recDAO->addRecorrente($recorrente)){
				
				$sucesso = urlencode("Recorrente cadastrado com sucesso!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=recorrente&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode("Erro ao cadastrar recorrente!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=recorrente&erro='.$erro));
			}

			break;
		}

		case 'alterar':{

			$id = $_POST['id'];
			$idCentroCustos = $_POST['f_centro_custos'];
			$idConta = $_POST['f_conta'];
			$tipoMov = $_POST['f_tipo_mov'];
			$dia = $_POST['f_dia'];
			$descricao = $_POST['f_descricao'];

			$valor = str_replace(['.',','], ['','.'], $_POST['f_valor']);

			$recorrente = new Recorrente();

			$recorrente->setId($id);
			$recorrente->getCentroCustos()->setId($idCentroCustos);
			$recorrente->getConta()->setId($idConta);
			$recorrente->setTipoMov($tipoMov);
			$recorrente->setDia($dia);
			$recorrente->setDescricao($descricao);
			$recorrente->setValor($valor);
			
			$recDAO = new RecorrenteDAO();

			if($recDAO->altRecorrente($recorrente)){

				$sucesso = urlencode("Sucesso ao alterar recorrente!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=recorrente&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode("Erro ao alterar recorrente!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=recorrente&id='.$id.'&erro='.$erro));
			}

			break;
		}

		case 'deletar':{

			$id = $_REQUEST['id'];

			$recDAO = new RecorrenteDAO();
			$recorrente = new Recorrente();
			$recorrente->setId($id);

			if($recDAO->delRecorrente($recorrente)){

				$sucesso = urlencode("Sucesso ao excluir recorrente!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=recorrente&sucesso='.$sucesso));

			}else{

				$erro = urlencode("Erro ao excluir recorrente!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=recorrente&erro='.$erro));
			}

			break;
		}

		default:
			die('ação inválida');

	}

?>