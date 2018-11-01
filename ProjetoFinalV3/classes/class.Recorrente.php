<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/
	class Recorrente{

		private $id;
		private $idCentroCustos;
		private $idConta;
		private $tipoMov;
		private $dia;
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

		public function getDia(){
			return $this->dia;
		}

		public function setDia($dia){
			$this->dia = $dia;
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