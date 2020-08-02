<?php   
    include ("./db_connect.php"); 
    if(preg_match('/prob|_|\.|proc|select|like|hex|union/i', $_GET[id])) exit("Get Out!!");
    if(preg_match('/prob|_|\.|proc|select|like|hex|union/i', $_GET[pw])) exit("Get Out!!");

    $query = "select id from users where id='{$_GET[id]}' and pw='{$_GET[pw]}'";
    $result = mysqli_query($con,$query);
    $row=@mysqli_fetch_array($result);
if($row[id]){
    if(preg_match('/\'|\\\/i', $_GET[id])) exit("Get Out!!");
    if(preg_match('/\'|\\\/i', $_GET[pw])) exit("Get Out!!");
    echo ("환영합니다. ".$row[id]."님");
    $_GET[pw] = addslashes($_GET[pw]);
    $query = "select pw from users where id='admin' and pw='{$_GET[pw]}'";
    $result = @mysqli_fetch_array(mysqli_query($con,$query));

    if(($result['pw']) && ($result['pw'] == $_GET[pw])){
        echo("!");
        $fp = fopen("../ctf/flag.txt" , "r");
        echo fgets($fp);
        flcose($fp);
    }

} else{
?>
<!DOCTYPE html>
   <center>
        <h1> Welcome to Secret Login !! </h1>
            <form name="login_input" action="secret.php" method="get">
            <table width=250>
                    <tr>
                        <td>
                            <table><tr>
                                <td width=100>
                                    <input style="border-width:5px; border-color:gray; border-style:double;" type="text" name="id" placeholder="id">
                                    <input style="border-width:5px; border-color:gray; border-style:double;" type="password" name="pw" placeholder="pw">
                                </td>
                                <td width=400>
                                    <input style="border-width:5px; border-color:gray; border-style:double;height:60px;" type="submit" name="login" value="login">
                                </td>
                            </td></table>
                        </td>
                    </tr>
                </table>
        </form><br>
        here is source code : <a href="https://drive.google.com/file/d/118d449C67G5Y79EwcU5FZGEUlLd_jE6p/view?usp=sharing">secret.php</a>
    </center>

</html>
<?php
} 
?>