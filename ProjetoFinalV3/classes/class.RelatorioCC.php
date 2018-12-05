<?php
	/*
		Classe criado por Guilherme Mayer em 22/11/2018
	*/

	require_once("class.Conta.php");
	require_once("class.ContaDAO.php");
	
	class RelatorioCC{

		private $centroDeCustos; //tipo CentroDeCustos
		private $total; // soma Centros de custos;

		public function RelatorioCC(){

		} 

		public function getCentroDeCustos(){
			return $this->centroDeCustos;
		}

		public function getTotal(){
			return $this->total;
		}

		public function setCentroDeCustos($centroDeCustos){
			$this->centroDeCustos = $centroDeCustos;
		}

		public function setTotal($total){
			$this->total = $total;
		}

	}

?>