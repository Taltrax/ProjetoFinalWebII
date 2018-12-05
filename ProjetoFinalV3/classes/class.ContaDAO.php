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

			$conexao = $this->conexao;

			$nome = $conta->getNome();

			$sql = 'INSERT INTO contas
					VALUES (NULL,
							"'.$nome.'",
								1)';

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function delConta($conta){

			$conexao = $this->conexao;

			$id = $conta->getId();

			$sql = 'UPDATE contas
					SET status = 0
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function altConta($conta){

			$conexao = $this->conexao;

			$id = $conta->getId();
			$nome = $conta->getNome();
			$saldo = $conta->getSaldo();

			$sql = 'UPDATE contas
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
					FROM contas
					WHERE status = 1';

			$res = $dba->query($sql);
			$num = $dba->rows_result($res);

			if($num == 0){
				return false;
			}

			for($i=0;$i<$num;$i++){
				
				$id = $dba->result($res,$i,'id');
				$nome = $dba->result($res,$i,'nome');

				$conta = new Conta();
				$conta->setId($id);
				$conta->setNome($nome);
				$conta->setSaldo($this->gerarSaldo($conta));

				$contas[] = $conta;
			
			}

			return $contas;
		}

		public function buscar($id){
			
			$dba = $this->conexao;

			$sql = "SELECT *
					FROM contas WHERE id=$id";

			$res = $dba->query($sql);

			if($dba->rows_result($res) == 0){
				return false;
			}

			$ca = new Conta();
			$ca->setId($dba->result($res,0,'id'));
			$ca->setNome($dba->result($res,0,'nome'));
			$ca->setSaldo($this->gerarSaldo($ca));
	
			return $ca;
		}

		public function gerarSaldo($conta){

			$conexao = $this->conexao;

			$id = $conta->getId();

			$sql = 'SELECT tipo_mov, SUM(mov.valor) AS total
					FROM movimentacao AS mov
					WHERE id_conta = '.$id.'
					GROUP BY(tipo_mov)
					ORDER BY tipo_mov ASC';

			$rs = $conexao->query($sql);
			$linhas = $conexao->rows_result($rs);

			if($linhas == 1){

				$tipo = $conexao->result($rs, 0, 'tipo_mov');

				if($tipo == 'debito'){
					$total = 0 - $conexao->result($rs, 0, 'total');
				
				}else{
					$total = $conexao->result($rs, 0, 'total');
				}

			}elseif($linhas == 2){

				$total_credito = $conexao->result($rs, 0, 'total');
				$total_debito = $conexao->result($rs, 1, 'total');
				$total =  $total_credito - $total_debito;

			}else{
				return 0;
			}

			return $total;

		}


	}

?>
