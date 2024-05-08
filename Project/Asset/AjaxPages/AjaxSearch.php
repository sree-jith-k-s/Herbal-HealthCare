<table align="center" width="200" border="1">
<?php
include('../Connection/Connection.php');
$selQry='select * from tbl_product where subcategory_id='.$_GET['searchid'];
$res=$conn->query($selQry);
while($row=$res->fetch_assoc())
{
	?>
    <tr>
    <td align="center"><img src="../Asset/Files/Product/<?php echo $row['product_photo']?>" width='100px'/></td>
  </tr>
  <tr>
    <td align="center"><?php echo $row['product_name'] ?></td>
  </tr>
  <tr>
    <td align="center"> <?php echo $row['product_details'] ?></td>
  </tr>
  <tr>
    <td align="center"> <?php echo $row['product_price'] ?></td>
  </tr>
  <tr>
    <td align="center"><a href="Cart.php">Add to cart</a> </td>
  </tr>
    <?php
}
?>
</table>