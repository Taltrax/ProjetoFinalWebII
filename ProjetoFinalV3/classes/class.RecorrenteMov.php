<?php

	/*
		Classe criada por Guilherme Mayer em 04/10/2018
	*/
	class RecorrenteMov{

		private $idRecorrente;
		private $idMovimentacao;

		public function getIdRecorrente(){
			return $this->idRecorrente;
		}

		public function setIdRecorrente($idRecorrente){
			$this->idRecorrente = $idRecorrente;
		}

		public function getIdMovimentacao(){
			return $this->idMovimentacao;
		}

		public function setIdMovimentacao($idMovimentacao){
			$this->idMovimentacao = $idMovimentacao;
		}
	
	}

?>