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

			$idRecorrente = $recorrenteMov->getIdRecorrente();
			$idMovimentacao = $recorrenteMov->getIdMovimentacao();

			$sql = 'INSERT INTO recorrentes_movimentacao
					VALUES (NULL,
							'.$idRecorrente.',
							'.$idMovimentacao.')';

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function delRecorrenteMov($recorrenteMov){

			$idRecorrente = $recorrenteMov->getIdRecorrente();
			$idMovimentacao = $recorrenteMov->getIdMovimentacao();

			$sql = 'DELETE FROM recorrentes_movimentacao
					WHERE id_recorrentes = '.$idRecorrente.'
						  && id_movimentacao = '.$idMovimentacao;

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function alteraRecorrenteMov($recorrenteMov){

			$idRecorrente = $recorrenteMov->getIdRecorrente();
			$idMovimentacao = $recorrenteMov->getIdMovimentacao();

			$sql = 'UPDATE recorrentes_movimentacao
					SET id_recorrentes = '.$idRecorrente.',
						id_movimentacao = '.$idMovimentacao.'
					WHERE id_recorrentes = '.$idRecorrente.'
					   && id_movimentacao = '.$id_movimentacao;

			$rs = $conexao->query($rs);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

	}

?>