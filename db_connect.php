<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pw = "mysql";
    $db = "sfctf";

    $con = new mysqli($host, $user, $pw, $db);

    if ($con->connect_errno) { die('Contact JoDongGyu '.$con->connect_error); } 
?>