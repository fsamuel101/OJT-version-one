<?php

declare(strict_types=1);

function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        ?>
        <div style="border: 1px solid #ff0000; background-color: #ff0000; padding: 10px; margin: 10px 0; border-radius: 12px;">
            <?php
            foreach ($errors as $error) {
                ?>
                <p style="color: white; font-weight: bold;"><?= $error ?></p>
            <?php
            }
            ?>
        </div>
    <?php
        unset($_SESSION['errors_signup']);
    } elseif (isset($_GET["signup"]) && $_GET["signup"] == "success") {
    ?>
        <div style="border: 1px solid #008000; background-color: #008000; padding: 10px; margin: 10px 0; border-radius: 12px;">
            <p style="color: white; font-weight: bold;">Signup Success!</p>
        </div>
<?php
    }
}

?>
