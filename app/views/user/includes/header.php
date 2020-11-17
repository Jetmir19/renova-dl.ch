<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="title" content="renova-sarl.ch - transport mallrash">
	<meta name="description" content="Inter-Trans menaxhohet nga një staf profesional me përvojë dhe njohuri teknike, si dhe një shërbim logjistik të provuar dhe shumë të kualifikuar të cilët bindin shumë klientë dhe partnerë vendas dhe të huaj.">
	<meta name="keywords" content="transport, kamion, trailer, kipper, international, transport mallrash">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="Neshat Ademi">
	<title>
		<?php
		// Getting $data array (title) from the viewFunctions or the default string
		echo $title ?? "Renova Sàrl";
		?>
	</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/bootstrap.min.css" />
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/styles.css" />
	<!-- Favicon for All Devices -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo APPURL; ?>/public/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo APPURL; ?>/public/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo APPURL; ?>/public/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo APPURL; ?>/public/favicon/site.webmanifest">
</head>

<body>
	<!-- Button to go on TOP start -->
	<span onclick="scrollTopBtn()" id="scrollTopBtn" title=""><i class="fas fa-arrow-up fa-5x"></i></span>
	<!-- Button to go on TOP end -->

	<!-- TelefonBar -->
	<div class="tel-bar bg-dark">
		<div class="container">
			<ul class="tel-bar-list">
				<li><i class="fas fa-phone"></i>&nbsp;<a href="tel:+000 000 000 00">+000 000 000 00</a></li>
				<li><i class="fas fa-envelope"></i>&nbsp;<a href="mailto:office@renova-sarl.ch">office@renova-sarl.ch</a></li>
			</ul>
		</div>
	</div>

	<!-- Main div START -->
	<div class="main">

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top py-3">
			<div class="container">
				<a class="navbar-brand" href="<?php echo APPURL; ?>/">
					<span class="big-letters">Company Logo</span>
				</a>
				<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="sr-only">Toggle navigation</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<hr id="hr-divider">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/">HOME
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/gallery">GALLERY</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/about">ABOUT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/contact">CONTACT</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php
								$language = $_SESSION['language'] ?? "AL";
								switch ($language) {
									case 'EN':
										echo '<img src="' . APPURL . '/public/img/flags/en.gif" alt=""> ENG';
										break;
									case 'AL':
										echo '<img src="' . APPURL . '/public/img/flags/al.gif" alt=""> SHQIP';
										break;
									default:
										echo '<img src="' . APPURL . '/public/img/flags/al.gif" alt=""> SHQIP';
										break;
								}
								?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" data-lang="AL" href="#"><img src="<?php echo APPURL; ?>/public/img/flags/al.gif" alt=""> SHQIP</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" data-lang="EN" href="#"><img src="<?php echo APPURL; ?>/public/img/flags/en.gif" alt=""> ENG</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- The Image Preview Modal -->
		<div id="myModal" class="modal">
			<span class="closeModal"><i class="fas fa-times"></i></span>
			<img class="modal-content" id="modalImg">
			<div id="captionTxt"></div>
		</div>