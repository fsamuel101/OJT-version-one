<?php

ini_set("session.use_only_cookies",1); // this is mandatory to prevent the hacker to access your data in browser
ini_set("session.use_strict_mode",1);

session_set_cookie_params([
    'lifetime' => 1800, //the duration of the session cookie in seconds -30 minutes here
    'domain'=> 'localhost',
    'path' => '/',          // the '/' means it is available in the entire domain
    'secure'=> 'true',
    'httponly'=> 'true',
]);

session_start();

if(isset($_SESSION['user_id'])){
    if (!isset($_SESSION['last_generation'])) {
        regenerate_session_id_loggedin();
    }else{
        $interval = 60 * 30;
        if(time() - $_SESSION["last_generation"] >= $interval){
            regenerate_session_id_loggedin();
    }
    }

}else{
    if (!isset($_SESSION['last_generation'])) {
    regenerate_session();
    }else{
    $interval = 60 * 30;
    if(time() - $_SESSION["last_generation"] >= $interval){
        regenerate_session();
    }
    }
}



function regenerate_session(){
    session_regenerate_id(true);
    $_SESSION["last_generation"] = time();
}

function regenerate_session_id_loggedin(){
    session_regenerate_id(true);

    $userId = $_SESSION['user_id'];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);
    
    $_SESSION["last_generation"] = time();
}