<?php
// Include your database connection settings here
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'agricoresystem';
$charset = 'utf8mb4';


try {
    // $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['id'])) {
        // $itemID = $_POST['id'];
        $admin_id= $_POST["id"];
        $stmt = $pdo->prepare("DELETE FROM admin WHERE id = ?");
        $stmt->execute([$admin_id]);
        echo "Record deleted successfully!";
    } else {
        echo "Invalid request!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
