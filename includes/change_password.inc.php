<?php

// this is essential to prevent the user to go here without sending a request
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $studentnumber = $_POST["studentnumber"]; //get the lastname
    $password = $_POST["password"];      //getting the password
    $newPassword = $_POST["newPassword"];       //getting the email
 
    try{
        require_once 'dbh.inc.php';
        require_once 'change_password_model.inc.php'; // the model always comes first
        require_once 'change_password_contr.inc.php';

        // ERROR HANDLERS 
        $errors = [];
        if(is_input_empty($studentnumber, $password, $newPassword)){
            $errors['empty_input'] = 'Fill in all fields';
        }else if(differ_password($password, $newPassword)){
            $errors['not_matched'] = 'Password does not matched';
        }else if(!checkUser($pdo, $studentnumber)){
            $errors['does not Exists'] ="Student Number does not exists";
        }
        
        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_changePW"] = $errors;
            header("Location: ../change_password.php"); //if there are errors it will redirect in signup.php
            exit();
            
        }

        updatePassword($pdo, $studentnumber, $newPassword);

        header("Location: ../index.php?signup=success");

        $pdo= null;
        $stmt = null;
        die(); // to terminate the program

    }catch(PDOException $e){
        die('Query failed'. $e->getMessage());
    }

}else{  
    header("Location: ../index.php");
    die(); // to terminate the program
}