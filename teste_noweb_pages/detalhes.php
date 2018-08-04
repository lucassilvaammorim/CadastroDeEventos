<?php
	$id = $_GET['id'];
	echo $id;
	require("database.php");

	$con = conecta("db_noweb");
	$dados = seleciona_por_id($con,$id,"eventos");
	$linha = mysqli_fetch_assoc($dados);
	$total = mysqli_num_rows($dados);

	$mostrar_imagem = base64_encode( $linha['imagem'] );

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Detalhes</title>
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<nav class="navbar navbar-inverse navbar-fixed-top">
		 <div class="container-fluid">
		  <div class="navbar-header">
		   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		   </button>
		   <a class="navbar-brand" href="#">Sistema de eventos - Teste Noweb</a>
		  </div>
		  <div id="navbar" class="navbar-collapse collapse">
		   <ul class="nav navbar-nav navbar-right"></ul>
		  </div>
		 </div>
		</nav>
		<br>
		<div id="main" class="container-fluid">
 			<h3 class="page-header">Detalhes do Item #<?=$linha['id']?></h3>
 				<div class="row">
 					<div class="col-md-6">
						 <p><strong>Título</strong></p>
						 <p><?=$linha['titulo']?></p>
					</div>
					<div class="col-md-3">
						 <p><strong>Data e Horário</strong></p>
						 <p><?=$linha['data_horario']?></p>
					</div>
					<div class="col-md-3">
						 <p><strong>Status</strong></p>
						 <p><?=$linha['status']?></p>
					</div>  
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						 <p><strong>Descrição</strong></p>
						 <p><?=$linha['descricao']?></p>
					</div>
					<div class="col-md-6">
						 <p></p>
						 <p><img class="img-fluid img-thumbnail" alt="Responsive image" src="data:imagem/jpeg;base64,<?=$mostrar_imagem?>"></p>
					</div>
				</div>

		</div>
	</body>
</html>