<?php
	require ("database.php");
	$id = $_GET['id'];

	$con = conecta("db_noweb");
    
    $dados = seleciona_por_id($con,$id,"eventos");
    
    // transforma os dados em um array
    $linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);

    //Trata dados
    $data = substr($linha['data_horario'], 0,10);
    $hora = substr($linha['data_horario'], 11);

    $publicado = False;

    if($linha['status'] == 'Publicado')
    {
    	$publicado = True;
    }
    elseif($linha['status'] == 'Rascunho')
    {
    	$publicado = False;
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Página de cadastro</title>
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
		       <a class="navbar-brand" href="#">Sistema de eventos - Teste noweb</a>
		     </div>
		     <div id="navbar" class="navbar-collapse collapse"></div>
	        </div>
	    </nav>
	    <br>

	    <div id="main" class="container-fluid">
	    	<h3 class="page-header">Editar evento</h3>
				<form enctype="multipart/form-data" method="post" action="editar.php"> 
					<div class="row">
	 					<div class="form-group col-md-10">
	   						<label for="titulo">Título</label> 
							<input class="form-control" type="text" name="titulo" id="titulo" value="<?=$linha['titulo']?>">
						</div>

					</div>		
					
					<div class="row">
						<div class="form-group col-md-10">
							<label for="form-group">Descrição</label>
							<textarea class="form-control" rows = 10 cols = 100 name="descricao" id="descricao" /><?=$linha['descricao']?></textarea>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-4">
							<label for="imagem">Selecionar nova imagem</label>
							<input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
							<input type="hidden" name="id" value = '<?=$id?>'>
			      			<div><input name="imagem" type="file" id="imagem"/></div>
			      		</div>

			      		<div class="form-group col-md-2">
							<label for="data">Data</label>
							<input class="form-control" type="date" name="data" id="data" value="<?=$data?>"/>
						</div>

						<div class="form-group col-md-2">
							<label for="hora">Hora</label>
							<input class="form-control" type="time" name="hora" id = "hora" value="<?=$hora?>"/>
						</div>

						<div class="form-group col-md-2">
							<label for="status">Status</label>
							<select class="form-control" id = "status" name = "status" type="text">
							<?php
								if($publicado)
								{
							?>
									<option>Rascunho</option>
									<option selected>Publicado</option>
							<?php 
								}
								else
								{
							?>
									<option selected>Rascunho</option>
									<option>Publicado</option>
							<?php
								}
							?>
							</select>
						</div>
			
						<hr />
						<div id="actions" class="row">
		    				<div class="col-md-12">
								<input class="btn btn-primary" type="submit" name="concluir" id="concluir" value = "concluir"/>
								<input class="btn btn-default" type="button" name="cancelar" id="cancelar" value = "cancelar" onclick= window.location.href='user_page.php'> 
							</div>
						</div> 		
					</form>
		</div>
	</body>
</html>