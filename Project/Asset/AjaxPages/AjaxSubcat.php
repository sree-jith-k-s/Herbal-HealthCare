<option value="">Select Subcategory</option>
<?php
include('../Connection/Connection.php');
$selQry='select * from tbl_subcategory where category_id='.$_GET['did'];
$res=$conn->query($selQry);
while($row=$res->fetch_assoc())
{
	?>
    <option value="<?php echo $row['subcategory_id'] ?>"><?php echo $row['subcategory_name'] ?></option>
    <?php
}
?>