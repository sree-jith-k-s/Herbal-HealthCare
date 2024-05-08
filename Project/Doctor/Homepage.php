<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor Homepage</title>
</head>
<body>
<h1 align="center">Welcome Doctor</h1>
<h2 align="center"><?php echo $_SESSION['dname'] ?></h2>
<div>
  <td>
  <ul style="list-style-type:circle;" >
<li><a href="DoctorProfile.php">PROFILE</a></li>
<li><a href="Availability.php">AVAILABLITY UPDATE</a></li>
<li><a href="Viewappointment.php">VIEW APPOINTMENTS</a></li>
<li><a href="Acceptedappointment.php">ACCEPTED APPOINTMENTS</a></li>
  </ul></td>
<div align="center"><a href="../Guest/Login.php" >
  <button>Logout</button>
</a></div></div>
</div>
</body>
</html>