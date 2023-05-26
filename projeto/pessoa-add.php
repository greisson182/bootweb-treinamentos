<?php
  include('header.php');

  // existe post ou get

  pr($_GET);

  if (count($_GET) > 0) {

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $idade = $_GET['idade'];

    $stmt = $conexao->prepare("INSERT INTO `pessoas` (`nome`, `email`, `idade`) VALUES ('". $nome ."', '". $email ."', '". $idade ."');");
    $stmt->execute();
  }

?>

    <form action="" method="get">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu nome">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Informe seu e-mail">
      </div>
      <div class="mb-3">
        <label for="idade" class="form-label">Idade</label>
        <input type="text" class="form-control" id="idade" name="idade" placeholder="Informe sua idade">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-primary mb-3">Salvar</button>
      </div>
    </form>
    
<?php
  include('footer.php');
?>