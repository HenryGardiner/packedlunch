<?php 
try{
    include_once("connection.php");
    //print_r($_POST);
	header('Location: adduser.php');
	switch($_POST["role"]){
		case "Pupil":
			$role=0;
			break;
		case "Staff":
			$role=1;
			break;
		case "Admin":
			$role=2;
			break;
	}
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
	array_map("htmlspecialchars", $_POST);
	$stmt = $conn->prepare("INSERT INTO tbluserinfo (username,surname,forename,password,house,year,role)VALUES (:username,:surname,:forename,:password,:house,:year,:role)");
	$stmt->bindParam(':username', $_POST['username']);
	$stmt->bindParam(':surname', $_POST['surname']);
	$stmt->bindParam(':forename', $_POST['forename']);
	$stmt->bindParam(':password', $hash);
	$stmt->bindParam(':house', $_POST['house']);
	$stmt->bindParam(':year', $_POST['year']);
	$stmt->bindParam(':role', $role);
	$stmt->execute();
	

	}
catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
$conn=null;

?>