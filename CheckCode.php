<?php include_once("Admin/Connection.php");?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once("LoadFiles.php");?>
		
		<script type="text/javascript" src="js/JavaScriptFunctions.js"></script>
		<script type="text/javascript">
			function frmValidate()
			{
				var msg="";
				if(document.getElementById("txtveritfyCode").value=="")
				{
					msg +="\nPlease Enter Email verification Code";					
				}
				if(document.getElementById("lblveritfyCode").textContent=="Code invalid!")
				{
					msg +="\nPlease Read Error";
			
				}//Not working 

				if(msg!="")
				{
					alert(msg);
					return false;
				}
				return true;
			}

			
		</script>
	</head>
	
	<!-- PHP User Registration Code Start -->
	
	</script>
		<?php
			if(isset($_REQUEST['btnSubmit']))
			{
				$Code=$_REQUEST["txtveritfyCode"];
				$verify=$_SESSION['Code'];
				if($Code==$verify)
				{
					$Update="Update tblUser set IsActive=1 where UserID=".$_REQUEST['UserID'];
					//echo $Update;
					$Exe_Update=mysqli_query($con,$Update)or die(mysqli_error($con));
					echo "<script>alert('Your Email is successfully verified');</script>";
					//Not working alert box
					header("Location:Login.php");

				}
				else
				{
					$error="Code invalid!";
				}
				
			}
		?>
	<!-- PHP User Registration Code Start -->

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
								<h1>Email Verification</h1>
								
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="CheckCode.php">CheckCode</a></li>
								</ul>
								<a href="#" class="hvr-bounce-to-right">Need Our Help</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>

				<!-- Join Volunteer ____________________________ -->
			<section class="Join-Volunteer-Pages margin-bottom">
				<div class="container">
					<div class="Theme-title text-center">
						<!-- <h2>Never Hesitate to Reach Out</h2> -->
						<!-- <h6>User</h6> -->


					</div>
					<form  method="post">
						<div class="rows" style="margin-left: 200px; margin-bottom: 100px;">
						<h4>We have sent a verification code to your given Email Address</h4>
						<h5>Please insert the code to continue...</h5>#<?php echo $_SESSION['Code'];?>
						</div>
						<div class="row">

							
							
							<div class="col-md-6 col-xs-12" style="margin-left: 300px;">
								<div class="single-input">
									<input type="text" placeholder="Email verification Code *" name="txtveritfyCode" maxlength="6" minlength="6" id="txtveritfyCode" onkeypress="return NumbersOnly(event);" onblur="ValidateControl('txtveritfyCode','lblveritfyCode','Email verification Code')"; >
									<?php 
										if(isset($error))
										{
									?>

									<label id="lblveritfyCode" style="color: red" >
									<?php echo $error;?>
									</label>
									<?php
										}
									?>
								</div> 
							</div> 
						</div> <!-- /.row --><br>


						<button type="submit" name="btnSubmit" style="margin-left: 500px;" class="hvr-float-shadow" onclick="return frmValidate();">Submit</button>
					</form> <!-- /Form -->
				</div> <!-- /.container -->

				<!--Contact Form Validation Markup -->
				<!-- Contact alert -->
				<div class="alert-wrapper" id="alert-success">
					<div id="success">
						<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
						<div class="wrapper">
			               	<p>Your message was sent successfully.</p>
			             </div>
			        </div>
			    </div> <!-- End of .alert_wrapper -->
			    <div class="alert-wrapper" id="alert-error">
			        <div id="error">
			           	<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
			           	<div class="wrapper">
			               	<p>Sorry!Something Went Wrong.</p>
			            </div>
			        </div>
			    </div> <!-- End of .alert_wrapper -->
			</section> <!-- /.Join-Volunteer-Pages -->

			

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