<?php
include('includes/header.php');
include('includes/themeSwitch.php');

?>
<main class="mt-5 pt-3">
  <div class="container-fluid p-4">
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
    <div class="row border-bottom pb-2 px-lg-5 mb-5">
      <h2 class="">Site Settings</h2>
    </div>
    <div class="row position-relative px-lg-5">
      <div class="col col-lg-3 border-end me-5">
        <label for="websiteName" class="form-label text-center w-100">Website Logo</label>
        <div class="d-flex me-2 my-auto justify-content-center mb-4">
          <picture class="profile-picture position-relative border">
            <img src="../icon.png" class="h-100 position-absolute top-50 start-50 translate-middle">
          </picture>
        </div>
        <div class="d-flex flex-column align-items-center">
          <form action="../databaseHandlers/updateLogo.php" method="post" enctype="multipart/form-data">
            <label for="websiteName" class="form-label text-center w-100">Upload New Logo</label>
            <input required class="form-control mb-2" type="file" id="logo" name="logo">
            <button type="Submit" class="btn btn-primary w-100">Upload</button>
          </form>
        </div>
      </div>
      <div class="col col-lg-8">
        <form action="../databaseHandlers/changeSettings.php" method="post">
          <div class="mb-3 row d-flex align-items-center">
            <label for="websiteName" class="form-label ">Website Name</label>
            <input required type="text" class="form-control py-3" name="websiteName" value="<?= $webName ?>">
          </div>
          <div class="mb-3 row d-flex align-items-center">
            <label for="theme" class="form-label ">Navigation Bar/Menu Color</label>
            <select required class="form-select py-3" name="theme" aria-label="Default select example">
              <option <?= $dark ?> value="dark/dark" class="bg-dark text-light">Dark</option>
              <option <?= $light ?> value="light/light">Light</option>
              <option <?= $blue ?> value="primary/dark" class="bg-primary text-white">Blue</option>
              <option <?= $lBlue ?> value="light-blue/light" class="bg-light-blue">Light Blue</option>
              <option <?= $red ?> value="red/dark" class="bg-red text-white">Red</option>
              <option <?= $lRed ?> value="light-red/light" class="bg-light-red">Light Red</option>
              <option <?= $green ?> value="success/dark" class="bg-success text-white">Green</option>
              <option <?= $lGreen ?> value="light-green/light" class="bg-light-green">Light Green</option>
            </select>
          </div>
          <input type="submit" value="Apply Changes" class="btn btn-success">
        </form>
      </div>
    </div>

  </div>
</main>

<?php
include('includes/footer.php')
?>