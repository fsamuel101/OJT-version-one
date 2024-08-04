<?php

declare(strict_types=1);
 
function get_students(object $pdo)
{
    try {
        // Fetch book information from the database
        $query = "SELECT * FROM student_user";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        // Fetch all rows as associative arrays
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Generate HTML for each book
        foreach ($users as $user){
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['studentnumber']}</td>";
            echo "<td>{$user['lastname']}</td>";
            echo "<td>{$user['first_name']}</td>";
            echo "<td>{$user['college']}</td>";
            echo "<td>{$user['role']}</td>";
            echo "<td>";
            echo "<a href='userManagement/delete_user.php?id={$user['id']}' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function create_user_data(object $pdo, string $lastname, string $firstname, string $studentnumber, string $college){
    $query = "INSERT INTO student_data (student_number,last_name, first_name, college) VALUES
    (:studentnumber, :lastname, :firstname, :college);";
    $stmt = $pdo->prepare($query);


    $stmt->bindParam(":studentnumber", $studentnumber);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":college", $college);
    $stmt->execute();

}