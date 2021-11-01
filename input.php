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

//Connect to MySQL
//mysql --host=34.216.108.12 --port=57103
$id = $_GET["id"];
$name = $_GET["name"];
$job = $_GET["job"];
$salary = $_GET["salary"];
$departmentid = $_GET["departmentID"];

// connectdata base


$link = mysqli_connect('localhost','root','','employee');
$query = "use employee";
$result = mysqli_query($link, $query);

$sql = "INSERT INTO `employee` (`employeeID`, `name`, `job`, `salary`, `departmentID`) VALUES('$id','$name','$job','$salary','$departmentid');";
         //INSERT INTO `employee` (`employeeID`, `name`, `job`, `salary`, `departmentID`) VALUES ('2222', 'joy arunrung', 'sale', '25000', '1111');";
$result = mysqli_query($link, $sql);
//mysqli_close($link);
//echo $id;
//echo $name;

if($result){
    echo "insert data sucess";
}else {
    echo "can not insert data to employee";
   
}
echo "<a href=insert.php>กลับหน้าหลัก</a> <a href=showdata.php>แสดงข้อมูล</a>";

?>