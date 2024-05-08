<?php
include("../Asset/Connection/Connection.php");
session_start();
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$subcategory=$_POST['txtsubcategory'];
	$details=$_POST['txtdetail'];
	$price=$_POST['txtprice'];
	$photo=$_FILES['txtphoto']['name'];
	$tempphoto=$_FILES['txtphoto']['tmp_name'];
	move_uploaded_file($tempphoto, '../Asset/Files/Product/'.$photo);
	$insQry="insert into tbl_product(product_name,product_photo,product_details,subcategory_id,update_date,shop_id,product_price) values('".$name."','".$photo."','".$details."','".$subcategory."',curdate(),'".$_SESSION['sid']."','".$price."')";
	if($conn->query($insQry))
	{	
		?>
<script>
		alert("inserted")
		window.location="Product.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Product.php"
		</script>
        <?php
	}
		
} 
if(isset($_GET['pid']))
{
	$delQry="delete from tbl_product where product_id=".$_GET['pid'];
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted")
		window.location="Product.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Product.php"
		</script>
        <?php
	}
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products Registration</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data"><table width="394" height="427" border="1">
  <tr>
    <td width="97">Product Name</td>
    <td width="322"><input name="txtname" type="text" /></td>
  </tr>
   <tr>
    <td>Photo</td>
    <td><label for="photo"></label>
      <input type="file" name="txtphoto" id="photo" /></td>
  </tr>
  <tr>
    <td>Product Details</td>
    <td><textarea name="txtdetail" cols="10" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Category</td>
    <td><select name="txtcategory" id="txtcategory" onChange="getsubcategory(this.value)"> 
    <option value="">Select Category</option>
     <?php 
	$selQryCat="select * from tbl_category";
	$res=$conn->query($selQryCat);
	while($row=$res->fetch_assoc())
	{
		?>
        <option value="<?php echo $row['category_id'] ?>"><?php echo $row ['category_name']?></option>
        <?php
	}
	?>
    </select> </td>
  </tr>
  <tr>
    <td>Subcategory</td>
    <td><select name="txtsubcategory" id="txt_subcategory"> 
    <option value="">---Select---</option>
     <?php 
	$selQrySub="select * from tbl_subcategory";
	$a=$conn->query($selQrySub);
	while($b=$a->fetch_assoc())
	{
		?>
        <option value="<?php echo $b['subcategory_id'] ?>"><?php echo $b['subcategory_name']?></option>
        <?php
	}
	?></select></td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input name="txtprice" type="number" /></td>
  </tr>
  <tr>
    <td colspan="2"><p align="center">
      <input type="submit" name="btnsave" id="btnsave" value="Save" />
      
      <input type="reset" name="btnreset" id="btnreset" value="Cancel" />
      </p></td>
  </tr>
</table>
<form action="" method="post">
<table width="200" border="1">
  <tr>
    <td>SLno</td>
     <td>Product name</td>
    <td>Product Details</td>
    <td>Category;</td>
    <td>Sub Category</td>
    <td>Photo</td>
    <td>Price</td>
    <td>Action</td>
  </tr>
  <?php
    $selQry="SELECT * FROM tbl_product p INNER JOIN tbl_subcategory s on p.subcategory_id=s.subcategory_id INNER JOIN tbl_category c ON c.category_id=s.category_id where shop_id=".$_SESSION['sid'];
    $res=$conn->query($selQry);
    $i=0;
	 while($val=$res->fetch_assoc())
  {
	  $i++;
	  ?> 
  <tr>
   <td><?php echo $i?></td>
    <td> <?php echo $val['product_name'] ?></td>
    <td> <?php echo $val['product_details'] ?></td>
    <td><?php echo $val['category_name'] ?></td>
    <td><?php echo $val['subcategory_name'] ?></td>
    <td><img src="../Asset/Files/Product/<?php echo $val['product_photo']?>" width='100px'/></td>
    <td><?php echo $val['product_price'] ?></td>
    <td><p><a href="Stock.php?sid=<?php echo $val['product_id']?>">Stock Update</a></p>
      <p><a href="Product.php?pid=<?php echo $val['product_id'] ?>">Delete</a></p>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
</form><script src="../Asset/JQ/jQuery.js"></script>
<script>
function getsubcategory(did)
{
	$.ajax({
		url:"../Asset/AjaxPages/AjaxSubcat.php?did="+did,
		success: function(html){
			$("#txt_subcategory").html(html);
		}
	});
}
</script>
</body>
</html>