<?php 
header('Location: users.php');
try{
    include_once("connection.php");
    print_r($_POST);
	//header('Location: users.php');
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

	array_map("htmlspecialchars", $_POST);
	$stmt = $conn->prepare("INSERT INTO TblUser (UserID,Gender,Surname,Forename,Password,House,Year ,Role)VALUES (null,:gender,:surname,:forename,:password,:house,:year,:role)");
	$stmt->bindParam(':forename', $_POST['forename']);
	$stmt->bindParam(':surname', $_POST['surname']);
	$stmt->bindParam(':house', $_POST['house']);
	$stmt->bindParam(':year', $_POST['year']);
	$stmt->bindParam(':password', $_POST['passwd']);
	$stmt->bindParam(':gender', $_POST['gender']);
	$stmt->bindParam(':role', $role);
	$stmt->execute();
	$conn=null;


catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
$conn=null;
?>