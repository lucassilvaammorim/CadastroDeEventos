<?php
	require ("database.php");

	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d H:i');


	$con = conecta("db_noweb");
	$dados = seleciona_status_data_ordena($con,"eventos","Publicado", $date, "data_horario");
	$linha = mysqli_fetch_assoc($dados);
	// calcula quantos dados retornaram
	$total = mysqli_num_rows($dados);
?>

<html>
	<head>
		<title>Principal</title>
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
		   <a class="navbar-brand" href="#">Sistema de eventos - Teste Noweb | Home Page</a>
		  </div>
		  <div id="navbar" class="navbar-collapse collapse">
		   <ul class="nav navbar-nav navbar-right">
		    <li><a href="login.html">Perfil</a></li>
		   </ul>
		  </div>
		 </div>
		</nav>
		<br>
		<br>

		<div id="main" class="container-fluid">
		 <h3 class="page-header">Lista de eventos</h3>
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Título</th>
						<th>Data e horário</th> 
						<th>Ações</th>
					</tr>
				</thead>

				<?php
					// se o número de resultados for maior que zero, mostra os dados
					if($total > 0) 
					{
					// inicia o loop que vai mostrar todos os dados
						do {
				?>
				<tbody>
					<tr>
						<th><?=$linha['id']?></th>
						<th><?=$linha['titulo']?></th>
						<th><?=$linha['data_horario']?></th>
						<th><a class="btn btn-success btn-xs" href="detalhes.php?id=<?=$linha['id']?>" target="_blanck">Detalhes</a></th>

					
				<?php
								//mostra imagem
								//echo '<img src="data:imagem/jpeg;base64,'.base64_encode( $linha['imagem'] ).'"/>';
					// finaliza o loop que vai mostrar os dados
							}while($linha = mysqli_fetch_assoc($dados));
					// fim do if 
					}

				?>
						
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>
