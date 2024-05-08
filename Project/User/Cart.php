<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cart</title>
</head>

<body>
<h1 align="center">MY CART</h1>
<form action="" method="post"><table align="center" width="216" border="1">
  <?php
    $selQry="SELECT * FROM tbl_cart c INNER JOIN tbl_booking b on c.booking_id=b.booking_id INNER JOIN tbl_product p ON c.product_id=p.product_id where user_id=".$_SESSION['uid'];
    $res=$conn->query($selQry);
    $i=0;
	 while($val=$res->fetch_assoc())
  {
	  $i++;
?> 
<tr>
    <td align="center"><img src="../Asset/Files/Product/<?php echo $val['product_photo']?>" width='100px'/></td>
  </tr>
  <tr>
    <td align="center"><?php echo $val['product_name'] ?></td>
  </tr>
  <tr>
    <td align="center"> <?php echo $val['product_details'] ?></td>
  </tr>
  <tr>
    <td align="center"> <?php echo $val['product_price'] ?></td>
  </tr>
  <tr>
    <td align="center"><a href="">Buy</a></td>
  </tr>
 
  <?php
  }
  ?>
</table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>