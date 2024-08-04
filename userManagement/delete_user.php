<?php
// Include your database connection code or configuration here
require_once '../includes/dbh.inc.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Check if the book ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    try {
        
            // Prepare and execute the DELETE query
            $query = "DELETE FROM student_user WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();


        // Redirect back to the book list page after deletion
        header('Location:../admin_user_management.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Book ID not provided.";
}
?>
