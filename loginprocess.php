<?php
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tbluserinfo WHERE username =:username ;" );
$stmt->bindParam(':username', $_POST['username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    if($row['password']== $_POST['password']){
        if($row['role']== 2){
            header('Location: adminhome.php');
        }elseif($row['role']== 1){
            header('Location: staffhome.php');
        }else{
            header('Location: pupilhome.php');
        }
    }else{
        header('Location: login.php');
    }
}
$conn=null;
?>