<!-- 
	Criado por: Guilherme Mayer
	Em: 17/10/2018
	REV 1: 01/11/2018
-->
<div class="table-responsive">
		
		<?php
			
			require_once("classes\class.ContaDAO.php");
			
			$dao = new ContaDAO('mysql');
			$temp = $dao->listar();

			if($temp!=false){

				echo '<table class="table table-striped">
						<tr class="bg-dark">
						<th scope="col" class="text-white text-center">Nome</th>
						<th scope="col" class="text-white text-center" colspan="2">Ações</th>
					</tr>';

				foreach ($temp as $conta) {
					
					$id = $conta->getId();
					$nome = $conta->getNome();

					echo '<tr> 
							<td class="text-center">'.$nome.'</td> 
							<td> 
								<a href="php/acao.Conta.php?op=Buscar&id='.$id.'">
									<img src="img/icones/pencil_icon.png" title="Editar">
								</a> 
							</td>
							<td>
								<a href="php/acao.Conta.php?op=Deletar&id='.$id.'"> 
									<img src="img/icones/delete_icon.png" title="Deletar"> 
								</a>
							</td>
						</tr>';
				}
			}
		?>
	</table>
</div>
