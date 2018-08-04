<?php
	
	function conecta($db)
	{

		$host = "localhost";
	    $user = "root";
	    $pass = "";

	    // conecta ao banco de dados
	    $con = mysqli_connect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
	    // seleciona a base de dados em que vamos trabalhar
	    mysqli_select_db($con, $db);
	    return $con;
	}
	function seleciona_status_data_ordena($conn, $tb, $status, $data_hora, $ordena)
	{
		if($ordena != "")
		{
			if($data_hora != "" && $status != "")
			{
				$query = sprintf("SELECT * FROM $tb WHERE status = '$status' AND data_horario >= '$data_hora' ORDER BY $ordena DESC");
				$dados = mysqli_query($conn,$query) or die("erro na query");
				return $dados;
			}
			elseif ($status != "") 
			{
				$query = sprintf("SELECT * FROM $tb WHERE status = '$status' ORDER BY $ordena DESC");
				$dados = mysqli_query($conn,$query) or die("erro na query");
				return $dados;
			}
		}

		
	}
	function seleciona_por_id($conn, $id, $tb)
	{

		// cria a instrução SQL que vai selecionar os dados
	    $query = sprintf("SELECT * FROM $tb WHERE id = '$id'");
	    // executa a query
	    $dados = mysqli_query($conn,$query) or die("erro na query");
	    return $dados;
	}
	
	function seleciona($conn,$tb)
	{
		$query = sprintf("SELECT * FROM $tb");
		//executa a query
		$dados = mysqli_query($conn,$query) or die("erro na query");
		return $dados;

	}
	function seleciona_ordena($conn,$tb, $ordena)
	{
		$query = sprintf("SELECT * FROM $tb ORDER BY $ordena DESC");
		//executa a query
		$dados = mysqli_query($conn,$query) or die("erro na query");
		return $dados;
	}
?>