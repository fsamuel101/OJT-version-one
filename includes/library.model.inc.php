<?php

declare(strict_types=1);

include_once 'dbh.inc.php';

function get_books(object $pdo) {
    $query = "SELECT * FROM book_files ORDER BY id DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
}

function search_books(object $pdo, string $query) {
    $query = "%$query%";
    $searchQuery = "SELECT * FROM book_files WHERE bookname LIKE :query ORDER BY id DESC";
    $stmt = $pdo->prepare($searchQuery);
    $stmt->bindParam(':query', $query, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}