<?php

	require_once('../classes/class.itemDAO.php');

	switch($_REQUEST['acao']){

		case 'cadastrar':{

			$descricao = $_POST['f_descricao'];

			$item = new Item();
			$item->setDescricao($descricao);
			
			$itemDAO = new ItemDAO();

			if($itemDAO->addItem($item)){

				$sucesso = urlencode('Sucesso ao cadastrar o item');
				die(header('Location: ../index.php?secao=manter&modulo=item&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode('erro ao cadastrar o item');
				die(header('Location: ../index.php?secao=manter&modulo=item&erro='.$erro));
			}

			break;
		}

		case 'alterar':{

			$idItem = $_POST['idItem'];
			$descricao = $_POST['f_descricao'];

			$item = new Item();
			$item->setId($idItem);
			$item->setDescricao($descricao);
			
			$itemDAO = new ItemDAO();

			if($itemDAO->altItem($item)){

				$sucesso = urlencode('Sucesso ao alterar o item');
				die(header('Location: ../index.php?secao=manter&modulo=item&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode('erro ao alterar o item');
				die(header('Location: ../index.php?secao=manter&modulo=item&idItem='.$idItem.'&erro='.$erro));
			}


			break;
		}

		case 'deletar':{

			$idItem = $_REQUEST['idItem'];

			$item = new Item();
			$item->setId($idItem);

			$itemDAO = new ItemDAO();

			if($itemDAO->delItem($item)){

				$sucesso = urlencode('Sucesso ao excluir o item');
				die(header('Location: ../index.php?secao=manter&modulo=item&sucesso='.$sucesso));

			}else{

				$erro = urlencode('erro ao excluir o item');
				die(header('Location: ../index.php?secao=manter&modulo=item&erro='.$erro));
			}

			break;
		}

		default:
			die('ação inválida');

	}

?>