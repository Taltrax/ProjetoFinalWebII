<!--	Criado por João Pedro da Silva Fernandes em 15/10/18 -->

<?php

	if(isset($_GET['secao']) && !empty($_GET['secao'])
	   && isset($_GET['modulo']) && !empty($_GET['modulo'])){

		$secao = $_GET['secao'];
		$modulo = $_GET['modulo'];
	
	}else{

		$secao = 'dashboard';
		$modulo = 'home';
	}

	$pg = $secao.'_'.$modulo;

?>

<!DOCTYPE html>

<html>

	<head>

		<title><?php echo strtoupper($secao).' | '. strtoupper($modulo) ?></title>

		<meta http-equiv="Content-type" content="text/html" charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" /> 

	</head>

	<body>

		<?php
			require_once('php/exe.menu.php');
			require_once('php/exe.'.$pg.'.php');
		?>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/modal.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	</body>

</html>