<?php

	/*
		Criado por: João Pedro da Silva Fernandes
		Em: 02/12/2018
	*/
	
	date_default_timezone_set('America/Sao_Paulo');

	require_once('classes/class.RecorrenteDAO.php');
	require_once('classes/class.RecorrenteMovDAO.php');
	require_once('classes/class.MovimentacaoDAO.php');

	$recDAO = new RecorrenteDAO();
	$recMovDAO = new RecorrenteMovDAO();
	$movDAO = new MovimentacaoDAO();
	$recorrente = new Recorrente();
	$recorrenteMov = new RecorrenteMov();

	$recorrentes = $recDAO->buscarRecorrentes();

	if($recorrentes){

		foreach($recorrentes as $recorrente){

			$diaAtual = date('d');

			if($diaAtual >= $recorrente->getDia()){

				if(!$recMovDAO->verificaLancamento($recorrente)){

					$id_rec = $recorrente->getId();
					$centroCustos = $recorrente->getCentroCustos();
					$conta = $recorrente->getConta();
					$tipoMov = $recorrente->getTipoMov();
					$descricao = $recorrente->getDescricao();
					$valor = $recorrente->getValor();

					$data = date('Y-m-d');
					$movimentacao = new Movimentacao();
					$movimentacao->setCentroCustos($centroCustos);
					$movimentacao->setConta($conta);
					$movimentacao->setTipoMov($tipoMov);
					$movimentacao->setData($data);
					$movimentacao->setDescricao($descricao);
					$movimentacao->setValor($valor);

					$id_mov = $movDAO->addMovimentacao($movimentacao);
					$movDAO->salvarLog($movimentacao, 'log.txt');

					$dataRecMov = date('Y-m-d');
					$dataRecMov = explode('-', $dataRecMov);
					$dataRecMov[2] = $recorrente->getDia();
					$dataRecMov = implode('-', $dataRecMov);

					$recorrenteMov->setIdRecorrente($id_rec);
					$recorrenteMov->setIdMovimentacao($id_mov);
					$recorrenteMov->setData($dataRecMov);

					$recMovDAO->addRecorrenteMov($recorrenteMov);

				}
			}
		}
	}

?>
