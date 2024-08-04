<?php

declare(strict_types=1);

include_once 'dbh.inc.php';
include_once 'library.model.inc.php';

function show_books($pdo, $category = null) {
    if ($category !== null && $category !== 'all') {
        $books = get_books_by_category($pdo, $category);
    } else {
        $books = get_all_books($pdo);
    }

    if (!empty($books)) {
        foreach ($books as $book) {
            echo '<div class="books">';
            echo '<a href="pdfbooks/' . $book['category'] . '/' . $book['bookname'] . '" class="book-link" target = _blank>';
            echo '<img src="coverpages/' . $book['category'] . '/' . $book['bookcover'] . '" alt="' . $book['bookname'] . '" class="book-cover">';
            echo '<h2 class="book-title">' . ucwords(pathinfo($book['bookname'], PATHINFO_FILENAME)) . '</h2>';
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo 'No books here.';
    }
}

function get_all_books($pdo) {
    $stmt = $pdo->query("SELECT * FROM book_files");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add this function to get books by category
function get_books_by_category($pdo, $category) {
    $stmt = $pdo->prepare("SELECT * FROM book_files WHERE category = :category");
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['query'])) {
        $searchQuery = htmlspecialchars($_GET['query']);

        if (isset($_GET['category'])) {
            $selectedCategory = $_GET['category'];
            $searchResults = search_books($pdo, $searchQuery, $selectedCategory);
        } else {
            $searchResults = search_books($pdo, $searchQuery);
        }

        if (!empty($searchResults)) {
            foreach ($searchResults as $result) {
                echo '<div class="search-books">';
                echo '<a href="pdfbooks/' . $result['category'] . '/' . $result['bookname'] . '" class="search-book-link">';
                echo '<div class="back"><img src="coverpages/' . $result['category'] . '/' . $result['bookcover'] . '" alt="' . $result['bookname'] . '" class="search-book-cover"></div>';
                echo '<h2 class="search-book-title">' . ucwords(pathinfo($result['bookname'], PATHINFO_FILENAME)) . '</h2>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo 'No results found.';
        }
        exit();
    }
}

 