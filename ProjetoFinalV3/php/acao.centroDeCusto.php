<?php

	require_once("..\classes\class.CentroCustos.php");
	require_once("..\classes\class.CentroCustosDAO.php");

	if(isset($_GET['op'])){

		$op = $_GET['op'];

		switch ($op) {
			
			case 'Inserir':
				$novocd = new CentroCustos();
				$novocd->setNome($_POST['novocd']);
				$novocdDAO = new CentroCustosDAO();
				$result = $novocdDAO->addCentroCustos($novocd);
			
				if($result==true){
					$result = 'Centro de custo <b>'.$novocd->getNome().'</b> inserido com sucesso!';
				}
				header("Location: ..\index.php?secao=manter&modulo=centroDeCusto&info=".$result);
				break;
			
			case 'Editar':
				$upcd = new CentroCustos();
				$upcd->setId($_POST['id']);
				$upcd->setNome($_POST['novocd']);
				
				$upDAO = new CentroCustosDAO();
				$result = $upDAO->altCentroCustos($upcd);
				
				if($result==true){
					$result = 'Centro de custo editado com sucesso!';
				}else{
					$result = 'Falha ao editar centro de custo!';
				}
				header("Location: ..\index.php?secao=manter&modulo=centroDeCusto&info=".$result);

				break;
			
			case 'Deletar':
				$cd = new CentroCustos();
				$cd->setId($_GET['id']);

				$delDAO = new CentroCustosDAO();
				$result = $delDAO->delCentroCustos($cd);

				if($result==true){
					$result = 'Centro de custo removido com sucesso!';
				}else{
					$result = 'Falha ao remover centro de custo!';
				}
				header("Location: ..\index.php?secao=manter&modulo=centroDeCusto&info=".$result);
				break;

			case 'Buscar':{
				if(isset($_GET['id'])){ 
					$alt = new CentroCustosDAO();
					$temp = $alt->buscar($_GET['id']);
					header("Location: ..\index.php?secao=manter&modulo=centroDeCusto&aux=Editar&cd=".$temp->getNome()."&id=".$temp->getID());
				}
			}

		}
	}
?>
