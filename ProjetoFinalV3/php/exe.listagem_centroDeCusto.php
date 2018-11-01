<!-- 
	Criado por: Guilherme Mayer
	Em: 11/10/2018
-->
<div class="table-responsive">
	<table class="table table-striped">
		<tr class="bg-dark">
			<th scope="col" class="text-white text-center">Nome</th>
			<th scope="col" class="text-white text-center" colspan="2">Ações</th>
		</tr>
		<?php
			require_once("..\classes\class.CentroCustos.php");
			require_once("..\classes\class.CentroCustosDAO.php");
			
			$aux = "ABCDE";
			for($i=0;$i<5;$i++){
				echo '<tr> 
						<td class="text-center"> &nbsp;&nbsp; Centro de Custo '.$aux[$i].' </td> 
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
</div>

