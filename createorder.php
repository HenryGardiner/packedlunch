<!DOCTYPE html>
<html>
<body>

<form action="createorderprocess.php" method = "post">
	<select name = "username">
	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tbluserinfo WHERE role=0");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["username"].'>'.$row["forename"]." ".$row["surname"].'</option>');
	}
	?>
	</select>
	<br>
    <select name = "mainid">
	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tblfood WHERE type=0");
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
	$stmt = $conn->prepare("SELECT * FROM tblfood WHERE type=2");
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
	$stmt = $conn->prepare("SELECT * FROM tblfood WHERE type=1");
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