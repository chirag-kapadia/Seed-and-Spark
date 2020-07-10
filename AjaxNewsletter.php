<?php 
include_once("Admin/Connection.php");

$Email = $_REQUEST["EID"];
$str = "select * from tblnewsletter where Email ='$Email'";
$rs = mysqli_query($con,$str) or die(mysqli_error($con));
$res = mysqli_num_rows($rs);
if($res>0)
{
	echo "Email already Exists.";
}
?>


