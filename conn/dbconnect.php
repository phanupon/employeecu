<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//encoding thai lang unicode 
$conn->set_charset("utf8");	
?>