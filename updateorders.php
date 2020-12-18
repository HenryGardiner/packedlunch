<?php 
//print_r($_POST);
header("Location: orders.php");
include_once("connection.php");
unset($_POST['ordertable_length']); //no idea how this got into the array - something to do with the javascript formatting for the table?
//print_r($_POST);
$keys=array_keys($_POST);//extracts keys as a separate array
$food=array();

foreach($keys as $id){
    if ($_POST[$id]==1){ 
        $stmt = $conn->prepare("SELECT drinkid,sideid,mainid FROM tbluserorder WHERE orderid=$id");  
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $food=$row;
        }
        $stmt2 = $conn->prepare("DELETE FROM tbluserorder WHERE orderid=:id");
        $stmt2->bindParam(':id', $id);    
        $stmt2->execute();
    }
}
//print_r($food);
foreach($food as $food){
    $stmt1 = $conn->prepare("UPDATE tblfood SET numberavailable=numberavailable-1 WHERE foodid=$food");       
    $stmt1->execute();
}
?>