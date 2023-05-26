<?php
  include('header.php');

  $res = new stdClass;

  $res->status = 0;

  $idPessoa = $_GET['id'];
  
  if (count($_POST) > 0) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $stmt = $conexao->prepare("UPDATE `pessoas` SET `nome`= :nome, `email`= :email, `idade`= :idade WHERE  `id`= :id ;");
    $stmt->execute(['nome' => $nome, 'email' => $email, 'idade' => $idade, 'id' => $idPessoa]);

    $res->status = 1;
  }

  $stmt = $conexao->prepare("SELECT * FROM pessoas AS p WHERE p.id = :id");
  $stmt->execute(['id' => $idPessoa]);
  
  $pessoa = $stmt->fetch(PDO::FETCH_OBJ);


?>

<?php 
  if ($res->status == 1) {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    Salvo com sucesso.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php 
  }
?>

    <form action="" method="post">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $pessoa->nome?>">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $pessoa->email?>">
      </div>
      <div class="mb-3">
        <label for="idade" class="form-label">Idade</label>
        <input type="text" class="form-control" id="idade" name="idade" value="<?php echo $pessoa->idade?>">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-primary mb-3">Salvar</button>
      </div>
    </form>

<?php
  include('footer.php');
?>