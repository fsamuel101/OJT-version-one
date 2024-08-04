<?php
// Include your database connection code or configuration here
require_once '../includes/dbh.inc.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Check if the book ID is provided in the URL
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    try {
        // Fetch file names and category before deleting the record
        $query = "SELECT bookname, bookcover, category FROM book_files WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $bookId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $pdfFileName = $result['bookname'];
            $imageFileName = $result['bookcover'];
            $category = $result['category'];

            // Prepare and execute the DELETE query
            $query = "DELETE FROM book_files WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $bookId, PDO::PARAM_INT);
            $stmt->execute();

            // Delete the corresponding PDF file
            $pdfFilePath = "../pdfbooks/$category/$pdfFileName"; // Adjust the path accordingly
            if (file_exists($pdfFilePath)) {
                unlink($pdfFilePath);
            } else {
                echo "PDF file not found: $pdfFilePath";
            }

            // Delete the corresponding image file
            $imageFilePath = "../coverpages/$category/$imageFileName"; // Adjust the path accordingly
            if (file_exists($imageFilePath)) {
                unlink($imageFilePath);
            } else {
                echo "Image file not found: $imageFilePath";
            }
        }

        // Redirect back to the book list page after deletion
        header('Location:../admin_book_management.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Book ID not provided.";
}
?>
