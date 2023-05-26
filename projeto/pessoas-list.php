<?php
  include('header.php');
  
  $stmt = $conexao->prepare('SELECT * FROM pessoas AS p');
  $stmt->execute();

  $pessoas = $stmt->fetchAll(PDO::FETCH_OBJ);


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
      <a href="pessoa-add.php" class="btn btn-primary me-md-2">Adicionar</a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Idade</th>
          <th scope="col" class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
      <?php // o trêm completo as vagão por vagão

      if (count($pessoas) > 0) {
        foreach ($pessoas as $pessoa) {
      ?>
          <tr data-id="<?=$pessoa->id?>">
            <th scope="row"><?=$pessoa->id?></th>
            <td><?php echo $pessoa->nome?></td>
            <td><?=$pessoa->email?></td>
            <td><?=$pessoa->idade?></td>
            <td class="text-center">
              <a href="pessoa-view.php?id=<?=$pessoa->id?>" class="btn btn-outline-primary vizualizar">Vizualizar</a>
              <a href="pessoa-edit.php?id=<?=$pessoa->id?>" hre class="btn btn-outline-info editar">Editar</a>
              <button type="button" class="btn btn-outline-danger excluir">Excluir</button>
            </td>
          </tr>

       <?php 
        }
      } else {
       ?> 
          <tr class="text-center">
            <th colspan="4">Nenhum registro encontrado.</th>
          </tr>
      <?php 
        }
       ?> 
      </tbody>
    </table>

<?php 
  include('footer.php');
?>