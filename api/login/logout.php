<?php

require('../../config.php');

$_SESSION['user_'.$app_token] = null;
$_SESSION['username_'.$app_token] = null;

header('Location: ../../login.php');

?>