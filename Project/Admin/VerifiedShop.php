<?php
 include("../Asset/Connection/Connection.php");

 $sel="select * from tbl_shop where shop_vstatus='1'";
 $row=$conn->query($sel);
 $i=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Accept List</title>
</head>
<body>
<a href="Homepage.php"><button>Back</button></a>
<table border="1" align="center">
 <tr>
   <td  bgcolor="#66FFCC">Accepted List</td>
   <td><a href="RejectedShop.php"><button>Rejected List</button></a></td>
 </tr>
</table>
 <table border="2" align="center">
 <tr>
  <td>SL.NO</td>
  <td>Shop name</td>
  <td>Shop contact</td>
  <td>Shop address</td>
  <td>Shop email</td>
  <td>Shop Logo</td>
  <td>Shop Proof</td>
 </tr>
 <?php 
  while($val=$row->fetch_assoc())
  {
	  $i++;
?>
 <tr>
  <td><?php echo $i?></td>
  <td><?php echo $val["shop_name"]?></td>
  <td><?php echo $val["shop_contact"]?></td>
  <td><?php echo $val["shop_address"]?></td>
  <td><?php echo $val["shop_email"]?></td>
   <td><img src="../Asset/Files/Shop/<?php echo $val["shop_logo"]?>" height="50",width="50"/></td>
  <td><img src="../Asset/Files/Shop/<?php echo $val["shop_proof"]?>" height="50",width="50"/></td>
 </tr>
 <?php
  }
 ?>
</body>
</html>