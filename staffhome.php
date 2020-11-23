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
    
    <title>Staff Home</title>
    
</head>
<body>
<h1>Staff</h1>
<form action="updatestock.php" method="get">
    <input type="submit" value="Update stock">
</form>
<br>
<form action="orders.php" method="get">
    <input type="submit" value="View Orders">
</form>


</body>
</html>