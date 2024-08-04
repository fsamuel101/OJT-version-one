<?php
require_once '../includes/admin_book_management_view.inc.php';
require_once '../includes/config_session.inc.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-panel.css">
    <title>PLSP E-Library</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 300px;
            /* Adjust the width as needed */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button,
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button {
            background-color: red;
            text-decoration: none;
        }

        button:hover {
            background-color: #45a049;
        }

        select {
            width: 150px;
        }
    </style>
</head>

<body>

    <form action="../includes/admin_book_management.inc.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="bookFile">Book to Upload</label>
            <input type="file" name="bookFile" placeholder="Choose book">
        </div>

        <div>
            <label for="bookCover">Book Cover</label>
            <input type="file" name="bookCover">
        </div>

        <div>
            <label for="category">Select a category:</label>
            <select id="category" name="category" required>
                <option value="" disabled selected>Select a category</option>
                <option value="A">General Works</option>
                <option value="B">Philosophy, Psychology, and Religion</option>
                <option value="C">Auxiliary Sciences of History</option>
                <option value="D">General and Old World History</option>
                <option value="E">History of America</option>
                <option value="F">History of United States and British, Dutch, French, and Latin America</option>
                <option value="G">Geography, Anthropology, and Recreation</option>
                <option value="H">Social Sciences</option>
                <option value="J">Political Sciences</option>
                <option value="K">Law</option>
                <option value="L">Education</option>
                <option value="M">Music</option>
                <option value="N">Fine Arts</option>
                <option value="P">Language and Literature</option>
                <option value="Q">Science</option>
                <option value="R">Medicine</option>
                <option value="S">Agriculture</option>
                <option value="T">Technology</option>
                <option value="U">Military Science</option>
                <option value="V">Naval Science</option>
                <option value="Z">Bibliography, Library, Science, and General Information Resources, Fiction</option>
            </select>
        </div>

        <!-- Submit button -->
        <button>Upload</button>
        <a href="../admin_book_management.php" class="button"> Go back</a>
        <?php check_upload_errors()?>
    </form>



</body>

</html>