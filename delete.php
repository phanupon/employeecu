<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";
$id =$_GET['id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$sql = "delete from employee where employeeID = '$id' ";
$result = mysqli_query($conn, $sql);
if($result){
echo "Delete data success <a href=showdata.php>Showdata</a>";
}else{
    echo "Can't delete data <a href=showdata.php>Showdata</a>";
} 
?>
