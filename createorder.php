<?php
session_start(); 
if (!isset($_SESSION['suser']))
{   
    header("Location:login.php");
}
//echo($_SESSION['suser']);
?>
<!DOCTYPE html>
<html>
<body>
<br>
<form action="logout.php" method="get">
    <input type="submit" value="Log Out">
</form>
<br>
<br>
<form action="homebutton.php" method="get">
    <input type="submit" value="Home">
</form>
<br>
<h1>Create an order!</h1>
<form action="createorderprocess.php" method = "post">
	<select name = "username">
	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tbluserinfo");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		if($row["username"]==$_SESSION['suser']){
			echo('<option value='.$row["username"].'>'.$row["forename"]." ".$row["surname"].'</option>');
		}
	}
	?>
	</select>
	<br>
    <select name = "mainid">
	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tblfood WHERE type=0 AND numberavailable>0");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["foodid"].'>'.$row["foodname"].'</option>');
	}
	?>
	</select>
	<br>
    <select name = "sideid">
	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tblfood WHERE type=2 AND numberavailable>0");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["foodid"].'>'.$row["foodname"].'</option>');
	}
	?>
	</select>
	<br>
    <select name = "drinkid">
	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tblfood WHERE type=1 AND numberavailable>0");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["foodid"].'>'.$row["foodname"].'</option>');
	}
	?>
	</select>
	<br>
    <select name="meal">
		<option value="B">Breakfast</option>
		<option value="L">Lunch</option>
		<option value="D">Dinner</option>
	</select>
	
	<br>

      <input type="date" id="date" name="date" min=<?php echo date('Y-m-d', strtotime("+1 day"));?> max=<?php echo date('Y-m-d', strtotime("+15 day"));?>>
	
	<br>
	<input type="submit" value="Order">
</form>

</body>
</html>