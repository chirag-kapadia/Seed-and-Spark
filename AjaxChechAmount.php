<?php 
include_once("Admin/Connection.php");

$Amount = $_REQUEST["AID"];
$PID=$_REQUEST['PID'];
/*$str = "select * from tblnewsletter where Email ='$Email'";
$rs = mysqli_query($con,$str) or die(mysqli_error($con));
$res = mysqli_num_rows($rs);
if($res>0)
{
	echo "Email already Exists.";

}*/

		$Select_Fund1="select * from tblProject where ProjectID=".$PID;
		$Exe_Fund1=mysqli_query($con,$Select_Fund1) or die(mysqli_error($con));
		$Fetch_Fund1=mysqli_fetch_array($Exe_Fund1);


		$Select_Fund="select sum(FundAmount) as FundAmount from tblFund where ProjectID=".$PID;
		$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
		$Fetch_Fund=mysqli_fetch_array($Exe_Fund);
		$sum=$Fetch_Fund['FundAmount'];
		$Target=$Fetch_Fund1['FundTarget'];

	    //$per=$sum/$Fetch_Project['FundTarget'];
	    //$FundLeft=$Fetch_Project['FundTarget']-$sum;
		$LeftAmount=$Target-$sum;								
		//echo $LeftAmount;
			if($LeftAmount<$Amount)
			{

				echo "Only $LeftAmount Remaining To achive Target";
			}
			else
			{
				echo "";
			}


//echo "$Amount"." and"."$PID";
//echo "Hiii";
?>


