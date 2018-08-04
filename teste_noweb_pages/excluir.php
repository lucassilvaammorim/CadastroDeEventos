<?php
  require ("database.php");
  $id = $_GET['id'];

  $con = conecta("db_noweb");
  //comando para excluir
  $queryExcluir = ("DELETE FROM eventos WHERE id='$id'");
  $flag_excluir = mysqli_query($con,$queryExcluir) or die(mysql_error());


   if(!$flag_excluir)
   {
   	echo"<script language='javascript' type='text/javascript'>
	 	alert('Falha ao excluir dados');
	 	window.location.href='cadastro.html';
	 	</script>";
   }
   else
   {
   	echo"<script language='javascript' type='text/javascript'>
	 	alert('Excluído com sucesso');
	 	window.location.href='cadastro.html';
	 	</script>";
	 	header("Location:user_page.php");
   }

?>