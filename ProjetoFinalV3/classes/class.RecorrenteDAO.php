<?php
	
	/*
		Classe criado por João Pedro em 05/10/2018
	*/	
	require_once('class.DbAdmin.php');
	require_once('class.Recorrente.php');

	class RecorrenteDAO{

		private $conexao;

		public function RecorrenteDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addRecorrente($recorrente){

			$idCentroCustos = $recorrente->getIdCentroCustos();
			$idConta = $recorrente->getIdConta();
			$tipoMov = $recorrente->getTipoMov();
			$dia = $recorrente->getDia();
			$descricao = $movimentacao->getDescricao();
			$valor = $movimentacao->getValor();

			$sql = 'INSERT INTO movimentacao
					VALUES (NULL,
							'.$idCentroCustos.',
							'.$idConta.',
							"'.$tipoMov.'",
							'.$dia.',
							"'.$descricao.'",
							'.$valor.')';

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function delRecorrente($recorrente){

			$id = $recorrente->getId();

			$sql = 'DELETE FROM recorrente
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function altRecorrente($recorrente){

			$id = $recorrente->getId();
			$idCentroCustos = $recorrente->getIdCentroCustos();
			$idConta = $recorrente->getIdConta();
			$tipoMov = $recorrente->getTipoMov();
			$dia = $recorrente->getDia();
			$descricao = $movimentacao->getDescricao();
			$valor = $movimentacao->getValor();

			$sql = 'UPDATE movimentacao
					SET id_centro_custos = '.$idCentroCustos.',
						id_conta = '.$idConta.',
						tipo_mov = "'.$tipoMov.'",
						dia = '.$dia.',
						descricao = "'.$descricao.'",
						valor = '.$valor.'
					WHERE id = '.$id;

			$rs = $conexao->query($rs);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

	}

?>