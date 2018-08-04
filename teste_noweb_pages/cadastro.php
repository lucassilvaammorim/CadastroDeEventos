<?php

	require ("database.php");

	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$status = $_POST['status'];
	$imagem = $_FILES['imagem']['tmp_name'];
	$tamanho = $_FILES['imagem']['size'];
	$tipo = $_FILES['imagem']['type'];
	$geral_imagem = $_FILES['imagem'];

	print_r($geral_imagem);

	
	//trata dados
	if($data != "none" && $hora != "none")
	{
		$data_hora = $data ." " .$hora;
	}

	if($imagem != "none")
	{
		$fo = fopen($imagem, "rb");
		$conteudo = fread($fo, $tamanho);
		$conteudo = addslashes($conteudo);
		fclose($fo);
	}

	$con =  conecta("db_noweb");
	$select = seleciona($con,"eventos");
	$novo_array = mysqli_fetch_assoc($select);

	if($titulo == "none" || $descricao == "none" || $status == "none" || $imagem == "none")
	{

		echo"<script language='javascript' type='text/javascript'>
		alert('Todos os campos devem ser preenchidos');
		window.location.href='cadastro.html';
		</script>";
	    die();
	}
	elseif ($data_hora == $novo_array['data_horario'] && $data_hora != "none") 
	{
	    echo"<script language='javascript' type='text/javascript'>
	    alert('Existe outro evento cadastrado nesse horário');
	   	window.location.href='cadastro.html';
	    </script>";
	    die();
	}
	else
	{
	 	$queryInsert = "INSERT INTO eventos (titulo, descricao, data_horario, imagem, nome_imagem, tamanho_imagem, tipo_imagem,status) VALUES ('$titulo', '$descricao', '$data_hora', '$conteudo' , '$imagem', '$tamanho', '$tipo', '$status')";
	    $insert = mysqli_query($con,$queryInsert) or die("erro ao inserir");
	    header("Location:user_page.php");
	   
    }
    
 
	    
	


?>