<!-- 
	Criado por: João Pedro da Silva Fernandes
	Em: 31/10/2018
-->
<?php 
	require_once('index.manter_item.php');
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Manter</li>
    <li class="breadcrumb-item active" aria-current="page">Item</li>
  </ol>
</nav>

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

	<h5 class="text-center">Itens</h5>

	<form class="form-inline" action="php/acao.item.php" method="POST">
		
		<div class="mx-auto mb-4">
			
			<label for="descricao" class="mb-2">Descrição</label>
			<input type="text" class="form-control" id="descricao" name="f_descricao" value="<?php echo $descricao ?>" required="required" />
			<button type="submit" class="btn btn-primary"><?php echo strtoupper($acao) ?></button>
		
		</div>

		<input type="hidden" name="idItem" value="<?php echo $idItem ?>"/>
		<input type="hidden" name="acao" value="<?php echo $acao ?>"/>

	</form>


	<?php require_once("exe.listagem_item.php"); ?>
	
</div>

</div>