<?php include_once("Admin/Connection.php");?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once("LoadFiles.php");?>
		<script type="text/javascript" src="js/JavaScriptFunctions.js"></script>
	</head>
	<script type="text/javascript">
		function ChangePassword()
		{
			if(document.forms["ChangePasswordForm"]["txtCPassword"].value=="")
      			{
          
			    alert("Please Enter Current Password");
			    return false;
          
      			}
      		if(document.forms["ChangePasswordForm"]["txtNPassword"].value=="")
      			{
          
			    alert("Please Enter New Password");
			    return false;
          
      			}
      		if(document.forms["ChangePasswordForm"]["txtRePassword"].value=="")
      			{
          
			    alert("Please Enter Re-enter Password");
			    return false;
          
      			}
      		if(document.getElementById("lblRePassword").innerText=="* Password & Confirm Password does not match")
				{
					 alert("Please Enter Password Proper");
			    return false;
			
				}
      			return true;
		}
	</script>
	<script type="text/javascript">
		 /*Password validation*/
		function PasswordCheck(CPassword) 
		{
		 	var xhttp = new XMLHttpRequest();
		 	var Url = "AjaxChangePassword.php?CPass="+CPassword;
  			//alert(Url);
  			xhttp.onreadystatechange = function()
  			{
  				if (this.readyState == 4 && this.status == 200) 
  				{
  					document.getElementById("lblCPassword").innerHTML = this.responseText;
  				}
  			};
  			xhttp.open("GET", Url, true);
  			xhttp.send();
		}
  		/*End Contact validation*/
	</script>
	<?php
		if(isset($_REQUEST['btnSubmit']))
		{
			$update="update tbluser set Password='".base64_encode($_REQUEST['txtNPassword'])."' where UserID=".$_SESSION['UserID'];
			//echo $update;
			$update_qry=mysqli_query($con,$update);
		}
	?>

	
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

			<section>
				<div class="Theme-Inner-Banner inner-banner-bg-img-one">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1>Change <br>	Password</h1>
								<!-- <p>SPONSOR A CHILD AND CHANGE THEIR LIFE FOR <br>GOOD</p> -->
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="ChangePassword.php">ChangePassword</a></li>
								</ul>
								<a href="faq.php" class="hvr-bounce-to-right">FAQ'S</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>
			<br>
			<!-- Form -->
				<section class="Join-Volunteer-Pages margin-bottom">
			<div class="container">
				<br>
				<form method="post" name="ChangePasswordForm" class="form-validation" autocomplete="off">
					<div class="rows" style="margin-left: 200px; margin-bottom: 100px;">
						<h4>Forgot your Password? Don't worry we'll help you with it.</h4>
						<h5>Help you to fix it.</h5>
						</div>
					<div class="row" style="width: 700px;margin-left:200px;">
						
						<div class="col-xs-12">

							<div class="single-input">
								<input type="text" placeholder="Current Password *" onblur = "PasswordCheck(this.value);" name="txtCPassword" id="txtCPassword"  onblur="ValidateControl('txtCPassword','lblCPassword','Current Password!')";  >
								<label id="lblCPassword" style="color: red;"></label>
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-xs-12">

							<div class="single-input">
								<input type="text" placeholder="New Password *" name="txtNPassword" id="txtNPassword"  onblur="ValidateControl('txtNPassword','lblNPassword','New Password!')"; >
								<label id="lblNPassword" style="color: red"></label>
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-xs-12">

							<div class="single-input">
								<input type="text" placeholder="Re-enter Password *" name="txtRePassword" id="txtRePassword" onblur="ValidatePassword('txtNPassword','txtRePassword','lblRePassword');">
								<label id="lblRePassword" style="color: red"></label>
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->


					</div> <!-- /.row -->
					<button class="hvr-float-shadow" text="Submit" name="btnSubmit" style="margin-left:450px;" onclick="return ChangePassword();">Submit Changes</button>
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
			<!-- End Form -->

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