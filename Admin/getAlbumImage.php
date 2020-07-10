
<?php
     include_once("Connection.php");

     $AlbumID=$_REQUEST["AlbumID"];
     $_SESSION['AlbumID']=$AlbumID;
	 $select_Q="select * from tblimagealbum where AlbumID='".$_REQUEST['AlbumID']."'";
     $exe_Q=mysqli_query($con,$select_Q) or die(mysqli_error($con));

     $fetch_Q=mysqli_fetch_array($exe_Q);

     	echo $fetch_Q['ImageName'];

     /*} */    
?>

