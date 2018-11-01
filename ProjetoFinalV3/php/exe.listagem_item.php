<!-- 
	Adaptado por: João Pedro
	Em: 31/10/2018
-->

<div class="row">
	<div class="col-md-6 col-sm-7 mx-auto">
		<div class="table-responsive">
			
			<table class="table table-striped">
				
				<tr class="bg-dark">
					<th scope="col" class="text-white text-center">Descrição</th>
					<th scope="col" class="text-white text-center w-25" colspan="2">Ações</th>
				</tr>
				
				<?php
					
					if($itens){

						foreach($itens as $item){
							echo '<tr> 
									<td class="text-center">'.$item->getDescricao().'</td> 
									<td class="text-center"> 
										<a href="index.php?secao=manter&modulo=item&idItem='.$item->getId().'"><img src="img/icones/pencil_icon.png" title="Editar"></a>
									</td>
									<td class="text-center"> 
										<a href="php/acao.item.php?acao=deletar&idItem='.$item->getId().'"><img src="img/icones/delete_icon.png" title="Deletar"></a> 
									</td>
								  </tr>';
						}

					}else{

						echo '<tr>
								<td colspan=4>
									<p class="text-center">Nenhum Registro encontrado</p>
								</td>
							</tr>';
					}

					
				?>
			</table>
		</div>
	</div>
</div>