<?php
$deptname="";
$deptid=0;
include("../Asset/Connection/Connection.php");
if(isset($_POST['btnsave']))
{
	$department=$_POST['txtdept'];
	$departmentid=$_POST['txtid'];
	if($departmentid==0)
	{
		$insQry="insert into tbl_department (department_name) values('".$department."')";
		if($conn->query($insQry))
		{	
			?>
			<script>
			alert("inserted")
			window.location="Department.php"
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("failed")
			window.location="Department.php"
			</script>
			<?php
		}
	}
		
}
        
if(isset($_GET['did']))
{
	$delQry="delete from tbl_department where department_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted")
		window.location="Department.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Department.php"
		</script>
        <?php
	}
}

if(isset($_GET['eid']))
{
	$selEqry="select * from tbl_department where department_id=".$_GET['eid'];
	$resE=$conn->query($selEqry);
	$rowE=$resE->fetch_assoc();
	$distid=$rowE['department_id'];
	$distname=$rowE['department_name'];
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Department</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="Department.php">
<input type="hidden" name="txtid" value="<?php echo $deptid ?>" />
  <table width="400" border="3">
    <tr>
      <td><div align="center">Department</div></td>
      <td><label for="txtdept"></label>
      <input type="text" name="txtdept" id="txtdept"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="667" height="91" border="3">
    <tr>
      <td width="168"><div align="center">SL.NO</div></td>
      <td width="168"><div align="center">Department Name</div></td>
      <td width="193"><div align="center">Action</div></td>
    </tr>
    <?php
    $selQry="select * from tbl_department";
    $res=$conn->query($selQry);
    $i=0;
    while($row=$res->fetch_assoc())
    {
      ?>
      <tr>
      <td><?php echo ++$i ?></td>
      <td>
        <?php echo $row['department_name'] ?>
      </td>
      <td><a href="Department.php?did=<?php echo $row['department_id'] ?>">Delete</a>
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>