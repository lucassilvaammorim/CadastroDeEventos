<?php 

  require ("database.php");

  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = $_POST['senha'];
  
  $con = conecta("db_noweb");
  $verifica = seleciona($con,"users");
  
  $login_pass = mysqli_fetch_assoc($verifica);

  if ($login_pass['usuario'] != $login || $login_pass['senha'] != $senha)
  {
  	echo"<script language='javascript' type='text/javascript'>
  	alert('Login e/ou senha incorretos');
  	window.location.href='login.html';
  	</script>";
  	die();
  }
  else
  {
   	setcookie("login",$login);
   	header("Location:user_page.php");
  }
    
?>
