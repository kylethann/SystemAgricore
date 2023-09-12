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
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE fullName LIKE :keyword");
    $stmt->bindValue(':keyword', '%' . $searchKeyword . '%', PDO::PARAM_STR);
    $stmt->execute();

    // Fetch and display the results
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($results) > 0) {
        foreach ($results as $col) {
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

<h1 class="text-sm font-weight-bold h3 mb-2 text-center "style="color: black; font: helvetica;" >Admin Profile</h1>
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
          <form method="get" action="search.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
            <input type="text" name="searchKeyword"  class="form-control bg-light border-1 small"  placeholder="Search for...">
            <button class="btn btn-primary" type="submit" name="search_button"><i class="fas fa-search fa-sm"></i></button>
          </form>
            <br>
            <div class="card-shadow mb-6">
              <div class="card-header  py-3">
                <h6 class="m-2 font-weight-bold text-primary"></br></h6>
                <a href="addAdmin.php" class="btn btn-primary float-right"><i class="fa fa-plus  fa-sm text-dark-100"></i> Add New Admin</a><br>
                    <div class="card-body ">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-striped table-hover" id="dataTable table-sm" width="100%" cellspacing="1">
                          <thead class= "bg-dark text-center text-white">
                            <th># </th>
                            <th>Fullname </th>
                            <th>Email</th>
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
                              echo "<td> ${row['fullName']} </td>";
                              echo "<td> ${row['email']} </td>";
                              echo "<td> ${row['DateCreated']} </td>"; ?>
                              <td>
                                <a href="viewAdmin.php?id=<?= $row['id']?>" class="btn btn-info"><i class="fas fa-eye  fa-sm text-dark-100"></i></a>
                              </td>
                              <td>
                                <a href="editAdmin.php?id=<?= $row['id']?>" class="btn btn-warning"><i class="fa fa-user-edit fa-sm text-dark-100"></i></a>
                              </td>
                              <td>
                                <!-- <form action="../databaseHandlers/deleteAdmin.php" method="POST">
                                  <button class="btn btn-danger" type="submit" name= "deleteAdmin" value="<?= $row['id']?>"><i class="fas fa-trash-alt fa-sm text-dark-100"></i></button>
                                </form> -->
                                <!-- <button type="button" class="btn" data-target="deleteModal">Delete User</button> -->
                                <!-- <button type="button" class="btn btn-danger float-right" href="./users.php?role=admin&deleteid=<?= $admin['id'] ?>&username=<?= $admin['username'] ?>" data-toggle="modal" data-target="#deleteModal">
                                  Delete
                                </button> -->
                                <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal">
                                  Delete
                                </button>
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
    <div class="modal fade" id="deleteModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="../databaseHandlers/deleteAdminORIG.php" method="POST">
            <div class="modal-body">
              Are you sure you want to delete <?=$admin['fullName'] ?> from the system?
            </div>
            <div class="modal-footer">
              <button type="submit" name= "deleteAdmin" class="btn btn-danger" >Remove Admin</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
</script>

<?php
include('includes/footer.php')
?>