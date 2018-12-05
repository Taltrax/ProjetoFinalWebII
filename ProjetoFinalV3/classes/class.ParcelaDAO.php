<?php
	
	/*
		Classe criado por João Pedro em 04/10/2018

		REV 1 - Guilherme Mayer em 04/12/2018
		Desc: Foi adicionado o método listar e 
			  todos os buscar. Também foram 
			  alterados os id's do add e alt
			  Parcela();
	*/	
	require_once('class.DbAdmin.php');
	require_once('class.Parcela.php');
	require_once('class.CentroCustosDAO.php');
	require_once('class.ItemDAO.php');
	require_once('class.ContaDAO.php');

	class ParcelaDAO{

		private $conexao;

		public function ParcelaDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addParcela($parcela){

			$CentroCustos = $parcela->getCentroCustos();
			$Conta = $parcela->getConta();
			$Item = $parcela->getItem();
			$tipoMov = $parcela->getTipoMov();
			$numParcela = $parcela->getParcela(); 
			$vencimento = $parcela->getVencimento();
			$valor = $parcela->getValor();
			$statusPagamento = $parcela->getStatusPagamento();

			$sql = 'INSERT INTO parcelas
					VALUES (NULL,
							'.$CentroCustos.',
							'.$Conta.',
							'.$Item.',
							"'.$tipoMov.'",
							"'.$numParcela.'",
							"'.$vencimento.'",
							'.$valor.',
							"'.$statusPagamento.'")';

			$rs = $this->conexao->query($sql);

			if($this->conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		/* Modificado por Guilherme Mayer em 05/12/2018
		   Desc: Agora o delete é realizado com base no
		         id do item e na parcela. */
		public function delParcela($parcela){

			$conexao = $this->conexao;

			$idItem = $parcela->getItem()->getId();
			$tipoMov = $parcela->getTipoMov();
			$parcela = $parcela->getParcela();
			
			$sql = "DELETE FROM parcelas
					WHERE id_item = $idItem
					AND parcela='$parcela'
					AND tipo_mov ='$tipoMov'";

			$rs = $conexao->query($sql);

			if($conexao->rows_affected($rs) == 1){
				return true;
			}

			return false;
		}

		public function altParcela($parcela){

			$conexao = $this->conexao;

			$id = $parcela->getId();
			$CentroCustos = $parcela->getCentroCustos()->getId();
			$Conta = $parcela->getConta()->getId();
			$Item = $parcela->getItem()->getId();
			$tipoMov = $parcela->getTipoMov();
			$numParcela = $parcela->getParcela(); 
			$vencimento = $parcela->getVencimento();
			$valor = $parcela->getValor();
			

			$statusPagamento = $parcela->getStatusPagamento();

			$sql = 'UPDATE parcelas
					SET id_centro_custos = '.$CentroCustos.',
						id_conta = '.$Conta.',
						id_item = '.$Item.',
						tipo_mov = "'.$tipoMov.'",
						parcela = "'.$numParcela.'",
						vencimento = "'.$vencimento.'",
						valor = '.$valor.',
						status_pagamento = "'.$statusPagamento.'"
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		// Criado por Guilherme Mayer em 04/12/2018
		public function listar($data){

			$conexao = $this->conexao;
			$data = explode("-",$data);

			$mes = $data[1];
			$ano = $data[0];

			$sql = "SELECT *FROM parcelas
					WHERE MONTH(vencimento)=$mes
					AND YEAR(vencimento)=$ano";

			$rs = $conexao->query($sql);
			$linhas = $conexao->rows_result($rs);

			if($linhas == 0){
				return false;
			}

			for($i=0;$i<$linhas;$i++){

				$id = $conexao->result($rs,$i,'id');
				$id_cc = $conexao->result($rs,$i,'id_centro_custos');
				$id_ca = $conexao->result($rs,$i,'id_conta');
				$id_it = $conexao->result($rs,$i,'id_item');
				$par = $conexao->result($rs,$i,'parcela');
				$val = $conexao->result($rs,$i,'valor');
				$mov = $conexao->result($rs,$i,'tipo_mov');
				$status = $conexao->result($rs,$i,'status_pagamento');
				if($status == 's'){ $status = "Pago"; }
				if($status == 'n'){ $status = "Não pago"; }
				
				$data = $conexao->result($rs,$i,'vencimento');
				$data = explode("-", $data);
				$data = $data[2]."/".$data[1];

				$cc = new CentroCustosDAO;
				$cc = $cc->buscar($id_cc);

				$ca = new ContaDAO();
				$ca = $ca->buscar($id_ca); 

				$it = new ItemDAO();
				$it = $it->buscarItem($id_it); 

				$produto = new Parcela();
				$produto->setId($id);
				$produto->setCentroCustos($cc);
				$produto->setConta($ca);
				$produto->setItem($it);
				$produto->setParcela($par);
				$produto->setVencimento($data);
				$produto->setValor($val);
				$produto->setTipoMov($mov);
				$produto->setTipoMov($mov);
				$produto->setStatusPagamento($status);
				$produtos[] = $produto;

			}

			return $produtos;
		}

		// Criado por Guilherme Mayer em 04/12/2018
		public function buscar($id){
			
			$conexao = $this->conexao;
			
			$sql = "SELECT *FROM parcelas
					WHERE id=$id";

			$rs = $conexao->query($sql);

			if($conexao->rows_result($rs) == 0){
				return false;
			}
				
			$id_cc = $conexao->result($rs,0,'id_centro_custos');
			$id_ca = $conexao->result($rs,0,'id_conta');
			$id_it = $conexao->result($rs,0,'id_item');
			$par = $conexao->result($rs,0,'parcela');
			$val = $conexao->result($rs,0,'valor');
			$mov = $conexao->result($rs,0,'tipo_mov');
			$data = $conexao->result($rs,0,'vencimento');
			
			$cc = new CentroCustosDAO;
			$cc = $cc->buscar($id_cc);

			$ca = new ContaDAO();
			$ca = $ca->buscar($id_ca); 

			$it = new ItemDAO();
			$it = $it->buscarItem($id_it); 

			$parcela = new Parcela();
			$parcela->setCentroCustos($cc);
			$parcela->setConta($ca);
			$parcela->setItem($it);
			$parcela->setParcela($par);
			$parcela->setVencimento($data);
			$parcela->setValor($val);
			$parcela->setTipoMov($mov);
			
			return $parcela;
		}

		/* Criado por Guilherme Mayer em 05/12/2018
		   Desc: Utilizada para lançar uma parcela
		         como movimentação. */
		public function buscarPorData($hoje){

			$conexao = $this->conexao;

			$sql = "SELECT *FROM parcelas
					WHERE status_pagamento='n'
					AND vencimento='$hoje'";

			$rs = $conexao->query($sql);
			$linhas = $conexao->rows_result($rs);
				
			if($conexao->rows_result($rs) == 0){
				return false;
			}

			for($i=0;$i<$linhas;$i++){

				$id = $conexao->result($rs,$i,'id');
				$id_cc = $conexao->result($rs,$i,'id_centro_custos');
				$id_ca = $conexao->result($rs,$i,'id_conta');
				$id_it = $conexao->result($rs,$i,'id_item');
				$par = $conexao->result($rs,$i,'parcela');
				$val = $conexao->result($rs,$i,'valor');
				$mov = $conexao->result($rs,$i,'tipo_mov');
				$data = $conexao->result($rs,$i,'vencimento');

				$cc = new CentroCustosDAO;
				$cc = $cc->buscar($id_cc);

				$ca = new ContaDAO();
				$ca = $ca->buscar($id_ca); 

				$it = new ItemDAO();
				$it = $it->buscarItem($id_it); 

				$produto = new Parcela();
				$produto->setId($id);
				$produto->setCentroCustos($cc);
				$produto->setConta($ca);
				$produto->setItem($it);
				$produto->setParcela($par);
				$produto->setVencimento($data);
				$produto->setValor($val);
				$produto->setTipoMov($mov);
				$produto->setTipoMov($mov);
				$produto->setStatusPagamento('s');

				$this->altParcela($produto);

				$produtos[] = $produto;

			}

			return $produtos;
		
		}

		/* É utilizado para alterar parcelas, visto que o 
		   método altParcela() depende de um id. */
		public function buscarPorParcela($idItem,$parcela){

			$conexao = $this->conexao;

			$sql = "SELECT *FROM parcelas
					WHERE parcela='$parcela'
					AND id_item=$idItem";

			$rs = $conexao->query($sql);
			$linhas = $conexao->rows_result($rs);
				
			if($conexao->rows_result($rs) == 0){
				return false;
			}

			$id = $conexao->result($rs,0,'id');

			$parcela = new Parcela();
			$parcela->setId($id = $conexao->result($rs,0,'id'));

			return $parcela;
		}

	}

?>