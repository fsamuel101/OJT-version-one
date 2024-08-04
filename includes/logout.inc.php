<?php

    session_start();
    session_unset();
    session_destroy();
    // Redirect the user to the index page
    header("Location: ../index.php");
    die();
