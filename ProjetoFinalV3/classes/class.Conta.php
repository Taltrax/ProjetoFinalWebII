<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/
	class Conta{
		
		private $id;
		private $nome;
		private $saldo;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getSaldo(){
			return $this->saldo;
		}

		public function setSaldo($saldo){
			$this->saldo = $saldo;
		}

		public function addValor($valor){
			$this->saldo += $valor;
		}

		public function removeValor($valor){

			if($valor > $this->saldo){
				return false;
			}

			$this->saldo -= $valor;
			return true;

		}

	}

?>