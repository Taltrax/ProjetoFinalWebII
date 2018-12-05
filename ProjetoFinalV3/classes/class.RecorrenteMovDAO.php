<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018
	*/	
	require_once('class.DbAdmin.php');
	require_once('class.RecorrenteMov.php');

	class RecorrenteMovDAO{

		private $conexao;

		public function RecorrenteMovDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addRecorrenteMov($recorrenteMov){

			$conexao = $this->conexao;

			$idRecorrente = $recorrenteMov->getIdRecorrente();
			$idMovimentacao = $recorrenteMov->getIdMovimentacao();
			$data = $recorrenteMov->getData();

			$sql = 'INSERT INTO recorrentes_movimentacao
					VALUES ('.$idRecorrente.',
							'.$idMovimentacao.',
							"'.$data.'")';

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function delRecorrenteMov($recorrenteMov){

			$conexao = $this->conexao;

			$idRecorrente = $recorrenteMov->getIdRecorrente();
			$idMovimentacao = $recorrenteMov->getIdMovimentacao();

			$sql = 'DELETE FROM recorrentes_movimentacao
					WHERE id_recorrentes = '.$idRecorrente.'
						  OR id_movimentacao = '.$idMovimentacao;
						  
			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function altRecorrenteMov($recorrenteMov){

			$conexao = $this->conexao;

			$idRecorrente = $recorrenteMov->getIdRecorrente();
			$idMovimentacao = $recorrenteMov->getIdMovimentacao();

			$sql = 'UPDATE recorrentes_movimentacao
					SET id_recorrentes = '.$idRecorrente.',
						id_movimentacao = '.$idMovimentacao.'
					WHERE id_recorrentes = '.$idRecorrente.'
					   && id_movimentacao = '.$id_movimentacao;

			$rs = $conexao->query($rs);

			if($rs){
				return true;
			}

			return false;
		}

		public function verificaLancamento($recorrente){

			$conexao = $this->conexao;
			
			$idRecorrente = $recorrente->getId();
			$diaAtual = date('d');
			$mesAtual = date('m');

			$sql = 'SELECT rec.id
					FROM recorrentes AS rec
					INNER JOIN recorrentes_movimentacao AS rm
					ON rec.id = rm.id_recorrentes
					WHERE '.$diaAtual.' >= rec.dia
					AND '.$mesAtual.' = MONTH(rm.data)
					AND id_recorrentes = '.$idRecorrente;

			$rs = $conexao->query($sql);
			$linhas = $conexao->rows_result($rs);
			
			if($linhas == 1){
				return true;
			}

			return false;

		}

	}

?>