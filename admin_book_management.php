<?php

require_once 'includes/config_session.inc.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/admin_book_management_model.inc.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/903a3ecc19.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/admin-book.css">
    <link rel="stylesheet" href="css/library.css">
    <title>PLSP-Library</title>
</head>

<body>
    <header class="green-header">
        <div class="solidgreen1"></div>

        <div class="admin-title">
            <div class="hamburger" onclick="toggleMenu()" id="hamburger" style="opacity: 0;">
                <div onclick="toggleMenu()"></div>
                <div onclick="toggleMenu()"></div>
                <div onclick="toggleMenu()"></div>
            </div>

            <div class="dropdown-menu" id="dropdownMenu" hidden="hidden">
                <form action="includes/logout.inc.php" class="hamb">
                    <button class="hover">Log out</button>
                    <a href="change_password.php" class="hover">Change Password</a>
                </form>
            </div>

            <div>
                <h1><strong>Book Management</strong></h1>
                <a href="admin.php" class="h"><p>Admin Interface</p></a>
            </div>


        </div>
        <div class="solidgreen2"></div>
    </header>
    <div class="container my-5">
        <h2 class="green">List of books</h2>
        <a class="btn btn-outline-success" href="bookManagement/upload.php" role="button">Add Books</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Bookname</th>
                    <th>CoverPhoto</th>
                    <th>Size</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php get_book($pdo)?>
            </tbody>
        </table>
    </div>

    <script>
        function toggleMenu() {
            var hamburger = document.getElementById("hamburger");
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.hamburger')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                var hamburger = document.getElementById("hamburger");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                        hamburger.classList.remove('hide');
                    }
                }
            }
        }
    </script>
</body>

</html>