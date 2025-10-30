<?php
    require_once "all.php";
    session_destroy();
    header("Location: ../main/about_us.php");
    exit;
?>