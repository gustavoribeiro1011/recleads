<?php 
// Turn off all error reporting
error_reporting(0);

//Verificar se o login existe

require('../../config.php');

//Recuperar campos do formulario
$user = $_POST['user'];
$password = $_POST['password'];

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (!$conn) {	
	echo json_encode(array( 
		"banco_de_dados" => "falha"		
	)); 
} else {
	$sql = "select * from users where user='$user'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		$row = $result->fetch_assoc();

		if ( $row["password"] == $password ){

			session_start();
			$_SESSION['userid_'.$app_token] = $row["id"];
			$_SESSION['user_'.$app_token] = $row["user"];
			$_SESSION['username_'.$app_token] = ucfirst($row["username"]);			
			$_SESSION['level_'.$app_token] = $row["level"];	

			echo json_encode(array( 
				"login" => "sucesso",
				"BASEURL" => BASEURL						
			)); 

		} else {

			echo json_encode(array( 
				"login" => "falha",
				"message" => "Senha incorreta"					
			)); 

		}		

	} else {

		echo json_encode(array( 
			"login" => "falha",
			"message" => "E-mail não existe"		
		)); 
	}
}



