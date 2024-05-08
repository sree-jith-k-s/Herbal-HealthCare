<?php
include("../Asset/Connection/Connection.php");
session_start();
if(isset($_POST['btnsave']))
{
	$fromtime=$_POST['txtfrom'];
	$totime=$_POST['txtto'];
	$day=$_POST["days"];
	if($availability_id==0)
	{
		$insQry="insert into tbl_availability (doctor_id,from_time,to_time,Days) values('".$_SESSION['did']."','".$fromtime."','".$totime."','".$day."')";
		if($conn->query($insQry))
		{	
			?>
			<script>
			alert("Inserted")
			window.location="Availability.php"
			</script>
			<?php
		}
		else
		{
			?>
<script>
			alert("Failed")
			window.location="Availability.php"
			</script>
			<?php
		}
	}
}

if(isset($_GET["aid"]))
{
	$up="update tbl_availability set status=1 where availability_id=".$_GET["aid"];
	if($conn->query($up))
	{
		?>
			<script>
			alert("Updated")
			window.location="Availability.php"
			</script>
			<?php
	}
}

if(isset($_GET["aaid"]))
{
	$up="update tbl_availability set status=0 where availability_id=".$_GET["aaid"];
	if($conn->query($up))
	{
		?>
			<script>
			alert("Updated")
			window.location="Availability.php"
			</script>
			<?php
	}
}
if(isset($_GET["avid"]))
{
	$upd="update tbl_availability set from_time='".$fromtime."',to_time='".$totime."'  where availability_id=".$_GET["avid"];
	if($conn->query($upd))
	{
		?>
			<script>
			alert("Updated")
			window.location="Availability.php"
			</script>
			<?php
	}
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Availability</title>
</head>

<body><form action="" method="post">
<table width="338" border="1">
<tr>
<td>Days</td>
<td>
<select name="days" id="days">
<option>...Select...</option>
<option value="1">Monday</option>
<option value="2">Tuesday</option>
<option value="3">Wednesday</option>
<option value="4">Thursday</option>
<option value="5">Friday</option>
<option value="6">Saturday</option>
<option value="7">Sunday</option>
</select>
</td>
</tr>
  <tr>
    <td width="84">Available From</td>
    <td width="164"><input name="txtfrom" type="time" /></td>
  </tr>
  <tr>
    <td>Available To</td>
    <td><input name="txtto" type="time" /></td>
  </tr>
   <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btnsave" id="button" value="Submit" />
    </div></td>
    </tr>
</table> 
</form>

<table width="500">
<tr>
<th>#</th>
<th>Days</th>
<th>From Time</th>
<th>To Time</th>
<th>Action</th>
</tr>
<?php 
$i=0;
$sel="select * from tbl_availability where doctor_id=".$_SESSION["did"];
$res=$conn->query($sel);
while($row=$res->fetch_assoc())
{
	$i++;
	?>
	<tr align="center">
    <td><?php echo $i;?></td>
   <?php
		if($row["days"] == 1)
		{
			?>
			<td>Monday</td>
			<?php
		}
		else if($row["days"] == 2)
		{
			?>
			<td>Tuesday</td>
			<?php
		}
		else if($row["days"] == 3)
		{
			?>
			<td>Wednesday</td>
			<?php
		}
		else if($row["days"] == 4)
		{
			?>
			<td>Thursday</td>
			<?php
		}
		else if($row["days"] == 5)
		{
			?>
			<td>Friday</td>
			<?php
		}
		else if($row["days"] == 6)
		{
			?>
			<td>Saturday</td>
			<?php
		}
		else if($row["days"] == 7)
		{
			?>
			<td>Sunday</td>
			<?php
		}
		else
		{
			?>
			<td></td>
			<?php
		}
	 ?>
     <?php
     if($row["status"] == 1)
	 {
		 ?>
		 <td colspan="2" style="color:red">Leave</td>
         <td><a href="Availability.php?aaid=<?php echo $row["availability_id"]?>">Active</a></td>
		 <?php
	 }
	 else
	 {
		 ?>
		 <td><?php echo $row["from_time"] ?></td>
    	 <td><?php echo $row["to_time"] ?></td>
         <td><a href="Availability.php?aid=<?php echo $row["availability_id"]?>">Leave</a></td>
          <td><a href="Availability.php?avid=<?php echo $row["availability_id"]?>">Edit</a></td>
		 <?php
	 }
	 ?>
    </tr>
	<?php
}
?>
</table>
</body>
</html> 