<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/
	class Item{
		
		private $id;
		private $descricao;
		private $status;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getDescricao(){
			return $this->descricao;
		}

		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getStatus(){
			return $this->status;
		}

		public function setStatus($status){
			$this->status = $status;
		}

	}

?>