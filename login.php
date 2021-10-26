<html>
<head>
<title>login Form</title>
<link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <?php include "inc/header.php"; ?>
<form name="form1" method="post" action="check_login.php">

<label>Username</label>
<input name="txtUsername" type="text" id="txtUsername">
<label>Password</label>

<input name="txtPassword" type="password" id="txtPassword">

<hr>
<button type="submit" class="registerbtn" >เข้าสู่ระบบ</button>
</form>
</body>
</html>