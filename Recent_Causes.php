<section class="Rcent-Causes-Section">
				<div class="container">
					<div class="Theme-title text-center">
						<h2>Recent Projects</h2>
						<!-- <h6>We need you</h6> -->
					</div> <!-- /.Theme-title -->
					
					<div class="Rcent-Causes-Item-Wrapper">
						<div id="Rcent-Causes-Slider" class="owl-carousel owl-theme">
							<?php
								include_once("Admin/Connection.php");

								$Select_Project="Select * from tblProject where IsApprovedByExpert=1 and IsApprovedByAdmin=1 and IsActive=1";
								$Exe_Project=mysqli_query($con,$Select_Project)or die(mysqli_connect($con));
								while($Fetch_Project=mysqli_fetch_array($Exe_Project))
								{
							?>
							<div class="item">
								<div class="Causes-Item">
									<!-- Select Project Image Query -->
										<?php
                                            $Select_image="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch_Project['ProjectID'];
                                            $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error());
                                            $Fetch_image=mysqli_fetch_array($Exe_image)
                                        ?>
									<div class="Causes-Img"><img src="Admin/Project/img/<?php echo $Fetch_image['ImageName'];?>" alt="image" style="height: 300px;"></div> <!-- /.Causes-Img -->
									<div class="Causes-Text">
										<!--  -->
											<?php
												$select_ExpertArea="select * from tblExpertArea where ExpertAreaID=".$Fetch_Project['ExpertAreaID'];
												$Exe_ExpertArea=mysqli_query($con,$select_ExpertArea)or die(mysqli_connect($con));
												$Fetch_ExpertArea=mysqli_fetch_array($Exe_ExpertArea);
											?>
										<!--  -->
										<h3><?php echo $Fetch_Project['ProjectTitle'];?> <br><?php echo $Fetch_ExpertArea['AreaName'];?></h3>
										<ul>
											<!-- Calculate Fund Progress start -->
												<?php
													$Select_Fund="select sum(FundAmount) as FundAmount from tblFund where ProjectID=".$Fetch_Project['ProjectID'];
													$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
													$Fetch_Fund=mysqli_fetch_array($Exe_Fund);
													$sum= $Fetch_Fund['FundAmount'];
													//echo $Fetch_Project['FundTarget'];
                                                    $per=$sum/$Fetch_Project['FundTarget'];
                                                    $FundLeft=$Fetch_Project['FundTarget']-$sum;
												?>
												<!-- Calculate Fund Progress end -->
											<li>Invested</li>
											<li>
												<div class="donate-piechart tran3s">
									                <div class="piechart"  data-border-color="rgba(253,88,11,1)" data-value="<?php echo $per;?>">
													  <span><?php echo $per;?></span>
													</div>
									            </div> <!-- /.donate-piechart -->
											</li>
											<li>₹ <?php echo $FundLeft;?> to Go</li>
										</ul>
										<p><?php echo $Fetch_Project['SmallDescription']; ?></p>
										<a href="ViewProject2.php?ProjectID=<?php echo $Fetch_Project['ProjectID']; ?>">View More</a>
									</div> <!-- /.Causes-Text -->
								</div> <!-- /.Causes-Item -->
							</div> <!-- /.item -->
							<?php
						}
					?>
						</div> 
						<!-- <a href="causes.html" class="hvr-float-shadow">Load more Causes</a> -->
					</div> 

					
					<!-- /.Rcent-Causes-Item-Wrapper -->
				</div> <!-- /.container -->
			</section> <!-- /.Rcent-Causes-Section -->