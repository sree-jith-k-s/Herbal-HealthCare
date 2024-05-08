<?php
$server="localhost";
$user="root";
$pw="";
$db="db_herbal";
$conn=mysqli_connect($server,$user,$pw,$db);
if(!$conn)
{ 
 echo "Connection error";
}
?>