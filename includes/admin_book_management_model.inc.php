<?php

declare(strict_types=1);

function upload_book(object $pdo, string $bookname, string $bookcover, string $category, int $filesize, string $description)
{
    // Use placeholders in the query and correct the binding statements
    $query = "INSERT INTO book_files (bookname, bookcover, category, filesize, description) VALUES
    (:bookname, :bookcover, :category, :filesize, :description);";

    $stmt = $pdo->prepare($query);

    // Use proper binding with colons
    $stmt->bindParam(":bookname", $bookname);
    $stmt->bindParam(":bookcover", $bookcover);
    $stmt->bindParam(":category", $category);
    $stmt->bindParam(":filesize", $filesize);
    $stmt->bindParam(":description", $description);

    $stmt->execute();
}

function get_book(object $pdo)
{
    try {
        // Fetch book information from the database
        $query = "SELECT * FROM book_files";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        // Fetch all rows as associative arrays
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Generate HTML for each book
        foreach ($books as $book) {
            $fileSizeMB = round($book['filesize'] / (1024 * 1024), 2);
            echo "<tr>";
            echo "<td>{$book['id']}</td>";
            echo "<td>{$book['bookname']}</td>";
            echo "<td>{$book['bookcover']}</td>";
            echo "<td>$fileSizeMB mb</td>";
            echo "<td>{$book['category']}</td>";
            echo "<td>{$book['description']}</td>";
            echo "<td>";
            echo "<a href='bookManagement/delete.php?id=$book[id]' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete this book?\");'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

