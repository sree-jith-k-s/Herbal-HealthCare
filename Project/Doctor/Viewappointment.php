<?php
include("../Asset/Connection/Connection.php");
session_start();
if(isset($_GET['accept']))
 {
	 $up="update tbl_appointment set appointment_status=1 where appointment_id=".$_GET['accept'];
	 echo $up;
	 $conn->query($up);
 }
 if(isset($_GET['reject']))
 {
	  $up="update tbl_appointment set appointment_status=2 where appointment_id=".$_GET['reject'];
	 $conn->query($up);
 }
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointments</title>
</head>

<body><form action="" method="post">
<h1 align="center">Appointments</h1>
<p align="center">&nbsp;</p>
<table width="603" height="92" border="1" align="center">
  <tr>
    <td width="41" height="52">Sl.no</td>
    <td width="59">Patient Name</td>
    <td width="40">Age</td>
    <td width="58">Gender</td>
   <td width="58">Reason</td>
    <td width="66">Booked User</td>
     <td width="69">Booked Date</td>
     <td colspan="2" align="center">Action</td>
    </tr>
  <?php
    $selQry="SELECT * FROM tbl_appointment a INNER JOIN tbl_user u on a.user_id=u.user_id where doctor_id='".$_SESSION['did']."' and appointment_status=0";
    $res=$conn->query($selQry);
    $i=0;
	 while($val=$res->fetch_assoc())
  {
	  $i++;
	  ?>
   <tr>
   <td><?php echo $i?></td>
    <td> <?php echo $val['patient_name'] ?></td>
    <td> <?php echo $val['patient_age'] ?></td>
    <td><?php echo $val['patient_gender'] ?></td>
    <td><?php echo $val['reason'] ?></td>
    <td><?php echo $val['user_name'] ?></td>
     <td><?php echo $val['booking_time'] ?></td>
     <td width="69" align="center"><a href="Viewappointment.php?accept=<?php echo $val['appointment_id']?>">Accept</a></td>
      <td align="center" width="85"><a href="Viewappointment.php?reject=<?php echo $val['appointment_id']?>">Reject</a>
     </td></tr>
  <?php
  }
  ?>
</table>
</form>
</body>
</html>