<!--
<br>
<form action="homebutton.php" method="get">
    <input type="submit" value="Home">
</form>
<br>-->
<?php
session_start();
if ($_SESSION['srole']==2){
    header('Location: adminhome.php');
}elseif($_SESSION['srole']==1){
    header('Location: staffhome.php');
}else{
    header('Location: pupilhome.php');
}
?>