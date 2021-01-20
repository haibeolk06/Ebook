<?php
    session_start();
    unset($_SESSION["email"]);
    unset($_SESSION["display_name"]);
    unset($_SESSION["role"]);
    header('Location: ../index.php');
?>