
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

$stmt = $conn->prepare("DROP TABLE IF EXISTS userinfo;
CREATE TABLE userinfo 
(username VARCHAR(20) PRIMARY KEY,
surname VARCHAR(20) NOT NULL,
forename VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL,
house VARCHAR(20) NOT NULL,
year INT(2) NOT NULL,
role TINYINT(1))");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS meal;
CREATE TABLE meal 
(mealid INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
main VARCHAR(20) NOT NULL,
side VARCHAR(20) NOT NULL,
drink VARCHAR(20) NOT NULL)");
$stmt->execute();
$stmt ->closeCursor();*/

$stmt = $conn->prepare("DROP TABLE IF EXISTS userorder;
CREATE TABLE userorder 
(username VARCHAR(20),
mealid INT(4),
meal CHAR(1),
date DATE,
PRIMARY KEY(username,meal,date))");
$stmt->execute();
$stmt->closeCursor();


?>
