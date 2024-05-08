<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$place=$_POST['txtplace'];
	$contact=$_POST['txtcontact'];
	$email=$_POST['txtemail'];
	$address=$_POST['txtaddress'];
	$password=$_POST['txtpass'];
	$photo=$_FILES['txtlogo']['name'];
	$tempphoto=$_FILES['txtlogo']['tmp_name'];
	move_uploaded_file($tempphoto, '../Asset/Files/Shop/'.$photo);
	$proof=$_FILES['txtproof']['name'];
	$tempproof=$_FILES['txtproof']['tmp_name'];
	move_uploaded_file($tempproof, '../Asset/Files/Shop/'.$proof);
	$insQry="insert into tbl_shop(shop_name,shop_logo,shop_proof,place_id	,shop_email,shop_address,shop_contact,shop_password) values('".$name."','".$photo."','".$proof."','".$place."','".$email."','".$address."','".$contact."','".$password."' )";
	
	if($conn->query($insQry))
	{	
		?>
<script>
		alert("inserted")
		window.location="Shopregistration.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed")
		window.location="Shopregistration.php"
		</script>
        <?php
	}
		
}     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Registration</title>
</head>
<style>
  .text-box{
		padding: 10px;
		border: 1px black solid;
		border-radius: 10px;
		margin-bottom: 10px;

	}
</style>

<body>
<form action="" method="post">
<table width="445" height="560" cellpadding="10px" align="center">
  <tr>
    <td>Name</td>
    <td><input name="txtname" class="text-box" type="text" /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="txtemail" class="text-box" type="email" /></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><input name="txtcontact" class="text-box" type="number" /></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><textarea name="txtaddress" class="text-box" cols="10" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>District</td>
    <td><select name="txtdistrict" class="text-box" id="txtdistrict" onChange="getPlace(this.value)"> 
    <option value="">Select District</option>
     <?php 
	$selQryDist="select * from tbl_district";
	$res=$conn->query($selQryDist);
	while($row=$res->fetch_assoc())
	{
		?>
        <option value="<?php echo $row['district_id'] ?>"><?php echo $row ['district_name']?></option>
        <?php
	}
	?>
    </select> </td>
  </tr>
  <tr>
    <td>Place</td>
    <td><select name="txtplace" class="text-box" id="txt_place"> 
    <option value="">---Select---</option>
     <?php 
	$selQryPal="select * from tbl_place";
	$a=$conn->query($selQryPal);
	while($b=$a->fetch_assoc())
	{
		?>
        <option value="<?php echo $b['place_id'] ?>"><?php echo $b['place_name']?></option>
        <?php
	}
	?></select></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="txtpass" class="text-box" type="password" /></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input name="txtrepass" class="text-box" type="password" /></td>
  </tr>
  <tr>
    <td>Logo</td>
    <td><label for="logo"></label>
      <input type="file" name="txtlogo"  class="text-box" id="logo" /></td>
  </tr>
  <tr>
    <td>Proof</td>
    <td><label for="proof"></label>
      <input type="file" name="txtproof" class="text-box" id="proof" /></td>
  </tr>
  <tr>
    <td colspan="2"><p align="center">
      <input type="submit" name="btnsave" class="text-box" id="btnsave" value="Save" />
      
      <input type="reset" name="btnreset"  class="text-box" id="btnreset" value="Cancel" />
    </p></td>
    </tr>
</table>
</form>
<script src="../Asset/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Asset/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#txt_place").html(html);
		}
	});
}
</script>
</body>
</html>
<?php
include("Footer.php");
?>