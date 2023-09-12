<?php
// Connect to your database
// $dsn = 'mysql:host=localhost;dbname=your_database';

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'agricoresystem';
$charset = 'utf8mb4';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if a record needs to be deleted
if (isset($_POST['record_id'])) {
    $recordId = $_POST['record_id'];
    
    // Prepare and execute the DELETE query
    $deleteQuery = "DELETE FROM your_table WHERE id = :id";
    
    try {
        $stmt = $pdo->prepare($deleteQuery);
        $stmt->bindParam(':id', $recordId, PDO::PARAM_INT);
        $stmt->execute();
        // You can also handle success or failure messages here
    } catch (PDOException $e) {
        // Handle the error
    }
}
?>



<?php
include 'config.php';

if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    // Perform the delete operation
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$deleteId]);

    // Log the delete action
    $action = "Deleted product with ID: $deleteId";
    $logStmt = $pdo->prepare("INSERT INTO activity_log (action) VALUES (?)");
    $logStmt->execute([$action]);

    // Redirect or update page as needed
    // header("Location: products.php");
}
?>