<?php
include('../config.php');
include('includes/header.php');

$adminData = fetchAdmins($pdo);

?>

<head>
  <link href="css/table.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <form method="get" action="adminSearch.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
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
                            <?php foreach ($adminData as $admin) {
                              echo "<tr>";
                              echo "<td> ${admin['id']} </td>";
                              ?>
                              <?php
                              echo "<td> ${admin['fullName']} </td>";
                              echo "<td> ${admin['email']} </td>";
                              echo "<td> ${admin['DateCreated']} </td>"; ?>
                              <td>
                                <a href="viewAdmin.php?id=<?= $admin['id']?>" class="btn btn-info"><i class="fas fa-eye  fa-sm text-dark-100"></i></a>
                              </td>
                              <td>
                                <a href="editAdmin.php?id=<?= $admin['id']?>" class="btn btn-warning"><i class="fa fa-user-edit fa-sm text-dark-100"></i></a>
                              </td>
                              <td>
                                <button class="btn btn-danger" type="button" value="<?= $admin['id']?>"  data-toggle="modal" 
                                data-target="#deleteModal" >
                                  <i class="fas fa-trash-alt fa-sm text-dark-100"></i></button>
                                <br>
                                <button type="button" class="btn btn-danger float-right" 
                                href="./users.php?role=admin&deleteid=<?= $admin['id'] ?>&username=<?= $admin['username'] ?>" 
                                data-toggle="modal" data-target="#deleteModal">
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
    <div class="modal fade" id="deleteModal" name= "deleteModal"  tabindex="-1" role="dialog" 
    aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../databaseHandlers/deleteAdmin.php"  method="POST" name="deleteModal">
              <div class="modal-body">
                  Are you sure you want to delete this record?
                  <!-- <input disabled type="id" name="id" class="form-control" id="id" value="<?= $admin['id']?>"> -->
                  <input required type="number" name="id" hidden value="<?= $admin['id']?>">
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-danger"  >Remove Admin</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </form>
        </div>
    </div>
</div>



<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include JavaScript code to handle modal interactions and AJAX requests -->
<script src="script.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("deleteModal");
        const deleteButton = document.getElementById("deleteButton");
        const confirmDeleteButton = document.getElementById("confirmDelete");
        const closeButton = modal.querySelector(".close");

        deleteButton.addEventListener("click", () => {
            modal.style.display = "block";
        });

        closeButton.addEventListener("click", () => {
            modal.style.display = "none";
        });

        // confirmDeleteButton.addEventListener("click", () => {
        //     // Perform AJAX request to delete item using PHP script
        //     // You'll need to implement this part
        // });
    });
</script>


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