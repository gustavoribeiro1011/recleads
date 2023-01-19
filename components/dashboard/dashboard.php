  <?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/recleads/config.php';

  //Faz a consulta SQL
  $level = $_SESSION['level_' . $app_token];
  $user_id = $_SESSION['userid_' . $app_token];
  include("style.php");
  include("header.php");
  include("table.php");

  ?>


