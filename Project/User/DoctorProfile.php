<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
session_start();
$selQry="select * from tbl_doctor s inner join tbl_department a on a.department_id=s.department_id where doctor_id=".$_GET['doid'];
$res=$conn->query($selQry);
$row=$res->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor Profile</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="325" height="343" border="1">
<tr>
<td colspan="2"><img src="../Asset/Files/Doctor/<?php echo $row['doctor_photo']?>" width='300px'/></td>
</tr>
  <tr>
    <td width="144">Name</td>
    <td width="165"><?php echo $row['doctor_name'] ?></td>
  </tr>
    <tr><td>Department</td>
  <td><?php echo $row['department_name'] ?></td>
  </tr>
    <tr><td>Designation</td>
  <td><?php echo $row['doctor_designation'] ?></td></tr>
  <tr>
   <td colspan="2" align="center">Availability</td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    
    <table>
    <tr>
    <th>Days</th>
    <th>From Time</th>
    <th>To Time</th>
    </tr>
    <?php 
$i=0;
$sel="select * from tbl_availability where doctor_id=".$_GET['doid'];
$res=$conn->query($sel);
while($row=$res->fetch_assoc())
{
	$i++;
	?>
	<tr align="center">
   <?php
		if($row["days"] == 1)
		{
			?>
			<td>Monday</td>
			<?php
		}
		else if($row["days"] == 2)
		{
			?>
			<td>Tuesday</td>
			<?php
		}
		else if($row["days"] == 3)
		{
			?>
			<td>Wednesday</td>
			<?php
		}
		else if($row["days"] == 4)
		{
			?>
			<td>Thursday</td>
			<?php
		}
		else if($row["days"] == 5)
		{
			?>
			<td>Friday</td>
			<?php
		}
		else if($row["days"] == 6)
		{
			?>
			<td>Saturday</td>
			<?php
		}
		else if($row["days"] == 7)
		{
			?>
			<td>Sunday</td>
			<?php
		}
		else
		{
			?>
			<td></td>
			<?php
		}
	 ?>
     <?php
     if($row["status"] == 1)
	 {
		 ?>
		 <td colspan="2" style="color:red">Leave</td>
		 <?php
	 }
	 else
	 {
		 ?>
		 <td><?php echo $row["from_time"] ?></td>
    	 <td><?php echo $row["to_time"] ?></td>
		 <?php
	 }
	 ?>
    </tr>
	<?php
}
?>
    
    </table>
    
    </td>
    </tr>
    <tr>
    <td colspan="2" align="center"><a href="Appointment.php?docid=<?php echo $_GET["doid"]?>">Book Now</a></td>
    </tr>
</table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>