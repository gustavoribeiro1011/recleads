<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/recleads/config.php';

//Criar a conexão
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if (mysqli_connect_errno()) { // Se a conexão falhar...

  $db_message = json_encode(mysqli_connect_error());

  echo "<script>alertify.notify(decodeURIComponent($db_message), 'error', 10, function(){  console.log('dismissed'); });</script>";
} else {
  $dt_in = date("Y-m-d") . " 00:00:00";
  $dt_fn = date("Y-m-d") . " 23:59:59";

  //Faz a consulta SQL
  $sqlCounter = "SELECT DISTINCT count(id) total  FROM forms  
  WHERE  origem != ' '
  AND created BETWEEN '$dt_in' AND '$dt_fn'";

  //Retorna os resultados
  $resultCounter = mysqli_query($conn, $sqlCounter);
}


?>
