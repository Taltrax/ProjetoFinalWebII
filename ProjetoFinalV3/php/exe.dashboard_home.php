<!--  Criado por João Pedro da Silva Fernandes em 15/10/18 -->

<?php require_once('index.dashboard_home.php'); ?>

<div class="container-fluid">

  <div class="row mb-4">
    <div class="col-8 mx-auto">
      
      <?php

        if($contas){

          foreach ($contas as $conta) {
            
            echo '
              <button type="button" class="btn btn-info">
                <img class="mr-2 mb-1" src="img/icones/wallet_icon.png"/>'.$conta->getNome().' <span class="badge badge-light ml-2">R$ '.$conta->getSaldo().'</span>
              </button>';
          }

        }


      ?>
      
    
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-8 mx-auto">

      <div class="table-responsive">
        <table class="table table-striped">

          <thead class="thead-dark">

            <tr>
              <th class="bg-warning border-top-0" colspan="5">Próximos débitos</th>
            </tr>

            <tr>
              <th class="text-center" scope="col">Valor</th>
              <th class="text-center" scope="col">C. Custo</th>
              <th class="text-center" scope="col">Data</th>
              <th class="text-center" scope="col">Conta</th>
              <th class="text-center" scope="col">Descrição</th>              
            </tr>

          </thead>

          <tbody>
            
            <?php

                if($debitos){

                  foreach ($debitos as $debito) {
                  
                    echo  
                      '<tr>
                        <th class="text-center" scope="row">R$ '.$debito->getValor().'</th>
                        <td class="text-center">'.$debito->getCentroCustos()->getNome().'</td>
                        <td class="text-center">'.$debito->getData().'</td> 
                        <td class="text-center">'.$debito->getConta()->getNome().'</td>
                        <td class="text-center">

                            <a href="#" onclick="criarModal(this)">
                              <img src="img/icones/document_icon.png" />
                            </a>
                            <input type="hidden" value="'.$debito->getDescricao().'">

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

  <div class="row mb-4">
    <div class="col-8 mx-auto">

      <div class="table-responsive">
        <table class="table table-striped">

          <thead class="thead-dark">

            <tr>
              <th class="bg-success border-top-0" colspan="6">Últimas movimentações</th>
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

              if($movs){

                  foreach ($movs as $movimentacao) {
                  
                    $img = 'img/icones/'.$movimentacao->getTipoMov().'.png';

                    echo  
                      '<tr>
                        <td class="text-center" scope="row">
                          <img width="20" height="20" src='.$img.' />
                        </td>
                        <td class="text-center" scope="row">R$ '.$movimentacao->getValor().'</td>
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

</div>