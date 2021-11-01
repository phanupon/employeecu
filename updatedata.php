<?php
$name = $_GET["name"];
$jobid = $_GET["job_id"];
$salary = $_GET["salary"];
//$department = $_GET["department"];
$departmentID = $_GET["departmentID"];
$employeeID = $_GET["id"];
$conn = mysqli_connect('localhost','root','','employee');
$query = "update employee set name='$name', job='$jobid', salary='$salary', departmentID='$departmentID' where employeeID='$employeeID'";

$result = mysqli_query($conn, $query);

if($result){
 echo " Update data success <a href=showdata.php>Show data</a>";
 header('Location: showdata.php');
}else{
 echo " can't Update data";
}
?>