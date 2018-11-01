<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018
	*/
	require_once('class.DbAdmin.php');
	require_once('class.Conta.php');

	class ContaDAO{

		private $conexao;

		public function ContaDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addConta($conta){

			$nome = $conta->getNome(); 

			$sql = 'INSERT INTO contas
					VALUES (NULL,
							"'.$nome.'")';

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function delConta($conta){

			$id = $conta->getId();

			$sql = 'DELETE FROM contas
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function altConta($conta){

			$id = $conta->getId();
			$nome = $conta->getNome();

			$sql = 'UPDATE contas
					SET nome = "'.$nome.'"
					WHERE id = '.$id;

			$rs = $conexao->query($rs);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

	}

?>