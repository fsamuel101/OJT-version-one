<?php

declare(strict_types=1);

function check_upload_errors()
{
    if (isset($_SESSION['errors_upload'])) {
        $errors = $_SESSION['errors_upload'];
        ?>
        <div style="border: 1px solid #ff0000; background-color: #ff0000; padding: 5px; margin: 10px 0; border-radius: 12px;">
            <?php
            foreach ($errors as $error) {
                ?>
                <p style="color: white; font-weight: bold;"><?= $error ?></p>
            <?php
            }
            ?>
        </div>
    <?php
        unset($_SESSION['errors_upload']);
    } elseif (isset($_GET["upload"]) && $_GET["upload"] == "success") {
    ?>
        <div style="border: 1px solid #008000; background-color: #008000; padding: 10px; margin: 10px 0; border-radius: 12px;">
            <p style="color: white; font-weight: bold;">Succesfully added to the system</p>
        </div>
<?php
    }
}
?>
