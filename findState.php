
  <?php //include_once("loadfiles.php");?>
<?php
include_once("Admin/Connection.php");


$country=$_REQUEST['ConID'];

$query="select * from tblState WHERE CountryID='".$country."'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));


?>
<select class="form-control" name="cmbState" onchange="getCity(this.value)">
	
<option>Select State</option>
<?php 
	while($row=mysqli_fetch_array($result))
 	{ 
 ?>
<option value="<?php echo $row['StateID']; ?>" ><?php echo $row['StateName']; ?></option>

<?php 
	}
 ?>
</select>
<?php //include_once "loadfilejs.php"; ?>