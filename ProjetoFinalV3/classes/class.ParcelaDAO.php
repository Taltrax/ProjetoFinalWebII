<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018
	*/	
	require_once('class.DbAdmin.php');
	require_once('class.Parcela.php');

	class ParcelaDAO{

		private $conexao;

		public function ParcelaDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addParcela($parcela){

			$idCentroCustos = $parcela->getIdCentroCustos();
			$idConta = $parcela->getIdConta();
			$idItem = $parcela->getIdItem();
			$tipoMov = $parcela->getTipoMov();
			$numParcela = $parcela->getParcela(); 
			$vencimento = $parcela->getVencimento();
			$valor = $parcela->getValor();
			$statusPagamento = $parcela->getStatusPagamento();

			$sql = 'INSERT INTO parcelas
					VALUES (NULL,
							'.$idCentroCustos.',
							'.$idConta.',
							'.$idItem.',
							"'.$tipoMov.'",
							"'.$numParcela.'",
							"'.$vencimento.'",
							'.$valor.',
							"'.$statusPagamento.'")';

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function delParcela($parcela){

			$id = $parcela->getId();

			$sql = 'DELETE FROM parcelas
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function altParcela($parcela){

			$id = $parcela->getId();
			$idCentroCustos = $parcela->getIdCentroCustos();
			$idConta = $parcela->getIdConta();
			$idItem = $parcela->getIdItem();
			$tipoMov = $parcela->getTipoMov();
			$numParcela = $parcela->getParcela(); 
			$vencimento = $parcela->getVencimento();
			$valor = $parcela->getValor();
			$statusPagamento = $parcela->getStatusPagamento();

			$sql = 'UPDATE parcelas
					SET id_centro_custos = '.$idCentroCustos.',
						id_conta = '.$idConta.',
						id_item = '.$idItem.',
						tipo_mov = "'.$tipoMov.'",
						parcela = "'.$numParcela.'",
						vencimento = "'.$vencimento.'",
						valor = '.$valor.',
						status_pagamento = "'.$statusPagamento.'"
					WHERE id = '.$id;

			$rs = $conexao->query($rs);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

	}

?>