<html>
    <title>Show data</title>
    <head><meta charset="utf-8"></head>
<body>

<?php
session_start();
if($_SESSION['UserID'] == "")
{
echo "Please Login!";
header('Location: login.php');
exit();
}
if($_SESSION['Status'] != "ADMIN")
{
    echo "This page for Admin only!";
    exit();
}	

//connec data base 
//$link = mysqli_connect('localhost','root','','employee');
include "inc/header.php";
include "conn/dbconnect.php";
$sql1 = 'SELECT * FROM employee';
$result = mysqli_query($conn,$sql1);
echo "<h2>Show Employee data</h2>";
echo "<a href=insert.php>เพิ่มข้อมูล</a>";
/*
echo "<table border=1>";
echo "<tr><td>employeeID</td><td>name</td><td>jobID</td><td>Salary</td><td>departmentID</td><td>Edit</td></tr>";
while($dbarr = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>$dbarr[employeeID]</td>";
    echo "<td>$dbarr[name]</td>";
    echo "<td>$dbarr[job]</td>";
    echo "<td>$dbarr[salary]</td>";
    echo "<td>$dbarr[departmentID]</td>";
    echo "<td><a href='update.php?id=$dbarr[employeeID]'>edit</a> <a href='delete.php?id=$dbarr[employeeID]'>delete</a></td>";
    echo "</tr>";
}
echo "</table>"; */
?>
<?php 
include "conn/dbconnect.php";
//$conn = mysqli_connect('localhost','root','','employee');
$sql2 = "select employee.employeeID, employee.name, employee.salary, job.job_name, department.name, employee.picture FROM employee LEFT JOIN department ON employee.departmentID = department.departmentID LEFT JOIN job ON employee.job = job.job_id";
$result2 = mysqli_query($conn, $sql2);
echo "<br><table border=1>";
echo "<tr><td>picture</td><td>employeeID</td><td>name</td><td>Salary</td><td>job</td><td>department</td><td>Edit</td></tr>";
while($dbarr2 = mysqli_fetch_array($result2))
{
    echo "<tr>";
    echo "<td><img size style=width:50px;height:50px src=uploads/".$dbarr2[5]." "."alt="."".$dbarr2[1].""."></td>";
    echo "<td>$dbarr2[0]</td>";
    echo "<td>$dbarr2[1]</td>";
    echo "<td>".number_format($dbarr2[2],2)."</td>";
    echo "<td>$dbarr2[3]</td>";
    echo "<td>$dbarr2[4]</td>";
    echo "<td><a href='update.php?id=$dbarr2[employeeID]'>edit</a> <a href='delete.php?id=$dbarr2[employeeID]'>delete</a></td>";
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>