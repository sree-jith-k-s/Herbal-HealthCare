<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Homepage</title>
</head>

<body>
<h1 align="center">Welcome <?php echo $_SESSION['aname'] ?></h1>
<ul style="list-style-type:circle;" >
<li><a href="AdminProfile.php">PROFILE</a></li>
<li><a href="District.php">ADD DISTRICT</a></li>
<li><a href="Place.php">ADD PLACE</a></li>
<li><a href="Category.php">ADD CATEGORY</a></li>
<li><a href="Subcategory.php">ADD SUBCATEGORY</a></li>
<li><a href="ShopVerification.php">VERIFING SHOPS</a></li>
<li><a href="VerifiedShop.php">SHOPS LIST</a></li>
<li><a href="DoctorVerification.php" >VERIFING DOCTORS</a></li>
<li><a href="VerifiedDoctor.php" >DOCTORS LIST</a></li>
</ul>
<div align="center"><a href="../Guest/Login.php" >
  <button>Logout</button>
</a></div>
</body>
</html>