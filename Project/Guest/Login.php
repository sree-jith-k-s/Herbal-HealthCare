<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
session_start();
if(isset($_POST['btnsave']))
{
	$email=$_POST['txtuser'];
	$password=$_POST['txtpass'];
	$selShop="select * from tbl_shop where shop_email='".$email."' and shop_password='".$password."' and shop_vstatus=1";
	$selDoctor="select * from tbl_doctor where doctor_email='".$email."' and doctor_password='".$password."' and doctor_vstatus=1";
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$resAdmin=$conn->query($selAdmin);
	$resUser=$conn->query($selUser);
	$resDoctor=$conn->query($selDoctor);
	$resShop=$conn->query($selShop);
	if($resAdmin->num_rows>0)
	{
		$row=$resAdmin->fetch_assoc();
		$_SESSION['aid']=$row['admin_id'];
		$_SESSION['aname']=$row['admin_name'];
		header('location: ../Admin/Homepage.php');
	}
	else if ($resUser->num_rows>0)
	{
		$row=$resUser->fetch_assoc();
		$_SESSION['uid']=$row['user_id'];
		$_SESSION['uname']=$row['user_name'];
		header('location: ../User/Homepage.php');
	}
	else if ($resDoctor->num_rows>0)
	{
		$row=$resDoctor->fetch_assoc();
		$_SESSION['did']=$row['doctor_id'];
		$_SESSION['dname']=$row['doctor_name'];
		header('location: ../Doctor/Homepage.php');
	}
	else if ($resShop->num_rows>0)
	{
		$row=$resShop->fetch_assoc();
		$_SESSION['sid']=$row['shop_id'];
		$_SESSION['sname']=$row['shop_name'];
		header('location: ../Shop/Homepage.php');
	}
	else
	{
		echo "No user Found";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Login</title>
</head>
<style>
	.text-box{
		padding: 10px;
		border: 1px black solid;
		border-radius: 10px;
		margin-bottom: 10px;

	}
	.log-btn{
		padding: 10px 20px;
		border: 1px black solid;
		border-radius: 10px;
		background-color: transparent;
	}
</style>
<body>
<form action="" method="post">
      <table width="300" cellpadding="10px" align="center">
        <tr>
          <td height="30" colspan="2"><h2><div align="center">SIGN-IN</div></h2></td>
          </tr>
        <tr>
          <td><div align="center">Email-id</div></td>
          <td><div align="center">
            <input name="txtuser" class="text-box" type="text" />          
          </div></td>
        </tr>
        <tr>
          <td><div align="center">Password</div></td>
          <td><div align="center">
            <input name="txtpass" class="text-box" type="password" />
          </div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input name="btnsave" type="submit" class="log-btn" value="Login" />
          </div></td>
        </tr>
      </table>
</form>
</body>
</html>
<br><br><br>
<?php
include("Footer.php");
?>