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

			$conexao = $this->conexao;

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

			if($rs){
				return true;
			}

			return false;
		}

		public function delMovimentacao($movimentacao){

			$conexao = $this->conexao;

			$id = $movimentacao->getId();

			$sql = 'DELETE FROM movimentacao
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function altMovimentacao($movimentacao){

			$conexao = $this->conexao;

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

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function buscarCreditos(){

			$conexao = $this->conexao;

			$sql = 'SELECT *,
					date_format(movimentacao.data, "%d/%m/%Y") as data_formatada
					FROM movimentacao
					WHERE tipo_mov = "credito"
					ORDER BY data ASC';

			$rs = $conexao->query($sql);

			$linhas = $conexao->rows_result($rs);

			if($linhas == 0){
				return false;
			}

			for($i=0; $i<$linhas; $i++){

				$credito = new Movimentacao();
				$credito->setId($conexao->result($rs, $i, 'id'));
				$credito->setIdCentroCustos($conexao->result($rs, $i, 'id_centro_custos'));
				$credito->setIdConta($conexao->result($rs, $i, 'id_conta'));
				$credito->setTipoMov($conexao->result($rs, $i, 'tipo_mov'));
				$credito->setData($conexao->result($rs, $i, 'data_formatada'));
				$credito->setDescricao($conexao->result($rs, $i, 'descricao'));
				$credito->setValor($conexao->result($rs, $i, 'valor'));

				$creditos[] = $credito;

			}

			return $creditos;

		}

		public function buscarCredito($idMovimentacao){


			$conexao = $this->conexao;

			$sql = 'SELECT *
					FROM movimentacao
					WHERE id = '.$idMovimentacao;

			$rs = $conexao->query($sql);

			if($conexao->rows_result($rs) == 0){
				return false;
			}

			$credito = new Movimentacao();
			$credito->setId($conexao->result($rs, 0, 'id'));
			$credito->setIdCentroCustos($conexao->result($rs, 0, 'id_centro_custos'));
			$credito->setIdConta($conexao->result($rs, 0, 'id_conta'));
			$credito->setTipoMov($conexao->result($rs, 0, 'tipo_mov'));
			$credito->setData($conexao->result($rs, 0, 'data'));
			$credito->setDescricao($conexao->result($rs, 0, 'descricao'));
			$credito->setValor($conexao->result($rs, 0, 'valor'));
			
			return $credito;

		}

	}


?>