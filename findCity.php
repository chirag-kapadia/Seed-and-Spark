
<?php //include_once("loadfiles.php");?>

<?php 
include_once("Admin/Connection.php");
$stateId=$_REQUEST['StID'];
$query="select * from tblCity WHERE StateID='".$stateId."'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
?>
<select class="form-control" name="cmbCity">
<option>Select City</option>
<?php while($row=mysqli_fetch_array($result)) 
	{ 
?>
<option value="<?php echo $row['CityID']; ?>"><?php echo $row['CityName'];?></option>
<?php 
	} 
?>
</select>

<?php //include_once "loadfilejs.php"; ?>