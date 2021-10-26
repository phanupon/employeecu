<?php
include "inc/header.php";
$email = $_GET["email"];
$psw = $_GET["psw"];
$loginname = $_GET["loginname"];
$name = $_GET["name"];
$pass =md5($psw); //md5 hash function password
include "conn/dbconnect.php";
$selectid = "select UserID FROM member ORDER by UserID DESC Limit 0,1";
$result = mysqli_query($conn,$selectid);
$resultid = mysqli_fetch_array($result);
$userid = $resultid[0]+1;
$status = "USER";
$sql = "INSERT INTO member (userID, Username, Password, Name, email, Status) VALUES ('$userid','$loginname', '$pass', '$name', '$email', '$status')";
$insert = mysqli_query($conn, $sql);
mysqli_close($conn);

// INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `email`, `Status`) VALUES (NULL, 'admin', 'admin1234', 'admin', 'admin@gmail.com', 'USER');
echo "<br>email ".$email."<br>";
echo "loginname ".$loginname."<br>";
echo "name " . $name . "<br>";
echo "$pass";
//echo "ID" . $resultID ."<br>";
header("location:register.php");

?>