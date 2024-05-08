<?php
 include("../Asset/Connection/Connection.php");

 $sel="select * from tbl_doctor where doctor_vstatus='2'";
 $row=$conn->query($sel);
 $i=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Docter Reject List</title>
</head>
<body>
<a href="Homepage.php"><button>Back</button></a>
<table border="1" align="center">
 <tr>
    <td><a href="VerifiedDoctor.php" ><button>Accepted List</button></a></td>
   <td  bgcolor="#66FFCC">Rejected List</td>
 </tr>
</table>
 <table border="2" align="center">
 <tr>
  <td>SL.NO</td>
  <td>Doctor name</td>
  <td>Doctor contact</td>
  <td>Doctor address</td>
  <td>Doctor email</td>
  <td>Doctor Logo</td>
  <td>Doctor Proof</td>
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
   <td><img src="../Asset/Files/Doctor/<?php echo $val["doctor_photo"]?>" height="50",width="50"/></td>
  <td><img src="../Asset/Files/Doctor/<?php echo $val["doctor_proof"]?>" height="50",width="50"/></td>
 </tr>
 <?php
  }
 ?>
</body>
</html>