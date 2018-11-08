<?php

	/*
		Criado por: Guilherme Rodrigues Mayer
		Em: 08/11/2018
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

			$debito = new Movimentacao();

			$debito->setIdCentroCustos($idCentroCustos);
			$debito->setIdConta($idConta);
			$debito->setTipoMov($tipoMov);
			$debito->setData($data);
			$debito->setDescricao($descricao);
			$debito->setValor($valor);
			
			$movDAO = new MovimentacaoDAO();

			if($movDAO->addMovimentacao($debito)){

				$sucesso = urlencode('Débito cadastrado com sucesso!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=debito&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode('Erro ao cadastrar o débito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=debito&erro='.$erro));
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

			$debito = new Movimentacao();

			$debito->setId($id);
			$debito->setIdCentroCustos($idCentroCustos);
			$debito->setIdConta($idConta);
			$debito->setTipoMov($tipoMov);
			$debito->setData($data);
			$debito->setDescricao($descricao);
			$debito->setValor($valor);
			
			$movDAO = new MovimentacaoDAO();

			if($movDAO->altMovimentacao($debito)){

				$sucesso = urlencode('Sucesso ao alterar o crédito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=debito&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode('Erro ao alterar o crédito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=debito&id='.$id.'&erro='.$erro));
			}

			break;
		}

		case 'deletar':{

			$id = $_REQUEST['id'];

			$debito = new Movimentacao();
			$debito->setId($id);

			$movDAO = new MovimentacaoDAO();

			if($movDAO->delMovimentacao($debito)){

				$sucesso = urlencode('Sucesso ao excluir o débito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=debito&sucesso='.$sucesso));

			}else{

				$erro = urlencode('Erro ao excluir o débito!');
				die(header('Location: ../index.php?secao=movimentacao&modulo=debito&erro='.$erro));
			}

			break;
		}

		default:
			die('ação inválida');

	}

?>