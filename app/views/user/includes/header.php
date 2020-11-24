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
		echo $title ?? "Renova DL";
		?>
	</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/bootstrap.min.css" />
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/styles.css" />
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/header.css" />
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/gallery.css" />
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/footer.css" />
	<link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/services.css" />
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

	<!-- Header -->
	<div class="header-el">
		<div class="container">

			<div class="row">
				<div class="site-branding col-md-6 col-lg-4 col-sm-12 justify-content-center">
					<div class="header-logo">
						<a href="<?php echo APPURL; ?>">
							<img src="<?php echo APPURL; ?>/public/img/logo/2-psd.png" alt="" /></a>
					</div>
				</div>

				<div class="col-md-6 col-lg-6 col-sm-12 d-none d-md-block d-lg-block align-self-center">
					<div class="d-flex">
						<div class="header-text d-flex align-items-center">
							<div class="header-icon">
								<i class="fas fa-phone-alt"></i>
								<span class="right-line"></span>
							</div>
							<div class="header-info">
								<div class="phone">+00-1202-235</div>
								<div class="gmail">hmend@gmail.com</div>
							</div>
						</div>
						<div class="header-text d-flex align-items-center">
							<div class="header-icon">
								<i class="fas fa-home"></i>
								<span class="right-line"></span>
							</div>
							<div class="header-info">
								<div class="phone">2020 Chelopek Bervenice,</div>
								<div class="gmail">Tetove,NM</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-sm-12 d-md-none d-sm-block d-lg-block align-self-center py-3">
					<div class="sc-icons d-flex justify-content-around justify-content-md-between">
						<a href="#"><i class="fab fa-facebook-f mr-2"></i></a>
						<a href="#"><i class="fab fa-vimeo mr-2"></i></a>
						<a href="#"><i class="fab fa-tumblr mr-2"></i></a>
						<a href="#"><i class="fab fa-pinterest-p mr-2"></i></a>
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- Main div START -->
	<div class="main">

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top py-3">
			<div class="container">
				<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="sr-only">Toggle navigation</span>
				</button>
				<div class="navbar-brand">
					<!-- <span class="big-letters">Company Logo</span> -->
					<i class="far fa-calendar-check text-muted"></i>
					<a class="make-appointment" href="#"> MAKE APPOINTMENT</a>
				</div>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<hr id="hr-divider">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/">HOME
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/projekte">PROJEKTE</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/gallery">GALLERY</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/about">ABOUT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo APPURL; ?>/contact">KONTAKT</a>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php
								$language = $_SESSION['language'] ?? "FR";
								switch ($language) {
									case 'FR':
										echo '<img src="' . APPURL . '/public/img/flags/fr.gif" alt=""> FRANÇAIS';
										break;
									case 'DE':
										echo '<img src="' . APPURL . '/public/img/flags/de.gif" alt=""> DEUTSCH';
										break;
									default:
										echo '<img src="' . APPURL . '/public/img/flags/fr.gif" alt=""> FRANÇAIS';
										break;
								}
								?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" data-lang="FR" href="#"><img src="<?php echo APPURL; ?>/public/img/flags/fr.gif" alt=""> FRANÇAIS</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" data-lang="DE" href="#"><img src="<?php echo APPURL; ?>/public/img/flags/de.gif" alt=""> DEUTSCH</a>
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