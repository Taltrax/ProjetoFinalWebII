<!--	Criado por João Pedro da Silva Fernandes em 15/10/18 
		Alt 1: 01/12/2018
-->

<?php require_once('index.movimentacao_recorrente.php'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Movimentação</li>
    <li class="breadcrumb-item active" aria-current="page">Recorrente</li>
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

	<div class="row mb-2">
		<div class="col-8 mx-auto">
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#f_form_cadastro" data-whatever="@mdo">Novo Recorrente</button>
		</div>
	</div>

	<div class="modal fade" id="f_form_cadastro" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h5 class="modal-title">Recorrente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="php/acao.movimentacao_recorrente.php" name="formulario">

						<div class="form-group">
							
							<label for="f_valor" class="col-form-label">Valor</label>
							<input type="text" class="form-control valor" name="f_valor" id="f_valor">

							<label for="f_tipo_mov">Tipo de movimentação</label>
							<select name="f_tipo_mov" id="f_tipo_mov" class="form-control">
								
								<option selected="selected"></option>
								<option value="debito">Débito</option>
								<option value="credito">Crédito</option>
							
							</select>

							<label for="f_centro_custos">Centro Custo</label>
							<select name="f_centro_custos" id="f_centro_custos" class="form-control">
								
								<option selected="selected"></option>
								
								<?php

									foreach ($centrosCustos as $centroC) {
										echo '<option value='.$centroC->getId().'>'.$centroC->getNome().'</option>';
									}

								?>
							
							</select>

							<label for="f_conta">Conta</label>
							<select name="f_conta" id="f_conta" class="form-control">
								
								<option selected="selected"></option>
								
								<?php

									foreach ($contas as $conta) {
										echo '<option value='.$conta->getId().'>'.$conta->getNome().'</option>';
									}

								?>

							</select>

							<label for="f_dia">Dia</label>
							<input class="form-control" type="number" name="f_dia" id="f_dia" min="1" max="30">

							<label for="f_descricao" class="col-form-label">Descrição</label>
							<textarea class="form-control" name="f_descricao" id="f_descricao" rows="4" style="resize: none;"></textarea>
							
						</div>

						<input type="hidden" id="acao" name="acao" value="cadastrar">

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Confirmar</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>

	<div class="modal fade" id="f_form_alterar" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h5 class="modal-title">Recorrente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="php/acao.movimentacao_recorrente.php">

						<div class="form-group">
							
							<label for="f_valor_alt" class="col-form-label">Valor</label>
							<input type="text" class="form-control valor" name="f_valor" id="f_valor_alt" value="<?php echo $recorrente->getValor() ?>">

							<label for="f_tipo_mov">Tipo de movimentação</label>
							<select name="f_tipo_mov" id="f_tipo_mov" class="form-control">
								
								<option></option>
								<option value="debito" <?php if($recorrente->getTipoMov() == 'debito'){ ?> selected="selected" <?php } ?>>Débito</option>
								<option value="credito" <?php if($recorrente->getTipoMov() == 'credito'){ ?> selected="selected" <?php } ?>>Crédito</option>
							
							</select>

							<label for="f_centro_custos_alt">Centro Custo</label>
							<select name="f_centro_custos" id="f_centro_custos_alt" class="form-control">
								<?php

									echo '<option value='.$recorrente->getCentroCustos()->getId().' selected="selected">'.$recorrente->getCentroCustos()->getNome().'</option>';

									foreach ($centrosCustos as $centroC) {

										if($centroC->getId() != $recorrente->getCentroCustos()->getId()){
											echo '<option value='.$centroC->getId().'>'.$centroC->getNome().'</option>';
										
										}
										
									}

								?>
							</select>

							<label for="f_conta_alt">Conta</label>
							<select name="f_conta" id="f_conta_alt" class="form-control">
								<?php

									echo '<option value='.$recorrente->getConta()->getId().' selected="selected">'.$recorrente->getConta()->getNome().'</option>';

									foreach ($contas as $conta) {

										if($conta->getId() != $recorrente->getConta()->getId()){
											echo '<option value='.$conta->getId().'>'.$conta->getNome().'</option>';
										
										}
										
									}

								?>
							</select>

							<label for="f_dia">Dia</label>
							<input class="form-control" type="number" name="f_dia" id="f_dia" min="1" max="30" value="<?php echo $recorrente->getDia(); ?>">

							<label for="f_descricao_alt" class="col-form-label">Descrição</label>
							<textarea class="form-control" name="f_descricao" id="f_descricao_alt" rows="4" style="resize: none;"><?php echo $recorrente->getDescricao() ?></textarea>
							
						</div>

						<input type="hidden" id="acao" name="acao" value="alterar">
						<input type='hidden' name="id" value="<?php echo $recorrente->getId() ?>">

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Confirmar</button>
						</div>


					</form>
				</div>

			</div>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-8 mx-auto">

			<div class="table-responsive">
				<table class="table table-striped">

					<thead class="thead-dark">

						<tr>
							<th class="bg-warning border-top-0" colspan="8">Recorrentes</th>
						</tr>

						<tr>
							<th class="text-center" scope="col"></th>
							<th class="text-center" scope="col">Valor</th>
							<th class="text-center" scope="col">C. Custo</th>
							<th class="text-center" scope="col">Dia</th>
							<th class="text-center" scope="col">Conta</th>
							<th class="text-center" scope="col-md">Descrição</th>
							<th class="text-center" scope="col" colspan="2" class="text-center">Ações</th>
						</tr>

					</thead>

					<tbody>

						<?php

							if($recorrentes){

								foreach ($recorrentes as $recorrente) {
								
								$img = 'img/icones/'.$recorrente->getTipoMov().'.png';

								echo	
									'<tr>
										<td class="text-center">
				                          <img width="20" height="20" src='.$img.' />
				                        </td>
										<th class="text-center" scope="row">R$ '.number_format($recorrente->getValor(), 2, ',', '.').'</th>
										<td class="text-center">'.$recorrente->getCentroCustos()->getNome().'</td>
										<td class="text-center">'.$recorrente->getDia().'</td>	
										<td class="text-center">'.$recorrente->getConta()->getNome().'</td>
										<td class="text-center">
							                <a href="#" onclick="criarModal(this)">
							                	<img src="img/icones/document_icon.png" />
							                </a>
							                <input type="hidden" value="'.$recorrente->getDescricao().'">
							            </td>
										<td class="text-center">
											<a href="index.php?secao=movimentacao&modulo=recorrente&id='.$recorrente->getId().'">
												<img src="img/icones/pencil_icon.png" title="Editar" />
											</a>
										</td>
										<td class="text-center">
											<a href="php/acao.movimentacao_recorrente.php?acao=deletar&id='.$recorrente->getId().'">
												<img src="img/icones/delete_icon.png" title="Deletar" />
											</a>
										</td>
									</tr>';

								}

							}else{

								echo '<tr>
										<td class="text-center" colspan="8">Nenhum registro encontrado</td>
									</tr>';

							}

						?>

					</tbody>

				</table>
			</div>

		</div>
	</div>

</div>

<script type="text/javascript" src="js/functions.js"></script>