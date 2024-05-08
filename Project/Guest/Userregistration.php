<?php
include("../Asset/Connection/Connection.php");
ob_start();
include("Header.php");
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$place=$_POST['txtplace'];
	$dob=$_POST['txtdob'];
	$contact=$_POST['txtcontact'];
	$email=$_POST['txtemail'];
	$address=$_POST['txtaddress'];
	$gender=$_POST['txtgender'];
	$password=$_POST['txtpass'];
	$insQry="insert into tbl_user(user_name,place_id	,user_gender,user_email,user_address,user_dob,user_contact,user_password) values('".$name."','".$place."','".$gender."','".$email."','".$address."','".$dob."','".$contact."','".$password."')";
	if($conn->query($insQry))
	{	
		?>
<script>
		alert("inserted")
		window.location="Userregistration.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Userregistration.php"
		</script>
        <?php
	}
		
}
if(isset($_GET['uid']))
{
	$delQry="delete from tbl_user where user_id=".$_GET['uid'];
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted")
		window.location="Userregistration.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Userregistration.php"
		</script>
        <?php
	}
}
        
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User registration</title>
</head>
<style>
  .text-box{
		padding: 10px;
		border: 1px black solid;
		border-radius: 10px;
		margin-bottom: 10px;

	}
</style>

<body>
<form action="" method="post">
<table width="445" height="560" cellpadding="10px" align="center">
  <tr>
  <tr>
    <td width="195">Name</td>
    <td width="234"><input name="txtname" class="text-box" type="text"/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="txtemail" class="text-box" type="email"/></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><input name="txtcontact" class="text-box" type="number"/></td>
  </tr>
  <tr>
    <td>Address;</td>
    <td><textarea name="txtaddress" class="text-box" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td>District</td>
    <td><select name="txtdistrict" class="text-box" id="txtdistrict" onChange="getPlace(this.value)"> 
    <option value="">Select District</option>
     <?php 
	$selQryDist="select * from tbl_district";
	$res=$conn->query($selQryDist);
	while($row=$res->fetch_assoc())
	{
		?>
        <option value="<?php echo $row['district_id'] ?>"><?php echo $row ['district_name']?></option>
        <?php
	}
	?></select></td>
  </tr>
  <tr>
    <td>Place</td>
    <td><select name="txtplace" class="text-box" id="txt_place"> 
    <option value="">---Select---</option>
     <?php 
	$selQryPal="select * from tbl_place";
	$a=$conn->query($selQryPal);
	while($b=$a->fetch_assoc())
	{
		?>
        <option value="<?php echo $b['place_id'] ?>"><?php echo $b['place_name']?></option>
        <?php
	}
	?></select></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>
    <input name="txtgender" class="text-box" type="radio" value="Male"/>Male
    <input name="txtgender" class="text-box" type="radio" value="Female"/>Female
    <input name="txtgender" class="text-box" type="radio" value="Other"/>Other
    </td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td><input name="txtdob" class="text-box" type="date"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="txtpass" class="text-box" type="password"/></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input name="txtrepass" class="text-box" type="password" /></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><div align="center">
      <input name="btnsave" class="text-box" type="submit" value="Save"/>
      <input name="btnreset" class="text-box" type="reset" value="Cancel" />
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
ob_flush();
?>