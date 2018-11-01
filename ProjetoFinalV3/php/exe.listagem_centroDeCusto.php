<!-- 
	Criado por: Guilherme Mayer
	Em: 11/10/2018
	REV 1: 01/11/2018
-->
<div class="table-responsive">
		
		<?php
			
			require_once("classes\class.CentroCustosDAO.php");
			
			$dao = new CentroCustosDAO('mysql');
			$temp = $dao->listar();

			if($temp!=false){

				echo '<table class="table table-striped">
						<tr class="bg-dark">
						<th scope="col" class="text-white text-center">Nome</th>
						<th scope="col" class="text-white text-center" colspan="2">Ações</th>
					</tr>';

				foreach ($temp as $cd) {
					
					$id = $cd->getId();
					$nome = $cd->getNome();

					echo '<tr> 
							<td class="text-center">'.$nome.'</td> 
							<td> 
								<a href="php/acao.CentroDeCusto.php?op=Buscar&id='.$id.'">
									<img src="img/icones/pencil_icon.png" title="Editar">
								</a> 
							</td>
							<td>
								<a href="php/acao.CentroDeCusto.php?op=Deletar&id='.$id.'"> 
									<img src="img/icones/delete_icon.png" title="Deletar"> 
								</a>
							</td>
						</tr>';
				}
			}
		?>
	</table>
</div>
