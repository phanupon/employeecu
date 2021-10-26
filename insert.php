<html>
	<title>web site project</title>
	<head>
	<meta charset="UTF-8">
	</head>
<body>
<?php 
include "inc/header.php";
include "conn/dbconnect.php";
$sql = "select employeeID FROM employee ORDER by employeeID DESC Limit 0,1";
//$result = $conn->query($sql);
$result = mysqli_query($conn,$sql);
$resultID = mysqli_fetch_array($result);
?>
<h1>This is a Heading</h1>
[<a href="showdata.php">แสดงข้อมูล</a>]
<p>นี้คือโครงการแรก</p>
<form method="POST" action="upload.php" enctype="multipart/form-data" >
<p>Form input data to employee table</p>
<p>employeeID <input type="text" name="id" value="<?php echo $resultID[0]+1; ?>"></p>
<p>name<input type="text" name="name"></p>
<!-- php เลือก-->
<p>job<select id= job name="job"><?php 
include "conn/dbconnect.php";
$sql = "select * from job";
$result = mysqli_query($conn,$sql);
while($dbarr = mysqli_fetch_array($result)){
	echo "<option value=$dbarr[job_id]>$dbarr[job_name]</option>";
}
?> </select></p>
<p>salary<input type="text" name="salary"></p>
<!-- php  เลือก-->
<p>Department ID<select id="departmentID" name="departmentID"><?php 
include "conn/dbconnect.php";
$sql = "select * from department";
$result = mysqli_query($conn,$sql);
while($dbarr = mysqli_fetch_array($result)){
	echo "<option value=$dbarr[departmentID]>$dbarr[name]</option>";
}
?> </select></p>
รูปพนักงาน:
<input type="file" name="fileToUpload" id="fileToUpload">
  
<input type="submit" name="send" value="Submit">

</form>


</body>
</html>
