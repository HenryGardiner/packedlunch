<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT tu.house as hs, dk.foodname as drink, mn.foodname as main, sd.foodname as side, tu.username, date, meal 
FROM tbluserorder
INNER JOIN tblfood as dk ON dk.foodid = tbluserorder.drinkid
INNER JOIN tblfood as mn ON mn.foodid = tbluserorder.mainid
INNER JOIN tblfood as sd ON sd.foodid = tbluserorder.sideid
INNER JOIN tbluserinfo as tu ON tu.username = tbluserorder.username");
$stmt->execute();

 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
        print_r($row);
		//echo($row['hs'].);
	}
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
    <table id="userTable">
        <thead>
            <th>Username</th>
            <th>Forename</th>
            <th>Surname</th>
            <th>House</th>
        </thead>
        <tbody>
            <?php if(!empty($arr_users)) { ?>
                <?php foreach($arr_users as $user) { ?>
                    <tr>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['forename']; ?></td>
                        <td><?php echo $user['surname']; ?></td>
                        <td><?php echo $user['house']; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
    </script>
</body>
</html>