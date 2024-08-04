<?php

require_once 'includes/signup_view.inc.php';
require_once 'includes/config_session.inc.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>Signup</title>
</head>

<body>

    <div class="vh" style="height: 100vh;">

        <div class="green-header">
            <div class="solidgreen1"></div>
            <div>
                <h1> <strong>Register</strong></h1>
                <p>Create your SLISian E-Library Hub account here.</p>
            </div>
            <div class="solidgreen2"></div>
        </div>

        <div class="signup-container">
            <div>
                <h1> <strong>Account Information</strong></h1>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="studentnumber" placeholder="Student Number">
                    <input type="text" name="lastname" placeholder="Lastname">
                    <input type="password"  id="myInput" name="password" placeholder="Password"> 
                    <div class="showPassword"> <input type="checkbox" onclick="myFunction()"><p>Show Password</p></div>
                    <button class="green-input">Register</button>
                </form>
            </div>

            <div class="errors">
                <?php
                    check_signup_errors();
                ?>
            </div>

        </div>
    </div>


    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>