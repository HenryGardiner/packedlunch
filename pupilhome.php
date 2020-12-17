<?php
session_start(); 
if (!isset($_SESSION['suser']) or ($_SESSION['srole']!=0))
{   
    header("Location:login.php");
}
//echo($_SESSION['srole']);
//echo($_SESSION['suser']);
//echo gettype($_SESSION['srole']);
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Pupil Home</title>
    
</head>
<body>
<br>
<form action="logout.php" method="get">
    <input type="submit" value="Log Out">
</form>
<br>
<h1>Pupil</h1>
<form action="orders.php" method="get">
    <input type="submit" value="View my orders">
</form>
<br>
<form action="createorder.php" method="get">
    <input type="submit" value="Create an order">
</form>


</body>
</html>