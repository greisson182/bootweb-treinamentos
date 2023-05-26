<?php 

// faz a conexão com o banco de dados.
$conexao = new PDO('mysql:host=localhost;dbname=cafecomcristo', 'root', '');
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (count($_POST) > 0) {

  $idPessoa = $_POST['id'];
  
  $stmt = $conexao->prepare('DELETE FROM `cafecomcristo`.`pessoas` WHERE  `id`= :id;');
  $stmt->execute(['id' => $idPessoa]);

  $res = new stdClass;

  $res->status = 1;

  echo json_encode($res);
  exit;
}




?>