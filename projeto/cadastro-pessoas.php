<?php
  include('header.php');

  $conn = new PDO('mysql:host=localhost;dbname=cafecomcristo', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare('SELECT * FROM pessoas as p');
  $stmt->execute();

  $pessoas = $stmt->fetchAll(PDO::FETCH_OBJ);

  echo '<pre>';
  print_r($pessoas);
  echo '</pre>';

  /*$listaPessoas = [];

  $listaPessoas[] = ["id" => 1 ,"nome" => "Ricardo", "email" => "ricardo@gmail.com"];
  $listaPessoas[] = ["id" => 2 ,"nome" => "Chiang", "email" => "chiang@gmail.com"];
  $listaPessoas[] = ["id" => 3 ,"nome" => "Neila", "email" => "neila@gmail.com"];
  $listaPessoas[] = ["id" => 4 ,"nome" => "Keila", "email" => "keila@gmail.com"];
  $listaPessoas[] = ["id" => 5 ,"nome" => "Gisele", "email" => "gisele@gmail.com"];
*/
  echo '<pre>';
  //print_r($listaPessoas);
  echo '</pre>';

?>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a href="cadastro-pessoa-add.php" class="btn btn-primary me-md-2">Adicionar</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        foreach ($pessoas as $pessoa) {
      ?>
          <tr>
            <th scope="row"><?=$pessoa->id?></th>
            <td><?php echo $pessoa->nome?></td>
            <td><?=$pessoa->email?></td>
            <td>
              <a href="cadastro-pessoa-view.php" class="btn btn-outline-primary vizualizar">Vizualizar</a>
              <a href="cadastro-pessoa-edit.php" hre class="btn btn-outline-info editar">Editar</a>
              <button type="button" class="btn btn-outline-danger excluir">Excluir</button>
            </td>
          </tr>

       <?php 
        }
       ?> 
      </tbody>
    </table>

<?php 
  include('footer.php');
?>