
<?php
$servername = 'localhost';
$username = 'root';
$password= '';
//note no Database mentioned here!
try {
 $conn = new PDO("mysql:host=$servername", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "CREATE DATABASE IF NOT EXISTS packedlunches";
 $conn->exec($sql);
 //next 3 lines optional only needed really if you want to go on an do more SQL here!
 $sql = "USE packedlunches";
 $conn->exec($sql);
 echo "DB created successfully";
}
catch(PDOException $e)
{
 echo $sql . "<br>" . $e->getMessage();
}

include_once("connection.php");

$stmt = $conn->prepare("DROP TABLE IF EXISTS tbluserinfo;
CREATE TABLE tbluserinfo 
(username VARCHAR(20) PRIMARY KEY,
surname VARCHAR(20) NOT NULL,
forename VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL,
house VARCHAR(20) NOT NULL,
year INT(2) NOT NULL,
role TINYINT(1))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblfood;
CREATE TABLE tblfood 
(foodid INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
type INT(1) NOT NULL,
foodname VARCHAR(40) NOT NULL,
numberavailable INT(4) NOT NULL)");
$stmt->execute();
$stmt ->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS tbluserorder;
CREATE TABLE tbluserorder 
(username VARCHAR(20),
mainid INT(4),
sideid INT(4),
drinkid INT(4),
meal CHAR(1),
date DATE,
PRIMARY KEY(username,meal,date))");
$stmt->execute();
$stmt->closeCursor();


$stmt = $conn->prepare("INSERT INTO tbluserinfo(username,surname,forename,password,house,year,role)VALUES 
    ('admin.a','admin','admin','admin','staff',0,2)
    ");
$stmt->execute();
$stmt->closeCursor();
?>
