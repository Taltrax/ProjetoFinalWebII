<?php
/*
		Criado por: Guilherme Mayer
		Em: 04/12/2018
	*/

	require_once('../classes/class.ParcelaDAO.php');

	switch($_REQUEST['acao']){
		

		case 'cadastrar':{
			
			$idItem = $_POST['f_item'];
			$valor = str_replace(['.',','], ['','.'], $_POST['f_valor']);
			$tipoMov = $_POST['f_tipo_mov'];
			$idCentroCustos = $_POST['f_centro_custos'];
			$idConta = $_POST['f_conta'];
			$vencimento = $_POST['f_data'];
			$vezes = $_POST['f_vezes'];
			
			for($i=1;$i<=$vezes;$i++){
				
				$parcela = new Parcela();
				$parcela->setItem($idItem);
				$parcela->setValor($valor);
				$parcela->setTipoMov($tipoMov);
				$parcela->setCentroCustos($idCentroCustos);
				$parcela->setConta($idConta);
				if($i>1){
					$vencimento = date("Y-m-d",strtotime("+1 month",strtotime($vencimento)));
					$parcela->setVencimento($vencimento);
				}else{
					$parcela->setVencimento($vencimento);
				}
				$parcela->setParcela("$i/$vezes");
				$parcela->setStatusPagamento('n');

				$parcelas[$i-1] = new ParcelaDAO();
				$parcelas[$i-1] = $parcelas[$i-1]->addParcela($parcela);
 
			}

			if(array_unique($parcelas)){
				
				$sucesso = urlencode("Parcelas cadastradas com sucesso!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=parcela&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode("Erro ao cadastrar uma ou mais parcelas!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=parcela&erro='.$erro));
			}
			break;
		}

		case 'alterar':{

			$valor = str_replace(['.',','], ['','.'], $_POST['f_valor']);
			$tipoMov = $_POST['f_tipo_mov'];
			$vencimento = $_POST['f_data'];
			$vezes = $_POST['f_vezes'];

			for($i=1;$i<=$vezes;$i++){

				$item = new ItemDAO();
				$item = $item->buscarItem($_POST['f_item']);

				$conta = new ContaDAO();
				$conta = $conta->buscar($_POST['f_conta']);

				$cc = new CentroCustosDAO();
				$cc = $cc->buscar($_POST['f_centro_custos']);
				
				$parcela = new Parcela();
				$parcela->setItem($item);
				$parcela->setValor($valor);
				$parcela->setTipoMov($tipoMov);
				$parcela->setCentroCustos($cc);
				$parcela->setConta($conta);
				$parcela->setParcela("$i/$vezes");
				
				if($i>1){
					$vencimento = date("Y-m-d",strtotime("+1 month",strtotime($vencimento)));
					$parcela->setVencimento($vencimento);
				}else{
					$parcela->setVencimento($vencimento);
				}
				
				$parcelas[$i-1] = new ParcelaDAO();
	
				$id = $parcelas[$i-1]->buscarPorParcela($_POST['f_item'],"$i/$vezes");
				$parcela->setId($id->getId());
				
				$parcelas[$i-1] = $parcelas[$i-1]->altParcela($parcela);
 
			}

			if(array_unique($parcelas)){
				
				$sucesso = urlencode("Parcelas alteradas com sucesso!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=parcela&sucesso='.$sucesso));
			
			}else{

				$erro = urlencode("Erro ao alterar uma ou mais parcelas!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=parcela&erro='.$erro));
			}
			break;
		}

		case 'deletar':{

			$id = $_REQUEST['id'];
			echo $id;

			$parDAO = new ParcelaDAO();
			$item = $parDAO->buscar($id);
			$p1 = $item->getParcela();
			$p1 = explode("/", $p1);
			$px = $p1[1];
			$p1 = $p1[0];
			
			for($p1;$p1<=$px;$p1++){
				$item->setParcela("$p1/$px");
				$res[] = $parDAO->delParcela($item);
			}

			if(array_unique($res)){

				$sucesso = urlencode("Sucesso ao excluir parcelas!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=parcela&sucesso='.$sucesso));

			}else{

				$erro = urlencode("Erro ao excluir uma ou mais parcelas!");
				die(header('Location: ../index.php?secao=movimentacao&modulo=parcela&erro='.$erro));
			}

			break;

		}
	}

?>