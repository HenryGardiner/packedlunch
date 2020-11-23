<?php
session_start(); 
if (!isset($_SESSION['suser']))
{   
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Admin Home</title>
    
</head>
<body>
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