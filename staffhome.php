<?php
session_start(); 
if (!isset($_SESSION['suser']) or ($_SESSION['srole']!=1))
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
<br>
<form action="logout.php" method="get">
    <input type="submit" value="Log Out">
</form>
<br>
<h1>Staff</h1>
<form action="updatestock.php" method="get">
    <input type="submit" value="Update stock">
</form>
<br>
<form action="orders.php" method="get">
    <input type="submit" value="View Orders">
</form>
<br>
<form action="createorder.php" method="get">
    <input type="submit" value="Create an order">
</form>

</body>
</html>