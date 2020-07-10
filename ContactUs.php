<?php include_once("Admin/connection.php");?>
<!DOCTYPE html>

<html lang="en">
	
<head>
		<?php include_once("LoadFiles.php");?>
		<script type="text/javascript" src="js/JavaScriptFunctions.js"></script>
		<script type="text/javascript">
			function ContactusValidate()
			{
				
				if(document.forms["formContactus"]["txtName"].value=="")
				{
					alert("Please Enter your Name");
					return false;
				}
				if(document.forms["formContactus"]["txtEmail"].value=="")
				{
					
					alert("Please Enter Email Address");
					return false;
					
				}
				if(document.forms["formContactus"]["txtQuery"].value=="")
				{
					
					alert("Please Write Something Regarding your Concern");
					return false;
				}
				if(document.getElementById("lblEmail1").innerText=="Email already Exists.")
				{
			
					alert("Email already Exist.");
					return false;
			
				}
				
				return true;
			}

			function ContactusEmailCheck(EmailID)
		{
			
				  	var xhttp = new XMLHttpRequest();
				  	var Url = "AjaxContactusEmailCheck.php?CID="+EmailID;
				  	//alert(Url);
				  	xhttp.onreadystatechange = function() 
				  	{
				    	if (this.readyState == 4 && this.status == 200) 
				    	{
				     		document.getElementById("lblEmail1").innerHTML = this.responseText;
				     	}
			    	};
			    	xhttp.open("GET", Url, true);
					xhttp.send();
		}


		</script>
	</head>
	<?php
			if(isset($_REQUEST['btnSubmit']))
			{	
				
				$Insert_Query="insert into tblinquiry values('Null','".$_REQUEST['txtName']."','".$_REQUEST['txtQuery']."','".$_REQUEST['txtEmail']."',now(),null,null,0,null)";
         	//echo $Insert_Query;
         
         	$Exe_Insert=mysqli_query($con,$Insert_Query)or die(mysqli_error($con));
          	/*Mail*/
          		$Email=$_REQUEST['txtEmail'];
          		$Subject="Seed And Spark ";
				$Message="Thank You for Contacting seed and spark, We loved to help you. ";
				//$from="chiragbroz4diu@gmail.com";

				mail($Email,$Subject,$Message);
          	/*End Mail*/
          	header("location:index.php");
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

			<!-- Theme Inner Banner ____________________________ -->
			<section>
				<div class="Theme-Inner-Banner inner-banner-bg-img-one">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1>Contact Us</h1>
								<p>Contact us.<br> We would love to help you</p>
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Contact</a></li>
								</ul>
								<!-- <a href="#" class="hvr-bounce-to-right">Need Our Help</a> -->
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>

			<!-- Contact Us ____________________________ -->
			<section class="Contact-Us-Pages">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="Contact-Us-Map">
								<!-- Google Map _______________________ -->
								<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59511.73810253834!2d72.76028687891694!3d21.212662284963894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84d438029057%3A0xdf8353c48624d4a!2sMohit+Industries+Limited!5e0!3m2!1sen!2sin!4v1524142468553" width="550" height="450" frameborder="4" style="border:5" allowfullscreen></iframe> -->
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.9161615098483!2d88.3403691148494!3d22.54481313967185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02771346ae015d%3A0xb540e4bce39763!2sVictoria+Memorial!5e0!3m2!1sen!2sin!4v1524143932170" width="550" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div> <!-- /.Contact-Us-Map -->
						</div> <!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="Client-Care">
								<h5>Client Care</h5>
								<ul class="Text">
									<li>India: 922-774-9473</li>
									<li>International: 920-765-3200</li>
									<li>Connect With Us</li>
								</ul> <!-- /.Text -->
								<!-- <ul class="Icon">
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
								</ul> --> <!-- /.Icon -->
							</div> <br><br><!-- /.Client-Care -->
							<div class="Headquarters-One">
								<h5>Gujarat Headquarters</h5>
								<ul>
									<li>225</li>
									<li>Ring Road</li>
									<li>Surat ,Gujarat</li>
									<li>395001</li>
								</ul>
							</div> <!-- /.Headquarters-One -->
						</div> <!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="Headquarters-Two">
								<h5>Kolkata Headquarters</h5>
								<ul>
									<li>21 BekingHam Palace</li>
									<li>Kolkata</li>
									<li>West Bengal</li>
									<li>965-234</li>
								</ul>
								<ul class="Toll-Free">
									<li>Toll Free: 988-299-0338</li>
									<li>Phone: 916-362-0885</li>
									<li>Fax: 916-362-6669</li>
								</ul> <!-- /.Toll-Free -->
							</div> <!-- /.Headquarters-Two -->
						</div> <!-- /.col -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</section> <!-- /.Contact-Us-Pages -->

			<!-- Join Volunteer ____________________________ -->
			<section class="Join-Volunteer-Pages margin-bottom">
				<div class="container">
					<div class="Theme-title text-center">
						<h2>Never Hesitate to Reach Out</h2>
						<h6>Contact us</h6>
					</div>
					<form method="post" name="formContactus" class="form-validation" autocomplete="off">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder=" Your Name *" name="txtName" id="txtName" onkeypress="return CharsOnly(event);" >
									<label id="lblName" style="color: red" ></label>
								</div> 
							</div> 
							<div class="col-md-12	 col-xs-12">
								<div class="single-input">
									<input type="email" placeholder="Email *" name="txtEmail" id="txtEmail" onblur="ValidateEmailID('txtEmail','lblEmail'); return ContactusEmailCheck(this.value);" >
									<label id="lblEmail" style="color: red"></label>
									<label id="lblEmail1" style="color: red"></label>
								</div> 
							</div>
							
							
							<div class="col-xs-12">
								<div class="single-textarea">
									<textarea placeholder="Write something about your experience ...." name="txtQuery"></textarea>
								</div> <!-- /.single-textarea -->
							</div> <!-- /.col -->
						</div> <!-- /.row -->
						<button type="submit" name="btnSubmit" style="margin-left: 500px;" class="hvr-float-shadow" onclick="return ContactusValidate();">Submit</button>
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
				<?php //include_once("AboutUs.php");?>

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