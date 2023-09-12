$(document).ready(function() {
    let currentItemID = null;

    // Show delete modal when delete button is clicked
    $('.delete-button').on('click', function() {
        currentItemID = $(this).data('id');
        $('#deleteModal').modal('show');
    });

    // Perform delete action when confirm button in the modal is clicked
    $('#confirmDelete').on('click', function() {
        if (currentItemID !== null) {
            $.ajax({
                type: 'POST',
                url: 'deleteAdmin.php',
                data: { id: currentItemID },
                success: function(response) {
                    // Handle success, update UI, etc.
                    // For example, you could remove the deleted row from the table
                    $('#deleteModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});
