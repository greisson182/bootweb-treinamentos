<?php 

// faz a conexão com o banco de dados.
$conexao = new PDO('mysql:host=localhost;dbname=cafecomcristo', 'root', '');
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function pr($dado){
  echo '<pre>';
  print_r($dado);
  echo '</pre>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aula de Bootstrap</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery.js"></script>
  <script>
    $(function(){

      $('.excluir').click(function(){

        var parent = $(this).parents('tr');

        var idPessoa = parent.attr('data-id');
        if (confirm("Tem certeza que deseja excluir?")) {

          $.post('pessoa-delete.php',{
            id: idPessoa
          },function(data){
            if (data.status == 1) {
              parent.fadeOut(function(){
                $(this).remove();
              });
            }
          },'json');
          
        }
        //$('body').find('.excluir').remove();
      });

    });

  </script>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Café com Cristo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pessoas-list.php">Pessoas</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" name="q" aria-label="Buscar">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>