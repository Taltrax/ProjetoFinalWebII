<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018
		Métodos listar e buscar criado por Guilherme Mayer em 01/10/2018
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

			$conexao = $this->conexao;

			$nome = $centroCustos->getNome(); 

			$sql = 'INSERT INTO centro_custos
					VALUES (NULL,
							"'.$nome.'",
								1)';

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function delCentroCustos($centroCustos){

			$conexao = $this->conexao;

			$id = $centroCustos->getId();

			$sql = 'UPDATE centro_custos
					SET status = 0
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function altCentroCustos($centroCustos){

			$conexao = $this->conexao;

			$id = $centroCustos->getId();
			$nome = $centroCustos->getNome();

			$sql = 'UPDATE centro_custos
					SET nome = "'.$nome.'"
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function listar(){

			$dba = $this->conexao;
			
			$sql = 'SELECT * 
					FROM centro_custos
					WHERE status = 1';

			$res = $dba->query($sql);
			$num = $dba->rows_result($res);

			for($i=0;$i<$num;$i++){

				$id = $dba->result($res,$i,'id');
				$nome = $dba->result($res,$i,'nome');

				$cd = new CentroCustos();
				$cd->setId($id);
				$cd->setNome($nome);

				$vetCD[] = $cd;
			}
			if($num>0){
				return $vetCD;
			}else{
				return false;
			}
		}

		public function buscar($id){
			
			$dba = $this->conexao;

			$sql = "SELECT *FROM centro_custos WHERE id=$id";
			$res = $dba->query($sql);

			$cd = new CentroCustos();
			$cd->setId($dba->result($res,0,'id'));
			$cd->setNome($dba->result($res,0,'nome'));
			
			return $cd;
		}

	}

?>

