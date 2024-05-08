<?php
$catname="";
$catid=0;
include("../Asset/Connection/Connection.php");
if(isset($_POST['btnsave']))
	{
		$category=$_POST['txtcategory'];
		$categoryid=$_POST['txtid'];
		if($categoryid==0)
	{
		$insQry="insert into tbl_category(category_name) values('".$category."')";
		if($conn->query($insQry))
		{	
			?>
			<script>
			alert("inserted")
			window.location="Category.php"
			</script>
			<?php
		}
		else
		{
			?>
<script>
			alert("failed")
			window.location="Category.php"
			</script>
			<?php
		}
	}
else
	{
		$updQry="update tbl_category set category_name='".$category."' where category_id=".$categoryid;
		if($conn->query($updQry))
		{	
			?>
<script>
			alert("Updated")
			window.location="Category.php"
			</script>
			<?php
		}
		else
		{
			?>
<script>
			alert("failed")
			window.location="category.php"
			</script>
			<?php
		}
	}
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_category where category_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		?>
<script>
		alert("Deleted")
		window.location="Category.php"
		</script>
        <?php
	}
	else
	{
		?>
<script>
		alert("failed")
		window.location="Category.php"
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>category</title>
</head>

<body>

<form name="form1" method="post" action="Category.php">
  <table width="400" border="3">
    <tr>
      <td>Category</td>
      <td><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategory"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save">
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="400" border="3">
    <tr>
      <td><div align="center">SL.NO</div></td>
      <td><div align="center">Category</div></td>
      <td><div align="center">Action</div></td>
    </tr>
   <?php
    $selQry="select * from tbl_category";
    $res=$conn->query($selQry);
    $i=0;
    while($row=$res->fetch_assoc())
    {
      ?>
    <tr>
      <td><?php echo ++$i ?></td>
      <td>
        <?php echo $row['category_name'] ?>
      </td>
     <td><a href="Category.php?did=<?php echo $row['category_id'] ?>">Delete</a>
      <a href="Category.php?eid=<?php echo $row['category_id'] ?>">Edit</a>
    </tr>
    <?php
    }
    ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
