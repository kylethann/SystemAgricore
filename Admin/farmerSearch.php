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
    $stmt = $pdo->prepare("SELECT * FROM farmer1 WHERE name LIKE :keyword");
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


<head>
  <link href="css/table.css" rel="stylesheet">
</head> 

<h1 class="text-sm font-weight-bold h3 mb-2 text-center "style="color: black; font: helvetica;" >Farmer Profile</h1>
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
        </br>
        <form method="get" action="farmerSearch.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
            <input type="text" name="searchKeyword"  class="form-control bg-light border-1 small"  placeholder="Search for..." >
            <button class="btn btn-primary" type="submit" name="search_button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </form>
          <!-- <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-5 my-5 my-md-0 mw-100 navbar-search float-right">
              <div class="input-group">
                <input type="text" name="searchKeyword" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->
          <br>
          <div class="card-shadow mb-6">
            <div class="card-header  py-3">
              <h6 class="m-2 font-weight-bold text-primary"></br></h6>
              <a href="addFarmer.php" class="btn btn-primary float-right"><i class="fa fa-plus  fa-sm text-dark-100"></i> Add New Farmer</a><br>
                  <div class="card-body ">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-striped table-hover" id="dataTable table-sm" width="100%" cellspacing="1">
                        <thead class= "bg-dark text-center text-light">
                          <th># </th>
                          <th>Username </th>
                          <th>First Name</th>
                          <th>Middle Name </th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <!-- <th>Password</th> -->
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
                            echo "<td> ${row['name']} </td>";
                            echo "<td> ${row['middleName']} </td>";
                            echo "<td> ${row['surname']} </td>";
                            echo "<td> ${row['email']} </td>";
                            echo "<td> ${row['dateCreated']} </td>"; ?>
                            <td>
                              <a href="viewFarmer.php?id=<?= $row['id']?>" class="btn btn-info"><i class="fas fa-eye  fa-sm text-dark-100"></i> </a>
                            </td>
                            <td>
                              <a href="editFarmer.php?id=<?= $row['id']?>" class="btn btn-warning"><i class="fa fa-user-edit  fa-sm text-dark-100"></i> </a>
                            </td>
                            <td>
                              <form action="../databaseHandlers/deleteFarmer.php" method="POST">
                                <button class="btn btn-danger" type="submit" name= "deleteFarmer" value="<?= $row['id']?>"><i class="fas fa-trash-alt fa-sm text-dark-100"></i> </button>
                              </form>
                              <!-- <button type="button" class="btn btn-danger float-right" href="./users.php?role=admin&deleteid=<?= $row['id'] ?>&username=<?= $admin['username'] ?>" data-toggle="modal" data-target="#deleteModal">
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
    </div>
    <!-- Delete Modal -->
    <!-- <div class="modal fade" id="deleteModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="../databaseHandlers/deleteAdmin.php" method="post">
            <div class="modal-body">
              Are you sure you want to delete <?=$farmer['username'] ?> from the system?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name= "deleteAdmin" class="btn btn-danger" >Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
  const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
    keyboard: false
  })
  <?php if (isset($_GET['deleteid'])) : ?>
    deleteModal.toggle();
  <?php endif; ?>
</script> -->

<?php
include('includes/footer.php')
?>

