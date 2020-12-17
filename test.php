<?php
$password="admin";
$hash=password_hash($password,PASSWORD_DEFAULT);
//echo($hash);
//echo($password);
if (password_verify($password,$hash)){
    echo("correct password");
}else{
    echo("incorrect password");
}

?>