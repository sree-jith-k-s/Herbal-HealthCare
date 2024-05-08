<?php
 include("../Asset/Connection/Connection.php");
 if(isset($_GET['accept']))
 {
	 $up="update tbl_doctor set doctor_vstatus=1 where doctor_id=".$_GET['accept'];
	 $conn->query($up);
 }
 if(isset($_GET['reject']))
 {
	  $up="update tbl_doctor set doctor_vstatus=2 where doctor_id=".$_GET['reject'];
	 $conn->query($up);
 }
 
 $sel="select * from tbl_doctor where doctor_vstatus='0'";
 $row=$conn->query($sel);
 $i=0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor Verification</title>
</head>
<body>
<a href="Homepage.php"><button>Back</button></a>
<table border="2" align="center">
 <tr>
  <td>SL.NO</td>
  <td>Doctor name</td>
  <td>Doctor contact</td>
  <td>Doctor address</td>
  <td>Doctor email</td>
  <td>Doctor Proof</td>
  <td>Doctor Photo</td>
  <td colspan="2" align="center">Action</td>
 </tr>
 <?php 
  while($val=$row->fetch_assoc())
  {
	  $i++;
?>
 <tr>
  <td><?php echo $i?></td>
  <td><?php echo $val["doctor_name"]?></td>
  <td><?php echo $val["doctor_contact"]?></td>
  <td><?php echo $val["doctor_address"]?></td>
  <td><?php echo $val["doctor_email"]?></td>
  <td><img src="../Asset/Files/Doctor/<?php echo $val["doctor_proof"]?>" height="50",width="50"/></td>
   <td><img src="../Asset/Files/Doctor/<?php echo $val["doctor_photo"]?>" height="50",width="50"/></td>
   <td><a href="DoctorVerification.php ?accept=<?php echo $val['doctor_id']?>"><button><font color="#00FF00">Accept</font></button></a></td>

 <td><a href="DoctorVerification.php ?reject=<?php echo $val['doctor_id']?>"><button><font color="#FF0000">Reject</font></button></a></td>

 </tr>
 <?php 
  }
?>
</table>
</body>
</html>