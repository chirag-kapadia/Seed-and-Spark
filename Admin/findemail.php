<?php 
include_once "Connection.php";
$Email = $_REQUEST["EID"];
$str = "select * from tbladmin where Email ='$Email'";
$rs = mysqli_query($con,$str) or die(mysqli_error($con));
$res = mysqli_num_rows($rs);
if($res>0)
{
	echo "Email already Exists.";
}
?>