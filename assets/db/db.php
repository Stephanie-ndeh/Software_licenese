<?php
$dbname = "localhost";
$username = "root";
$password = "";
$db = "softwarelicense";

$conn = mysqli_connect($dbname, $username, $password, $db);

if(!$conn){
    echo 'failed to connect';
}

?>