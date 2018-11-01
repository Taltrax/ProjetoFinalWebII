<?php

	require_once("..\classes\class.Conta.php");
	require_once("..\classes\class.ContaDAO.php");

	if(isset($_GET['op'])){

		$op = $_GET['op'];

		switch ($op) {
			
			case 'Inserir':
				$nova_conta = new Conta();
				$nova_conta->setNome($_POST['nova_conta']);
				$nova_contaDAO = new ContaDAO();
				$result = $nova_contaDAO->addConta($nova_conta);
			
				if($result==true){
					$result = 'Conta <b>'.$nova_conta->getNome().'</b> inserida com sucesso!';
				}
				header("Location: ..\index.php?secao=manter&modulo=conta&info=".$result);
				break;
			
			case 'Editar':
				$up_ca = new Conta();
				$up_ca->setId($_POST['id']);
				$up_ca->setNome($_POST['nova_conta']);
				
				$upDAO = new ContaDAO();
				$result = $upDAO->altConta($up_ca);
				
				if($result==true){
					$result = 'Conta editada com sucesso!';
				}else{
					$result = 'Falha ao editar conta!';
				}
				header("Location: ..\index.php?secao=manter&modulo=conta&info=".$result);

				break;
			
			case 'Deletar':
				$ca = new Conta();
				$ca->setId($_GET['id']);

				$delDAO = new ContaDAO();
				$result = $delDAO->delConta($ca);

				if($result==true){
					$result = 'Conta removida com sucesso!';
				}else{
					$result = 'Falha ao remover conta!';
				}
				header("Location: ..\index.php?secao=manter&modulo=conta&info=".$result);
				break;
		
			case 'Buscar':{
				if(isset($_GET['id'])){ 
					$alt = new ContaDAO();
					$temp = $alt->buscar($_GET['id']);
					header("Location: ..\index.php?secao=manter&modulo=conta&aux=Editar&conta=".$temp->getNome()."&id=".$temp->getID());
				}
			}

		}
	}
?>
