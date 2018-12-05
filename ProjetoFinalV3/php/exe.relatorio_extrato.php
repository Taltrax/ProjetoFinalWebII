<!--	Criado por João Pedro da Silva Fernandes em 29/11/18 -->

<?php require_once('index.relatorio_extrato.php'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Relatório</li>
    <li class="breadcrumb-item active" aria-current="page">Extrato</li>
  </ol>
</nav>

<div class="container-fluid">

	<div class="row mb-2">
		<div class="col-8 mx-auto">
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#f_form_filtro" data-whatever="@mdo">Filtros</button>
		</div>
	</div>

	<div class="modal fade" id="f_form_filtro" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div class="modal-header">
					<h5 class="modal-title">Filtros</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="index.php?secao=relatorio&modulo=extrato" name="formulario">

						<div class="form-group">
							
							<label for="f_mes" class="col-form-label">Mês</label>
							<select name="f_mes" id="f_mes" class="form-control">
								
								<option value="">Todos</option>
								<option value="1" <?php if($mes_filtro == 1){?> selected="selected" <?php }?>>Janeiro</option>
								<option value="2" <?php if($mes_filtro == 2){?> selected="selected" <?php }?>>Fevereiro</option>
								<option value="3" <?php if($mes_filtro == 3){?> selected="selected" <?php }?>>Março</option>
								<option value="4" <?php if($mes_filtro == 4){?> selected="selected" <?php }?>>Abril</option>
								<option value="5" <?php if($mes_filtro == 5){?> selected="selected" <?php }?>>Maio</option>
								<option value="6" <?php if($mes_filtro == 6){?> selected="selected" <?php }?>>Junho</option>
								<option value="7" <?php if($mes_filtro == 7){?> selected="selected" <?php }?>>Julho</option>
								<option value="8" <?php if($mes_filtro == 8){?> selected="selected" <?php }?>>Agosto</option>
								<option value="9" <?php if($mes_filtro == 9){?> selected="selected" <?php }?>>Setembro</option>
								<option value="10" <?php if($mes_filtro == 10){?> selected="selected" <?php }?>>Outubro</option>
								<option value="11" <?php if($mes_filtro == 11){?> selected="selected" <?php }?>>Novembro</option>
								<option value="12" <?php if($mes_filtro == 12){?> selected="selected" <?php }?>>Dezembro</option>
							
							</select>

							<label for="f_ano" class="col-form-label">Ano</label>
							<input type="number" class="form-control" name="f_ano" id="f_ano" value="<?php echo $ano_filtro?>">

							<label for="f_conta">Conta</label>
							<select name="f_conta" id="f_conta" class="form-control">
								
								<option selected="selected"></option>
								
								<?php

									foreach ($contas as $conta) {

										if($conta_filtro == $conta->getId()){
											echo '<option value='.$conta->getId().' selected="selected">'.$conta->getNome().'</option>';
										}else{
											echo '<option value='.$conta->getId().'>'.$conta->getNome().'</option>';
										}

									}

								?>

							</select>
							
						</div>

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
	              <th class="bg-warning border-top-0" colspan="6">Extrato</th>
	            </tr>

	            <tr>
	              <th class="text-center" scope="col"></th>
	              <th class="text-center" scope="col">Valor</th>
	              <th class="text-center" scope="col">C. Custo</th>
	              <th class="text-center" scope="col">Data</th>
	              <th class="text-center" scope="col">Conta</th>
	              <th class="text-center" scope="col">Descrição</th>              
	            </tr>

	          </thead>

	          <tbody>

	            <?php

	            	$movs = $extrato->getMovimentacoes();

	              	if($movs){

	                  foreach ($movs as $movimentacao) {
	                  
	                    $img = 'img/icones/'.$movimentacao->getTipoMov().'.png';

	                    echo  
	                      '<tr>
	                        <td class="text-center">
	                          <img width="20" height="20" src='.$img.' />
	                        </td>
	                        <th class="text-center" scope="row">R$ '.number_format($movimentacao->getValor(), 2, ',', '.').'</th>
	                        <td class="text-center">'.$movimentacao->getCentroCustos()->getNome().'</td>
	                        <td class="text-center">'.$movimentacao->getData().'</td> 
	                        <td class="text-center">'.$movimentacao->getConta()->getNome().'</td>
	                        <td class="text-center">
	                          
	                          <a href="#" onclick="criarModal(this)">
	                            <img src="img/icones/document_icon.png" />
	                          </a>
	                          
	                          <input type="hidden" value="'.$movimentacao->getDescricao().'">
	                        </td>
	                      </tr>';

	                  }

	                }else{

	                  echo 
	                    '<tr>
	                      <td class="text-center" colspan=6>Nenhum registro encontrado</td>
	                    </tr>';

	                }

	            ?>

	          </tbody>

	        </table>
	      </div>

	    </div>
  	</div>

  	<div class="row">
  		<div class="col-8 mx-auto mb-5">
		  	<button type="button" class="btn btn-warning float-right">
		  		Saldo <span class="badge badge-light">R$ <?php echo number_format($extrato->getSaldo(), 2, ',', '.'); ?></span>
			</button>
		</div>
	</div>

</div>
