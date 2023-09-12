<?php

include '../config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
//   $_SESSION['current'] = pageUrl($_SERVER['REQUEST_URI']);
//   $_SESSION['flash_message'] = "Please Login first.";

//   header('Location: index.php');
}
if (isset($_SESSION['id']) && $_SESSION['role'] !== 'Client') {
  header("Location: ../restricted.php");
  exit;
}
  include_once('../databaseHandlers/audit_trailFunctions.php');
  include('../databaseHandlers/userFunctions.php');


// if (!isset($_SESSION['id'])){
//     header('Location: dashboard.php');
// }

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=3, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Client Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- FONTS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion " id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand  d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fa-duotone fa-wheat"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">AgriCore</div>
    </a>
    <!-- <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login: Admin</p> -->
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        <i class="fa-regular fa-user"></i>
        CATEGORY
    </div>
    <!-- Nav Item - Admin Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
            <!-- <i class="fas fa-fw fa-wrench"></i> -->
            <span>Barangay</span>
        </a>
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin"data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                <a class="collapse-item" href="users.php">Admin Profile</a>
                <!-- <a class="collapse-item" href="utilities-border.html">Bidding Transaction</a> -->
                <!-- <a class="collapse-item" href="utilities-animation.html">Order Details</a> -->
                <!-- <a class="collapse-item" href="utilities-other.html">Activity Log</a> -->
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu FARMERS -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"aria-expanded="true" aria-controls="collapseTwo">
            <span>Crops</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="farmerProf.php">Farmer Profile</a>
                <a class="collapse-item" href="x">Bidding Transaction</a>
                <a class="collapse-item" href="x">Product Details</a>
                <a class="collapse-item" href="x">Activity Log</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Customer Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"aria-expanded="true" aria-controls="collapseUtilities">
            <!-- <i class="fas fa-fw fa-wrench"></i> -->
            <span>Customer</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                <a class="collapse-item" href="x">Customer Profile</a>
                <a class="collapse-item" href="x">Bidding Transaction</a>
                <a class="collapse-item" href="x">Order Details</a>
                <a class="collapse-item" href="x">Activity Log</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
     <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-beige py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <!-- <a class="collapse-item" href="register.html">Register</a> -->
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6> 
                        <a class="collapse-item" href="dashboard.php">Dashboard</a>
                        <!-- <a class="collapse-item" href="x">Blank Page</a>  -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="x">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Settings</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-success bg-success topbar mb-4 static-top shadow ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-5">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- <header class="header"> -->
                    <!-- <a href="" class="brand">
                        <img src="../icon.png" alt="" class="logo">
                        <div class="site-name">
                            <p class="school">DHVSU</p>
                            <p class="office">Finance Office</p>
                        </div>
                        </a> -->

                        <!-- <div class="header-icon">
                        <i class="bi bi-gear-fill"></i>
                        </div>

                        <div class="header-icon">
                        <i class="bi bi-bell-fill"></i>
                        </div> -->


                    <!-- Topbar Navbar -->
                    <!-- <ul class="navbar-nav ml-auto"> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow right">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <a href="profile.php" class="username"> -->
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="assets/profile-placeholder.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="activityLog.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

        