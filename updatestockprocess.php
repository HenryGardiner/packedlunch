<?php 
header("Location: updatestock.php");
include_once("connection.php");
unset($_POST['stocktable_length']); //no idea how this got into the array - something to do with the javascript formatting for the table?
//rint_r($_POST);
$keys=array_keys($_POST);//extracts keys as a separate array
foreach($keys as $id){
    
    $stmt = $conn->prepare("UPDATE tblfood SET numberavailable=:numav WHERE foodid=$id");
    $stmt->bindParam(':numav', $_POST[$id]);    
    $stmt->execute();
}
/*
catch(PDOException $e)
{
	echo "error".$e->getMessage();
}
$conn=null;
*/
?>