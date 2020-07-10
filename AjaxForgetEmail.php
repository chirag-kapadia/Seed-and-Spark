<?php 
include_once("Admin/Connection.php");
$Email = $_REQUEST["FID"];
$str = "select * from tbluser where Email='$Email'";
$rs = mysqli_query($con,$str) or die(mysqli_error($con));
$res = mysqli_num_rows($rs);
if($res>0)
{
	
}
else
{
	echo "Please Check Email.";
}
?>