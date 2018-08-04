<?php
	require ('database.php');

	$id = $_POST['id'];
	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$status = $_POST['status'];
	$imagem = $_FILES['imagem']['tmp_name'];
	$tamanho = $_FILES['imagem']['size'];
	$tipo = $_FILES['imagem']['type'];
	$geral_imagem = $_FILES['imagem'];



	if($data != "none" && $hora != "none")
	{
		$data_hora = $data ." " .$hora;
	}

	if($data != "none" && $hora != "none")
	{
		$data_hora = $data ." " .$hora;
	}

	if($tamanho > 0)
	{
		$fo = fopen($imagem, "rb");
		$conteudo = fread($fo, $tamanho);
		$conteudo = addslashes($conteudo);
		fclose($fo);
	}

	$con =  conecta("db_noweb");
	$select = seleciona($con,"eventos");
	$novo_array = mysqli_fetch_assoc($select);

	if($titulo == "" || $descricao == "" || $status == "")
	{

		echo"<script language='javascript' type='text/javascript'>
		alert('Todos os campos devem ser preenchidos');
		window.location.href='user_page.php';
		</script>";
	    die();
	}
	else
	{
		if($tamanho > 0)
		{
	 		$queryUpdate = "UPDATE eventos SET titulo = '$titulo' , descricao = '$descricao', data_horario = '$data_hora', imagem = '$conteudo', nome_imagem = '$imagem', tamanho_imagem = '$tamanho', tipo_imagem = '$tipo', status = '$status' WHERE id= '$id'" ;
	 	}
	 	else
	 	{
	 		$queryUpdate = "UPDATE eventos SET titulo = '$titulo' , descricao = '$descricao', data_horario = '$data_hora', status = '$status' WHERE id='$id'" ;
	 	}


	    $insert = mysqli_query($con,$queryUpdate) or die("erro ao atualizar");
	    header("Location:user_page.php");
	   
    }





?>