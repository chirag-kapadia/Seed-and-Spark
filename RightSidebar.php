<?php include_once "Admin/Connection.php"; ?>
<!-- ================ Right Side Bar ================== -->
							<div class="col-md-4 col-xs-12">
								<div class="Right-Side-Bar">
									<!-- <form action="#" class="Side-Search">
										<input type="text" placeholder="Search">
										<button><i class="fa fa-search" aria-hidden="true"></i></button>
									</form> -->									
									<div class="Side-Recent-News-Post">
										<h5>Recent Projects</h5>
										<ul>
									<?php
										$Select_Project="Select * from tblProject where IsApprovedByExpert=1 and IsApprovedByAdmin=1 and IsActive=1 ORDER BY CreatedOn DESC LIMIT 10";
										$Exe_Project=mysqli_query($con,$Select_Project)or die(mysqli_error($con));
										while($Fetch_Project=mysqli_fetch_array($Exe_Project))
										{
									?>									
											<li>
												<?php
                                            $Select_image="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch_Project['ProjectID'];
                                            $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error());
                                            $Fetch_image=mysqli_fetch_array($Exe_image);
                                        ?>
												<img src="Admin/Project/img/<?php echo $Fetch_image['ImageName'];?>" />
												<div class="text">
													<h6><a href="ViewProject2.php?ProjectID=<?php echo $Fetch_Project['ProjectID'];?>"><?php echo $Fetch_Project['ProjectTitle']?></a></h6>
													<span>
															<?php 
																$date_Project=date('M d, Y',strtotime($Fetch_Project['CreatedOn']));
																echo $date_Project;
															?>
													</span>
												</div>
											</li>										
									<?php
										}
									?>
									</ul>
									</div>
								</div> <!-- /.Right-Side-Bar -->
							</div> <!-- /.col -->