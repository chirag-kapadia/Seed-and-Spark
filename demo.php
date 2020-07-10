<?php include_once "Admin/Connection.php"; ?>
<?php
                                            $Select_video2="select * from tblVideo where IsDefault=1 and ProjectID=26";
	                                            $Exe_video2=mysqli_query($con,$Select_video2) or die(mysqli_error());
	                                            while($Fetch_Video2=mysqli_fetch_array($Exe_video2))
	                                            {
	                                        ?>
	                                        <?php echo $Fetch_Video2['VideoName'];?>
									<video controls="" style="width: 500px;" > 
										<source src="Admin/Project/video/dito.mp4" type="video/mp4">
  										<!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
										
									</video>
										<?php
												}
										?>