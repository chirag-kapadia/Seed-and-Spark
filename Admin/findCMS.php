<?php
include_once("Connection.php");

$CMSID=$_REQUEST["CMSID"];
$_SESSION['CMSID']=$CMSID;

$query="select Description from tblCMS WHERE CMSID='$CMSID'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$Exe=mysqli_fetch_array($result);
echo $Exe['Description'];

?>
