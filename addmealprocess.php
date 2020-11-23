<?php 
try{
    include_once("connection.php");
    //print_r($_POST);
	header('Location: addmeal.php');
    $stock = 0;
	array_map("htmlspecialchars", $_POST);
	$stmt = $conn->prepare("INSERT INTO tblfood (foodid,foodname,type,numberavailable)VALUES (NULL,:foodname,:type,:numberavailable)");
	$stmt->bindParam(':foodname', $_POST['foodname']);
	$stmt->bindParam(':type', $_POST['type']);
	$stmt->bindParam(':numberavailable', $stock);
	$stmt->execute();
	$conn=null;

	}
catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
$conn=null;

?>