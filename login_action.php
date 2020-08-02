<?php
    include ("./db_connect.php");
    session_start();

    if($_POST["id"]==""||$_POST["pw"]==""){
        echo '<script> alert("input id or pw"); history.back();</script>';
    }

    $query="select * from users where id=?";
    $stmt = mysqli_prepare($con,$query);
    $bind = mysqli_stmt_bind_param($stmt, "s", $_POST["id"]);
    $exec = mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    if($row['pw']!=$_POST["pw"]){
        echo '<script> alert("Invaild id or pw"); history.back();</script>';
    }
    else if($row['pw']==$_POST["pw"]&&$row['id']==$_POST["id"]){
        $_SESSION[id]=$row['id'];
        echo '<script> alert("Login Success!!"); location.href="./login.php";</script>';
    }
    
?>