<?php 
include('../config.php');
include('includes/header.php');
// include('../databaseHandlers/audit_trailFunctions.php');



$query="select * from audit_trail";
$result= $pdo->query($query);


function logAct($role, $user_id, $action, $pdo)
{
  $stmt = $pdo->prepare("INSERT INTO audit_trail (`role`, `user_id`, `action`) VALUES (?, ?, ?)");

  $stmt->execute([$role, $user_id, $action]);
}

function getLogs($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM audit_trail ORDER BY id DESC");
  if ($stmt->execute()) {
    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll();
    }
  }
}

function getUserLogs($role, $user_id, $pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM audit_trail WHERE `role` = ? AND `user_id` = ? ORDER BY id DESC");
  if ($stmt->execute([$role, $user_id])) {
    if ($stmt->rowCount() > 0) {
      if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll();
      }
    }
  }
}

function getUserLogsLimited($role, $user_id, $limit, $pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM audit_trail WHERE `role` = ? AND `user_id` = ? ORDER BY id DESC LIMIT $limit");
  if ($stmt->execute([$role, $user_id])) {
    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll();
    }
  }
}



?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="text-center text-gray-900">Activity Log</h1>
    <div class="container-fluid">
        <div class="card-shadow mb-6">
            <div class="card-header  py-3">
                <!-- <h6 class="m-2 font-weight-bold text-primary">   -->
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Add Admin Profile </button> -->
                <!-- </h6> -->
                <div class="card-body ">
                    <div class="table-responsive ">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class= "bg-info text-center text-dark">
                                <tr>
                                    <th>ID </th>
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
                                            <?php echo $log['id'];?>
                                        </td>
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