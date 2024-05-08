<?php
include("../Asset/Connection/Connection.php");
session_start();
$selQry="select * from tbl_doctor s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_department a on a.department_id=s.department_id where doctor_id=".$_SESSION['did'];
$res=$conn->query($selQry);
$row=$res->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>manage doctor profile</title>
</head>

<body>
<h1 align="center">Manage Doctor</h1>
<h2 align="center"><?php echo $_SESSION['dname'] ?></h2>
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="325" height="343" border="1">
<tr>
<td colspan="2"><img src="../Asset/Files/Doctor/<?php echo $row['doctor_photo']?>" width='300px'/></td>
</tr>
  <tr>
    <td width="144">Name</td>
    <td width="165"><?php echo $row['doctor_name'] ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $row['doctor_email'] ?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $row['doctor_contact'] ?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>
    <?php echo $row['doctor_gender'] ?>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $row['doctor_address'] ?></td>
  </tr>
  <tr>
    <td>District</td>
    <td><?php echo $row['district_name'] ?> </td>
  </tr>
  <tr>
    <td>Place</td>
    <td><?php echo $row['place_name'] ?></td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td><?php echo $row['doctor_dob'] ?></td>
  </tr>
    <tr><td>Department</td>
  <td><?php echo $row['department_name'] ?></td>
  </tr>
    <tr><td>Designation</td>
  <td><?php echo $row['doctor_designation'] ?></td></tr>
  <tr>
    <td colspan="2">
      <div align="center">
  <?php
 echo '<a href="Editdoctorprofile.php"><input type="button" name="btnsave" id="button" value="Manage Profile"/>
  </a>';
?>
  &nbsp;&nbsp;&nbsp;
        <?php
 echo '<a href="Changedpassword.php"><input type="button" name="changepass" id="button" value="Change Password"/>
  </a>';
?>
      </div></td>
    </tr>
</table>
</form>
</body>
</html>