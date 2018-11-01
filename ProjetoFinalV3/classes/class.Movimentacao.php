<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/
	class Movimentacao{

		private $id;
		private $idCentroCustos;
		private $idConta;
		private $tipoMov;
		private $data;
		private $descricao;
		private $valor;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getIdCentroCustos(){
			return $this->idCentroCustos;
		}

		public function setIdCentroCustos($id){
			$this->idCentroCustos = $id;
		}

		public function getIdConta(){
			return $this->idConta;
		}

		public function setIdConta($conta){
			$this->idConta = $conta;
		}

		public function getTipoMov(){
			return $this->tipoMov;
		}

		public function setTipoMov($tipoMov){
			$this->tipoMov = $tipoMov;
		}

		public function getData(){
			return $this->data;
		}

		public function setData($data){
			$this->data = $data;
		}

		public function getDescricao(){
			return $this->descricao;
		}

		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getValor(){
			return $this->valor;
		}

		public function setValor($valor){
			$this->valor = $valor;
		}

	}

?>