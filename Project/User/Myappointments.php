<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointments</title>
</head>

<body><form action="" method="post">
<h1 align="center">My Appointments</h1>
<p align="center">&nbsp;</p>
<table width="603" height="92" border="1" align="center">
  <tr>
    <td width="41" height="52">Sl.no</td>
    <td width="59">Patient Name</td>
    <td width="40">Age</td>
    <td width="58">Gender</td>
   <td width="58">Reason</td>
    <td width="66">Doctor Name</td>
     <td width="69">Booked Date</td>
     <td align="center">Status</td>
    </tr>
  <?php
    $selQry="SELECT * FROM tbl_appointment a INNER JOIN tbl_doctor u on a.doctor_id=u.doctor_id where user_id='".$_SESSION['uid']."'";
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
    <td><?php echo $val['doctor_name'] ?></td>
     <td><?php echo $val['booking_time'] ?></td>
     <td align="center"> <?php
		if($val["appointment_status"] == 1)
		{
			?>
			Accepted
			<?php
		}
		else if($val["appointment_status"] == 2)
		{
			?>
			Rejected
      
  <?php
  }

  	else if($val["appointment_status"] == 3)
		{
			?>
			View Prescription  | <a href="ViewPreseciption.php?aid=<?php echo $val["apointment_id"]?>">Goto Details</a>
      
  <?php
  }
  ?>
    </td>
 
  </tr>
  <?php 
  }
  ?></table>
 </form>
</body>
</html>
<?php
include("Footer.php");
?>