<!--	Criado por João Pedro da Silva Fernandes em 15/10/18 -->

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-5 bg-white rounded">

	<a class="navbar-brand" href="index.php"><img src="img/icones/menu_icon.png" title="Home" /></a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">

			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Cadastros
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?secao=manter&modulo=conta">Conta</a>
					<a class="dropdown-item" href="index.php?secao=manter&modulo=centroDeCusto">Centro de custos</a>
					<a class="dropdown-item" href="index.php?secao=manter&modulo=item">Item</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Movimentação
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?secao=movimentacao&modulo=credito">Crédito</a>
					<a class="dropdown-item" href="index.php?secao=movimentacao&modulo=debito">Débito</a>
					<a class="dropdown-item" href="index.php?secao=movimentacao&modulo=recorrente">Recorrentes</a>
					<a class="dropdown-item" href="index.php?secao=movimentacao&modulo=parcela">Parcelas</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Relatórios
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?secao=movimentacao&modulo=credito">Item x</a>
					<a class="dropdown-item" href="index.php?secao=movimentacao&modulo=debito">Item x</a>
					<a class="dropdown-item" href="index.php?secao=movimentacao&modulo=recorrente">Item x</a>
					<a class="dropdown-item" href="index.php?secao=movimentacao&modulo=parcela">Item x</a>
				</div>
			</li>

		</ul>
	</div>

</nav>
