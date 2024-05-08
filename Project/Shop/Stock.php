<?php
$stqty="";
$stid=0;
include("../Asset/Connection/Connection.php");
if(isset($_POST['btnsave']))
	{
		$pid=$_GET['sid'];
		$quantity=$_POST['txtquantity'];
		$stockid=$_POST['txtid'];
		if($stockid==0)
	{
		$insQry="insert into tbl_stock (stock_quantity,product_id) values('".$quantity."','".$pid."')";
		if($conn->query($insQry))
		{	
			?>
			<script>
			alert("inserted")
			window.location="Product.php";
			</script>
			<?php
		}
		else
		{
			?>
<script>
			alert("failed")
			//window.location="Stock.php?sid=<?php echo $_GET['sid']?>"
			</script>
			<?php
		}
	}
else
	{
		$updQry="update tbl_stock set stock_quantity='".$quantity."' where stock_id=".$stockid;
		if($conn->query($updQry))
		{	
			?>
<script>
			alert("Updated")
			//window.location="Stock.php?sid=<?php echo $_GET['sid']?>"
			</script>
			<?php
		}
		else
		{
			?>
<script>
			alert("failed")
			//window.location="Stock.php?sid=<?php echo $_GET['sid']?>"
			</script>
			<?php
		}
	}
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_stock where stock_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		?>
<script>
		alert("Deleted")
		//window.location="Stock.php?sid=<?php echo $_GET['sid']?>"
		</script>
        <?php
	}
	else
	{
		?>
<script>
		alert("failed")
		//window.location="Stock.php?sid=<?php echo $_GET['sid']?>"
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock Update</title>
</head>

<body>

<form name="form1" method="post" action="Stock.php">
  <table width="400" border="3">
    <tr>
      <td>Quantity</td>
      <td><label for="txtquantity"></label>
      <input type="number" name="txtquantity" id="txtquantity"></td>
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
      <td><div align="center">Quantity</div></td>
      <td><div align="center">Action</div></td>
    </tr>
   <?php
    $selQry="select * from tbl_stock where product_id='".$_GET['sid']."'";
	echo $selQry;
    $res=$conn->query($selQry);
    $i=0;
    while($row=$res->fetch_assoc())
    {
      ?>
    <tr>
      <td><?php echo ++$i ?></td>
      <td>
        <?php echo $row['stock_quantity'] ?>
      </td>
     <td><a href="Stock.php?did=<?php echo $row['stock_id'] ?>">Delete</a>
      <a href="Stock.php?eid=<?php echo $row['stock_id'] ?>">Edit</a>
    </tr>
    <?php
    }
    ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
