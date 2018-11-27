<!--	
	Criado por Guilherme Mayer
	em 26/11/18 
-->

<?php require_once("index.relatorio_CC.php"); ?>

<div class="container clearfix">
	
	<h5 class="text-center">Relatório - Centro de Custo</h5> <br>

	<form class="col-md-4 offset-md-4">
		
	    <div class="form-group">
	    	<label class="mr-sm-2"> Tipo de Movimentação</label> <br>
	    	<label class="checkbox-inline mr-sm-2"><input type="checkbox" value="debito"> Débito </label>
			<label class="checkbox-inline mr-sm-2"><input type="checkbox" value="credito"> Crédito </label>
			<label class="checkbox-inline mr-sm-2"><input type="checkbox" value="null" checked> Todos </label>
	    </div>

		<?php
			if($contas!=false){

				echo '<div class="form-group">
					  <label class="mr-sm-2">Contas</label>
	                  <select class="custom-select" name="conta">';

				echo '<option selected="selected" value="todas">Todas</option>';

				for($i=0;$i<count($contas);$i++){
					echo '<option value="$contas[$i]->getId()">';
					echo $contas[$i]->getNome().'</option>';
				}
				
				echo '</select></div>';
			}
		?>
		
		<label class="mr-sm-2">Data</label>
		<div class="form-inline">
			<label class="mr-sm-2">Mês</label>
			<select class="custom-select" name="mes"> 
				<?php			
					setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
					for($i=1;$i<=12;$i++){
						print('<option value="'.$i.'">'.
							utf8_encode(ucfirst(strftime("%B", strtotime('2016-'.$i.'-22'))))
						     .'</option>');
					}
				?>
			</select>
			<label class="px-2">Ano</label>
				<input class="custom-select" type="number" min="2018" max="2099" value="2018" name="ano">
			</div>
		
		<div class="form-group">
			<br>
			<button type="submit" class="btn btn-primary"> Pesquisar </button>
		</div>

	</form>

</div>