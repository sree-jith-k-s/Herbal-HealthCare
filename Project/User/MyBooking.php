<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	ob_start();
include("Header.php");
	include("../Asset/Connection/Connection.php");
	?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>Sl.No</td>
      <td>Product Name</td>
      <td>Image</td>
      <td>Quantity</td>
      <td>Status</td>
    </tr>
    <?php
	$sel="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id where b.user_id='".$_SESSION["uid"]."'";
	$i=0;
	$row=$conn->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["product_name"]?></td>
      <td><img src="../Asset/Files/Product/<?php echo $data["product_photo"]?>"  width="150" height="150"/></td>
      <td><?php echo $data["cart_quantity"]?></td>
      <td>
      <?php
	  if($data["booking_status"]==2 && $data["cart_status"]==1 && $data["payment_status"]=1)
	  {
		  echo "Payment Completed";?>| <a href="ProductRating.php?lid=<?php echo $data["product_id"]?>">Rate Now</a>
          							 | <a href="PostComplaint.php?cid=<?php echo $data["product_id"]?>">Complaint</a>
          <?php
	  }
	  else if($data["booking_status"]==1 && $data["cart_status"]==0)
	  {
		  echo "Booking Completed And payment Is Remaining";?> |<a href="Payment.php?pid=<?php echo $data["cart_id"]?>">Pay Now</a>
          <?php
	  }
	  else if($data["booking_status"]==1)
	  {
		  echo "Exited Before Payment";?>|<a href="Payment.php?pid=<?php echo $data["cart_id"]?>">Pay Now</a>
         <?php
	  }
	  else
	  {
		  echo "Added To Cart";
	  }
	  ?>
     </td>
     
    </tr>
    <?php
	}
	
	?>
  </table>
</form>
<?php
include("Footer.php");
ob_flush();
?>
</body>
</html>