<!-- 
	Criado por: Guilherme Mayer
	Em: 17/10/2018
-->
<div class="container-fluid">

	<div class="row justify-content-md-center">
    	<div class="col-centered">
    		<h5>Contas</h5>
    	</div>
  	</div>

	</br> 

	<form> <!-- action="acao.conta.php" method="POST" -->
		<div class="form-group">
			<div class="row justify-content-md-center" style="padding-left: 10px;">
				<div class="col-centered col-md-2">
					<label>Nova conta</label>
				</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col-centered">
					<input class="form-control" type="text" class="form-control" id="novocd" name="conta">
				</div>
				<div class="col-centered" style="padding-left: 5px;">
					<button class="form-control btn-primary" type="submit">Inserir</button> 
				</div>
			</div>
		</div>
	</form>

	</br>

	<div class="row justify-content-md-center">
		<div clas="col-centered col-2">
			<?php require_once("exe.listagem_conta.php"); ?>
		</div>
	</div>
	
</div>