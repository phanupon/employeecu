
<?php
$id=$_GET["id"];
include "inc/header.php";
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "employee";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
/*
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"; */
include "conn/dbconnect.php";
$sql = "select employee.employeeID, employee.name, employee.job, employee.salary, department.name, department.departmentID, job.job_id, job.job_name, employee.picture from employee, department, job where employee.departmentID = department.departmentID and job.job_id = employee.job and employee.employeeID='$id'";
$result = mysqli_query($conn, $sql);
$dbarr = mysqli_fetch_array($result);
//echo "dbarr0".$dbarr[0]."dbarr1".$dbarr[1]."dbarr2".$dbarr[2];
//picture employee
echo "<img src=uploads/".$dbarr[8].">";
?>
<!-- form uppicture -->
<p>แก้ไขรูปภาพ พนักงาน</p>
<form method="post" enctype="multipart/form-data" action="uploadpicture.php">
<input type="hidden" name="id" value="<?php echo "$id"; ?>">
<input type="file" name="fileToUpload" id="fileToUpload">
<input type=submit name=send value=insert>
</form>	
<!-- end form upload -->
<form method="get" action="updatedata.php?id=$id">
<p>แก้ไขข้อมูลพนักงาน</p>
<p>employeeID <?php echo"$id"; ?></p>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<p>name<input type="text" name="name" value="<?php echo $dbarr[1]; ?>"></p>
<p>job <select name="job_id">
<?php
echo "<option value=$dbarr[2]> $dbarr[7]</option>";
$sql3 = "select * from job;";
$result3 = mysqli_query($conn, $sql3);
while ($dbarr3 = mysqli_fetch_array($result3)){
    echo "<option value=$dbarr3[job_id]>$dbarr3[job_name]</option>";
}
echo "</select> </p>";
?>

<p>salary<input type="text" name="salary" value ="<?php echo $dbarr[3]; ?>"></p>
<p>Department<select name="departmentID">
<?php 
echo "<option value=$dbarr[5]> $dbarr[4]</option>";
$sql2 = "select * from department;";
$result2 = mysqli_query($conn, $sql2);
while ($dbarr = mysqli_fetch_array($result2)){
    echo "<option value=$dbarr[departmentID]>$dbarr[name]</option>";
}
echo "</select> </p>";
?>
<input type="submit" name="send" value="Submit">
<input type="reset" name="cancle" value="Reset">

</form>