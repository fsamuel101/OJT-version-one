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

    <!-- <form action="includes/logout.inc.php">
        <button>Log out</button>
    </form> -->

    <section class="landingpage">
        <div class="history">
            <p>
                Dalubhasaan ng Lunsod ng San Pablo (DLSP) was
                established on March 19, 1997, through the initiative of
                Hon. Mayor Vicente B. Amante. It was envisioned to be a
                school for deserving but indigent children, offering college
                education at very minimal expense.
            </p>
            <p>
                On June 15, 1997, DLSP was granted a permit to operate
                by the Commission on Higher Education, and it began
                holding classes on July 2, 1997. The initial course
                offerings were Bachelor of Secondary Education, Bachelor
                of Arts and Bachelor of Science in Business
                Administration, Bachelor of Computer Science, Associate
                in Computer Science, and Computer Technology.
            </p>
            <p>
                DLSP is administered by a Board of Trustees, which
                makes recommendations on college policies to the
                Sangguniang Panlunsod.
            </p>
            <p>
                DLSP was established to provide affordable and
                accessible college education to the youth of San Pablo
                and nearby towns and provinces. It is a testament to the
                city government's commitment to education and its belief
                that education is the key to a better future for all.
            </p>
        </div>
        <div class= "welcome-message">
            <h1>Welcome PLSPians</h1>
            <a href="library.php?category=all" class = "button-41">Browse Books</a>
        </div>
    </section>
    <?php include('footer.php')?>
</body>

</html>