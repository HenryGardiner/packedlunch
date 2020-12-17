<?php
session_start(); 
session_destroy();
session_start();
//echo($_SESSION['srole']);
//echo($_SESSION['suser']);

print_r($_POST);
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tbluserinfo WHERE username =:username ;" );
$stmt->bindParam(':username', $_POST['username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    
    $hash=$row['password'];
    $attempt=$_POST['password'];
    //echo($hash);
    //echo($attempt);
    if (password_verify($attempt,$hash)) {
        $_SESSION['srole']=$row['role'];
        $_SESSION['suser']=$row['username'];
        if($row['role']== 2){
            header('Location: adminhome.php');
        }elseif($row['role']== 1){
            header('Location: staffhome.php');
        }else{
            header('Location: pupilhome.php');
        }
    }else{
        echo('incorrect password ');
        //header('Location: login.php');
    }
}
if(empty($row) and !isset($_SESSION['suser'])){
    echo('incorrect username ');
    //header('Location: login.php');
}
//header("Location: login.php");

$conn=null;
?>