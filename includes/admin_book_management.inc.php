<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    // Check if a file was uploaded without errors
    // Corrected condition
    if (isset($_FILES["bookFile"], $_FILES["bookCover"]) &&
         $_FILES["bookFile"]["error"] === 0 && $_FILES["bookCover"]["error"] === 0) {

        $folder = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'Z'];

        $selectedCategory = $_POST["category"];

        // Check if the selected category is valid
        if (!in_array($selectedCategory, $folder)) {
            echo "Invalid category selected.";
            header("Location: ../index.php");
            exit();
        }

        function handleCategory(string $category) {
            // Define an associative array to map category values to display text
            $categoryMapping = [
                'A' => 'General Works',
                'B' => 'Philosophy, Psychology, and Religion',
                'C' => 'Auxiliary Sciences of History',
                'D' => 'General and Old World History',
                'E' => 'History of America',
                'F' => 'History of United States and British, Dutch, French, and Latin America',
                'G' => 'Geography, Anthropology, and Recreation',
                'H' => 'Social Sciences',
                'J' => 'Political Sciences',
                'K' => 'Law',
                'L' => 'Education',
                'M' => 'Music',
                'N' => 'Fine Arts',
                'O' => 'Language and Literature',
                'P' => 'Sciences',
                'Q' => 'Medicine',
                'R' => 'Agriculture',
                'S' => 'Technology',
                'T' => 'Technology',
                'U' => 'Military Science',
                'V' => 'Naval Science',
                'Z' => 'Bibliography, Library, Science, and General Information Resources, Fiction',
            ];
        
            // Check if the provided category is valid and return the corresponding display text
            return $categoryMapping[$category] ?? '';
        }

        $book_dir = "../pdfbooks/$selectedCategory/";
        $book_file = $book_dir . basename($_FILES["bookFile"]["name"]);
        $book_type = strtolower(pathinfo($book_file, PATHINFO_EXTENSION));

        $cover_dir = "../coverpages/$selectedCategory/";
        $cover_file = $cover_dir . basename($_FILES["bookCover"]["name"]);
        $cover_type = strtolower(pathinfo($cover_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)

        $allowed_book_types = array("pdf");
        $allowed_cover_types = array("jpeg", "jpg", "png");
        if (!in_array($book_type, $allowed_book_types) || !in_array($cover_type, $allowed_cover_types)) {
            $errors['nocover'] = '"Sorry, only PDF files for books and JPEG, JPG, and PNG files for covers are allowed."';
        } else {
            // Moves the uploaded file to the folder
            if (move_uploaded_file($_FILES["bookFile"]["tmp_name"], $book_file) &&
                move_uploaded_file($_FILES["bookCover"]["tmp_name"], $cover_file)) {
                $categoryDescription = handleCategory($selectedCategory);
                $selectedCategory = $_POST["category"];
                $bookname = $_FILES["bookFile"]["name"];
                $bookcover = $_FILES["bookCover"]["name"]; 
                $booksize = $_FILES["bookFile"]["size"];

                try {
                    require_once 'dbh.inc.php';
                    require_once 'admin_book_management_model.inc.php'; // The model always comes first
                    require_once 'admin_book_management_contr.inc.php'; // The model always comes first


                    handleUpload($pdo, $bookname, $bookcover, $selectedCategory, $booksize, $categoryDescription);
                } catch (PDOException $e) {
                    die('Query failed: ' . $e->getMessage());
                }
            } else {
                $errors['noupload'] = 'Sorry there is an error uploading your file';
            }
        }
    } else {
        $errors['nocover'] = 'Please select both cover photo and book file';
    }
    require_once 'config_session.inc.php';

    if ($errors) {
        $_SESSION["errors_upload"] = $errors;
        header("Location: ../bookManagement/upload.php"); // if there are errors, it will redirect to signup.php
        exit();
    }
        header("Location: ../bookManagement/upload.php?upload=success");

        $pdo = null;
        $stmt = null;
        die(); // to terminate the program

} else {
    header("Location: ../index.php");
    die(); // To terminate the program
}
?>
