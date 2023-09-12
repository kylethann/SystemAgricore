<?php

include('../databaseHandlers/audit_trailFunctions.php');


$logs = getUserLogs('admin', $_SESSION['id'], $pdo);
// $logs = getLogs($pdo);
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
    <div class="row border-bottom pb-2 mb-5">
      <h2>Audit Trail</h2>
    </div>
    <div>
      <table class="table">
        <thead>
          <th>User ID</th>
          <th>Role</th>
          <th>Date</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
           if (isset($logs)) {
            foreach ($logs as $log) { ?>
              <tr>
                <td><?= $log['date'] ?></td>
                <td><?= $log['role'] ?></td>
                <td><?= $log['user_id'] ?></td>
                <td><?= $log['action'] ?></td>
              </tr>
          <?php }
          } else {
            echo '<td colspan="4" class="text-center text-muted py-4">No Recent Activity</td>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>


