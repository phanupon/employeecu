<?php
include "inc/header.php";
session_start();
//variable login
$txtUsernamr = $_POST["txtUsername"];
$txtPassword = $_POST["txtPassword"];
include "conn/dbconnect.php";

if(!$conn){
    die ("Failed to connect to MySQL". mysqli_connect_error());
}
$username = mysqli_real_escape_string($conn,$txtUsernamr);
$password = mysqli_real_escape_string($conn,$txtPassword);
$password = md5($txtPassword);
$sql = "SELECT * FROM member WHERE Username = '$username' and Password = '$password';";
//$sql = "SELECT * FROM member WHERE Username='$username' and Password='$password';";
$result = mysqli_query($conn,$sql);
$objResult = mysqli_fetch_array($result);
 if(!$objResult)
{
        echo "Username and Password Incorrect!";
}
else
{	
    $_SESSION["UserID"] = $objResult["UserID"];
        $_SESSION["Status"] = $objResult["Status"];

        session_write_close();
        
        if($objResult["Status"] == "ADMIN")
        {
            header("location:admin_page.php");
        }
        else
        {
            header("location:user_page.php");
        }
}
mysqli_close($conn);
?>