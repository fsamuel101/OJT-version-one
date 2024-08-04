<?php

declare(strict_types=1);

//student_data => where our students are located
//student_user => where the students who use the website is located

function get_student_number(object $pdo, string $studentnumber){
    $query = "SELECT studentnumber FROM student_user WHERE studentnumber = :studentnumber";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentnumber", $studentnumber);
    $stmt->execute();


    $result = $stmt->fetch(PDO::FETCH_ASSOC);// true or false
    return $result;
}


// this functiong go into the database to check if the combination of student number and last name is good
function get_student_number_lastname(object $pdo, string $studentnumber, string $lastname): bool {
    try {
        $query = "SELECT COUNT(*) as count FROM student_data WHERE student_number = :studentnumber AND last_name = :lastname";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":studentnumber", $studentnumber);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // If count is greater than 0, the combination is valid
        return ($result['count'] > 0);
    } catch (PDOException $e) {
        // Handle database errors (you might want to log or report this)
        throw new Exception('Error checking student number and last name validity: ' . $e->getMessage());
    }
}

function set_user(object $pdo, string $last_name, string $pwd, string $student_number, string $firstname, string $college){
    $query = "INSERT INTO student_user (lastname, pwd, studentnumber, first_name, college) VALUES
    (:lastname, :pwd, :studentnumber, :first_name, :college);";
    $stmt = $pdo->prepare($query);

    $option = [
        'cost' => 5
    ];

    $hashed_password = password_hash($pwd, PASSWORD_BCRYPT, $option);

    $stmt->bindParam(":lastname", $last_name);
    $stmt->bindParam(":pwd", $hashed_password);
    $stmt->bindParam(":studentnumber", $student_number);
    $stmt->bindParam(":first_name", $firstname);
    $stmt->bindParam(":college", $college);
    $stmt->execute();

}

