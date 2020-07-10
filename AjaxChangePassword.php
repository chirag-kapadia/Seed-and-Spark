<?php 
	include_once("Admin/Connection.php");

	$CPassword= $_REQUEST["CPass"];
	$PasswordCode=base64_encode($CPassword);
	$str = "select * from tbluser where Password ='$PasswordCode'";
	$rs = mysqli_query($con,$str) or die(mysqli_error($con));
	$res = mysqli_num_rows($rs);
	if($res>0)
	{
		
	}
	else

	{
		echo "Invalid Password";
	}
?>