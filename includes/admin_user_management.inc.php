<?php

// this is essential to prevent the user from going here without sending a request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lastname = strtoupper($_POST["lastname"]); // get the lastname and convert to uppercase
    $firstname = strtoupper($_POST["firstname"]);      // getting the password
    $studentnumber = $_POST["studentnumber"];
    $college = ($_POST["college"]);

           // getting the email and convert to uppercase

    try {
        require_once 'dbh.inc.php';
        require_once 'admin_user_management_model.inc.php'; // the model always comes first
        require_once 'admin_user_management_contr.inc.php';

        // ERROR HANDLERS TO PREVENT MESSED UP MOMENTS
        $errors = [];
        if (!is_input_empty($lastname, $firstname, $college, $studentnumber)) {
            $errors['empty_input'] = 'Fill in all fieldsss';
        }

        // Check if the last name and student number exist in the other_table
        $sql = "SELECT first_name, college FROM student_data WHERE last_name = :lastname AND student_number = :studentnumber";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':studentnumber', $studentnumber);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $errors['invalid_credentials'] = 'Already in the system, please sign up in website';
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_create"] = $errors;
            header("Location: ../userManagement/add_user.php"); // if there are errors, it will redirect to signup.php
            exit();
        }

        // Assuming create_user function now takes $firstname, $course, and $year as well
        create_user_data($pdo, $lastname, $firstname, $studentnumber, $college);

        header("Location: ../userManagement/add_user.php?signup=success");

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
