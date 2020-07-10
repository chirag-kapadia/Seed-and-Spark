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
								<h1>Expert's</h1>
								<p>Outrageous Experts Are Available To Approve Projects In All Categories </p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Expert</a></li>
								</ul>
								<a href="#" class="hvr-bounce-to-right">Need Our Help</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>

			<!-- Team Pages ____________________________ -->
			<section class="Team-Pages">
				<div class="container">
					<div class="row">
						<!-- Select Expert Query Php start -->
							<?php 
							$Select_Expert="select * from tblUser where IsExpert=1 and IsVerified=1";
							$Exe_Expert=mysqli_Query($con,$Select_Expert)or die(mysqli_error($con));
							while($Fetch_Expert=mysqli_fetch_array($Exe_Expert))
							{
							?>
						<!-- Select Expert Query Php end -->
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="Our-Team-Item">
								<div class="Team-Img">
									<?php
                                      $imageName=$Fetch_Expert['ProfilePic'];
                                      if($imageName=="" || !file_exists("Admin/Profile/$imageName"))
                                      {
                                        $imageName="no1.png";
                                      }
                                    ?>
                                    <img src="Admin/Profile/<?php echo $imageName;?>" class="rounded-circle img-border gradient-summer width-100" alt="Card image" style="width: 300px;height: 300px;" >
									<!-- <img src="Admin/Profile/<?php echo $imageName;?>" alt="image"> -->
								</div><!-- /.Team-Img -->
								<div class="Team-Text">
									<h5><?php echo $Fetch_Expert['FirstName'].' '.$Fetch_Expert['LastName'];?></h5>
									<!-- <p>A trio of Business Doctors is celebrating a successful bid to sit on the framework of specialist advisors</p>
									<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									</ul> -->
								</div> <!-- /.Team-Text -->
							</div> <!-- /.Our-Team-Item -->
						</div> <!-- /.col -->
						<?php
							}
						?>
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</section> <!-- /.Team-Pages -->


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