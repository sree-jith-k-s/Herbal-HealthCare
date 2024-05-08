<?php
 include("../Asset/Connection/Connection.php");
 session_start();
 $sel="SELECT * FROM tbl_appointment a INNER JOIN tbl_user u on a.user_id=u.user_id where doctor_id='".$_SESSION['did']."' and appointment_status=1";
 $row=$conn->query($sel);
 $i=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointment Accept List</title>
</head>
<body>
<a href="Homepage.php"><button>Back</button></a>
<table border="1" align="center">
 <tr>
   <td  bgcolor="#66FFCC">Accepted List</td>
   <td><a href="Rejectedappointment.php" ><button>Rejected List</button></a></td>
 </tr>
</table>
 <table border="2" align="center">
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
  while($val=$row->fetch_assoc())
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
     <td><a href="Prescription.php?accept=<?php echo $val['appointment_id']?>">Add Prescription</a></td></tr>
 <?php
  }
 ?>
</body>
</html>