<?php

// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header("Location: index.php");
    exit();
}
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/903a3ecc19.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin-panel.css">
    <link rel="stylesheet" href="css/library.css">
    <title>PLSP Library</title>
</head>

<body>
    <header class="green-header">
        <div class="solidgreen1"></div>

        <div class="admin-title">

            <div class="hamburger" onclick="toggleMenu()" id="hamburger">
                <div id="hamburger1" onclick="toggleMenu(); event.stopPropagation();"></div>
                <div id="hamburger2" onclick="toggleMenu(); event.stopPropagation();"></div>
                <div id="hamburger3" onclick="toggleMenu(); event.stopPropagation();"></div>
            </div>
            <div class="dropdown-menu" id="dropdownMenu">
                <form action="includes/logout.inc.php" class="hamb">
                    <button class="hover">Log out</button>
                    <a href="change_password.php" class="hover">Change Password</a>
                    <a href="welcome.php" class="hover">See website</a>
                    <!-- <a href="admin.php" class="hover">Admin Panel</a> -->
                </form>
            </div>

            <div>
                <a href="admin.php" class="h">
                    <h1><strong>PLSP Library</strong></h1>
                </a>
                <p>Admin Interface</p>
            </div>


        </div>
        <div class="solidgreen2"></div>
    </header>


    <section class="container">
        <div class="row align-items-center">
            <div class="col xl">
                <a href="admin_book_management.php">
                    <img src="images/19.png" alt="">
                </a>
            </div>
            <div class="col">
                <a href="admin_user_management.php">
                    <img src="images/20.png" alt="">
                </a>
            </div>
        </div>
    </section>

    <script>
        function toggleMenu() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            var hamburger = document.getElementById("hamburger");
            if (!event.target.closest('.hamburger') && !event.target.closest('.dropdown-menu')) {
                var dropdownMenu = document.getElementById("dropdownMenu");
                dropdownMenu.classList.remove('show');
            }
        }
    </script>
</body>

</html>