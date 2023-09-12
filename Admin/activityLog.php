<?php 
// include('../config.php');
include('includes/header.php');
// include('../databaseHandlers/audit_trailFunctions.php');


// $logs = getUserLogs('admin', $_SESSION['id'], $pdo);
// $logs = getUserLogs('admin', $_SESSION['id'], $pdo);


// $query="select * from audit_trail";
// $result= $pdo->query($query);

?>
    <head>
        <!-- <meta charset="UTF-8">
        <title>Account Set-Up</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'> -->
        <link rel="stylesheet" href="css/table.css">
        
    </head>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="text-center text-gray-900">Activity Log</h1>
    <div class="container-fluid">
        <div class="card-shadow mb-6">
            <div class="card-header  py-3">
                <div class="card-body ">
                    <div class="table-responsive ">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class= "bg-dark text-center text-light">
                                <tr>
                                    <th>User ID </th>
                                    <th>Role </th>
                                    <th>Date </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('../config.php');
                                $a=1;
                                $stmt = $pdo -> prepare("SELECT * FROM audit_trail");
                                $stmt -> execute();
                                $logs = $stmt ->fetchAll(); 
                                foreach($logs as $log)
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $log['user_id'];?>
                                        </td>
                                        <td>
                                            <?php echo $log['role'];?>
                                        </td>
                                        <td>
                                            <?php echo $log['date'];?>
                                        </td>
                                        <td>
                                            <?php echo $log['action'];?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                    ?>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php')
?>