<?php
	/*
		Classe criado por Guilherme Mayer em 25/11/2018
		Rev 1 - 29/11/2018
	*/

	require_once("class.Conta.php");
	require_once("class.Movimentacao.php");
	require_once("class.CentroCustos.php");
	require_once("class.RelatorioCC.php");

	class RelatorioCCDAO{

		private $conexao;

		public function RelatorioCCDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		//Modificado por João Pedro da Silva Fernandes em 01/12/2018
		public function listarCC($mes,$ano,$conta,$tipoMov){

			$dba = $this->conexao;

			if($mes){
				$mes = ' WHERE MONTH(mov.data) = '.$mes;
			}else{
				$mes = ' WHERE 1';
			}
			
			if($ano){ 
				$ano = ' AND YEAR(mov.data) = '.$ano;
			}

			if($conta){ 
				$conta = ' AND mov.id_conta = '.$conta; 
			}

			if($tipoMov){ 
				$tipoMov = ' AND mov.tipo_mov = "'.$tipoMov.'"'; 
			}

			$filtro = $mes.$ano.$conta.$tipoMov;

			$sql = "SELECT cc.id AS cc_id, cc.nome AS cc_nome, SUM(mov.valor) AS total
					FROM movimentacao AS mov
					INNER JOIN contas 
					ON  mov.id_conta = contas.id
					INNER JOIN centro_custos AS cc
					ON mov.id_centro_custos = cc.id
					$filtro
					GROUP BY mov.id_centro_custos";
			
			$res = $dba->query($sql);
			$num = $dba->rows_result($res);

			if($num == 0){
				return null;
			}

			for($i=0; $i<$num; $i++){

				// Setando valores na classe CentroDeCustos.
				$id = $dba->result($res,$i,'cc_id');
				$nome = $dba->result($res,$i,'cc_nome');
				// Soma reservada ao Relatório.
				$total = $dba->result($res,$i,'total');

				$cc = new CentroCustos();
				$cc->setId($id);
				$cc->setNome($nome);

				$rel = new RelatorioCC();
				$rel->setCentroDeCustos($cc);
				$rel->setTotal($total);

				$centrosCustos[] = $rel;
			
			}

			return $centrosCustos;
		}
	}
?>