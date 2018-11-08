<!-- 
	Criado por: Guilherme Mayer
	Em: 17/10/2018
	REV 1: 08/11/2018
-->
<?php 
	require_once('index.manter_centroDeCusto.php');
?>

<div class="container-fluid">


	<!-- Mensagens de alerta -->
	<?php

		if(isset($_GET['sucesso']) and !empty($_GET['sucesso'])){

			$msg = $_GET['sucesso'];
			echo '<div class="alert alert-success text-center" role="alert">
					'.$msg.'
				</div>';

		}elseif(isset($_GET['erro']) and !empty($_GET['erro'])){

			$msg = $_GET['erro'];
			echo '<div class="alert alert-danger text-center" role="alert">
					'.$msg.'
				</div>';
		}
	?>

	<h5 class="text-center">Centros de Custos</h5>

	<form class="form-inline" action="php/acao.centroDeCusto.php" method="POST">
		
		<div class="mx-auto mb-4">
			
			<label for="novo_cc" class="mb-2">Nome</label>
			<input type="text" class="form-control" id="novo_cc" name="novo_cc" value="<?php echo $nome ?>" required="required" />
			<button type="submit" class="btn btn-primary"><?php echo strtoupper($acao) ?></button>
		
		</div>

		<input type="hidden" name="id" value="<?php echo $id ?>"/>
		<input type="hidden" name="acao" value="<?php echo $acao ?>"/>

	</form>


	<?php require_once("exe.listagem_centroDeCusto.php"); ?>
	
</div>
