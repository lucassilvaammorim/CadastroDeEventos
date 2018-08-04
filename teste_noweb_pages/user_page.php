<?php
  require("database.php");

  $login_cookie = $_COOKIE['login'];

  if(isset($login_cookie))
  {
    echo"Bem-Vindo, $login_cookie <br>";

    $con = conecta("db_noweb");
    $dados = seleciona_ordena($con,"eventos","data_horario");
    // transforma os dados em um array
    $linha = mysqli_fetch_assoc($dados);
    // calcula quantos dados retornaram
    $total = mysqli_num_rows($dados);
    
  }
 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Página do cliente</title>
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
       <a class="navbar-brand">Sistema de eventos - Teste Noweb | Bem vindo <?=$login_cookie?></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
       <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Sair</a></li>
        <li><a href="new_user.html">Cadastrar novo usuário</a></li>
        <li><a href="cadastro.html">Cadastrar novo evento</a></li>
       </ul>
      </div>
     </div>
    </nav>
    <br>
      
    <div id="main" class="container-fluid">
    <h3 class="page-header">Lista de eventos</h3>

      <table class="table table-striped" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Título</th>
            <th>Data e horário</th>
            <th>Status</th>
            <th colspan="3">Ações</th> 
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
                <th><?=$linha['status']?></th>
            
                <th><a class="btn btn-success btn-xs" href="detalhes.php?id=<?=$linha['id']?>" target="_blanck">Detalhes</a></th>
                <th><a class="btn btn-warning btn-xs" href="editar_page.php?id=<?=$linha['id']?>">Editar</a></th>
                <th><a class="btn btn-danger btn-xs"  href="excluir.php?id=<?=$linha['id']?>" data-target="#delete-modal" data-toggle="modal">Excluir</a></th>
            </tr>
          </tbody>

          
          <?php
              }while($linha = mysqli_fetch_assoc($dados));
              // fim do if 
            }
          ?>
      </table>
    </div>
  </body>
</html>
