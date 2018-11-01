<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018
	*/	
	require_once('class.DbAdmin.php');
	require_once('class.movimentacao.php');

	class MovimentacaoDAO{

		private $conexao;

		public function MovimentacaoDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addMovimentacao($movimentacao){

			$idCentroCustos = $movimentacao->getIdCentroCustos();
			$idConta = $movimentacao->getIdConta();
			$tipoMov = $movimentacao->getTipoMov();
			$data = $movimentacao->getData();
			$descricao = $movimentacao->getDescricao();
			$valor = $movimentacao->getValor();

			$sql = 'INSERT INTO movimentacao
					VALUES (NULL,
							'.$idCentroCustos.',
							'.$idConta.',
							"'.$tipoMov.'",
							"'.$data.'",
							"'.$descricao.'",
							'.$valor.')';

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function delMovimentacao($movimentacao){

			$id = $movimentacao->getId();

			$sql = 'DELETE FROM movimentacao
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function altMovimentacao($movimentacao){

			$id = $movimentacao->getId();
			$idCentroCustos = $movimentacao->getIdCentroCustos();
			$idConta = $movimentacao->getIdConta();
			$tipoMov = $movimentacao->getTipoMov();
			$data = $movimentacao->getData();
			$descricao = $movimentacao->getDescricao();
			$valor = $movimentacao->getValor();

			$sql = 'UPDATE movimentacao
					SET id_centro_custos = '.$idCentroCustos.',
						id_conta = '.$idConta.',
						tipo_mov = "'.$tipoMov.'",
						data = "'.$data.'",
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