<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/

	require_once('class.CentroCustos.php');
	require_once('class.Conta.php');

	class Recorrente{

		private $id;
		private $centroCustos;
		private $conta;
		private $tipoMov;
		private $dia;
		private $descricao;
		private $valor;

		public function Recorrente(){

			$this->centroCustos = new CentroCustos();
			$this->conta = new Conta();

		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getCentroCustos(){
			return $this->centroCustos;
		}

		public function setCentroCustos($centroCustos){
			$this->centroCustos = $centroCustos;
		}

		public function getConta(){
			return $this->conta;
		}

		public function setConta($conta){
			$this->conta = $conta;
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