<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018
		Classe atualizada por Guilherme Mayer em 08/11/2018
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

			$idCentroCustos = $movimentacao->getCentroCustos()->getId();
			$idConta = $movimentacao->getConta()->getId();
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
			$idCentroCustos = $movimentacao->getCentroCustos()->getId();
			$idConta = $movimentacao->getConta()->getId();
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

		public function buscarMovimentacoes($tipo){

			$conexao = $this->conexao;

			$sql = 'SELECT mov.*, cc.nome as nome_cc, contas.nome as nome_conta,
					date_format(mov.data, "%d/%m/%Y") as data_formatada,
					format(mov.valor, 2, "de_DE") as valor_formatado
					FROM movimentacao as mov
					INNER JOIN centro_custos as cc 
					ON mov.id_centro_custos = cc.id 
					INNER JOIN contas
					ON mov.id_conta = contas.id
					WHERE tipo_mov = "'.$tipo.'"
					ORDER BY data ASC';

			$rs = $conexao->query($sql);

			$linhas = $conexao->rows_result($rs);

			if($linhas == 0){
				return false;
			}

			for($i=0; $i<$linhas; $i++){

				$movimentacao = new Movimentacao();
				$movimentacao->setId($conexao->result($rs, $i, 'id'));

				$movimentacao->getCentroCustos()->setId($conexao->result($rs, $i, 'id_centro_custos'));
				$movimentacao->getCentroCustos()->setNome($conexao->result($rs, $i, 'nome_cc'));

				$movimentacao->getConta()->setId($conexao->result($rs, $i, 'id_conta'));
				$movimentacao->getConta()->setNome($conexao->result($rs, $i, 'nome_conta'));

				$movimentacao->setTipoMov($conexao->result($rs, $i, 'tipo_mov'));
				$movimentacao->setData($conexao->result($rs, $i, 'data_formatada'));
				$movimentacao->setDescricao($conexao->result($rs, $i, 'descricao'));
				$movimentacao->setValor($conexao->result($rs, $i, 'valor_formatado'));

				$movs[] = $movimentacao;

			}

			return $movs;

		}

		public function buscarMovimentacao($id){


			$conexao = $this->conexao;

			$sql = 'SELECT mov.*, cc.nome as nome_cc, contas.nome as nome_conta,
					date_format(mov.data, "%d/%m/%Y") as data_formatada,
					format(mov.valor, 2, "de_DE") as valor_formatado
					FROM movimentacao as mov
					INNER JOIN centro_custos as cc 
					ON mov.id_centro_custos = cc.id 
					INNER JOIN contas 
					ON mov.id_conta = contas.id
					WHERE mov.id = '.$id;

			$rs = $conexao->query($sql);

			if($conexao->rows_result($rs) == 0){
				return false;
			}

			$movimentacao = new Movimentacao();
			$movimentacao->setId($conexao->result($rs, 0, 'id'));

			$movimentacao->getCentroCustos()->setId($conexao->result($rs, 0, 'id_centro_custos'));
			$movimentacao->getCentroCustos()->setNome($conexao->result($rs, 0, 'nome_cc'));

			$movimentacao->getConta()->setId($conexao->result($rs, 0, 'id_conta'));
			$movimentacao->getConta()->setNome($conexao->result($rs, 0, 'nome_conta'));

			$movimentacao->setTipoMov($conexao->result($rs, 0, 'tipo_mov'));
			$movimentacao->setData($conexao->result($rs, 0, 'data'));
			$movimentacao->setDescricao($conexao->result($rs, 0, 'descricao'));
			$movimentacao->setValor($conexao->result($rs, 0, 'valor_formatado'));
			
			return $movimentacao;

		}

	}


?>