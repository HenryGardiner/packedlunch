<?php 
header("Location: createorder.php");
include_once("connection.php");
//print_r($_POST);
try{
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO tbluserorder (username,mainid,sideid,drinkid,meal,date)VALUES (:username,:mainid,:sideid,:drinkid,:meal,:date)");
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':mainid', $_POST['mainid']);
    $stmt->bindParam(':sideid', $_POST['sideid']);
    $stmt->bindParam(':drinkid', $_POST['drinkid']);
    $stmt->bindParam(':meal', $_POST['meal']);
    $stmt->bindParam(':date', $_POST['date']);
    $stmt->execute();
    $conn=null;
}

catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;

?>