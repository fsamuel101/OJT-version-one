<?php

require_once '../includes/admin_user_management_view.inc.php';
require_once '../includes/config_session.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin-panel.css">
    <title>PLSP-Library</title>
    <style>
        .col-md-6{
            border: solid 2px green;
            padding: 2em;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="../includes/admin_user_management.inc.php" method="post">
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="studentnumber">Student Number:</label>
                    <input type="text" class="form-control" id="studentnumber" name="studentnumber" required>
                </div>
                <div class="form-group">
                    <label for="college">College:</label>
                    <input type="text" class="form-control" id="college" name="college" required>
                </div>
                <button type="submit" class="btn btn-primary submitt">Submit</button>
                <a href="../admin_user_management.php" class="btn btn-primary submitt goback">Go back</a>
            </form>
             <?php check_create_errors()?>
        </div>
    
           
    
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>