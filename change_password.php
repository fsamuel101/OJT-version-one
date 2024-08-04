<?php

require_once 'includes/change_password_view.inc.php';
require_once 'includes/config_session.inc.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>PLSP- Library</title>
</head>

<body >

    <div class="vh" style="height: 100vh;">

        <div class="green-header">
            <div class="solidgreen1"></div>
            <div>
                <h1 class ="title" > <strong>Forgot/Change Password</strong></h1>
            </div>
            <div class="solidgreen2"></div>
        </div>

        <div class="signup-container">
            <div>
                <h1>Account Information</h1>
                <form action="includes/change_password.inc.php" method="post">
                    <input type="text" name="studentnumber" placeholder="Student Number">
                    <input type="text" name="password" placeholder="Password">
                    <input type="password" name="newPassword" placeholder="Confirm Password">
                    <button class="green-input m2">Confirm</button>
                </form>
            </div>

            <div class="errors">
                <?php
                    change_password_errors();
                ?>
            </div>

        </div>
    </div>

    <div class="solid-green2"></div>
</body>

</html>