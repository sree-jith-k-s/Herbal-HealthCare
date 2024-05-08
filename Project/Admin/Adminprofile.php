<?php
include("../Asset/Connection/Connection.php");
session_start();
$selQry="select * from tbl_admin where admin_id=".$_SESSION['aid'];
$res=$conn->query($selQry);
$row=$res->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My User profile</title>
</head>

<body>
<h1 align="center">MY Profile</h1>
<h3 align="center"><?php echo $_SESSION['aname'] ?></h3>
<form action="" method="post">
<table align="center" width="276" height="102" border="1">
  <tr>
    <td width="153" height="64">Name</td>
    <td width="107"><?php echo $row['admin_name'] ?></td>
  </tr>
   <tr>
    <td width="153" height="64">Email</td>
    <td width="107"><?php echo $row['admin_email'] ?></td>
  </tr>
    <td height="30" colspan="2"><div align="center">
      <?php
 echo '<a href="Changeapassword.php"><input type="button" name="changepass" id="button" value="Change Password"/>
  </a>';
?>
      </div></td>
  </tr>
</table>
</form>
<script src="../Asset/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Asset/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#txt_place").html(html);
		}
	});
}
</script>
</body>
</html>