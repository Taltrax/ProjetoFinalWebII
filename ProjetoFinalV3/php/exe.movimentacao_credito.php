<!--	Criado por João Pedro da Silva Fernandes em 15/10/18 -->

<?php require_once('index.movimentacao_credito.php'); ?>

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
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#f_form_cadastro" data-whatever="@mdo">Novo Crédito</button>
		</div>
	</div>

	<div class="modal fade" id="f_form_cadastro" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h5 class="modal-title">Crédito</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="php/acao.movimentacao_credito.php" name="formulario">

						<div class="form-group">
							
							<label for="f_valor" class="col-form-label">Valor</label>
							<input type="text" class="form-control valor" name="f_valor" id="f_valor">

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

							<label for="f_data">Data</label>
							<input class="form-control" type="date" name="f_data" id="f_data">

							<label for="f_descricao" class="col-form-label">Descrição</label>
							<textarea class="form-control" name="f_descricao" id="f_descricao" rows="4" style="resize: none;"></textarea>
							
						</div>

						<input type="hidden" name="f_tipo_mov" value="credito">
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
					<h5 class="modal-title">Crédito</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="php/acao.movimentacao_credito.php">

						<div class="form-group">
							
							<label for="f_valor_alt" class="col-form-label">Valor</label>
							<input type="text" class="form-control valor" name="f_valor" id="f_valor_alt" value="<?php echo $credito->getValor() ?>">

							<label for="f_centro_custos_alt">Centro Custo</label>
							<select name="f_centro_custos" id="f_centro_custos_alt" class="form-control">
								<?php

									foreach ($centrosCustos as $centroC) {

										if($centroC->getId() == $credito->getCentroCustos()->getId()){
											echo '<option value='.$centroC->getId().' selected="selected">'.$centroC->getNome().'</option>';
										
										}else{
											echo '<option value='.$centroC->getId().' checked="checked">'.$centroC->getNome().'</option>';
										}
										
									}

								?>
							</select>

							<label for="f_conta_alt">Conta</label>
							<select name="f_conta" id="f_conta_alt" class="form-control">
								<?php

									foreach ($contas as $conta) {

										if($conta->getId() == $credito->getConta()->getId()){
											echo '<option value='.$conta->getId().' selected="selected">'.$conta->getNome().'</option>';
										
										}else{
											echo '<option value='.$conta->getId().'>'.$conta->getNome().'</option>';
										}
										
									}

								?>
							</select>

							<label for="f_data_alt">Data</label>
							<input class="form-control" type="date" name="f_data" id="f_data_alt" value="<?php echo $credito->getData() ?>">

							<label for="f_descricao_alt" class="col-form-label">Descrição</label>
							<textarea class="form-control" name="f_descricao" id="f_descricao_alt" rows="4" style="resize: none;"><?php echo $credito->getDescricao() ?></textarea>
							
						</div>

						<input type="hidden" name="f_tipo_mov" value="credito">
						<input type="hidden" id="acao" name="acao" value="alterar">
						<input type='hidden' name="id" value="<?php echo $credito->getId() ?>">

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
							<th class="bg-success border-top-0" colspan="7">Créditos</th>
						</tr>

						<tr>
							<th class="text-center" scope="col">Valor</th>
							<th class="text-center" scope="col">C. Custo</th>
							<th class="text-center" scope="col">Data</th>
							<th class="text-center" scope="col">Conta</th>
							<th class="text-center" scope="col-md">Descrição</th>
							<th class="text-center" scope="col" colspan="2" class="text-center">Ações</th>
						</tr>

					</thead>

					<tbody>

						<?php

							if($creditos){

								foreach ($creditos as $credito) {
								
								echo	
									'<tr>
										<td class="text-center" scope="row">R$ '.$credito->getValor().'</td>
										<td class="text-center">'.$credito->getCentroCustos()->getNome().'</td>
										<td class="text-center">'.$credito->getData().'</td>	
										<td class="text-center">'.$credito->getConta()->getNome().'</td>
										<td class="text-center">
							                <a href="#" onclick="criarModal(this)">
							                	<img src="img/icones/document_icon.png" />
							                </a>
							                <input type="hidden" value="'.$credito->getDescricao().'">
							            </td>
										<td class="text-center">
											<a href="index.php?secao=movimentacao&modulo=credito&id='.$credito->getId().'">
												<img src="img/icones/pencil_icon.png" title="Editar" />
											</a>
										</td>
										<td class="text-center">
											<a href="php/acao.movimentacao_credito.php?acao=deletar&id='.$credito->getId().'">
												<img src="img/icones/delete_icon.png" title="Deletar" />
											</a>
										</td>
									</tr>';

								}

							}else{

								echo '<tr>
										<td class="text-center" colspan=8>Nenhum registro encontrado</td>
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