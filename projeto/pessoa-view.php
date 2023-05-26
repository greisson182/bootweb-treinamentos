<?php
  include('header.php');

  $idPessoa = $_GET['id'];
  
  $stmt = $conexao->prepare("SELECT * FROM pessoas AS p WHERE p.id = :id");
  $stmt->execute(['id' => $idPessoa]);
  
  $pessoa = $stmt->fetch(PDO::FETCH_OBJ);
  pr($pessoa);

?>

    <form action="" method="post">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $pessoa->nome?>" disabled>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $pessoa->email?>" disabled>
      </div>
      <div class="mb-3">
        <label for="idade" class="form-label">Idade</label>
        <input type="text" class="form-control" id="idade" name="idade" value="<?php echo $pessoa->idade?>" disabled>
      </div>
    </form>

<?php
  include('footer.php');
?>