<?php 
//header("Location: orders.php");
include_once("connection.php");
unset($_POST['ordertable_length']); //no idea how this got into the array - something to do with the javascript formatting for the table?
//print_r($_POST);
$keys=array_keys($_POST);//extracts keys as a separate array
foreach($keys as $id){
    if ($_POST[$id]==1){ 
        $stmt = $conn->prepare("SELECT mainid, sideid, drinkid FROM tbluserorder");   
        $stmt->execute();
        print_r($stmt);
        //$stmt1 = $conn->prepare("DELETE FROM tbluserorder WHERE orderid=:id");
        //$stmt1->bindParam(':id', $id);    
        //$stmt1->execute();
    }
}
?>