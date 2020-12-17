<?php

include_once('connection.php');
session_start(); 
if (!isset($_SESSION['suser']))
{   
    header("Location:login.php");
}

$password="admin";
$hash=password_hash($password,PASSWORD_DEFAULT);
//echo($hash);
//echo($password);
if (password_verify($password,$hash)){
    echo("correct password");
}else{
    echo("incorrect password");
}

?>

<br>
<form action="homebutton.php" method="get">
    <input type="submit" value="Home">
</form>
<br>
<br>
<form action="logout.php" method="get">
    <input type="submit" value="Log Out">
</form>
<br>