<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018
	*/
	require_once('class.DbAdmin.php');
	require_once('class.CentroCustos.php');

	class CentroCustosDAO{

		private $conexao;

		public function CentroCustosDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addCentroCustos($centroCustos){

			$nome = $centroCustos->getNome(); 

			$sql = 'INSERT INTO centro_custos
					VALUES (NULL,
							"'.$nome.'")';

			$rs = $this->conexao->query($sql);
			//$rs = $conexao->query($sql);

			//if($conexao->rows_affected($rs) == 1){
				return true;
			//}

			return false;
		}

		public function delCentroCustos($centroCustos){

			$id = $centroCustos->getId();

			$sql = 'DELETE FROM centro_custos
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function altCentroCustos($centroCustos){

			$id = $centroCustos->getId();
			$nome = $centroCustos->getNome();

			$sql = 'UPDATE centro_custos
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