<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/
	class Conta{
		
		private $id;
		private $nome;

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

	}

?>