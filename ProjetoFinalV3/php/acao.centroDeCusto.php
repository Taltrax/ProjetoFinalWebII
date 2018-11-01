<?php

	require_once("..\classes\class.CentroCustos.php");
	require_once("..\classes\class.CentroCustosDAO.php");

	if(isset($_GET['op'])){

		$op = $_GET['op'];

		switch ($op) {
			
			case 'add':
			$novocd = new CentroCustos();
			$novocd->setNome($_POST['novocd']);
			$novocdDAO = new CentroCustosDAO();
			$result = $novocdDAO->addCentroCustos($novocd);
			
			if($result==true){
				$result = 'Centro de custo <b>'.$novocd->getNome().'</b> inserido com sucesso!';
			}
			header("Location: ..\index.php?secao=manter&modulo=centroDeCusto&info=".$result);
			break;
			
			case 'up':
			echo "deu errado 1";
			break;
			
			case 'del':
			echo "deu errado 2";	
		}
	}
?>