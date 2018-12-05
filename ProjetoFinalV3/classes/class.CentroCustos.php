<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/
	class CentroCustos{
		
		private $id;
		private $nome;
		private $status;

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

		public function getStatus(){
			return $this->status;
		}

		public function setStatus($status){
			$this->status = $status;
		}

	}

?>