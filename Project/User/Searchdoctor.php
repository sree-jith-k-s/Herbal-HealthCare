<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Doctor</title>
</head>

<body>
<form action="" method="post"><table align="center" width="169" border="1">
  <tr>
    <td width="159">Department</td>
  </tr>
  <tr>
    <td><select name="txtdepartment" id="txtDepartment" onChange="getsearch(this.value)"> 
    <option value="">Select Department</option>
     <?php 
	$selQryCat="select * from tbl_department";
	$res=$conn->query($selQryCat);
	while($row=$res->fetch_assoc())
	{
		?>
        <option value="<?php echo $row['department_id'] ?>"><?php echo $row ['department_name']?></option>
        <?php
	}
	?>
    </select>
</table>
</form><div id="search">
  <form action="" method="post">
    <table align="center" width="216" border="1">
      <?php
    $selQry="SELECT * FROM tbl_doctor where doctor_vstatus=1";
    $res=$conn->query($selQry);
    $i=0;
	 while($val=$res->fetch_assoc())
  {
	  $i++;
?> 
  <tr>
    <td align="center"><img src="../Asset/Files/Doctor/<?php echo $val['doctor_photo']?>" width='100px'/></td>
  </tr>
  <tr>
    <td align="center"><?php echo $val['doctor_name'] ?></td>
  </tr>
  <tr>
    <td height="44" align="center"><a href="DoctorProfile.php?doid=<?php echo $val["doctor_id"]?>">View More</a></td>
  </tr>
 
  <?php
  }
  ?>
</table>
</form>
 </div>
<script src="../Asset/JQ/jQuery.js"></script>
<script>
function getsearch(searchid)
{
	$.ajax({
		url:"../Asset/AjaxPages/AjaxDept.php?searchid="+searchid,
		success: function(html){
			$("#search").html(html);
		}
	});
}
</script>
</body>
</html>
<?php
include("Footer.php");
?>