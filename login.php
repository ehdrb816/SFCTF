<?php   
    session_start();
    include ("./db_connect.php"); 
if($_SESSION['id']==NULL){
?>
<!DOCTYPE html>

   <center>
        <h1> Welcome to Basic Login !! </h1>
            <center>
            <form name="login_input" action="login_action.php" method="post">
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
                <a href='register.php'><input type='button' value='register'></a>
            </center>
            </form>
            <p> We use Prepared statement !! It is perfect !! </p>

    </center>

</html>
<?php
} else{
    $id=$_SESSION['id'];
    echo ("환영합니다. ".$_SESSION['id']."님");
    echo "<br>&nbsp;<a href='logout.php'><input type='button' value='Logout'></a>";
}
?>