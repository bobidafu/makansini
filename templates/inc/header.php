<!DOCTYPE html>
<html>
<head>
	<title>Makan Sini</title>
	<meta  charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="css/icons-1.4.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="css/map.css"> 
	<link rel="stylesheet" type="text/css" href="css/autocomplete.css">

	<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/autocomplete.js"></script>
	<script type="text/javascript" src="js/map.js"></script>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> 

	<style type="text/css">
		.jumbotron-final{
			<?php if($type == 'vendor') : ?>
				background-image: url("img/vendor/<?php echo $title.'/store/'.$title.'.jpg'; ?>");
			<?php endif; ?>
			<?php if($type == 'category') : ?>
				background-image: url("img/Makan Sini.png");
			<?php endif; ?>
			<?php if($type == 'district') : ?>
				background-image: url("img/district/<?php echo $title.'.jpg'; ?>");
			<?php endif; ?>
		}
	</style>
</head>
<body>
	<div class="jumbotron jumbotron-<?php echo $jumbotronType; ?>">
		<nav class="navbar navbar-expand-md">
			<div class="container">
				<a class="navbar-brand" href="index.php">Makan Sini</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle na2vigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav ms-auto mb-2 mb-md-0 float-right">
						<li class="nav-item">
							<a class="nav-link" href="service.php">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
					</ul>	
				</div>
			</div>
		</nav>
