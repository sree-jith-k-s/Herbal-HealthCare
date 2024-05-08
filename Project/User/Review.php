<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btnsave']))
{
	$date=$_POST['txtdate'];
	$content=$_POST['txtcontent'];
	$rating=$_POST['txtrc'];
	$insQry="insert into tbl_review(review_date,review_content,rating_count) values('".$date."','".$content."','".$rating."')";
	if($conn->query($insQry))
	{	
		?>
<script>
		alert("inserted")
		window.location="Review.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Review.php"
		</script>
        <?php
	}
		
}
if(isset($_GET['uid']))
{
	$delQry="delete from tbl_review where review_id=".$_GET['uid'];
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted")
		window.location="Review.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Review.php"
		</script>
        <?php
	}
}
        
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review</title>
</head>

<body>
<form action="" method="post">
<table width="368" height="306" border="1">
 <tr>
    <td height="84">Review date</td>
    <td><input name="txtdate" type="date"/></td>
  </tr>
  <tr>
    <td height="121">Review content</td>
    <td><textarea name="txtcontent" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td height="84">Rating Count</td>
    <td><input name="txtrc" type="number"/></td>
  </tr>
  <tr>
    <td height="91" colspan="2"><div align="center">
      <input name="btnsave" type="submit" value="Save"/> 
      <input name="btnreset" type="reset" value="Cancel" />
    </div></td>
    </tr>
</table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>