<!-- 
	Criado por: Guilherme Mayer
	Em: 17/10/2018
	REV 1: 01/11/2018
-->
<div class="row">
	<div class="col-md-6 col-sm-7 mx-auto">
		<div class="table-responsive">
			
			<table class="table table-striped">
				
				<tr class="bg-dark">
					<th scope="col" class="text-white text-center">Nome</th>
					<th scope="col" class="text-white text-center">Saldo</th>
					<th scope="col" class="text-white text-center w-25" colspan="2">Ações</th>
				</tr>
				
				<?php
					
					if($contas){

						foreach($contas as $conta){
							echo '<tr> 
									<td class="text-center">'.$conta->getNome().'</td> 
									<td class="text-center">R$ '.$conta->getSaldo().'</td> 
									<td class="text-center"> 
										<a href="index.php?secao=manter&modulo=conta&id='.$conta->getId().'"><img src="img/icones/pencil_icon.png" title="Editar"></a>
									</td>
									<td class="text-center"> 
										<a href="php/acao.conta.php?acao=deletar&id='.$conta->getId().'"><img src="img/icones/delete_icon.png" title="Deletar"></a> 
									</td>
								  </tr>';
						}

					}else{

						echo '<tr>
								<td colspan=5>
									<p class="text-center">Nenhum Registro encontrado</p>
								</td>
							</tr>';
					}

					
				?>
			</table>
		</div>
	</div>
</div>