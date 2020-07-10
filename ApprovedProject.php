<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once "Admin/Connection.php"; ?>
		<?php include_once("LoadFiles.php");?>
	</head>
	
	<body>
	
		<div class="main-page-wrapper">

			<!-- Header _________________________________ -->
			<section class="header-section">
				<!-- Top Header -->
				<?php include_once("TopHeader.php");?>
				
				<!-- Top Header -->
				<?php include_once("MiddleHeader.php");?>
				
				<!-- Theme Main Menu ____________________________ -->
				<?php include_once("Menu.php");?>
			</section>
			<!-- Select Expert Area Detail Query start -->
				<?php 
					$select_ExpertArea="select * from tblExpertDetail where UserID=".$_SESSION['UserID'];
					$Exe_ExpertArea=mysqli_query($con,$select_ExpertArea) or die(mysqli_error($con));
					
				?>
			<!-- Select Expert Area Detail Query end -->
				<!-- Theme Inner Banner ____________________________ -->
			<section>
				<div class="Theme-Inner-Banner inner-banner-bg-img-one">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1>Approved Projects</h1>
								<p>Projects You  <br>approved</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Approved Projects</a></li>
								</ul>
								<a href="faq.php" class="hvr-bounce-to-right">FAQ'S</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>

			<!-- Causes Sidebar ____________________________ -->
			<section class="">
				<div class="container">
					<div class="Rcent-Causes-Item-Wrapper Causes-Sidebar-Wrapper">
						<div class="row">
							<div class="col-md-8 col-xs-12 margin-top">
								<!-- Select Project ExpertArea wise query start -->
									<?php 
										while($Fetch_ExpertArea=mysqli_fetch_array($Exe_ExpertArea))
										{
										$Select_Project="select * from tblProject where ExpertAreaID='".$Fetch_ExpertArea['ExpertAreaID']."' and IsApprovedByExpert=1 and IsApprovedByAdmin=1 and IsActive=1 and ApprovedByExpert='".$_SESSION['UserID']."' ORDER BY CreatedOn DESC" ;
										$Exe_Project=mysqli_query($con,$Select_Project) or die(mysqli_error($con));
										while($Fetch_Project=mysqli_fetch_array($Exe_Project))
										{

									?>
								<!-- Select Project ExpertArea wise query end -->
								<div class="Causes-Item Causes-Sidebar-Item clear-fix">
									<div class="Causes-Img">
										<!-- Select Project Image Query -->
										<?php
                                            $Select_image="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch_Project['ProjectID'];
                                            $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error($con));
                                            $Fetch_image=mysqli_fetch_array($Exe_image)
                                        ?>
										<img src="Admin/Project/img/<?php echo $Fetch_image['ImageName'];?>" alt="image">
									</div> <!-- /.Causes-Img -->
									<div class="Causes-Text">
										<h3><?php  echo $Fetch_Project['ProjectTitle']; ?></h3>
										<ul>
											<li>Invested</li>
											<li>

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
												<div class="donate-piechart tran3s">
									                <div class="piechart"  data-border-color="rgba(253,88,11,1)" data-value="<?php echo $per;?>">
													  <span><?php echo $per;?></span>
													</div>
									            </div> <!-- /.donate-piechart -->
											</li>
											<li>$ <?php echo $FundLeft;?> to Go</li>
										</ul>
										<p><?php echo $Fetch_Project['SmallDescription']; ?></p>
										<!-- <p><?php if(isset($_REQUEST['ExpertAreaID'])) echo $Fetch_Project['FundTarget']; ?></p> -->
										<a href="ViewApprovedProject.php?ProjectID=<?php echo $Fetch_Project['ProjectID']; ?>">View More</a>
									</div> <!-- /.Causes-Text -->
								</div> <!-- /.Causes-Item -->
									<?php 
										}
									}
									?><!-- close while loop project fetch -->

								<!-- <ul class="number-next-and-pivias text-center">
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
								</ul> -->
							</div> <!-- /.col -->

							<?php include_once("RightSidebar.php");?>
						</div> <!-- /.row -->
					</div> <!-- /.Rcent-Causes-Item-Wrapper -->
				</div> <!-- /.container -->
			</section> <!-- /.Rcent-Causes-Section -->
			
			<!-- Children Care List  _________________________________ -->
			<?php include_once("Children_Care_Slider2.php");?>

			<!-- them-main-footer-section _________________________________ -->
			<footer class="them-main-footer-section">
				<!-- NewsLetter -->
				<?php include_once("NewsLetter.php");?>

				<!-- AboutUs -->
				<?php include_once("AboutUs.php");?>

				<!-- Bottom footer -->
				<?php include_once("Bottom_Footer.php");?>				
			</footer> <!-- /.them-main-footer-section -->
			<!--  PAGE===END  _________________________________ -->
		</div> <!-- /.main-page-wrapper -->
		

		<!-- Scroll Top Button -->
		<button class="scroll-top tran7s p-color-bg">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</button>

		
		<?php include_once("LoadFilesJS.php");?>
	</body>

<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:23:11 GMT -->
</html>
////////////////////////////

