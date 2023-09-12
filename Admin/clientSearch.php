<?php
// Replace these with your actual database credentials
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'agricoresystem';
$charset = 'utf8mb4';

include('includes/header.php');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the search keyword from the form
    $searchKeyword = $_GET['searchKeyword'];

    // Prepare the SQL statement
    $stmt = $pdo->prepare("SELECT * FROM customer WHERE full_name LIKE :keyword");
    $stmt->bindValue(':keyword', '%' . $searchKeyword . '%', PDO::PARAM_STR);
    $stmt->execute();

    // Fetch and display the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($results) > 0) {
        foreach ($results as $row) {
        }
    } else {
      $_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "No Results Found, Try Again!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>         
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <title>APPLICATION FORM</title> -->
    <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'> -->
    <!-- <link rel="stylesheet" href="../css/formStyle.css"> -->
</head>

<head>
  <link href="css/table.css" rel="stylesheet">
</head> 

<body>
        <h1 class="text-sm font-weight-bold h3 mb-2 text-center "style="color: black; font: helvetica;" >Client Profile</h1>
          <div class="card-body ">
            <div class="card mb-4 bg-light">
              <div class="container-fluid">
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
                  <div class="container-fluid">
                    <!-- Topbar Search -->
                    <br>
                    <form
                      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                        <div class="input-group">
                          <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                              <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form><br>
                    <div class="card-shadow mb-6">
                      <div class="card-header  py-3">
                        <h6 class="m-2 font-weight-bold text-primary"></br></h6>
                        <a href="addClient.php" class="btn btn-primary float-right"><i class="fa fa-plus  fa-sm text-dark-100"></i> Add New Client</a><br>
                        <div class="card-body ">
                          <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-hover" id="dataTable table-sm" width="100%" cellspacing="1">
                              <thead class= "bg-dark text-center text-white">
                                <th># </th>
                                <th>Username </th>
                                <th>First Name </th>
                                <th>Middle Name </th>
                                <th>Last Name </th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Date Created</th>
                                <th></th>
                                <th></th>
                                <th>Action</th>
                              </thead>
                              <tbody>
                                <?php foreach ($results as $row) {
                                  echo "<tr>";
                                  echo "<td> ${row['id']} </td>";
                                  ?>
                                  <?php
                                  echo "<td> ${row['username']} </td>";
                                  echo "<td> ${row['full_name']} </td>";
                                  echo "<td> ${row['middle_name']} </td>";
                                  echo "<td> ${row['last_name']} </td>";
                                  echo "<td> ${row['email']} </td>";
                                  echo "<td> ${row['password']} </td>";
                                  echo "<td> ${row['DateCreated']} </td>"; ?>
                                  <td>
                                    <a href="viewClient.php?id=<?= $row['id']?>" class="btn btn-info"><i class="fas fa-eye  fa-sm text-dark-100"></i> </a>
                                  </td>
                                  <td>
                                    <a href="editClient.php?id=<?= $row['id']?>" class="btn btn-warning"><i class="fa fa-user-edit  fa-sm text-dark-100"></i> </a>
                                  </td>
                                  <td>
                                    <form action="../databaseHandlers/deleteClient.php" method="POST">
                                      <button class="btn btn-danger" type="submit" name= "deleteClient" value="<?= $row['id']?>"><i class="fas fa-trash-alt fa-sm text-dark-100"></i> </button>
                                    </form>
                                    <!-- <button type="button" class="btn btn-danger float-right" href="./users.php?role=admin&deleteid=<?= $admin['id'] ?>&username=<?= $admin['username'] ?>" data-toggle="modal" data-target="#deleteModal">
                                      Delete
                                    </button> -->
                                  </td>
                                  <?php echo "</tr>";
                                } ?>
                              <tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- </div>
        </div>
      </div> -->
</main>
<script>
  const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
    keyboard: false
  })
  <?php if (isset($_GET['deleteid'])) : ?>
    deleteModal.toggle();
  <?php endif; ?>
</script>


<?php
include('includes/footer.php')
?>



<!-- 
<td>
                          <button type="button" class="btn btn-warning float-right"><a href="viewClient.php?id=<?=$client['id']?>">
                            View
                          </button>
                        </td>
                        <td>
                          <form action="../databaseHandlers/code.php" method="POST">
                            <button type="submit" name="deleteClient" class="btn btn-danger " value="<?= ${client['id']};?>" >
                              Delete
                            </button>
                        </td> -->

                        

                        
                        <!-- <td class="">
                          <div class="dropdown me-5 d-flex justify-content-end">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Manage
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="./copyClientProf.php?role=client&editid=<?= $client['id'] ?>&username=<?= $client['username'] ?>&full_name=<?= $client['full_name'] ?>&email=<?= $client['email'] ?>">Edit</a></li>
                              <li><a class="dropdown-item" href="./copyClientProf.php?role=client&deleteid=<?= $client['id'] ?>&username=<?= $client['username'] ?>">Remove</a></li>
                            </ul>
                          </div>
                        </td> -->