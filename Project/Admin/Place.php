<?php
include("../Asset/Connection/Connection.php");
if(isset($_POST['btnsave']))
{
	$place=$_POST['txtplace'];
	$district=$_POST['txtdistrict'];
	$insQry="insert into tbl_place(place_name, district_id) values('".$place."','".$district."' )";
	if($conn->query($insQry))
	{	
		?>
<script>
		alert("inserted")
		window.location="Place.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Place.php"
		</script>
        <?php
	}
		
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_place where place_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted")
		window.location="Place.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Place.php"
		</script>
        <?php
	}
}
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<form action="" method="post">
<table width="400" border="5">
  <tr>
    <td>District</td>
    <td><select name="txtdistrict">
     <option value="">Select District</option>
     <?php 
	$selQryDist="select * from tbl_district";
	$res=$conn->query($selQryDist);
	while($row=$res->fetch_assoc())
	{
		?>
        <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name']?></option>
        <?php
	}
	?></select></td>
  </tr>
  <tr>
    <td>Place</td>
    <td><input name="txtplace" type="text" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btnsave" id="button" value="Save" />
      <input type="reset" name="button2" id="button2" value="Cancel" />
    </div></td>
    </tr>
</table>
</form>
<form action="" method="post">
<table width="452" height="87" border="3">
    <tr>
      <td width="80"><div align="center">SL.NO</div></td>
      <td width="140"><div align="center">Place</div></td>
      <td width="95"><div align="center">District Name</div></td>
      <td width="53"><div align="center">Action</div></td>
    </tr>
   <?php
    $selQry="SELECT * FROM tbl_district d INNER JOIN tbl_place p on d.district_id=p.district_id";
    $res=$conn->query($selQry);
    $i=0;
    while($row=$res->fetch_assoc())
    {
      ?>
      <tr>
      <td><?php echo ++$i ?></td>
      <td>
        <?php echo $row['place_name'] ?>
      </td>
      <td>
       <?php echo $row['district_name'] ?>
       </td>
      <td><a href="Place.php?did=<?php echo $row['place_id'] ?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</form>
</body>
</html>