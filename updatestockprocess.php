<?php 
header("Location: updatestock.php");
include_once("connection.php");
//print_r($_POST);
try{
	array_map("htmlspecialchars", $_POST);
	$stmt = $conn->prepare("UPDATE tblfood SET numberavailable=:numav WHERE foodid=:id");
	$stmt->bindParam(':numav', $_POST['numberavailable']);
	$stmt->bindParam(':id', $_POST['foodid']);
	$stmt->execute();
	}
catch(PDOException $e)
{
	echo "error".$e->getMessage();
}
$conn=null;
?>