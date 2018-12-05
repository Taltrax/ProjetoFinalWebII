<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
		REV 1 - Guilherme Mayer em 04/12/2018
		Desc: Foram substituídos os id's de CentroCustos,
		      Conta e Item pelas classes em si, bem como,
		      seus métodos adaptados.
	*/
	class Parcela{

		private $id;
		private $CentroCustos;
		private $Conta;
		private $Item;
		private $tipoMov;
		private $parcela;
		private $vencimento;
		private $valor;
		private $statusPagamento;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getCentroCustos(){
			return $this->CentroCustos;
		}

		public function setCentroCustos($CentroCustos){
			$this->CentroCustos = $CentroCustos;
		}

		public function getConta(){
			return $this->Conta;
		}

		public function setConta($Conta){
			$this->Conta = $Conta;
		}

		public function getItem(){
			return $this->Item;
		}

		public function setItem($Item){
			$this->Item = $Item;
		}

		public function getTipoMov(){
			return $this->tipoMov;
		}

		public function setTipoMov($tipoMov){
			$this->tipoMov = $tipoMov;
		}
		
		public function getParcela(){
			return $this->parcela;
		}

		public function setParcela($parcela){
			$this->parcela = $parcela;
		}

		public function getVencimento(){
			return $this->vencimento;
		}

		public function setVencimento($vencimento){
			$this->vencimento = $vencimento;
		}

		public function getValor(){
			return $this->valor;
		}

		public function setValor($valor){
			$this->valor = $valor;
		}

		public function getStatusPagamento(){
			return $this->statusPagamento;
		}

		public function setStatusPagamento($statusPagamento){
			$this->statusPagamento = $statusPagamento;
		}
	}

?>