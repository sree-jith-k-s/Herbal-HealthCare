<?php
include("../Asset/Connection/Connection.php");
if(isset($_POST["btn"]))
{
    $ins="insert into tbl_prescription(prescription_details,appointment_id)values('".$_POST["txtd"]."','".$_GET["accept"]."')";
    $conn->query($ins);
    $up="update tbl_appointment set appointment_status=3 where appointment_id='".$_GET["accept"]."'";
    $conn->query($up);
    header("location:Acceptedappointment.php");
}
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
                <td>Prescription Details</td>
                <td><textarea name="txtd" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Send" name="btn"><input type="reset" value="Cancel" name="btnc"></td>
            </tr>
        </table>
    </form>
</body>
</html>