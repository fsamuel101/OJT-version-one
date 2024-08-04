<?php
declare(strict_types=1);

function is_input_empty(string $studentnumber, string $password, string $newPassword){
    return empty($studentnumber) || empty($password) || empty($newPassword);
}

function differ_password(string $password, string $newPassword){
    return $password !== $newPassword;
}
