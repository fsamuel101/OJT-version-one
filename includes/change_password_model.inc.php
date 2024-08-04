<?php

declare(strict_types=1);

//student_data => where our students are located
//student_user => where the students who use the website is located

function checkUser(object $pdo, string $studentnumber) {
    try {
        // Check if the student exists
        $checkQuery = "SELECT COUNT(*) as count FROM student_user WHERE studentnumber = :studentnumber";
        $checkStatement = $pdo->prepare($checkQuery);
        $checkStatement->bindParam(':studentnumber', $studentnumber);
        $checkStatement->execute();

        $result = $checkStatement->fetch(PDO::FETCH_ASSOC);

        return ($result['count'] > 0);
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updatePassword(object $pdo, string $studentNumber, string $newPassword) {
    try {
        $option = [
            'cost' => 5
        ];
    
        $hashed_password = password_hash($newPassword, PASSWORD_BCRYPT, $option);

        // Prepare the SQL query
        $query = "UPDATE student_user SET pwd = :password WHERE studentnumber = :studentnumber";
        $statement = $pdo->prepare($query);

        // Bind parameters
        $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $statement->bindParam(':studentnumber', $studentNumber, PDO::PARAM_STR);

        // Execute the query
        if ($statement->execute()) {
            echo "Password for student {$studentNumber} has been updated successfully.";
        } else {
            echo "Failed to update password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
