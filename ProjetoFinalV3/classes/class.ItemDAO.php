<?php

	/*
		Classe criado por João Pedro em 04/10/2018
	*/
	require_once('class.DbAdmin.php');
	require_once('class.Item.php');

	class ItemDAO{

		private $conexao;

		public function ItemDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addItem($item){

			$conexao = $this->conexao;
			$descricao = $item->getDescricao(); 

			$sql = 'INSERT INTO item
					VALUES (NULL,
							"'.$descricao.'",
								1)';

			$rs = $conexao->query($sql);

			return $rs;

		}

		public function delItem($item){

			$conexao = $this->conexao;

			$id = $item->getId();

			$sql = 'UPDATE item
					SET status = 0
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			return $rs;

		}

		public function altItem($item){

			$conexao = $this->conexao;

			$id = $item->getId();
			$descricao = $item->getDescricao();

			$sql = 'UPDATE item
					SET descricao = "'.$descricao.'"
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			return $rs;
			
		}

		public function buscarItens(){

			$conexao = $this->conexao;

			$sql = 'SELECT * 
					FROM item
					WHERE status = 1';

			$rs = $conexao->query($sql);
			$linSelecionadas = $conexao->rows_result($rs);

			if($linSelecionadas == 0){
				return false;
			}

			for($i = 0; $i < $linSelecionadas; $i++){

				$itemTemp = new Item();
				$itemTemp->setId($conexao->result($rs,$i,'id'));
				$itemTemp->setDescricao($conexao->result($rs,$i,'descricao'));
				$itens[] = $itemTemp;

			}

			return $itens;

		}

		public function buscarItem($idItem){

			$conexao = $this->conexao;

			$sql = 'SELECT * FROM item
					WHERE id = '.$idItem;

			$rs = $conexao->query($sql);

			if($conexao->rows_result($rs) == 0){
				return false;
			}

			$item = new Item();
			$item->setId($conexao->result($rs,0,'id'));
			$item->setDescricao($conexao->result($rs,0,'descricao'));

			return $item;

		}

	}

?>