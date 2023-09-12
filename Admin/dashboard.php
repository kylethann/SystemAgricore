<?php 
include('includes/header.php');
include('../databaseHandlers/eventFunctions.php');

$totalUsers = getTotalUsers($pdo);
$totalFarmers = getTotalFarmers($pdo);
$totalAdmin = getTotalAdmin($pdo);
$totalClient = getTotalClient($pdo);
$totalEvents = getTotalEvent($pdo);

// PENDING....
// $totalPending = getTotalPending($pdo);
// $totalApproved = getTotalApproved($pdo);

if (isset($_GET['eventid'])) {
    $event = getEvent($_GET['eventid'], $pdo);
  }
  if (isset($_GET['editeventid'])) {
    $event = getEvent($_GET['editeventid'], $pdo);
  }
  $eventsToday = getEventsToday($pdo);
  $eventsSoon = getUpcomingEvents($pdo);



?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

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
    #chart-container {
        width: 500px;
        margin: auto;
    }
</style>
    <?php if (isset($_SESSION['flash_message'])) : ?>
        <div class="alert alert-<?= $_SESSION['alert'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['flash_message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['flash_message']);
            unset($_SESSION['alert']);
        endif;
    ?>
<!-- <div class="card mb-4 "> -->
<h1 class="text-sm font-weight-bold h3 mb-2 text-left "style="color: black; font: Times New Roman;" >&nbsp;&nbsp;&nbsp;&nbsp;Welcome to Agricore, Admin <?= $res->fullName; ?></h1>
    <!-- <h1 class="text-sm font-weight-bold h3 mb-2 text-center "style="color: black; font: Times New Roman;" >Dashboard</h1> -->
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
                                    Number of Admins
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
                                        <i class="fa fa-users fa-3x text-dark-500"></i>
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
                                    Number of Farmers
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2"><br>
                                        <div class="h5 ">
                                            <?= $totalFarmers ?>
                                        </div>
                                        <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="farmerStats.php">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            View Details
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-user fa-3x text-dark-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4 ">
                        <div class="card border-left-success shadow h-150 py-3 " style="background-color: beige">
                            <div class="card-body">
                                <div class="card-header text-sm " style="color: black;">
                                    Number of Customers
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
                                        <i class="fas fa-user fa-3x text-dark-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
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
                                        <i class="fas fa-comments fa-3x text-dark-300"></i>
                                        <!-- <i class="fas fa-clipboard-list fa-2x text-dark-300"></i> -->
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
                                        <i class="fas fa-clipboard-check  fa-3x text-dark-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4 ">
                        <div class="card border-left-success shadow h-150 py-3 " style="background-color: beige">
                            <div class="card-body">
                                <div class="card-header text-sm " style="color: black;">
                                    Events
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2"><br>
                                        <div class="h5 mb-0 ">
                                        <?= $totalEvents ?>
                                        </div>
                                        <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                            View Details
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-calendar fa-3x text-dark-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Event Modal -->
                <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventModalLabel"><?= $event['title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 ">
                                <div class="fw-lighter mb-4 text-wrap">
                                    <?= $event['description'] ?>
                                </div>
                            <div>
                            <ul class="list-unstyled lh-lg">
                                <li>
                                    <span class="text-muted me-4">Start Date:</span>
                                    <span class="fw-bold"><?= $event['start'] ?></span>
                                </li>
                                <li>
                                    <span class="text-muted me-4">End Date:</span>
                                    <span class="fw-bold"><?= $event['end'] ?></span>
                                </li>
                            </ul>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <div class="btn-group" role="group" aria-label="Edit Event">
                                <a href="./dashboard.php?editeventid=<?= $event['id'] ?>" class="btn btn-outline-dark">Edit</a>
                                <a data-bs-toggle="modal" data-bs-target="#deleteEventModal" class="btn btn-outline-dark">Delete</a>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Add Event Modal -->
                <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../databaseHandlers/addEvent.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="eventTitle" class="form-label">Event Title</label>
                                        <input required type="text" class="form-control" name="eventTitle" id="eventTitle" placeholder="Enter Event Title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="eventDesc" class="form-label">Event Description</label>
                                        <textarea class="form-control" name="eventDesc" id="eventDesc" rows="10" placeholder="Describe the project"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="startDate" class="form-label">Start Date:</label>
                                        <input required type="date" class="form-control" name="startDate" id="startDate">
                                    </div>
                                    <div class="mb-3">
                                        <label for="endDate" class="form-label">End Date:</label>
                                        <input required type="date" class="form-control" name="endDate" id="endDate">
                                    </div>
                                    <div class="mb-3">
                                        <label for="color" class="form-label">Event Color:</label>
                                        <input required type="color" class="form-control form-control-color" name="color" id="color">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Event</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Event Modal -->
                <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../databaseHandlers/editEvent.php" method="post">
                                <div class="modal-body">
                                    <input required type="number" hidden value="<?= $event['id'] ?>" name="eventId">
                                    <div class="mb-3">
                                        <label for="eventTitle" class="form-label">Event Title</label>
                                        <input required type="text" class="form-control" name="eventTitle" id="eventTitle" placeholder="Enter Event Title" value="<?= $event['title'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="eventDesc" class="form-label">Event Description</label>
                                        <textarea class="form-control" name="eventDesc" id="eventDesc" rows="10" placeholder="Describe the event"><?= $event['description'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="startDate" class="form-label">Start Date:</label>
                                        <input required type="date" class="form-control" name="startDate" id="startDate" value="<?= $event['start'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="endDate" class="form-label">End Date:</label>
                                        <input required type="date" class="form-control" name="endDate" id="endDate" value="<?= $event['end'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="color" class="form-label">Event Color:</label>
                                        <input required type="color" class="form-control form-control-color" name="color" id="color" value="<?= $event['color'] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete event Modal -->
                <div class="modal fade" id="deleteEventModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteEventModalLabel">Delete Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../databaseHandlers/deleteEvent.php" method="post">
                                <div class="modal-body">
                                    <input required type="number" name="id" hidden value="<?= $_GET['eventid'] ?>">
                                Are you sure you want to delete <?= $event['title'] ?> from the system?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- CARDS -->
                <!-- CALENDAR -->
                <div class="row">
                    <div class="col col-lg-9 mb-3">
                        <div class="card d-flex align-items-center p-0">
                            <div class="card-header p-3 w-100 text-center text-white bg-dark d-flex justify-content-between">
                                <div class="h-auto h4 my-auto">Calendar of Activities</div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                                <i class="fa fa-plus  fa-sm text-dark-100"></i>  Add Event
                                </button>
                            </div>
                            <div class="card-body w-100 overflow-auto px-5">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- SUMMARY OF EVENTS -->
                    <div class="col-12 col-lg-3 mb-3">
                        <div class="card h-100 p-0">
                            <div class="card-header p-3 w-100 text-center text-white bg-dark h4">
                                Summary of Events
                            </div>
                            <div class="card-body pt-4 text-center">
                                <h5 class="mb-2 fw-bold">Ongoing Events</span></h5>
                                <div class="mb-4">
                                    <ul class="list-unstyled">
                                        <?php
                                        if (isset($eventsToday)) {
                                        foreach ($eventsToday as $event) {
                                            echo "<li><a href='./dashboard.php?eventid=${event['id']}' class='text-decoration-none'>" . $event['title'] . "</a></li>";
                                        }
                                        } else {
                                        echo "<li>No events.</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <h5 class="mb-2 fw-bold">Upcoming Events</h5>
                                <div class="">
                                    <ul class="list-unstyled">
                                        <?php
                                        if (isset($eventsSoon)) {
                                        foreach ($eventsSoon as $event) {
                                            echo "<li><a href='./dashboard.php?eventid=${event['id']}' class='text-decoration-none'>" . $event['title'] . "</li>";
                                        }
                                        } else {
                                        echo "<li>No upcoming events.</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- END OF ONGOING EVENTS -->
                        </div>
                    </div>
                    <!-- END OF SUMMARY EVENT -->
                </div>
                <!-- END OF CALENDAR -->
            <!-- </div>
        </div>
    </div> -->
<!-- </div> -->
<!-- </div> -->
    <!-- INSERT GRAPHS HERE FOR STATISTICS -->
                        <!-- </div> -->

</div>
</body>
</html> 
<script>
    const eventModal = new bootstrap.Modal(document.getElementById('eventModal'), {
        keyboard: false
    })
    <?php if (isset($_GET['eventid'])) : ?>
        eventModal.toggle();
    <?php endif; ?>

    const editEventModal = new bootstrap.Modal(document.getElementById('editEventModal'), {
        keyboard: false
    })
    <?php if (isset($_GET['editeventid'])) : ?>
        editEventModal.toggle();
    <?php endif; ?>
</script>



<?php
include('includes/footer.php')
?>
