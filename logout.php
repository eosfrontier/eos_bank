<?php
    include('includes/include.php');
    //session_destroy();
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    header(HOME);
?>
