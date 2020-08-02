<?php
    include ("./db_connect.php");
    session_start();

    if($_POST["id"]==""||$_POST["pw"]==""||$_POST["name"]==""){
        echo '<script> alert("input id or pw or name"); history.back();</script>';
    }

    $query="select * from users where id=?";
    $stmt = mysqli_prepare($con,$query);
    $bind = mysqli_stmt_bind_param($stmt, "s", $_POST["id"]);
    $exec = mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    if($row['id']){
        echo '<script> alert("중복된 ID 입니다."); history.back();</script>';
    }
    else{
        $query="INSERT INTO users(id, name, pw) VALUES(?, ?, ?)";
        $stmt = mysqli_prepare($con,$query);
        $bind = mysqli_stmt_bind_param($stmt, "sss", $_POST["id"], $_POST["name"], $_POST["pw"]);
        $exec = mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        echo '<script> alert("register Success!!"); location.href="./login.php";</script>';
    }
    
?>