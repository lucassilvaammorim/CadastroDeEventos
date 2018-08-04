<?php

  require ("database.php");

  $login = $_POST['login'];
  $entrar = $_POST['confirmar'];
  $senha = $_POST['senha'];


    $con = conecta("db_noweb"); 
    $select = seleciona($con, "users");
    $logarray = mysqli_fetch_assoc($select);

    if($login == "" || $login == null)
    {
    	 echo"<script language='javascript' type='text/javascript'>
    	 alert('O campo login deve ser preenchido');
    	 window.location.href='cadastro.html';
    	 </script>";
       die();
    }
    else
    {
    	if($logarray == $login)
    	{
    		 echo"<script language='javascript' type='text/javascript'>
    		 alert('Esse login já existe');
    		 window.location.href='cadastro.html';
    		 </script>";
    		 die();
    	}
    	else
    	{
    		$queryInsert = "INSERT INTO users (usuario,senha) VALUES ('$login','$senha')";
      	$insert = mysqli_query($con,$queryInsert);

      	if($insert)
      	{
            echo
            "<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso!');
            window.location.href='new_user.html';
            </script>";
            header ("Location:user_page.php");
       	}
          else
       	{
           	echo"<script language='javascript' type='text/javascript'>
           	alert('Não foi possível cadastrar esse usuário');
           	window.location.href='cadastro.html';
           	</script>";
           	die();
    	 	}
      }
    }