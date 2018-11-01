<!-- 
	Adaptado por: Guilherme Mayer
	Em: 17/10/2018
-->

<div class="container-fluid">

	<div class="row mb-2">
		<div class="col-8 mx-auto">
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#f_form_cadastro" data-whatever="@mdo">Nova Parcela(s)</button>
		</div>
	</div>

	<div class="modal fade" id="f_form_cadastro" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h5 class="modal-title">Parcelas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="#">

						<div class="form-group">
							
							<label for="f_valor" class="col-form-label">Valor</label>
							<input type="text" class="form-control" name="f_valor" id="f_valor">

							<label for="f_centro_custo">Centro Custo</label>
							<select name="f_centro_custo" id="f_centro_custo" class="form-control">
								<option selected>Centro Custo X</option>
								<option>...</option>
							</select>

							<label for="f_centro_custo">Conta</label>
							<select name="f_centro_custo" id="f_centro_custo" class="form-control">
								<option selected>Conta X</option>
								<option>...</option>
							</select>

							<label for="f_data">Data</label>
							<input class="form-control" type="date" name="f_data" id="f_data">

							<label for="f_descricao" class="col-form-label">Descrição</label>
							<textarea class="form-control" name="f_descricao" id="f_descricao" rows="4" style="resize: none;"></textarea>
							
						</div>

						<input type="hidden" name="f_tipo_mov" value="credito">

					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary">Confirmar</button>
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
							<th class="bg-success border-top-0" colspan="7">Parcelas</th>
						</tr>

						<tr>
							<th class="text-center" scope="col">Valor</th>
							<th class="text-center" scope="col">C. Custo</th>
							<th class="text-center" scope="col">Data</th>
							<th class="text-center" scope="col">Conta</th>
							<th class="text-center" scope="col-md">Descricao</th>
							<th class="text-center" scope="col" colspan="2" class="text-center">Ações</th>
						</tr>

					</thead>

					<tbody>

						<tr>
							<th class="text-center" scope="row">X R$</th>
							<td class="text-center">C. Custo X</td>
							<td class="text-center">xx/xx/xx</td>	
							<td class="text-center">Conta X</td>
							<td class="text-center">
				                <a href="#" onclick="criarModal(this)">
				                	<img src="img/icones/document_icon.png" />
				                </a>
				                <input type="hidden" value="teste">
				            </td>
							<td class="text-center">
								<a href="#">
									<img src="img/icones/pencil_icon.png" title="Editar" />
								</a>
							</td>
							<td class="text-center">
								<a href="#">
									<img src="img/icones/delete_icon.png" title="Deletar" />
								</a>
							</td>
						</tr>

						<tr>
							<th class="text-center" scope="row">X R$</th>
							<td class="text-center">C. Custo X</td>
							<td class="text-center">xx/xx/xx</td>	
							<td class="text-center">Conta X</td>
							<td class="text-center">
				                <a href="#" onclick="criarModal(this)">
				                	<img src="img/icones/document_icon.png" />
				                </a>
				                <input type="hidden" value="teste 2">
				            </td>
							<td class="text-center">
								<a href="#">
									<img src="img/icones/pencil_icon.png" title="Editar" />
								</a>
							</td>
							<td class="text-center">
								<a href="#">
									<img src="img/icones/delete_icon.png" title="Deletar" />
								</a>
							</td>
						</tr>

						<tr>
							<th class="text-center" scope="row">X R$</th>
							<td class="text-center">C. Custo X</td>
							<td class="text-center">xx/xx/xx</td>	
							<td class="text-center">Conta X</td>
							<td class="text-center">
				                <a href="#" onclick="criarModal(this)">
				                	<img src="img/icones/document_icon.png" />
				                </a>
				                <input type="hidden" value="teste 3">
				            </td>
							<td class="text-center">
								<a href="#">
									<img src="img/icones/pencil_icon.png" title="Editar" />
								</a>
							</td>
							<td class="text-center">
								<a href="#">
									<img src="img/icones/delete_icon.png" title="Deletar" />
								</a>
							</td>
						</tr>

					</tbody>

				</table>
			</div>

		</div>
	</div>

</div>