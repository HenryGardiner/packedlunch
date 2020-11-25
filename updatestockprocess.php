<?php 
//header("Location: updatestock.php");
include_once("connection.php");
print_r($_POST);
try{
	array_map("htmlspecialchars", $_POST);
	$stmt = $conn->prepare("INSERT INTO tblfood ()VALUES (:userid,:subjectid)");
	$stmt->bindParam(':subjectid', $_POST['subject']);
	$stmt->bindParam(':userid', $_POST['student']);
	$stmt->execute();
	}
catch(PDOException $e)
{
	echo "error".$e->getMessage();
}
$conn=null;
?>