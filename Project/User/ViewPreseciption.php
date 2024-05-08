<?php
include("../Asset/Connection/Connection.php");
include("Header.php");
session_start();
$sel="select * from tbl_prescription where appointment_id='".$_GET["aid"]."'";
$data=$conn->query($sel);
$row=$data->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table border="1" align="center" cellpadding="10">
            <tr>
                <td>Details</td>
                <td><?php  echo $row["prescription_details"]?></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
include("Footer.php");
?>