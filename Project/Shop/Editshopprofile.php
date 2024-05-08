<?php
include("../Asset/Connection/Connection.php");
session_start();
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$contact=$_POST['txtcontact'];
	$address=$_POST['txtaddress'];	
	$updQry="UPDATE tbl_shop SET shop_name='".$name."',shop_contact='".$contact."',shop_email='".$email."',shop_address='".$address."' WHERE shop_id=".$_SESSION['sid'];
	if($conn->query($updQry))
		{	
			?>
			<script>
			alert("Updated")
			window.location="Shopprofile.php"
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("failed")
			window.location="Shopprofile.php"
			</script>
			<?php
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My User profile</title>
</head>

<body>
<?php
$selQry="select * from tbl_shop where shop_id=".$_SESSION['sid'];
$res=$conn->query($selQry);
$row=$res->fetch_assoc();
?>
<h1 align="center">Manage Profile</h1>
<form action="" method="post">
<table align="center" width="276" height="343" border="1">
  <tr>
    <td width="153">Name</td>
    <td width="107"><input name="txtname" type="text" value=<?php echo $row['shop_name'] ?>/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="txtemail" type="text" value= <?php echo $row['shop_email']?> /> </td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><input name="txtcontact" type="text" value=<?php echo $row['shop_contact'] ?>/></td>
  </tr>
  <tr>
    <td>Address;</td>
    <td><textarea name=txtaddress><?php echo $row['shop_address'] ?></textarea></td>
  </tr>
<tr>
<td colspan="2"><div align="center">
  <input name="btnsave" type="submit" value="Save" />
  <input name="btnreset" type="reset" value="Cancel" />
</div></td>
</tr>
</table>
</form>
</body>
</html>