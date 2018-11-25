<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018
		Métodos buscar e listar criado por Guilherme Mayer em 01/11/2018
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
							"'.$nome.'",
								0)';

			$rs = $this->conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function delConta($conta){

			$id = $conta->getId();

			$sql = 'DELETE FROM contas
					WHERE id = '.$id;

			$rs = $this->conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function altConta($conta){

			$id = $conta->getId();
			$nome = $conta->getNome();
			$saldo = $conta->getSaldo();

			$sql = 'UPDATE contas
					SET nome = "'.$nome.'",
						saldo = '.$saldo.'
					WHERE id = '.$id;
			
			$rs = $this->conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}
/*
		public function altSaldo($conta){

			$id = $conta->getId();
			$saldo = $conta->getSaldo();

			$sql = 'UPDATE contas
					SET saldo = '.$saldo.'
					WHERE id = '.$id;

			$rs = $this->conexao->query($sql);

			if($rs){
				return true;
			}

			return false;

		}*/

		public function listar(){

			$dba = $this->conexao;
			
			$sql = 'SELECT *,
					format(saldo,2, "de_DE") AS saldo_formatado 
					FROM contas';

			$res = $dba->query($sql);
			$num = $dba->rows_result($res);

			if($num == 0){
				return false;
			}

			for($i=0;$i<$num;$i++){
				
				$id = $dba->result($res,$i,'id');
				$nome = $dba->result($res,$i,'nome');
				$saldo = $dba->result($res, $i, 'saldo_formatado');

				$conta = new Conta();
				$conta->setId($id);
				$conta->setNome($nome);
				$conta->setSaldo($saldo);

				$contas[] = $conta;
			
			}

			return $contas;
		}

		public function buscar($id){
			
			$dba = $this->conexao;

			$sql = "SELECT *,
					format(saldo, 2, 'de_DE') AS saldo_formatado 
					FROM contas WHERE id=$id";

			$res = $dba->query($sql);

			if($dba->rows_result($res) == 0){
				return false;
			}

			$ca = new Conta();
			$ca->setId($dba->result($res,0,'id'));
			$ca->setNome($dba->result($res,0,'nome'));
			$ca->setSaldo($dba->result($res,0,'saldo_formatado'));
	
			return $ca;
		}


	}

?>
