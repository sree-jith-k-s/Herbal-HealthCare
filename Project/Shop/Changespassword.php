<?php
include("../Asset/Connection/Connection.php");
session_start();
if(isset($_POST['btnsave']))
{
	$selQry = "select * from tbl_shop where shop_id = ".$_SESSION['sid'];
	$result = $conn->query($selQry);
	$row = $result->fetch_assoc();
	
	$my_Password = $row['shop_password'];
	$Cur_password=$_POST['txtcpass'];
	$npassword=$_POST['txtnpass'];
	$rpassword=$_POST['txtrepass'];
	
	if($Cur_password == $my_Password)
	{
		if($npassword == $rpassword)
		{
			$upQry = "update tbl_shop set shop_password = '".$npassword."' where shop_id = ".$_SESSION['sid'];
			if($conn->query($upQry))
					{
				?>
<script>
			alert("Updated")
			window.location="Shopprofile.php"
			</script>
			<?php
			}
		}
		else
		{
			?>
<script>
			alert("Passwords doesn't match")
			window.location="Changespassword.php"
			</script>
			<?php		}
	}
	else
	{
		?>
			<script>
			alert("wrong Current Password")
			window.location="Changespassword.php"
			</script>
			<?php
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Password</title>
</head>

<body>
<h2 align="center">Change Password</h2>
<form action="" method="post"><table width="200" border="1" align="center">
  <tr>
    <td>Current Password</td>
    <td><input name="txtcpass" type="password" /></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td><input name="txtnpass" type="password" /></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input name="txtrepass" type="password" /></td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
        <input name="btnreset" type="button" value="Cancel" />
      </div></td>
    </tr>
</table>

</form>
</body>
</html>