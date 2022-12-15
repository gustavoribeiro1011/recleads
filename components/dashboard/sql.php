<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/recleads/config.php';

//Criar a conexão
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if (mysqli_connect_errno()) { // Se a conexão falhar...

    $db_message = json_encode(mysqli_connect_error());

    echo "<script>alertify.notify(decodeURIComponent($db_message), 'error', 10, function(){  console.log('dismissed'); });</script>";
} else {

    //Faz a consulta SQL
    $level = $_SESSION['level_' . $app_token];
    $user_id = $_SESSION['userid_' . $app_token];

    if ($level == "admin") {
        //lista geral
        $sql = "SELECT * FROM domains ORDER BY 1 ASC";
    } else {
        $sql = "SELECT * FROM domains WHERE user = $user_id  ORDER BY 1 ASC";
    }


    //Definir range data atual (hoje)
    $date_start = date("Y-m-d 00:00:00");
    $date_end =  date("Y-m-d 23:59:59");
    $date_today = "created BETWEEN '$date_start' AND '$date_end'";

    //Retorna os resultados
    $result = mysqli_query($conn, $sql);
}
