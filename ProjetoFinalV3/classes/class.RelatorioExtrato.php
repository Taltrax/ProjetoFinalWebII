<?php
	
	//Criado por João Pedro da Silva Fernandes em 29/11/2018

	class RelatorioExtrato {

		private $movimentacoes;
		private $saldo;

		public function getMovimentacoes(){
			return $this->movimentacoes;
		}

		public function setMovimentacoes($movimentacoes){
			$this->movimentacoes = $movimentacoes;
		}

		public function getSaldo(){
			return $this->saldo;
		}

		public function setSaldo($saldo){
			$this->saldo =  $saldo;
		}

	}

?>