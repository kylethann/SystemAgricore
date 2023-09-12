<?php 
include('includes/header.php');

$totalUsers = getTotalUsers($pdo);
$totalFarmers = getTotalFarmers($pdo);
$totalAdmin = getTotalAdmin($pdo);
$totalClient = getTotalClient($pdo);

// PENDING....
// $totalPending = getTotalPending($pdo);
// $totalApproved = getTotalApproved($pdo);



?>
<style>
    .card-header{
    
        /* background-image: url("../Admin/images/bg2.jpg"); */
        border-radius: 30px;
        font: 700 16px Helvetica, Arial;
        text-align: center;
        outline: none; 
        background: transparent;
        /* border: 3px solid #010501; */
    }
    .card{
        /* background-image: url("../Admin/images/bg5.jpg"); */
        cursor: pointer;
        
    }
    .card:hover{
        transform: translateY(-10px);
    } 
    .h5{
        color: black;
        text-align: center;
        font: 50px; 
    }
    .h1{
        color: black;
        /* font: 700 16px ; */
    }
</style>

<!-- <div class="card mb-4 "> -->
    <h1 class="text-sm font-weight-bold h3 mb-2 text-center "style="color: black; font: Times New Roman;" >Dashboard</h1>
    <!-- <div class="card-body"> -->
        <!-- <div class="card mb-4" > -->
            <div class="container-fluid" >
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <iclass="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6 mb-4 ">
                        <div class="card border-left-success shadow h-150 py-3" style="background-color: beige">
                            <div class="card-body" >
                                <div class="card-header text-sm" style="color: black;">
                                    Total Number of Admin
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2"><br>
                                        <div class="h5">
                                            <?= $totalAdmin ?>
                                        </div>
                                        <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="x">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            View Details
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-users fa-2x text-dark-500"></i>
                                        <!-- <i class="fas fa-user fa-2x text-dark-500"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4 ">
                        <div class="card border-left-success shadow h-150 py-3 " style="background-color: beige">
                            <div class="card-body">
                                <div class="card-header text-sm" style="color: black;">
                                    Total Number of Farmers
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2"><br>
                                        <div class="h5 ">
                                            <?= $totalFarmers ?>
                                        </div>
                                        <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            View Details
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-user fa-2x text-dark-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4 ">
                        <div class="card border-left-success shadow h-150 py-3 " style="background-color: beige">
                            <div class="card-body">
                                <div class="card-header text-sm " style="color: black;">
                                    Total Number of Clients
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2"><br>
                                        <div class="h5 mb-0 ">
                                            <?= $totalClient ?>
                                        </div>
                                        <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            View Details
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-dark-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4 ">
                        <div class="card border-left-success shadow h-150 py-3 " style="background-color: beige">
                            <div class="card-body">
                                <div class="card-header text-sm  " style="color: black;">
                                    Pending Requests
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2"><br>
                                        <div class="h5 mb-0 ">
                                            <!-- <?= $totalPending ?> -->
                                        </div>
                                        <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            View Details
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-dark-300"></i>
                                        <!-- <i class="fas fa-user fa-2x text-dark-500"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4 ">
                        <div class="card border-left-success shadow h-150 py-3 " style="background-color: beige">
                            <div class="card-body">
                                <div class="card-header text-sm " style="color: black;">
                                    Approved Request
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2"><br>
                                        <div class="h5 mb-0 font-weight-bold text-gray-900">
                                            <!-- <?= $totalApproved ?> -->
                                        </div>
                                        <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            View Details
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-check  fa-2x text-dark-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- INSERT GRAPHS HERE FOR STATISTICS -->
</div>
</div>

</body>

</html> 

<?php
include('includes/footer.php')
?>
