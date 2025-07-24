<?php 
	
	include "connection.php";
	ob_start();
	session_start();

	// if(empty($_SESSION['loginEmail'])){
    //     header('Location: login.php');
    // }

	//echo '<span class= "alert alert-danger">$_SESSION["loginEmail"]</span>';

	// else{
	// 	if($_SESSION['loginUserRole']==1 || $_SESSION['loginUserRole']==2){
	// 		header('Location: ../../admin/dashboard.php');
	// 	}
	// 	else{
	// 		header('Location: index.php');
	// 	}
	// }

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- <link rel="icon" type="image/png" href="charity.png" /> -->
    <!-- Author Meta -->
    <meta name="author" content="Colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Charity</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">=
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>

    <!-- Start Header Area -->
    <header class="default-header">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="index.php#home"><img src="img/logo.png" alt=""></a>
                    </div>
                    <div class="main-menubar d-flex align-items-center">
                        <nav class="hide">
                            <a href="index.php">Home</a>
                            <a href="index.php#project">Projects</a>
                            <a href="index.php#about">About</a>
                            <a href="volunteer.php">Volunteer</a>
                            <a href="index.php#donate">Donate</a>
                            <?php 
										if(empty($_SESSION['loginEmail'])){
											?>
                            <a href="login.php">Log In</a>
                            <?php
										}
									?>
                            <?php 
										if(empty($_SESSION['loginEmail'])){
											?>
                            <a href="registration.php">Sign Up</a>
                            <?php
										}
									?>
                            <?php 
										if(!empty($_SESSION['loginUserRole'])) {
											$uRole = $_SESSION['loginUserRole'];
											if($uRole==1){
												?>
                            <a href="../admin/dashboard.php">Editor</a>
                            <?php
											}
											else if($uRole==2){
												?>
                            <a href="../admin/dashboard.php">Admin</a>
                            <?php
											}
										}
										
									?>
                            <?php 
										if(!empty($_SESSION['loginEmail'])){
											?>
                            <a href="profile.php">Profile</a>
                            <?php
										}
									?>
                            <?php 
										if(!empty($_SESSION['loginEmail'])){
											?>
                            <a href="inc/logout.php">Log Out</a>
                            <?php
										}
									?>
                        </nav>


                        <div class="menu-bar"><span class="lnr lnr-menu"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Area -->