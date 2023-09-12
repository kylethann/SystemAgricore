<?php
// Include your database connection settings here
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'agricoresystem';
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['delete_item_id'])) {
        $admin_id = $_POST['delete_item_id'];
        $stmt = $pdo->prepare("DELETE FROM admin WHERE id = ?");
        $stmt->execute([$admin_id]);
        // Optionally, you can handle success or error messages here
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Modal Example</title>
    <!-- Include CSS and JavaScript dependencies here -->
</head>
<body>

<!-- Button to trigger the modal -->
<button id="deleteButton">Delete Item</button>

<!-- Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Are you sure you want to delete this item?</p>
        <button id="confirmDelete">Yes, Delete</button>
    </div>
</div>


<!-- JAVASCRIPT code here to handle modal interactions -->
// JavaScript code to handle modal interactions
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

        confirmDeleteButton.addEventListener("click", () => {
            // Perform AJAX request to delete item using PHP script
            // You'll need to implement this part
        });
    });
</script>

</body>
</html>


