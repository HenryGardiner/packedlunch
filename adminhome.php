<?php
session_start(); 
if (!isset($_SESSION['suser']) or $_SESSION['srole']!=2)
{   
    header("Location:login.php");
}
//echo($_SESSION['srole']);
//echo($_SESSION['suser']);
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Admin Home</title>
    
</head>
<body>
<br>
<form action="logout.php" method="get">
    <input type="submit" value="Log Out">
</form>
<br>
<h1>Admin</h1>
<form action="adduser.php" method="get">
    <input type="submit" value="Add a user">
</form>
<br>
<form action="addmeal.php" method="get">
    <input type="submit" value="Add food">
</form>
<br>
<form action="orders.php" method="get">
    <input type="submit" value="View orders">
</form>
</body>
</html