<?php
	
	/*
		Classe criado por João Pedro em 29/11/2018
	*/	
	require_once('class.DbAdmin.php');
	require_once('class.RelatorioExtrato.php');
	require_once('class.movimentacao.php');

	class RelatorioExtratoDAO{

		private $conexao;

		public function RelatorioExtratoDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function gerarExtrato($mes, $ano, $conta){

			if($mes){
				$mes = 'WHERE MONTH(data) = "'.$mes.'"';
			}else{
				$mes = 'WHERE 1';
			}

			if($ano){
				$ano = ' AND YEAR(data) = "'.$ano.'"';
			}

			if($conta){
				$conta = ' AND id_conta = '.$conta;
			}

			$filtro = $mes.$ano.$conta;

			$conexao = $this->conexao;

			$sql = 'SELECT mov.*, cc.nome as nome_cc, contas.nome as nome_conta,
					date_format(mov.data, "%d/%m/%Y") as data_formatada
					FROM movimentacao as mov
					INNER JOIN centro_custos as cc 
					ON mov.id_centro_custos = cc.id 
					INNER JOIN contas
					ON mov.id_conta = contas.id '.
					$filtro.' 
					ORDER BY data DESC ';

					//die($sql);

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
				$movimentacao->setValor($conexao->result($rs, $i, 'valor'));

				$movs[] = $movimentacao;

			}

			return $movs;

		}

		public function gerarSaldoExtrato($mes='', $ano='', $conta=''){

			$conexao = $this->conexao;

			if($mes){
				$mes = 'WHERE MONTH(data) <= "'.$mes.'"';
			}else{
				$mes = 'WHERE 1';
			}

			if($ano){
				$ano = ' AND YEAR(data) <= "'.$ano.'"';
			}

			if($conta){
				$conta = ' AND id_conta = '.$conta;
			}

			$filtro = $mes.$ano.$conta;

			$sql = 'SELECT tipo_mov, SUM(mov.valor) AS total
					FROM movimentacao AS mov '
					.$filtro.'
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