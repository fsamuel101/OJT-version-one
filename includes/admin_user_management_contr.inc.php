<?php  //IF WE ARE TRYING TO GET DATA FROM THE USER WE USE THIS FILE

declare(strict_types=1);

function is_input_empty( string $lastname, string $firstname, string $studentnumber, string $college){
    if(empty($lastname) || empty($pwd) || empty($studentnumber) || empty($college || empty($firstname))){
        return true;
    }else{
        return false;
    }
}

