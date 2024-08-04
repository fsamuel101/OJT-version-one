<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentnumber = $_POST["studentnumber"];
    $pwd = $_POST["password"];

    try {

        require_once("dbh.inc.php");    //connection first
        require_once("login_model.inc.php");    //model
        require_once("login_contr.inc.php");    //controller

        //ERROR HANDLERS
        $errors = [];

        if (is_login_empty($studentnumber, $pwd)) { //check if they have input something
            $errors["empty_input"] = "Fill in all fields ";
        }

        $result = get_user($pdo, $studentnumber); //array or false

        if(is_student_number_wrong($result)){
            $errors["wrong_student_number"] = "Invalid student number";
        }

        if(!is_student_number_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["wrong_student_number"] = "Incorrect password!";
        }
        
        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            exit(); //exit() or die()
        }

        $newSessionId = session_create_id();    
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result['id'];
        $_SESSION['studentnumber'] =htmlspecialchars($result['studentnumber']);

        $_SESSION['last_regeneration'] = time();

        if($result["role"] === 'admin'){
            header('Location: ../admin.php?login=success'); //successfull login will be redirected to welcome.php where there is a landing page
            $pdo = null;
            $statement = null;
        die();
        }

        header('Location: ../welcome.php?login=success'); //successfull login will be redirected to welcome.php where there is a landing page
        $pdo = null;
        $statement = null;
        die();

    } catch (PDOException $e) {
        die ("Query failed". $e->getMessage());
    }
}else{
    header("Location: ../index.php");
    die(); 
}