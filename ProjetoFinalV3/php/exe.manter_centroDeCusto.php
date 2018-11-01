<!-- 
	Criado por: Guilherme Mayer
	Em: 11/10/2018
	REV 1 - 30/10/2018
-->
<div class="container-fluid">

	<div class="row">
		<div class="mx-auto mw-auto">
			<!-- Verifica alteração no banco -->
			<?php
				if(isset($_GET['info'])){
					echo '<div class="alert alert-success" role="alert">';
						echo $_GET['info'];
					echo '</div>';
				}
			?>
		</div>
	</div>

	<div class="row mb-2">
		<div class="mx-auto mw-auto">
			<h5>Centros de Custos</h5>
		</div>
	</div>

	<div class="row">
		<div class="mx-auto mw-auto mb-2">
			<h6>Novo centro de custo</h6>
		</div>
	</div>

	<div class="row mb-5">
		<div class="mx-auto mw-auto">
			<form class="form-inline" action="php/acao.centroDeCusto.php?op=add" method="POST"> 
				<div class="form-group mx-sm-1">
					<input class="form-control" type="text" id="novocd" name="novocd">

				</div>
				<div class="form-group mx-sm-1">
					<button class="btn btn-primary md-6" type="submit">Inserir</button> 
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class=" mx-auto mw-auto">
			<?php require_once("exe.listagem_centroDeCusto.php"); ?>
		</div>
	</div>