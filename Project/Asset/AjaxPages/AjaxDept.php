<table align="center" width="200" border="1">
<?php
include('../Connection/Connection.php');
 $selQry="select * from tbl_doctor where doctor_vstatus=1 and department_id='".$_GET['searchid']."'";
$res=$conn->query($selQry);
while($row=$res->fetch_assoc())
{
	?>
    <tr>
    <td align="center"><img src="../Asset/Files/doctor/<?php echo $row['doctor_photo']?>" width='100px'/></td>
  </tr>
  <tr>
    <td align="center"><?php echo $row['doctor_name'] ?></td>
    </tr>
  <tr>
    <td align="center"><a href="DoctorProfile.php?doid=<?php echo $row["doctor_id"]?>">View More</a> </td>
  </tr>
    <?php
}
?>
</table>