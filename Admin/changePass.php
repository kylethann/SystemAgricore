<!-- Change password Modal -->
<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">Change your Password</h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <form action="../databaseHandlers/user_passwordUpdate.php" method="post">
        <div class="modal__content" id="modal-1-content">
          <input type="password" class="input-control gray" placeholder="Enter your current password." name="old_password">
          <input type="password" class="input-control gray" placeholder="Enter new password." name="new_password">
          <input type="password" class="input-control gray" placeholder="Repeat new password." name="repeat_new_password">
        </div>
        <div class="modal__footer">
          <button class="modal__btn modal__btn-primary">Save Changes</button>
          <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">
            Close
          </button>
        </div>
      </form>
    </div>
  </div>
</div>