<?php
session_start();
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Homepage</title>
</head>

<body>
<h1 align="center">Welcome <?php echo $_SESSION['uname'] ?></h1>
<p align="center">&nbsp;</p>
<div>
</div>
</body>
</html>
<?php
include("Footer.php");
?>
