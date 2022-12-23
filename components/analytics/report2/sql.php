<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/recleads/config.php';

//Criar a conexão
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if (mysqli_connect_errno()) { // Se a conexão falhar...

  $db_message = json_encode(mysqli_connect_error());

  echo "<script>alertify.notify(decodeURIComponent($db_message), 'error', 10, function(){  console.log('dismissed'); });</script>";
} else {

  //Faz a consulta SQL
  $sql = "SELECT count(id) total FROM forms";
  //Retorna os resultados
  $result = mysqli_query($conn, $sql);
}