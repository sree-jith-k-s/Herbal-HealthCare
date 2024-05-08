<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
session_start();
$selQry="select * from tbl_user s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id where user_id=".$_SESSION['uid'];
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
<h3 align="center"><?php echo $_SESSION['uname'] ?></h3>
<form action="" method="post">
<table align="center" width="276" height="343" border="1">
  <tr>
    <td width="153">Name</td>
    <td width="107"><?php echo $row['user_name'] ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $row['user_email'] ?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $row['user_contact'] ?></td>
  </tr>
  <tr>
    <td>Address;</td>
    <td><?php echo $row['user_address'] ?></td>
  </tr>
  <tr>
    <td>District</td>
    <td><?php echo $row['district_name'] ?></td>
  </tr>
  <tr>
    <td>Place</td>
    <td><?php echo $row['place_name'] ?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?php echo $row['user_gender'] ?></td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td><?php echo $row['user_dob'] ?></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><div align="center">
      <?php
 echo '<a href="Edituserprofile.php"><input type="button" name="btnsave" id="button" value="Manage Profile"/>
  </a>';
  ?>
  &nbsp;&nbsp;&nbsp;
      <?php
 echo '<a href="Changeupassword.php"><input type="button" name="changepass" id="button" value="Change Password"/>
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
<?php
include("Footer.php");
?>