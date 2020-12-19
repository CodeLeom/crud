<?php

$host = "localhost";
$user = "root"; 
$pass = "";
$dbname = "crud";

$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
  die("error in database connection: " . mysqli_connect_error());
}
?>