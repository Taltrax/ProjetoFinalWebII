<!-- 
	Criado por: Guilherme Mayer
	Em: 17/10/2018
-->
<table class="table table-striped table-responsive">
	<tr class="bg-dark">
		<th scope="col" class="text-white text-center">Nome</th>
		<th scope="col" class="text-white text-center" colspan="2">Ações</th>
	</tr>
	<?php
		$aux = "ABCDE";
		for($i=0;$i<5;$i++){
			echo '<tr> 
					<td class="text-center"> &nbsp;&nbsp; Conta Exemplo '.$aux[$i].'</td> 
					<td> 
						<img src="img/icones/pencil_icon.png" title="Editar"> 
					</td>
					<td> 
						<img src="img/icones/delete_icon.png" title="Deletar"> 
					</td>
				  </tr>';
		}
	?>
</table>