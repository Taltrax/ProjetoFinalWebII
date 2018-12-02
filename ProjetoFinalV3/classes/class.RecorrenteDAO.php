<?php
	
	/*
		Classe criado por João Pedro em 05/10/2018
	*/	
	require_once('class.DbAdmin.php');
	require_once('class.Recorrente.php');
	require_once('class.RecorrenteMovDAO.php');

	class RecorrenteDAO{

		private $conexao;

		public function RecorrenteDAO(){

			$conexao = new DbAdmin('mysql');
			$conexao->connect('localhost','root','','contas');
			$this->conexao = $conexao;
		}

		public function addRecorrente($recorrente){

			$conexao = $this->conexao;

			$idCentroCustos = $recorrente->getCentroCustos()->getId();
			$idConta = $recorrente->getConta()->getId();
			$tipoMov = $recorrente->getTipoMov();
			$dia = $recorrente->getDia();
			$descricao = $recorrente->getDescricao();
			$valor = $recorrente->getValor();

			$sql = 'INSERT INTO recorrentes
					VALUES (NULL,
							'.$idCentroCustos.',
							'.$idConta.',
							"'.$tipoMov.'",
							'.$dia.',
							"'.$descricao.'",
							'.$valor.')';

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function delRecorrente($recorrente){

			$conexao = $this->conexao;
			$recMov = new RecorrenteMov();
			$recMovDAO = new RecorrenteMovDAO();

			$id = $recorrente->getId();

			$recMov->setIdRecorrente($id);
			$recMov->setIdMovimentacao(-1);
			$recMovDAO->delRecorrenteMov($recMov);

			$sql = 'DELETE FROM recorrentes
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function altRecorrente($recorrente){

			$conexao = $this->conexao;

			$id = $recorrente->getId();
			$idCentroCustos = $recorrente->getCentroCustos()->getId();
			$idConta = $recorrente->getConta()->getId();
			$tipoMov = $recorrente->getTipoMov();
			$dia = $recorrente->getDia();
			$descricao = $recorrente->getDescricao();
			$valor = $recorrente->getValor();

			$sql = 'UPDATE recorrentes
					SET id_centro_custos = '.$idCentroCustos.',
						id_conta = '.$idConta.',
						tipo_mov = "'.$tipoMov.'",
						dia = '.$dia.',
						descricao = "'.$descricao.'",
						valor = '.$valor.'
					WHERE id = '.$id;

			$rs = $conexao->query($sql);

			if($rs){
				return true;
			}

			return false;
		}

		public function buscarRecorrentes($limit=''){

			if($limit){
				$limit = 'LIMIT '.$limit;
			}

			$conexao = $this->conexao;

			$sql = 'SELECT rec.*, cc.nome as nome_cc, contas.nome as nome_conta
					FROM recorrentes as rec
					INNER JOIN centro_custos as cc 
					ON rec.id_centro_custos = cc.id 
					INNER JOIN contas
					ON rec.id_conta = contas.id
					ORDER BY dia ASC '.
					$limit;

			$rs = $conexao->query($sql);

			$linhas = $conexao->rows_result($rs);

			if($linhas == 0){
				return false;
			}

			for($i=0; $i<$linhas; $i++){

				$recorrente = new Recorrente();
				$recorrente->setId($conexao->result($rs, $i, 'id'));

				$recorrente->getCentroCustos()->setId($conexao->result($rs, $i, 'id_centro_custos'));
				$recorrente->getCentroCustos()->setNome($conexao->result($rs, $i, 'nome_cc'));

				$recorrente->getConta()->setId($conexao->result($rs, $i, 'id_conta'));
				$recorrente->getConta()->setNome($conexao->result($rs, $i, 'nome_conta'));

				$recorrente->setTipoMov($conexao->result($rs, $i, 'tipo_mov'));
				$recorrente->setDia($conexao->result($rs, $i, 'dia'));
				$recorrente->setDescricao($conexao->result($rs, $i, 'descricao'));
				$recorrente->setValor($conexao->result($rs, $i, 'valor'));

				$recs[] = $recorrente;

			}

			return $recs;

		}

		public function buscarRecorrente($id){

			$conexao = $this->conexao;

			$sql = 'SELECT rec.*, cc.nome as nome_cc, contas.nome as nome_conta
					FROM recorrentes as rec
					INNER JOIN centro_custos as cc 
					ON rec.id_centro_custos = cc.id 
					INNER JOIN contas 
					ON rec.id_conta = contas.id
					WHERE rec.id = '.$id;

			$rs = $conexao->query($sql);

			if($conexao->rows_result($rs) == 0){
				return false;
			}

			$recorrente = new Recorrente();
			$recorrente->setId($conexao->result($rs, 0, 'id'));

			$recorrente->getCentroCustos()->setId($conexao->result($rs, 0, 'id_centro_custos'));
			$recorrente->getCentroCustos()->setNome($conexao->result($rs, 0, 'nome_cc'));

			$recorrente->getConta()->setId($conexao->result($rs, 0, 'id_conta'));
			$recorrente->getConta()->setNome($conexao->result($rs, 0, 'nome_conta'));

			$recorrente->setTipoMov($conexao->result($rs, 0, 'tipo_mov'));
			$recorrente->setDia($conexao->result($rs, 0, 'dia'));
			$recorrente->setDescricao($conexao->result($rs, 0, 'descricao'));
			$recorrente->setValor($conexao->result($rs, 0, 'valor'));
			
			return $recorrente;

		}

	}

?>