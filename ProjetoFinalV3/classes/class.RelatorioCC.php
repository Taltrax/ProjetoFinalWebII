<?php
	/*
		Classe criado por Guilherme Mayer em 22/11/2018
	*/
	
	public class RelatorioCC{

		private $centroDeCusto;
		private $movimentacao;
		private $saldo;

		public function RelatorioCC($cdc,$mov){
			$this->centroDeCusto = $cdc;
			$this->movimentacao = $mov;
		}

		public function setSaldo($val){
			$this->saldo = $val;
		}

		public function getSaldo(){
			return $this->saldo;
		}

	}

?>