<!--	
	Criado por Guilherme Mayer
	em 29/11/18 
-->

<!--	Modificado por João Pedro da Silva Fernandes -->
<?php
	if(isset($cc_resultados)){
?>
<div class="row mb-4">
	<div class="col-8 mx-auto">

	    <div class="table-responsive">
	     	<table class="table table-striped">

	        	<thead class="thead-dark">

		            <tr>
		              <th class="bg-warning border-top-0" colspan="6">Relatório</th>
		            </tr>

		            <tr>
		              <th class="text-center" scope="col">Centro de custos</th>
		              <th class="text-center" scope="col">Total</th>             
		            </tr>

	        	</thead>

	          	<tbody>

		            <?php

		            	$totalGeral = 0;

		                foreach ($cc_resultados as $cc) {
		     
		                  	$centroCustos = $cc->getCentroDeCustos()->getNome();
		                  	$total = $cc->getTotal();
		                  	$totalGeral += $total; 

		                    echo  
		                      '<tr>
		                        <th class="text-center" scope="row">'.$centroCustos.'</th>
		                        <td class="text-center">R$ '.number_format($total, 2, ',','.').'</td>
		                      </tr>';

		                }

		            ?>

	         	</tbody>

	        </table>

	        <button type="button" class="btn btn-warning float-right">
		  		Geral <span class="badge badge-light">R$ <?php echo number_format($totalGeral, 2, ',', '.'); ?></span>
			</button>

	    </div>
	</div>
</div>

<?php }else{ ?>

<div class="row mb-4">
	<div class="col-8 mx-auto">

	    <div class="table-responsive">
	     	<table class="table table-striped">

	        	<thead class="thead-dark">

		            <tr>
		              <th class="bg-danger border-top-0" colspan="3">Débito</th>
		            </tr>

		            <tr>
		              <th class="text-center" scope="col">Centro de custos</th>
		              <th class="text-center" scope="col">Total</th>             
		            </tr>

	        	</thead>

	          	<tbody>

		            <?php

		            	if(isset($cc_debitos)){

		            		$totalDebito = 0;

			                foreach ($cc_debitos as $cc_deb) {
			     
			                  	$centroCustos = $cc_deb->getCentroDeCustos()->getNome();
			                  	$total = $cc_deb->getTotal();
			                  	$totalDebito += $total;

			                    echo  
			                      '<tr>
			                        <th class="text-center" scope="row">'.$centroCustos.'</th>
			                        <td class="text-center">R$ '.number_format($total, 2, ',','.').'</td>
			                      </tr>';

			                }

		            	}else{
		            		echo
		            			'<tr>
		            				<td class="text-center" colspan="3">Nenhum registro encontrado</td>
		            			</tr>';
		            	}

		            ?>

	         	</tbody>

	        </table>

	        <button type="button" class="btn btn-danger float-right">
		  		Geral <span class="badge badge-light">R$ <?php echo number_format($totalDebito, 2, ',', '.'); ?></span>
			</button>

	    </div>
	</div>
</div>

<div class="row mb-4">
	<div class="col-8 mx-auto">

	    <div class="table-responsive">
	     	<table class="table table-striped">

	        	<thead class="thead-dark">

		            <tr>
		              <th class="bg-success border-top-0" colspan="3">Crédito</th>
		            </tr>

		            <tr>
		              <th class="text-center" scope="col">Centro de custos</th>
		              <th class="text-center" scope="col">Total</th>             
		            </tr>

	        	</thead>

	          	<tbody>

		            <?php

		            	if(isset($cc_creditos)){

		            		$totalCredito = 0;

			                foreach ($cc_creditos as $cc_cred) {
			     
			                  	$centroCustos = $cc_cred->getCentroDeCustos()->getNome();
			                  	$total = $cc_cred->getTotal();
			                  	$totalCredito += $total;

			                    echo  
			                      '<tr>
			                        <th class="text-center" scope="row">'.$centroCustos.'</th>
			                        <td class="text-center">R$ '.number_format($total, 2, ',','.').'</td>
			                      </tr>';

			                }

		            	}else{
		            		echo
		            			'<tr>
		            				<td class="text-center" colspan="3">Nenhum registro encontrado</td>
		            			</tr>';
		            	}

		            ?>

	         	</tbody>

	        </table>

	        <button type="button" class="btn btn-success float-right">
		  		Geral <span class="badge badge-light">R$ <?php echo number_format($totalCredito, 2, ',', '.'); ?></span>
			</button>

	    </div>
	</div>
</div>


<?php } ?>