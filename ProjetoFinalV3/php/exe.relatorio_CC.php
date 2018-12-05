<!--	
	Criado por Guilherme Mayer
	em 26/11/18 

	Modificado por João Pedro em 01/12/2018
-->

<?php
	require_once("index.relatorioCC.php");
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Relatório</li>
    <li class="breadcrumb-item active" aria-current="page">Centro de custos</li>
  </ol>
</nav>

<div class="container-fluid">

	<div class="row mb-2">
		<div class="col-8 mx-auto">
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#f_form_relatorio" data-whatever="@mdo">Filtros</button>
		</div>
	</div>

	<div class="modal fade" id="f_form_relatorio" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h5 class="modal-title">Relatório centro de custos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="index.php?secao=relatorio&modulo=cc">

						<div class="form-group">
							
							<label for="f_tipo_mov">Tipo de movimentação</label>
							<select name="f_tipo_mov" id="f_tipo_mov" class="form-control">
								
								<option value="">Todos</option>
								<option value="debito" <?php if($filtro_tipoMov == 'debito'){?> selected="selected" <?php }?>>Débito</option>
								<option value="credito" <?php if($filtro_tipoMov == 'credito'){?> selected="selected" <?php }?>>Crédito</option>
							
							</select>

							<label for="f_conta">Conta</label>
							<select name="f_conta" id="f_conta" class="form-control">
								
								<option selected="selected"></option>
								
								<?php

									foreach ($contas as $conta) {

										if($filtro_conta == $conta->getId()){
											echo '<option value='.$conta->getId().' selected="selected">'.$conta->getNome().'</option>';
										}else{
											echo '<option value='.$conta->getId().'>'.$conta->getNome().'</option>';
										}

									}

								?>

							</select>

							<label for="f_mes" class="col-form-label">Mês</label>
							<select name="f_mes" id="f_mes" class="form-control">
								
								<option value="">Todos</option>
								<option value="1" <?php if($filtro_mes == 1){?> selected="selected" <?php }?>>Janeiro</option>
								<option value="2" <?php if($filtro_mes == 2){?> selected="selected" <?php }?>>Fevereiro</option>
								<option value="3" <?php if($filtro_mes == 3){?> selected="selected" <?php }?>>Março</option>
								<option value="4" <?php if($filtro_mes == 4){?> selected="selected" <?php }?>>Abril</option>
								<option value="5" <?php if($filtro_mes == 5){?> selected="selected" <?php }?>>Maio</option>
								<option value="6" <?php if($filtro_mes == 6){?> selected="selected" <?php }?>>Junho</option>
								<option value="7" <?php if($filtro_mes == 7){?> selected="selected" <?php }?>>Julho</option>
								<option value="8" <?php if($filtro_mes == 8){?> selected="selected" <?php }?>>Agosto</option>
								<option value="9" <?php if($filtro_mes == 9){?> selected="selected" <?php }?>>Setembro</option>
								<option value="10" <?php if($filtro_mes == 10){?> selected="selected" <?php }?>>Outubro</option>
								<option value="11" <?php if($filtro_mes == 11){?> selected="selected" <?php }?>>Novembro</option>
								<option value="12" <?php if($filtro_mes == 12){?> selected="selected" <?php }?>>Dezembro</option>
							
							</select>

							<label for="f_ano" class="col-form-label">Ano</label>
							<input type="number" class="form-control" name="f_ano" id="f_ano" value="<?php echo $ano_filtro?>">
							
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Confirmar</button>
						</div>

						<input type="hidden" name="ativar" value="1">

					</form>
				</div>

			</div>
		</div>
	</div>

	<?php require_once('php/exe.listagem_relatorioCC.php'); ?>

</div>
