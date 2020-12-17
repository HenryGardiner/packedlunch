<?php
session_start(); 
if (!isset($_SESSION['suser']) or ($_SESSION['srole']==0))
{   
    header("Location:login.php");
}
?>
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
<form action="updatestockprocess.php" method = "post">
	<select name = "foodid">
	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tblfood");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["foodid"].'>'.$row["foodname"].'</option>');
	}
	?>
	</select>
	<br>
	New stock number:<input type="text" name="numberavailable">
	<br>
	<input onclick="alertfunction()" type="submit" value="Update stock">
	<script>
	function alertfunction(){
		alert("Updated")
	}
	</script>
</form>
