<?php
session_start();
if($_SESSION['UserID'] == "")
{
echo "Please Login!";
header('Location: login.php');
exit();
}

if($_SESSION['Status'] != "USER")
{
    echo "This page for user only!";
    exit();
}	

//mysql_connect("localhost","root","root");
//mysql_select_db("mydatabase");
include "conn/dbconnect.php";
$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
include "inc/header.php";
?>
<html>
<head>
<title>employee data</title>
</head>
<body>
  Welcome to User Page! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["Username"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Name</td>
        <td><?php echo $objResult["Name"];?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="edit_profile.php">Edit</a><br>
  <br>
  <a href="logout.php">Logout</a>
</body>
