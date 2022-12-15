<?php require('config.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
include("functions.php");
include('inc/head.php');
?>

<body class="pt-4" style="margin-bottom: 32px;">


	<section class="container-fluid" id="section-navbar">
		<?php include("components/navbar/navbar.php"); ?>
	</section>

	<div class="container-fluid mt-5" id="main">
			<?php include $_SERVER['DOCUMENT_ROOT'] . BASEURL . 'components/dashboard/dashboard.php'; ?>
	</div>


</body>

</html>