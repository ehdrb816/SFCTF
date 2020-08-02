<?php
    session_start();

    if($_SESSION['id']!=null){
    session_destroy();
    }
    echo '<script> alert("Logout Success!!"); location.href="./login.php";</script>';
?>