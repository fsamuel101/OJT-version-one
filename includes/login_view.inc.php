<?php

declare(strict_types=1);

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION['errors_login'];
?>
        <style>
            .error-container {
                border: 1px solid #ff0000;
                background-color: #ff0000;
                padding: 10px;
                margin: 10px 0;
                border-radius: 12px;
            }

            .form-error {
                color: white;
                font-weight: bold;
            }
        </style>

        <div class="error-container">
<?php
        foreach ($errors as $error) {
?>
            <p class="form-error"><?= $error ?></p>
<?php
        }
?>
        </div>
<?php
        unset($_SESSION['errors_login']);
    }
}

?>
