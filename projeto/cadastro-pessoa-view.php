<?php
  include('header.php');
?>

    <form action="" method="post">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu nome" disabled>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Informe seu e-mail" disabled>
      </div>
    </form>

<?php
  include('footer.php');
?>