<?php
include('header.php');

$res = new stdClass;

$res->status = 0;

if (count($_POST) > 0) {

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $idade = $_POST['idade'];

  $stmt = $conexao->prepare("INSERT INTO `pessoas` (`nome`, `email`, `idade`) VALUES (:nome, :email, :idade);");
  $stmt->execute(['nome' => $nome, 'email' => $email, 'idade' => $idade]);

  $res->status = 1;
}

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