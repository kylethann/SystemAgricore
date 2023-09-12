<?php
session_start();
include('../config.php');

$user = $_SESSION['id'];
 
$query1 = "SELECT * FROM admin WHERE id=:user LIMIT 1";
$statement = $pdo->prepare($query1);
$data = [

':user'=> $user

];

$statement->execute($data);

$res = $statement->fetch(PDO::FETCH_OBJ);

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
  }
  
  if (isset($_SESSION['id']) && $_SESSION['role'] !== 'Admin') {
    header("Location: ../restricted.php");
    exit;
  }
  include_once('../databaseHandlers/audit_trailFunctions.php');
  include('../databaseHandlers/userFunctions.php');



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=3, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../icon.png" type="image/x-icon">

    <!-- <link href="css/view.css" rel="stylesheet"> -->

      <!-- FullCalendar -->
    <link rel="stylesheet" href="../js/fullcalendar/main.css">

    <script src="../js/bootstrap.bundle.min.js"></script>
    
    <!-- FOR charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JS -->
    <script defer src="../js/micromodal.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <!-- <script defer type="module" src="../js/app.js"></script> -->
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- FONTS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <script src="./vendor/jquery/jquery.js"></script>
     <script src="./vendor/cropper/cropper.js"></script>
     <link rel="stylesheet" href="./vendor/cropper/cropper.css"></link>

</head>
<style>
    .navbar-nav{
        color: white;
        text-align: center;
        font-family: Poppins, Arial, sans-serif;
    }
    .nav-item{
        /* color: red; */
        /* background-color: red; */
    }
    .navbar .sidebar-heading {
        color: white;
        font-weight: 50px;
    }
    .sidebar-heading .nav-item{
        padding: 0px 10px 0px;
        /* margin-left: 3rem; */
    }
    .sidebar {
        /* width: 330px; */
        /* background-color: green; */
        /* padding: 1.2rem 0px 0px; */
        
    }
    /* .sidebar-heading{
        color: red;
    } */
    
/* WORKING */
    .sidebar .nav-link {
        /* position: relative; */
        /* display: grid; */
        place-items: center;
        text-align: center;
        color: beige;
        height: 50px;
        width: 100%;
        font-weight: 500;
        border-radius: 0px 20px 20px 0px;
        transition: all 0.12s ease-in;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active
         {
        background-color: #bebe;
        padding-left: 0.5rem;
        transform: translateY(-8px);
        color: black;
        /* color: black; */
        }
        
    .nav-item{
        /* padding-left: 0.2rem; */
        /* color: black; */
    }
    .sidebar .nav-item .collapse{
        color: white;
        background-color: #3F704D;
        border-radius: 0px 20px 20px 20px;
        transform: translateY(-8px);
    }
    /* .sidebar .nav-item .collapse  .collapse-inner .collapse-item{
        color: black;
    } */
    .sidebar .nav-item .collapse  .collapse-inner .collapse-item:hover{
        color: black;
    }

    </style>

    <!--COLOR GREEN 
        style="background-color: #1e7145" 
    #bebe 
#90EE90
#32CD32-->
    

<body id="page-top" >
    <div id="wrapper" >
        <ul class="navbar-nav  sidebar accordion " style="background-color: #043927" id="accordionSidebar" >
            <img src="images/logo.webp" alt="" class="logo" href="dashboard.php">
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
                <i class="fa-regular fa fa-users"></i>
                USERS
            </div>
        <!-- Nav Item - Admin Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
                    <span>ADMIN</span>
                </a>
                <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin"data-parent="#accordionSidebar">
                    <div class=" collapse-inner rounded ">
                        <a class="collapse-item" href="users.php">Admin Profile</a>
                        <a class="collapse-item" href="utilities-border.html">Bidding Transaction</a>
                        <a class="collapse-item" href="utilities-animation.html">Order Details</a>
                        <a class="collapse-item" href="utilities-other.html">Activity Log</a>
                    </div>
                </div>
            </li>
        <!-- Nav Item - Pages Collapse Menu FARMERS -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo"aria-expanded="true" aria-controls="collapseTwo">
                    <span>FARMERS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="collapse-inner rounded" style="color: white">
                        <a class="collapse-item" href="farmerProfile.php">Farmer Profile</a>
                        <a class="collapse-item" href="x">Bidding Transaction</a>
                        <a class="collapse-item" href="x">Product Details</a>
                        <a class="collapse-item" href="x">Activity Log</a>
                    </div>
                </div>
            </li>
        <!-- Nav Item - Customer Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed"  data-toggle="collapse" data-target="#collapseUtilities"aria-expanded="true" aria-controls="collapseUtilities">
                    <span>CUSTOMERS</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"data-parent="#accordionSidebar">
                    <div class="collapse-inner rounded">
                        <a class="collapse-item" href="clientProfile.php">Customer Profile</a>
                        <a class="collapse-item" href="x">Bidding Transaction</a>
                        <a class="collapse-item" href="x">Order Details</a>
                        <a class="collapse-item" href="x">Activity Log</a>
                    </div>
                </div>
            </li>
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
                                <a class="collapse-item" href="x">Forgot Password</a>
                                <div class="collapse-divider"></div>
                                <h6 class="collapse-header">Other Pages:</h6> 
                                <a class="collapse-item" href="dashboard.php">Dashboard</a>
                            </div>
                        </div>
                    </li>
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
                <!-- <div id="content-wrapper" class="d-flex flex-column " style="background: beige"> -->
                <div id="content-wrapper" class="d-flex flex-column " >
                    <div id="content">
                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-success topbar mb-4 static-top shadow " style="background-color: #043927">
                        <!-- <header class="header">
                            <div class="header-icon">
                                <i class="bi bi-gear-fill"></i>
                            </div>

                            <div class="header-icon">
                            <i class="bi bi-bell-fill"></i>
                            </div> -->
                            
                        
                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-5">
                                <i class="fa fa-bars"></i>
                            </button>
                        <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow right">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 lg"> <?= $res->fullName; ?></span>
                                        <img class="img-profile rounded-circle" src=" <?= ($res->Profile_Photo) ? ($res->Profile_Photo) : "../Admin/stock-photo.jpg" ?>">
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
                                        <a class="dropdown-item" href="logout.php" >
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    <!-- End of Topbar -->
                        <!-- Scroll to Top Button-->
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>
<!-- </html> -->
<!-- </div> -->
    <!-- </div> -->
    <!-- </div> -->
    <!-- </div> -->
<!-- </body> -->
<!-- </html>  -->



                