<?php
declare(strict_types= 1); 

function is_student_number_wrong(bool|array $result){   //we can accept two types of data here, array and boolean
    if(!$result){
        return true;
    }else{
        return false;
    }

}

function is_password_wrong(string $pwd, string $hashedPwd){   //we can accept two types of data here, array and boolean
    if(password_verify($pwd, $hashedPwd)){
        return false;
    }else{
        return true;
    }

}

function is_login_empty(string $pwd, string $studentnumber){
    if (empty($studentnumber) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}