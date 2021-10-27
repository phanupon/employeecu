<?php 
include "inc/header.php";
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
if(empty($_GET['search_by'])){ ?>
<h2>Search Employee </h2>
    <form method="get" action="<?php echo($_SERVER["PHP_SELF"]); ?>">
    <label>Serach by</label>
    <select name=search_by>
        <option value=1>All employee data</option>
        <option value=2>employeeID</option>
        <option value=3>Name</option>
        <option value=4>jobID</option>
        <option value=5>departmentID</option>
    </select>
    <input type="text" name="key"><br>
    <input type="Submit" name="send" value="search">
    <form>
    <?php
}else{
echo "Progeam search Employee";
echo "<form method=get action=search.php>";
echo "<label>Serach by</label>
    <select name=search_by>
        <option value=1>All employee data</option>
        <option value=2>employeeID</option>
        <option value=3>Name</option>
        <option value=4>jobID</option>
        <option value=5>departmentID</option>
    </select>
    <input type=text name=key><br>
    <input type=Submit name=send value=search>
    <form>";
$search_by = $_GET['search_by'];
$key = $_GET['key'];
$conn = mysqli_connect('localhost','root','','employee');
if($search_by==1){
    $sql = "select * from employee";
}elseif($search_by==2){
    $sql = "select * from employee where employeeID=$key";
}elseif($search_by==3){
    $sql = "select * from employee where name Like '%$key%'";
}elseif($search_by==4){
    $sql = "select * from employee where job=$key";
}elseif($search_by==5){
    $sql = "select * from employee where departmentID=$key";
}
$result = mysqli_query($conn,$sql);
while($dbarr=mysqli_fetch_array($result))
{ 
    echo "<br>"." employeeid: ". $dbarr["0"]. " ชื่อ: ".$dbarr["1"]." job: ".$dbarr["2"]." salary: ".$dbarr["3"]." DepartmentID: ".$dbarr["4"]."<a href=update.php?id=$dbarr[0]>Edit</a>";

}

}
?>