<?php
// Turn off all error reporting
error_reporting(0);

require_once('../config.php');

//Recuperar campos do formulario
$event = $_POST['event'];

//variáveis de resposta ajax
$db = "";
$db_message = "";
$update = "";
$update_message = "";
$remove = "";
$remove_message = "";
$validate = "";
$validate_message = "";

if ($event === "remove rec") {

  $id = $_POST['id'];

  // Create connection
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if (mysqli_connect_errno()) {
    $db = "failed";
    $db_message = "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
    $db = "success";

    $sql = "DELETE FROM forms WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
      $remove = "success";
      $remove_message = "Rec excluído!";
    } else {
      $remove = "failed";
      $remove_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}


//response ajax
echo json_encode(array(
  //----db
  "db" => $db,
  "db_message" => $db_message,
  //----update
  "update" => $update,
  "update_message" => $update_message,
  //----remove
  "remove" => $remove,
  "remove_message" => $remove_message,
  //----validate
  "validate" => $validate,
  "validate_message" => $validate_message
));
