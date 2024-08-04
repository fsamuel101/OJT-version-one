<?php

declare(strict_types= 1); //

function get_user(object $pdo, string $studentnumber){
    $query = "SELECT * FROM student_user WHERE studentnumber = :studentnumber;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentnumber", $studentnumber);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $result; //it will return either boolean or array
                    //bc if the student number is present it will output all the data with that student number
                    // if there are no student number like that it will output false

}