<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/
	class Parcela{

		private $id;
		private $idCentroCustos;
		private $idConta;
		private $idItem;
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

		public function getIdCentroCustos(){
			return $this->idCentroCustos;
		}

		public function setIdCentroCustos($idCentroCustos){
			$this->idCentroCustos = $idCentroCustos;
		}

		public function getIdConta(){
			return $this->idConta;
		}

		public function setIdConta($idConta){
			$this->idConta = $idConta;
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