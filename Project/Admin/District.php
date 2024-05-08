<?php
$distname="";
$distid=0;
include("../Asset/Connection/Connection.php");
if(isset($_POST['btnsave']))
{
	$district=$_POST['txtdist'];
	$districtid=$_POST['txtid'];
	if($districtid==0)
	{
		$insQry="insert into tbl_district (district_name) values('".$district."')";
		if($conn->query($insQry))
		{	
			?>
			<script>
			alert("inserted")
			window.location="District.php"
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("failed")
			window.location="District.php"
			</script>
			<?php
		}
	}
	else
	{
		$updQry="update tbl_district set district_name='".$district."' where district_id=".$districtid;
		if($conn->query($updQry))
		{	
			?>
			<script>
			alert("Updated")
			window.location="District.php"
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("failed")
			window.location="District.php"
			</script>
			<?php
		}
	}
		
}
        
if(isset($_GET['did']))
{
	$delQry="delete from tbl_district where district_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted")
		window.location="District.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="District.php"
		</script>
        <?php
	}
}

if(isset($_GET['eid']))
{
	$selEqry="select * from tbl_district where district_id=".$_GET['eid'];
	$resE=$conn->query($selEqry);
	$rowE=$resE->fetch_assoc();
	$distid=$rowE['district_id'];
	$distname=$rowE['district_name'];
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="District.php">
<input type="hidden" name="txtid" value="<?php echo $distid ?>" />
  <table width="400" border="3">
    <tr>
      <td><div align="center">District</div></td>
      <td><label for="txtdist"></label>
      <input type="text" name="txtdist" id="txtdist" value="<?php echo $distname ?>" /></td>
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
      <td width="168"><div align="center">DistrictName</div></td>
      <td width="193"><div align="center">Action</div></td>
    </tr>
    <?php
    $selQry="select * from tbl_district";
    $res=$conn->query($selQry);
    $i=0;
    while($row=$res->fetch_assoc())
    {
      ?>
      <tr>
      <td><?php echo ++$i ?></td>
      <td>
        <?php echo $row['district_name'] ?>
      </td>
      <td><a href="District.php?did=<?php echo $row['district_id'] ?>">Delete</a>
      <a href="District.php?eid=<?php echo $row['district_id'] ?>">Edit</a>
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