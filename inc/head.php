	<?php if (!isset($_SESSION['user_' . $app_token])) {
		$url_login = BASEURL . "login.php";
		header("Location: $url_login");
	} else {
		?>

		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="shortcut icon" href="<?= BASEURL; ?>img/ico.ico" />
			<title><?= $app_name; ?></title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/recleads/css/global.php'; ?>

			<!-- Fonts-->
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;700&family=Special+Elite&display=swap" rel="stylesheet">

			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

			<!-- JQuery-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



			<!-- Alertify -->
			<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
			<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
			<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
			<?php include("alertify.php"); ?>

			<!-- Bootstrap -->
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>


			<!-- Import DataTable -->
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>


			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">

			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

		</head>
	<?php	}