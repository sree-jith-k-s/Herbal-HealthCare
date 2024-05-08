<?php
include("../Asset/Connection/Connection.php");
session_start();
$selQry="select * from tbl_shop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id where shop_id=".$_SESSION['sid'];
$res=$conn->query($selQry);
$row=$res->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage shop profile</title>
</head>

<body>
<h1 align="center">Manage Shop</h1>
<h2 align="center"><?php echo $_SESSION['sname'] ?></h2>
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="276" height="343" border="1">
<tr>
<td colspan="2"><img src="../Asset/Files/Shop/<?php echo $row['shop_logo']?>" width='300px'/></td>
</tr>
  <tr>
    <td>Name</td>
    <td><?php echo $row['shop_name'] ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $row['shop_email'] ?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $row['shop_contact'] ?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $row['shop_address'] ?></td>
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
    <td colspan="2"><p align="center">
     <?php
 echo '<a href="Editshopprofile.php"><input type="button" name="btnsave" id="button" value="Manage Profile"/>
  </a>';
  ?>
  &nbsp;&nbsp;&nbsp;
      <?php
 echo '<a href="Changespassword.php"><input type="button" name="changepass" id="button" value="Change Password"/>
  </a>';
?>    </p></td>
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

</html>