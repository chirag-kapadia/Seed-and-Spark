<?php include_once("Admin/Connection.php");?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once("LoadFiles.php");?>
		
		<script type="text/javascript" src="js/JavaScriptFunctions.js"></script>
		<script type="text/javascript">
			function forgetValidation()
			{
				var msg="";
				if(document.forms["forgetForm"]["txtforgetPassword"].value=="")
      			{
          
			        alert("Please Enter Email Address");
			        return false;
          
      			}
				
				if(document.getElementById("lblforgetPassword1").innerText=="Please Check Email.")
				{
					  alert("Please Check Email");
			        return false;
					
				} 

				return true;
			}

			
		</script>
		 <script type="text/javascript">
      function ForgetEmailCheck11(Email) 
{
  var xhttp = new XMLHttpRequest();
  var Url = "AjaxForgetEmail.php?FID="+Email;
  //alert(Url);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("lblforgetPassword1").innerHTML = this.responseText;
     
    }
  };
  xhttp.open("GET", Url, true);
  xhttp.send();
}

  </script>
	</head>
	
	<!-- PHP User Registration Code Start -->
	
	</script>
		<?php
			if(isset($_REQUEST['btnSubmit']))
			{
				$select="select Password from tbluser where Email='".$_REQUEST['txtforgetPassword']."'";
        //echo $select;
        $select_qry=mysqli_query($con,$select);
        //echo $select_qry;
         $res=mysqli_fetch_array($select_qry);
          $Password=base64_decode($res['Password']);
          $to=$_REQUEST['txtforgetPassword'];
          $subject = "Forget Password";   
          $message = " We have sent your Password Below. \n Email : ".$_REQUEST['txtforgetPassword']."\n Password : ".$Password;
          $from = "seedandspark1@gmail.com";
          $headers = "From:" . $from;
          $set=mail($to,$subject,$message,$from);
        header("location:index.php");			
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
								<h1>Forget Password</h1>
								
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="ForgetPassword.php">Forget Password</a></li>
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
					<form  method="post" name="forgetForm">
						<div class="rows" style="margin-left: 200px; margin-bottom: 100px;">
						<h4>We have sent your password to your register Email Address</h4>
						<h5>Please check your email to continue......</h5>
						</div>
						<div class="row">

							
							
							<div class="col-md-6 col-xs-12" style="margin-left: 300px;">
								<div class="single-input">
									<input type="email" placeholder="Type Register Email " name="txtforgetPassword" id="txtforgetPassword" onblur=" ValidateEmailID('txtforgetPassword','lblforgetPassword'); return ForgetEmailCheck11(this.value);">
									<label id="lblforgetPassword" style="color: red" ></label>
										
									<label id="lblforgetPassword1" style="color: red" ></label>
									
									
								</div> 
							</div> 
						</div> <!-- /.row --><br>


						<button type="submit" name="btnSubmit" style="margin-left: 500px;" class="hvr-float-shadow" onclick="return forgetValidation();">Submit</button>
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