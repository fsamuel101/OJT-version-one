<?php

// this is essential to prevent the user from going here without sending a request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lastname = strtoupper($_POST["lastname"]); // get the lastname and convert to uppercase
    $pwd = $_POST["password"];      // getting the password
    $studentnumber = strtoupper($_POST["studentnumber"]);       // getting the email and convert to uppercase

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php'; // the model always comes first
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS TO PREVENT MESSED UP MOMENTS
        $errors = [];
        if (is_input_empty($lastname, $pwd, $studentnumber)) {
            $errors['empty_input'] = 'Fill in all fields';
        } elseif (is_student_number_used($pdo, $studentnumber)) {
            $errors['student_number_used'] = 'This student number is already taken';
        } elseif (is_student_number_valid($pdo, $studentnumber, $lastname)) {
            $errors['invalid_student_number'] = 'Invalid Student Number';
        }

        // Check if the last name and student number exist in the other_table
        $sql = "SELECT first_name, college FROM student_data WHERE last_name = :lastname AND student_number = :studentnumber";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':studentnumber', $studentnumber);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $errors['invalid_credentials'] = 'Invalid last name or student number';
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../signup.php"); // if there are errors, it will redirect to signup.php
            exit();
        }

        // Assuming create_user function now takes $firstname, $course, and $year as well
        create_user($pdo, $lastname, $pwd, $studentnumber, strtoupper($result['first_name']), $result['college']);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;
        die(); // to terminate the program

    } catch (PDOException $e) {
        die('Query failed' . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die(); // to terminate the program
}
