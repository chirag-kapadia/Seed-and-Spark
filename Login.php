<?php include_once("Admin/Connection.php");?>
<!DOCTYPE html>
<html lang="en">
	

<head>
		<?php include_once("LoadFiles.php");?>
	</head>
	
	<!-- Php Login Code Admin -->
    <?php
        if(isset($_REQUEST['btnSignin']))
        {
            $str="select * from tbluser where Email='".$_REQUEST['txtEmail']."' and Password='".base64_encode($_REQUEST['txtPassword'])."'";// base64_encode();
            $rs=mysqli_query($con,$str) or die(mysqli_error($con));
            if(mysqli_num_rows($rs)>0)
            {

                $res=mysqli_fetch_array($rs);
                $_SESSION["UserID"]=$res["UserID"];
                $_SESSION["FirstName"]=$res["FirstName"];
                $_SESSION["LastName"]=$res["LastName"];
                $_SESSION["IsExpert"]=$res["IsExpert"];
                $_SESSION["IsInitiator"]=$res["IsInitiator"];  
                $_SESSION["IsInvestor"]=$res["IsInvestor"];
                $_SESSION["IsVerified"]=$res["IsVerified"];
                $_SESSION["IsActive"]=$res["IsActive"];
                /*Check Expert Detail Verified Or Not ---> Redirect Expert Form start*/
                $Check_IsVerified_ExpertDetail="select * from tblExpertDetail where UserID='".$res['UserID']."'";
                	$Exe_Verified_ExpertDetail=mysqli_query($con,$Check_IsVerified_ExpertDetail) or die(mysqli_error($con));
                	
                	$Fetch_Verified_ExpertDetail=mysqli_fetch_array($Exe_Verified_ExpertDetail);
                if($res['IsExpert']==1 && $Fetch_Verified_ExpertDetail['IsVerified']==0)
                {
                	
                	header("Location:ExpertForm.php");
                } 
                /*Check Expert Detail Verified Or Not ---> Redirect Expert Form End*/
                /*Check Initiator Detail Verified Or Not ---> Redirect Initiator Form start*/
                $Check_IsVerified_InitiatorDetail="select * from tblInitiatorDetail where UserID='".$res['UserID']."'";
                $Exe_Verified_InitiatorDetail=mysqli_query($con,$Check_IsVerified_InitiatorDetail) or die(mysqli_error($con));
                $Fetch_Verified_InitiatorDetail=mysqli_fetch_array($Exe_Verified_InitiatorDetail);
                if($res['IsInitiator']==1 && $Fetch_Verified_InitiatorDetail['IsVerified']==0)
                {
                		
                	header("Location:InitiatorForm.php");
                } 
                /*Check Initiator Detail Verified Or Not ---> Redirect Initiator Form End*/
                if($res['IsExpert']==1 && $res['IsVerified']==1)
                {
                	
                	header("Location:PendingProject.php");
                } 
                           
                else
                {
	                            
	                header("Location:index.php");
	            }
            }
            else
            {
    ?>
               <!--  <div class="col-sm-6 col-12">
                        <button type="button" class="btn btn-danger btn-raised btn-block mb-5" id="type-error" >Error</button>
                    </div> -->
                <script type="text/javascript" id="error">alert('Invalid Email / Password');</script>
    <?php
            }
        }
    ?>
<!-- End Php Login Code Admin -->

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
								<h1>SIGN IN</h1>
								<p>Sign in to continue<br>Invest It</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Sign In</a></li>
								</ul>
								<a href="faq.php" class="hvr-bounce-to-right">FAQ'S</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>

			<!-- Join Volunteer ____________________________ -->
				<section class="Join-Volunteer-Pages" >
					<div class="container">
						<br><br>
						<form method="post" style="margin-left: 400px;">
							<div class="row">

								<div class="col-md-6 col-sm-8 col-xs-12">
									<div class="single-input" style="margin: 0;">
										<input type="email" placeholder="Email *" name="txtEmail" required="">
									</div> <!-- /.single-input -->
								</div> <!-- /.col -->
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-8 col-xs-12">
									<div class="single-input" style="margin-top: 20px;">
										<input type="password" placeholder="Password *" name="txtPassword" required="">
										<a href="" style="margin-top: 5px;">Forgot password ? </a>
									</div> <!-- /.single-input -->
								</div> <!-- /.col -->
							</div> <!-- /.row -->

							<button class="hvr-float-shadow" style="margin-left: 80px;" name="btnSignin">Log Me In!</button><br><br>
							<!-- <input type="checkbox" name="chkRemember"/> Remember me -->
							<hr style="width: 380px;">
							<p style="margin-left: 50px;">New to Seed and Spark ? <a href="UserRegistration.php"> Sign up !</a></p>
						</form> <!-- /Form -->
					</div> <!-- /.container -->
				</section> <!-- /.Join-Volunteer-Pages -->

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


</html>