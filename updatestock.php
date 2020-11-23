<form action="updatestockprocess.php" method = "post">
	<select name = "Food">
	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tblfood  ORDER BY food ASC");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["foodid"].'>'.$row["foodname"].': Number currently available: '.$row["numberavailable"].'</option>');
	}
	?>
	</select>
	<br>
	<select name = "subject">
	<?php
	$stmt = $conn->prepare("SELECT * FROM TblSubjects");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["SubjectID"].'>'.$row["Subjectname"].' - '.$row["Teacher"].'</option>');
	}
	?>
	</select>
	<br>
	<input onclick="alertfunction()" type="submit" value="Update stock">
	<script>
	function alertfunction(){
		alert("Updated")
	}
	</script>
</form>
