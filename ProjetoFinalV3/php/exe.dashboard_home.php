<!--  Criado por João Pedro da Silva Fernandes em 15/10/18 -->

<div class="container-fluid">

  <div class="row mb-4">
    <div class="col-8 mx-auto">
      
      <button type="button" class="btn btn-info">
        <img class="mr-2 mb-1" src="img/icones/wallet_icon.png"/>Saldo <span class="badge badge-light ml-2">R$</span>
      </button>
    
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
              <th class="text-center" scope="col">Descricao</th>              
            </tr>

          </thead>

          <tbody>

            <tr class="table-danger">
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
            </tr>

            <tr class="table-warning">
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
            </tr>

            <tr class="table-success">
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
            </tr>

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
              <th class="bg-success border-top-0" colspan="5">Últimas movimentações</th>
            </tr>

            <tr>
              <th class="text-center" scope="col">Valor</th>
              <th class="text-center" scope="col">C. Custo</th>
              <th class="text-center" scope="col">Data</th>
              <th class="text-center" scope="col">Conta</th>
              <th class="text-center" scope="col">Descricao</th>              
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
            </tr>

          </tbody>

        </table>
      </div>

    </div>
  </div>

</div>