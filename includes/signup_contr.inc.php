<?php  //IF WE ARE TRYING TO GET DATA FROM THE USER WE USE THIS FILE

declare(strict_types=1);

function is_input_empty( string $lastname, string $pwd, string $studentnumber){
    if(empty($lastname) || empty($pwd) || empty($studentnumber)){
        return true;
    }else{
        return false;
    }
}

function is_student_number_used( object $pdo, string $student_number) {
    if(get_student_number($pdo, $student_number)){
        return true;
    }else{
        return false;
    }
}

function is_student_number_valid( object $pdo, string $student_number, string $last_name) {
    if(!get_student_number_lastname($pdo, $student_number, $last_name)){
        return true;
    }else{
        return false;}

}

function create_user(object $pdo, string $last_name, string $pwd, string $student_number, string $firstname, string $college  ) {
    set_user($pdo, $last_name, $pwd, $student_number, $firstname, $college);
}
