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
    <title>Plsp Library</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/errors.css">
    <link rel="stylesheet" href="css/welcomepage.css">
</head>

<body>
    <?php include('header-main.php')?>
    <div class="solidgreen2"></div>

    <!-- <form action="includes/logout.inc.php">
        <button>Log out</button>
    </form> -->

    <section class="landingpage">
        <div class="history">
            <p>
                SLIS was founded by 3J Foundation in 2010 to address the need of San Pablo City for quality and
                progressive Preschool, Elementary, and High School programs. It is the 3J Group of Companies' way of
                giving back to the community for over 30 years of good business.
            </p>
        </div>
        <div class="welcome-message">
            <h1>Welcome SLISians</h1>
            <a href="library.php?category=all" class="button-41"> <p>Click here to</p> <p>browse all books</p>
                  </a>
        </div>
    </section>

    <?php include('footer.php')?>
    
</body>

</html>