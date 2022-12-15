<?php;?><!DOCTYPE html>
<html lang="pt-br">
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/ico.ico" />
	<title>WEF Admin</title>
	<?php include 'css/global.php'; ?>
	<link rel="stylesheet" href="css/login.css">

	<!-- Fonts-->		
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;700&family=Special+Elite&display=swap" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

	<div class="container-fluid" align="center">		

		<main class="form-signin">
			<form class="mb-3 mt-5 ">

				<div class="mb-3" align="center">
					<h3 class="delivery">Rec Leads 1.0</h3>					
				</div> 
				<div class="form-floating mb-2">					
					<input type="email" class="form-control" id="inputEmail" aria-describedby="email" placeholder="E-mail">	
					<label for="floatingInput">E-mail</label>				
				</div>
				<div class="form-floating mb-2">				
					<input type="password" class="form-control" id="inputPassword" placeholder="Senha">
					<label for="floatingInput">Senha</label>
				</div>
				<div class="d-grid gap-" align="center">
					<button type="submit" class="btn btn-block btn-outline-primary">Entrar</button>
				</div>
			</form>

			<div class="text-center" align="center">
				<div id="messagesLogin"></div>
			</div>
		</main>


	</div>


	<?php include('api/login/login.php');?>
	

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>