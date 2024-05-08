<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btnsave']))
{
	$date=$_POST['txtdate'];
	$details=$_POST['txtdetail'];
	$title=$_POST['txttitle'];
	$status=$_POST['txtstatus'];
	$insQry="insert into tbl_Complaint(complaint_date,complaint_details,complaint_status,complaint_title) values('".$date."','".$details."','".$status."','".$title."')";
if($conn->query($insQry))
	{	
		?>
<script>
		alert("inserted")
		window.location="Complaint.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Complaint.php"
		</script>
        <?php
	}
		
}
if(isset($_GET['uid']))
{
	$delQry="delete from tbl_complaint where complaint_id=".$_GET['uid'];
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted")
		window.location="Complaint.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Complaint.php"
		</script>
        <?php
	}
}
        
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<body>
<form action="" method="post">
<table width="529" height="480" border="1">
 <tr>
    <td height="84">Complaint date</td>
    <td><input name="txtdate" type="date"/></td>
  </tr>
   <tr>
    <td height="84">Complaint Title</td>
    <td><input name="txttitle" type="text"/></td>
  </tr>
  <tr>
    <td height="121">Complaint Details</td>
    <td><textarea name="txtdetail" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td height="84">Complaint Status</td>
    <td><input name="txtstatus" type="text"/></td>
  </tr>
  <tr>
    <td height="91" colspan="2"><div align="center">
      <input name="btnsave" type="submit" value="Save"/> 
      <input name="btnreset" type="reset" value="Cancel" />
    </div></td>
    </tr>
</table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>