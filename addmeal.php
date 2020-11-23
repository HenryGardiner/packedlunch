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
    
    <title>Add meal</title>
    
</head>
<body>
<form action="addmealprocess.php" method = "post">
  Name:<input type="text" name="foodname"><br>
  Type:<select name="type">
		<option value=0>Main</option>
		<option value=1>Drink</option>
		<option value=2>Snack</option>
  <input type="submit" value="Add food">
</form>

<br>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM tblfood");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  echo("<br>".$row["foodname"]." - Number available:".$row["numberavailable"]."<br>");
}

?>
</body>
</html>