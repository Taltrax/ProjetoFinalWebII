<!-- 
	Criado por: Guilherme Mayer
	Em: 17/10/2018
	REV 1: 01/11/2018
-->
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
			<h5>Contas</h5>
		</div>
	</div>

	<div class="row">
		<div class="mx-auto mw-auto mb-2" style="padding-right: 200px;">
			<h6>Nova conta</h6>
		</div>
	</div>

	<!-- Verifica se o formulário é de cadastro ou edição -->
	<?php
		if(isset($_GET['aux'])){
			$acao = $_GET['aux'];
		}else{ $acao = 'Inserir'; }
	?>

	<div class="row mb-5">
		<div class="mx-auto mw-auto">
			<form class="form-inline" action="php/acao.conta.php?op=<?php echo $acao; ?>" method="POST"> 
				<div class="form-group mx-sm-1">
					<?php 

						if(isset($_GET['id'])){
							echo '<input type="hidden" name="id" value="'.$_GET['id'].'">';
						}

						if(isset($_GET['conta'])){
							echo '<input class="form-control" type="text" id="nova_conta" name="nova_conta" value="'.$_GET['conta'].'">';
						}else{
							echo '<input class="form-control" type="text" id="nova_conta" name="nova_conta">';
						}

					?>
				</div>
				<div class="form-group mx-sm-1">
					<button class="btn btn-primary md-6" type="submit"><?php echo $acao ?></button> 
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="mx-auto mw-auto">
			<?php require_once("exe.listagem_conta.php"); ?>
		</div>
	</div>
