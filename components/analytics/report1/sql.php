<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/recleads/config.php';

//Criar a conexão
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if (mysqli_connect_errno()) { // Se a conexão falhar...

  $db_message = json_encode(mysqli_connect_error());

  echo "<script>alertify.notify(decodeURIComponent($db_message), 'error', 10, function(){  console.log('dismissed'); });</script>";
} else {

  //Faz a consulta SQL
  $sql = "SELECT 
  a.id id_form,
  a.link,
  a.nome,
  a.email,
  a.telefone,
  a.tipo_passagem,
  a.origem,
  a.destino,
  a.adultos,
  a.criancas_1,
  a.criancas_2,
  a.tipo_viagem,
  a.data_ida,
  a.data_volta,
  a.bagagem,
  a.indicacao,
  a.flexibilidade_datas,
  a.created,
  a.modified
  FROM forms a 
  LEFT JOIN domains b on (a.link=b.domain)
  WHERE  a.origem != ' '
  AND a.link LIKE '%$domain%' ORDER BY a.created DESC";

  //Retorna os resultados
  $result = mysqli_query($conn, $sql);
}
