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
			
				<!-- Theme Inner Banner ____________________________ -->
			<section>
				<div class="Theme-Inner-Banner inner-banner-bg-img-one">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1>My Projects</h1>
								<p>Every Project Has its own inmportance<br>invest it</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">My Projects</a></li>
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
							<div class="col-md-12 col-xs-12 margin-top">
								
									<ul class="Events-Item-Wrapper">
										<!-- Select Project query start -->
									<?php 
									
										$Select_Project="select * from tblProject where UserID='".$_SESSION['UserID']."'";
										$Exe_Project=mysqli_query($con,$Select_Project) or die(mysqli_error($con));
										while($Fetch_Project=mysqli_fetch_array($Exe_Project))
										{

									?>
										<li class="clear-fix">
											<div class="events-img">
													<!-- Select Project Image Query -->
													<?php
			                                            $Select_image="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch_Project['ProjectID'];
			                                            $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error($con));
			                                            $Fetch_image=mysqli_fetch_array($Exe_image)
			                                        ?>
												<img src="Admin/Project/img/<?php echo $Fetch_image['ImageName'];?>" alt="image">
											</div><!-- /.events-img -->
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
												<!-- <div class="donate-piechart tran3s">
									                <div class="piechart"  data-border-color="rgba(253,88,11,1)" data-value="<?php echo $per;?>">
													  <span><?php echo $per;?></span>
													</div>
									            </div> --> <!-- /.donate-piechart -->
											<div class="day">
												<h2><?php $fundper=$per*100; echo round($fundper,2)."%";?></h2>
												
												<h6>Funding <?php if($per*100<=100)
													{
												?><br> $ <?php echo $FundLeft;?> to Go<?php
													}
												?></h6>

											</div> <!-- /.day -->
											<div class="events-text">
												<h4><?php  echo $Fetch_Project['ProjectTitle']; ?></h4>
												<p><i><?php echo $Fetch_Project['SmallDescription']; ?></i> </p>
											</div> <!-- /.events-text -->
											<a href="ViewMyProject.php?ProjectID=<?php echo $Fetch_Project['ProjectID']; ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
										</li> <!-- /.clear-fix -->
										<?php									
											}
										?>
									</ul>

								<!-- <ul class="number-next-and-pivias text-center">
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
								</ul> -->
							</div> <!-- /.col -->

							
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

