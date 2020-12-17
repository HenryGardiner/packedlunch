<?php
session_start(); 
if (!isset($_SESSION['suser']) or ($_SESSION['srole']==0))
{   
    header("Location:login.php");
}
include_once('connection.php');
$stmt = $conn->prepare("SELECT foodid as id, type, foodname, numberavailable as stock FROM tblfood");
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Table</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
</head>
<body>
<br>
<form action="logout.php" method="get">
    <input type="submit" value="Log Out">
</form>
<br>
<br>
<form action="homebutton.php" method="get">
    <input type="submit" value="Home">
</form>
<br>
<form  action="updatestockprocess.php" method="post">
	<table id="stocktable">
        <thead>
            <th>Name</th>
            <th>Type</th>
            <th>Stock</th>
        </thead>
        <tbody>
            <?php
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//<td><input newstock='".$row['stock']."'type='text' name='newstock' value ></td>
				if($row['type']==0){
					$type="Main";
				}elseif($row['type']==1){
					$type="Drink";
				}else{
					$type="Side";
				}
				//echo("<input type='hidden' name='foodid' value='".$row['id']."'>");
				echo("<tr><td>".$row['foodname']."</td><td>".$type."</td><td><input name='".$row['id']."' type='text' value='".$row['stock']."'></td></tr>");
			}	
            ?>
        </tbody>
		
    </table>
	<input type="submit" value="Update Stock">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#stocktable').DataTable();
    });
    </script>
	
</form>
</body>
</html> 
