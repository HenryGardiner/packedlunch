<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT tu.house as hs, dk.foodname as drink, mn.foodname as main, sd.foodname as side, tu.forename as fn, date, meal, orderid, tu.surname as sn
FROM tbluserorder
INNER JOIN tblfood as dk ON dk.foodid = tbluserorder.drinkid
INNER JOIN tblfood as mn ON mn.foodid = tbluserorder.mainid
INNER JOIN tblfood as sd ON sd.foodid = tbluserorder.sideid
INNER JOIN tbluserinfo as tu ON tu.username = tbluserorder.username");
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
</head>
<body>
    <table id="ordertable">
        <thead>
            <th>Date</th>
            <th>Name</th>
            <th>House</th>
            <th>Meal Missed</th>`
            <th>Main</th>
            <th>Drink</th>
            <th>Side</th>
            <th>Complete</th>
        </thead>
        <tbody>
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                print_r($row);
                echo("<input type='hidden' order='".$row['orderid'].">");  //<td><input order='".$row['orderid']."'type='checkbox' value='1'></td>
                echo("<tr><td>".$row['date']."</td><td>".$row['fn']." ".$row['sn']."</td><td>".$row['hs']."</td><td>".$row['meal']."</td><td>".$row['main']."</td><td>".$row['drink']."</td><td>".$row['side']."</td><td><input order='".$row['orderid']."'type='checkbox' value='1'></td></tr>");
            }
            ?>
        </tbody>
    </table>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#ordertable').DataTable();
    });
    </script>
</body>
</html>