<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin - Renova Sàrl</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/bootstrap.min.css" />
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/adm.css" />
    <!-- Favicon for All Devices -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo APPURL; ?>/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo APPURL; ?>/public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo APPURL; ?>/public/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo APPURL; ?>/public/favicon/site.webmanifest">
</head>

<body>

    <!-- Dashboard Home START -->
    <div id="dashboardWrapper">
        <div class="jumbotron jumbotron-fluid text-center bg-light">
            <div class="container bg-white border shadow">
                <h1 class="display-5 text-secondary pt-3"><strong><?php echo SITE_NAME; ?></strong> Administration</h1>
                <hr class="mx-1">
                <!-- Navigation Menu -->
                <div class="pt-4 rounded-top">
                    <nav class="nav nav-pills flex-column flex-sm-row text-center" id="navLinks">
                        <a href="<?php echo APPURL . '/admin/'; ?>" id="aPanel" class="btn btn-primary flex-sm-fill mb-4 mx-1 active_button">Dashboard</a>
                        <a href="<?php echo APPURL . '/admin/categories'; ?>" id="categories" class="btn btn-primary flex-sm-fill mb-4 mx-1">Categories</a>
                        <a href="<?php echo APPURL . '/admin/pages'; ?>" id="pages" class="btn btn-primary flex-sm-fill mb-4 mx-1">Pages</a>
                        <a href="<?php echo APPURL . '/admin/gallery'; ?>" id="gallery" class="btn btn-primary flex-sm-fill mb-4 mx-1">Gallery</a>
                        <a href="<?php echo APPURL . '/admin/users'; ?>" id="users" class="btn btn-primary flex-sm-fill mb-4 mx-1">Users</a>
                        <a href="<?php echo APPURL . '/admin/logout'; ?>" class="btn btn-primary flex-sm-fill mb-4 mx-1">Logout</a>
                    </nav>
                </div>
                <!-- Dynamic Content START -->
                <div id="admResult" class="rounded-bottom pb-3">
                    <hr class="border-top">