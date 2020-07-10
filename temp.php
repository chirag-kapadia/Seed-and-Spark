<?php
	include_once("Admin/Connection.php");


	$SEL="select * from tblProject where ProjectID=1";
	$e=mysqli_query($con,$SEL) or die(mysqli_error($con));
	$f=mysqli_fetch_array($e);
	 $date=$f['CreatedOn'];

	  $NewDate=Date('y-m-d', strtotime($date."+60 days"));
	 
     $a=date_create($NewDate); 
	 $now=date('y-m-d');
	  $d = date_create($now);
	 $NewDate1 = date_diff($d,$a);
	 echo $NewDate1->format("%a days");

?>