<?php
include("../Asset/Connection/Connection.php");
if(isset($_POST['btnsave']))
{
	$subcategory=$_POST['txtsubcategory'];
	$category=$_POST['txtcategory'];
	$insQry="insert into tbl_subcategory(subcategory_name, category_id) values('".$subcategory."','".$category."' )";
	if($conn->query($insQry))
	{	
		?>
<script>
		alert("inserted")
		window.location="Subcategory.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Subcategory.php"
		</script>
        <?php
	}
		
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_subcategory where subcategory_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted")
		window.location="Subcategory.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Subcategory.php"
		</script>
        <?php
	}
}
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subcategory</title>
</head>

<body>
<form action="" method="post">
<table width="400" border="5">
  <tr>
    <td>Category</td>
    <td><select name="txtcategory">
     <option value="">Select Category</option>
     <?php 
	$selQryCat="select * from tbl_category";
	$res=$conn->query($selQryCat);
	while($row=$res->fetch_assoc())
	{
		?>
        <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name']?></option>
        <?php
	}
	?></select></td>
  </tr>
  <tr>
    <td>Sub category</td>
    <td><input name="txtsubcategory" type="text" /></td>
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
      <td width="140"><div align="center">Subcategory</div></td>
      <td width="95"><div align="center">Category Name</div></td>
      <td width="53"><div align="center">Action</div></td>
    </tr>
   <?php
    $selQry="SELECT * FROM tbl_category c INNER JOIN tbl_subcategory s on c.category_id=s.category_id";
    $res=$conn->query($selQry);
    $i=0;
    while($row=$res->fetch_assoc())
    {
      ?>
      <tr>
      <td><?php echo ++$i ?></td>
      <td>
        <?php echo $row['subcategory_name'] ?>
      </td>
      <td>
       <?php echo $row['category_name'] ?>
       </td>
      <td><a href="Subcategory.php?did=<?php echo $row['subcategory_id'] ?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</form>
</body>
</html>