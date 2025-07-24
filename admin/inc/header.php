<?php

    include "inc/connection.php";
    include "inc/functions.php";
    ob_start();
    session_start();

    if(empty($_SESSION['loginEmail'])){
        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Charity Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <!-- <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a> -->
                            <a href="dashboard.php"><img src="../frontend/img/logo.png" alt="Logo" srcset=""
                                    class="h1 img-fluid" width=130px style="object-fit:contain"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Catagory Section -->

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Catagory</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="catagory.php">Add New Catagory</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="viewCatagory.php">View All Catagory</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Users Section -->

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Users</span>
                            </a>
                            <ul class="submenu ">
                                <?php 
                        $userRole = $_SESSION['loginUserRole'];
                        if($userRole==2){
                            ?>
                                <li class="submenu-item ">
                                    <a href="users.php?do=add">Add New Users</a>
                                </li>
                                <?php
                        }
                    ?>
                                <li class="submenu-item ">
                                    <a href="users.php?do=manage">View All Users</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Donation</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="donarInfo.php">History</a>
                                </li>

                            </ul>

                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Frontend</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="../frontend/index.php">Home</a>
                                </li>

                            </ul>

                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Volunteer</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="volunteerInfo.php">History</a>
                                </li>

                            </ul>

                        </li>


                        <!-- Post Section -->

                        <!-- <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Posts</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="component-alert.html">Add New Post</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">View All posts</a>
                    </li>
                </ul>
            </li> -->


                        <!-- Comments Section -->

                        <!-- <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Comments</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="component-alert.html">View All Comments</a>
                    </li>
                    
                </ul>
            </li> -->



                        <li class="sidebar-item  ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-puzzle"></i>
                                <span>Settings</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="inc/logout.php" class='sidebar-link'>
                                <i class="bi bi-puzzle"></i>
                                <span>Log Out</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>