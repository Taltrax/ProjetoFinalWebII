<!-- 
	Criado por: Guilherme Mayer
	Em: 17/10/2018

	REV 1 - Guilherme Mayer
	Em: 04/12/2018
-->

<?php require_once('index.movimentacao_parcelada.php'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Movimentação</li>
    <li class="breadcrumb-item active" aria-current="page">Parcelada</li>
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
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#f_form_cadastro" data-whatever="@mdo">Novo Parcelamento</button>
		</div>
	</div>

	<div class="modal fade" id="f_form_cadastro" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h5 class="modal-title">Novo Parcelamento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="php/acao.movimentacao_parcelada.php" name="formulario">

						<div class="form-group">

							<label for="f_item">Item</label>
							<select name="f_item" id="f_item" class="form-control" required="required">
								
								<option selected="selected"></option>';
								
								<?php
									foreach ($item as $itemTemp) {
										echo '<option value='.$itemTemp->getId().'>'.$itemTemp->getDescricao().'</option>';
									}
								?>							

							</select>

							<label for="f_valor" class="col-form-label">Valor</label>
							<input type="text" class="form-control valor" name="f_valor" id="f_valor" required="required">

							<label for="f_tipo_mov">Tipo de movimentação</label>
							<select name="f_tipo_mov" id="f_tipo_mov" class="form-control" required="required">
								
								<option selected="selected"></option>
								<option value="debito" >Débito</option>
								<option value="credito">Crédito</option>
							
							</select>

							<label for="f_centro_custos">Centro Custo</label>
							<select name="f_centro_custos" id="f_centro_custos" class="form-control" required="required">
								
								<option selected="selected"></option>
								
								<?php

									foreach ($centrosCustos as $centroC) {
										echo '<option value='.$centroC->getId().'>'.$centroC->getNome().'</option>';
									}

								?>
							
							</select>

							<label for="f_conta">Conta</label>
							<select name="f_conta" id="f_conta" class="form-control" required="required">
								
								<option selected="selected"></option>
								
								<?php

									foreach ($contas as $conta) {
										echo '<option value='.$conta->getId().'>'.$conta->getNome().'</option>';
									}

								?>

							</select>

							<label for="f_data">Data Início</label>
							<input class="form-control" type="date" name="f_data" id="f_data" min="<?php echo $data; ?>" value="<?php echo $data ?>" required="required">

							<label for="f_vezes">Quantidade de Parcelas</label>
							<input class="form-control" type="number" name="f_vezes" id="f_vezes" value="2" min="2" required="required">
							
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
					<h5 class="modal-title">Alterar Parcela</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="php/acao.movimentacao_parcelada.php">

						<div class="form-group">

							<label for="f_item_alt">Item</label>
							<select name="f_item" id="f_item_alt" class="form-control" required="required">
								
								<option selected="selected" value="<?php if(isset($id)) echo $parcelada->getItem()->getId() ?>"><?php if(isset($id)) echo $parcelada->getItem()->getDescricao(); ?></option>
								
								<?php
									foreach ($item as $itemTemp) {
										if(isset($id) and ($itemTemp->getId() != $parcelada->getItem()->getId())){
											echo '<option value='.$itemTemp->getId().'>'.$itemTemp->getDescricao().'</option>';
										}
									}
								?>		
							</select>				
							
							
							<label for="f_valor_alt" class="col-form-label">Valor</label>
							<input type="text" class="form-control valor" name="f_valor" id="f_valor_alt" value="<?php if(isset($id)) echo $parcelada->getValor() ?>" required="required">

							<label for="f_tipo_mov">Tipo de movimentação</label>
							<select name="f_tipo_mov" id="f_tipo_mov" class="form-control" required="required">
								
								<?php
									if(isset($id) and $parcelada->getTipoMov()=='credito'){
										echo '<option selected="selected" value="credito">Crédito</option>
											  <option value="debito">Débito</option>';
									}else{
										echo '<option selected="selected" value="debito">Débito</option>
											  <option value="credito">Crédito</option>';
									}
								?>
							
							</select>

							<label for="f_centro_custos_alt">Centro Custo</label>
							<select name="f_centro_custos" id="f_centro_custos_alt" class="form-control" required="required">
								<?php

									if(isset($id)){
										echo '<option value='.$parcelada->getCentroCustos()->getId().' selected="selected">'.$parcelada->getCentroCustos()->getNome().'</option>';

										echo '<option value="'.$parcelada->getCentroCustos()->getId().'" selected="selected">'.$parcelada->getCentroCustos()->getNome().'</option>';
									}

									foreach ($centrosCustos as $centroC) {

										if(isset($id) and ($centroC->getId() != $parcelada->getCentroCustos()->getId())){
											echo '<option value='.$centroC->getId().'>'.$centroC->getNome().'</option>';
										
										}	
									}

								?>
							</select>

							<label for="f_conta_alt">Conta</label>
							<select name="f_conta" id="f_conta_alt" class="form-control" required="required">
								<?php

									if(isset($id))
										echo '<option value='.$parcelada->getConta()->getId().' selected="selected">'.$parcelada->getConta()->getNome().'</option>';
									

									foreach ($contas as $conta) {

										if(isset($id) and ($conta->getId() != $parcelada->getConta()->getId())){
											echo '<option value='.$conta->getId().'>'.$conta->getNome().'</option>';
										}
										
									}
									
								?>
							</select>

							<label for="f_data_alt">Data de Início</label>
							<input class="form-control" type="date" name="f_data" id="f_data" value="<?php echo $parcelada->getVencimento(); ?>" required="required" min="<?php echo $data; ?>">

							<label for="f_vezes_alt">Quantidade de Parcelas</label>
							<input type="text" class="form-control valor" name="f_vezes" id="f_vezes" value="<?php echo $parcelada->getParcela(); ?>" readonly="readonly">
						</div>

						<input type="hidden" id="acao" name="acao" value="alterar">
					
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
							<th class="bg-warning border-top-0" colspan="10">Parcelas</th>
						</tr>

						<tr>
							<th class="text-center" scope="col"></th>
							<th class="text-center" scope="col">Item</th>
							<th class="text-center" scope="col">Valor</th>
							<th class="text-center" scope="col">Vencimento</th>
							<th class="text-center" scope="col">Parcela</th>
							<th class="text-center" scope="col">Status</th>
							<th class="text-center" scope="col">C. Custo</th>
							<th class="text-center" scope="col">Conta</th>
							<th class="text-center" scope="col" colspan="2" class="text-center">Ações</th>
						</tr>

					</thead>

					<tbody>

						<?php

							if($parceladas){

								foreach ($parceladas as $parcela) {
								
								$img = 'img/icones/'.$parcela->getTipoMov().'.png';

								echo '<tr>
										<td class="text-center">
				                          <img width="20" height="20" src='.$img.' />
				                        </td>
				                        <th class="text-center" scope="row">'.$parcela->getItem()->getDescricao().'</th>
										<td class="text-center">R$ '.number_format($parcela->getValor(), 2, ',', '.').'</td>
										<td class="text-center">'.$parcela->getVencimento().'</td>	
										<td class="text-center">'.$parcela->getParcela().'</td>
										<td class="text-center">'.$parcela->getStatusPagamento().'</td>
										<td class="text-center">'.$parcela->getCentroCustos()->getNome().'</td>
										<td class="text-center">'.$parcela->getConta()->getNome().'</td>';

										$acoes = explode("/",$parcela->getParcela());
										if($acoes[0]==1){
											echo '<td class="text-center">
													<a href="index.php?secao=movimentacao&modulo=parcela&id='.$parcela->getId().'">
														<img src="img/icones/pencil_icon.png" title="Editar" />
													</a>
												  </td>
										          <td class="text-center">
													<a href="php/acao.movimentacao_parcelada.php?acao=deletar&id='.$parcela->getId().'">
														<img src="img/icones/delete_icon.png" title="Deletar" />
													</a>
										          </td>
											    </tr>';
										}else{
											echo '<td class="text-center" colspan="2"><b>Nenhuma</b></td></tr>';
										}
								}

							}else{

								echo '<tr>
										<td class="text-center" colspan="10">Nenhum registro encontrado</td>
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