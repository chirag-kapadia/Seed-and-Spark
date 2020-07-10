<?php include_once("Admin/Connection.php");?>
<section class="company-history-section">
				<div class="company-history-shape-img-top"><img src="images/shape/shape-1.png" alt="shape-img"></div><!-- /.company-history-shape-img-top -->
				<div class="company-history-containt-opact">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-xs-6 history-item-weight">
								<div class="clear-fix">
									<div class="history-item item-one">
										<div>
											 <?php
                              				$Select_Project_Count="Select count(*) as Count from tblProject";
                              $Exe_Project_Count=mysqli_query($con,$Select_Project_Count) or die(mysqli_error($con));
                              $Fetch_Project_Count=mysqli_fetch_array($Exe_Project_Count);
                              
                            ?>
											<i class="flaticon-donate"></i>
											<p>Projects</p>
											<h2><span class="timer" data-from="0" data-to="<?php echo $Fetch_Project_Count['Count']; ?>" data-speed="2000" data-refresh-interval="5">0
													
											</span></h2>
										</div>
									</div> <!-- /.history-item -->
								</div> <!-- /.clear-fix -->
							</div> <!-- /.col -->
							<div class="col-lg-3 col-xs-6 history-item-weight">
								<div class="clear-fix">
									<div class="history-item item-two">
										<div>
											 <?php
                              $Investor_Count="Select count(*) as Investor from tblUser where Isinvestor=1";
                              $Exe_Investor_Count=mysqli_query($con,$Investor_Count) or die(mysqli_error($con));
                              $Fetch_Investor_Count=mysqli_fetch_array($Exe_Investor_Count);
                              
                            ?>
											<i class="flaticon-group"></i>
											<p>Investors</p>
											<h2><span class="timer" data-from="0" data-to="<?php echo $Fetch_Investor_Count['Investor']; ?>" data-speed="2000" data-refresh-interval="5">0</span></h2>
										</div>
									</div> <!-- /.history-item -->
								</div> <!-- /.clear-fix -->
							</div> <!-- /.col -->
							<div class="col-lg-3 col-xs-6 history-item-weight">
								<div class="clear-fix">
									<div class="history-item item-three">
										<div>
											 <?php
                              $Initiator_Count="Select count(*) as Initiator from tblUser where Isinitiator=1";
                              $Exe_Initiator_Count=mysqli_query($con,$Initiator_Count) or die(mysqli_error($con));
                              $Fetch_Initiator_Count=mysqli_fetch_array($Exe_Initiator_Count);
                             
                            ?>
											<i class="flaticon-donation-3"></i>
											<p>Initiators</p>
											<h2><span class="timer" data-from="0" data-to="<?php  echo $Fetch_Initiator_Count['Initiator']; ?>" data-speed="2000" data-refresh-interval="5">0</span></h2>
										</div>
									</div> <!-- /.history-item -->
								</div> <!-- /.clear-fix -->
							</div> <!-- /.col -->
							<div class="col-lg-3 col-xs-6 history-item-weight">
								<div class="clear-fix">
									<div class="history-item item-four">
										<div>
											<?php
                              $Total_Fund_Count="Select sum(FundAmount) as TotalFund from tblFund";
                              $Exe_Total_Fund=mysqli_query($con,$Total_Fund_Count) or die(mysqli_error($con));
                              $Fetch_Total_Fund=mysqli_fetch_array($Exe_Total_Fund);
                              
                            ?>
											<i class="flaticon-donation-1"></i>
											<p>Raised Funds</p>
											<h2><span class="timer" data-from="0" data-to="<?php echo  $Fetch_Total_Fund['TotalFund'];?>" data-speed="2000" data-refresh-interval="5">0</span></h2>
										</div>
									</div> <!-- /.history-item -->
								</div> <!-- /.clear-fix -->
							</div> <!-- /.col -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.company-history-containt-opact -->
				<div class="company-history-shape-img-bottom"><img src="images/shape/shape-2.png" alt="shape-img"></div><!-- /.company-history-shape-img-bottom -->
			</section> <!-- /.company-history-section -->