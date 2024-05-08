<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
session_start();
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$age=$_POST['txtage'];
	$contact=$_POST['txtcontact'];
	$address=$_POST['txtaddress'];
	$gender=$_POST['txtgender'];
	$reason=$_POST['txtreason'];
	$did=$_GET['docid'];
	$insQry="insert into tbl_appointment(patient_name,patient_gender,patient_address,patient_age,patient_contact,booking_time,doctor_id,reason,user_id) values('".$name."','".$gender."','".$address."','".$age."','".$contact."',NOW(),'".$did."','".$reason."','".$_SESSION['uid']."')";
	if($conn->query($insQry))
	{	
		?>
<script>
		alert("Booked")
		window.location="Searchdoctor.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Searchdoctor.php"
		</script>
        <?php
	}
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>appointment form</title>
</head>

<body>
<h1 align="center">Appointment Form</h1>
<form action="" method="post">
<table align="center" width="412" height="458" border="1">
  <tr>
    <td width="162">Name</td>
    <td width="234"><input name="txtname" type="text"/></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><input name="txtcontact" type="number"/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><textarea name="txtaddress" cols="" rows=""></textarea></td>
  </tr>
  
  <tr>
    <td>Gender</td>
    <td>
    <input name="txtgender" type="radio" value="Male"/>Male
    <input name="txtgender" type="radio" value="Female"/>Female
    <input name="txtgender" type="radio" value="Other"/>Other
    </td>
  </tr>
  <tr>
    <td>Age</td>
    <td><input name="txtage" type="text"/></td>
  </tr>
  <tr>
    <td>Reason</td>
    <td><textarea name="txtreason" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><div align="center">
      <input name="btnsave" type="submit" value="Book"/>
      <input name="btnreset" type="reset" value="Cancel" />
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