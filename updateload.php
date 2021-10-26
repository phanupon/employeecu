<h2>Edit Data Employee Form</h2>
<?php 
$id=$_GET['id'];
$link = mysqli_connect('localhost','root','','employee');
$query = "SELECT * FROM employee WHRER employeeid='$id'";
?>
<form method="GET" action="update.php">
<p>Form input data to employee table</p>
<p>employeeID <input type="text" name="id" value="111"></p>
<p>name<input type="text" name="name"value="phanupon"></p>
<p>job<input type="text" name="job" value="manager"></p>
<p>salary<input type="text" name="salary" value="25000"></p>
<p>Department ID<input type="text" name="departmentid" value="1111"></p>
<input type="submit" name="send" value="Submit">
<input type="reset" name="cancle" value="Reset">

</form>