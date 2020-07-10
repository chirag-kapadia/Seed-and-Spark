 <?php
 		 /*	$insert_qry="insert into tblfeedback values(null,'".$_SESSION['UserID']."','".$_REQUEST['txtFeedback']."','".$_REQUEST['txtEmail1']."',now(),'".$_REQUEST["test-1-rating-5"]."'";
 		 	echo $insert_qry;

 		 	$Email=$_REQUEST['txtEmail1'];
          		$Subject="Seed And Spark ";
				$Message="Thank You for your feedback, We will Surely work upon your feedback. ";
				//$from="chiragbroz4diu@gmail.com";

				mail($Email,$Subject,$Message);
          	/*End Mail*/
          	//header("location:index.php");*/
 		 ?>


<?php include_once("Admin/connection.php");?>
<!DOCTYPE html>

<html lang="en">
	
<head>
	<script src="js2/jquery.js" type="text/javascript"></script>
	<script src='js2/jquery.rating.js' type="text/javascript" language="javascript"></script>
	<link href='js2/jquery.rating.css' type="text/css" rel="stylesheet"/>
		<?php include_once("LoadFiles.php");?>
		<script type="text/javascript" src="js/JavaScriptFunctions.js"></script>
		<script type="text/javascript">

			function FeedbackValidate()
			{
				
				
				if(document.forms["formFeedback"]["txtEmail"].value=="")
				{
					
					alert("Please Enter Email Address");
					return false;
					
				}
				if(document.forms["formFeedback"]["txtFeedback"].value=="")
				{
					
					alert("Please Write Something Regarding your Concern");
					return false;
				}
				
				if(document.getElementById("lblEmail121").innerText=="Email already Exists.")
				{
			
					alert("Email already Exists.");
					return false;
			
				}
				
				return true;
			}

			function feedbackEmailCheck(EmailID)
		{
			
				  	var xhttp = new XMLHttpRequest();
				  	var Url = "AjaxFeedbackEmail.php?FID="+EmailID;
				  	//alert(Url);
				  	xhttp.onreadystatechange = function() 
				  	{
				    	if (this.readyState == 4 && this.status == 200) 
				    	{
				     		document.getElementById("lblEmail121").innerHTML = this.responseText;
				     	}
			    	};
			    	xhttp.open("GET", Url, true);
					xhttp.send();
		}


		</script>
		<style type="text/css">
			.slidecontainer {
			    width: 100%;
			}

			.slider {
			    -webkit-appearance: none;
			    width: 100%;
			    height: 25px;
			    background: White;
			    outline: none;
			    opacity: 0.7;
			    -webkit-transition: .2s;
			    transition: opacity .2s;
			}

			.slider:hover {
			    opacity: 1;
			}

			.slider::-webkit-slider-thumb {
			    -webkit-appearance: none;
			    appearance: none;
			    width: 25px;
			    height: 25px;
			    background: #ff3f00;
			    cursor: pointer;
			}

			.slider::-moz-range-thumb {
			    width: 25px;
			    height: 25px;
			    background:#ff6a00;
			    cursor: pointer;
			}
		</style>
	</head>
	<?php
			if(isset($_REQUEST['btnSubmit']))
			{	
				if(isset($_SESSION['UserID']))
				{
					$insert_qry="insert into tblfeedback values(null,'".$_SESSION['UserID']."','".$_REQUEST['txtFeedback']."','".$_REQUEST['txtEmail']."',now(),'".$_REQUEST["test-1-rating-5"]."')";
				mysqli_query($con,$insert_qry)or die(mysqli_error($con));
				}else
				{
					$insert_qry1="insert into tblfeedback values(null,null,'".$_REQUEST['txtFeedback']."','".$_REQUEST['txtEmail']."',now(),'".$_REQUEST["test-1-rating-5"]."')";
					//echo "Without session";
					mysqli_query($con,$insert_qry1)or die(mysqli_error($con));
				}
				//echo $insert_qry;
         	
         
         	
          	/*Mail*/
          		$Email=$_REQUEST['txtEmail'];
          		$Subject="Seed And Spark ";
				$Message="Thank You for your Feedback, We will Surely Work Upon your Feedback ";
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
								<h1>Feedback</h1>
								<p>Help Us To Improve Ouselves</p>
								<ul>
									<li><a href="index.php">Home - Feedback</a></li>
									
									
								</ul>
								<!-- <a href="#" class="hvr-bounce-to-right">Need Our Help</a> -->
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>


			<!-- Join Volunteer ____________________________ -->
			<section class="Join-Volunteer-Pages margin-bottom">
				<div class="container">
					<div class="Theme-title text-center">
						<h2>Help Us To Improve Ourselves</h2>
						<h6>Give Us Feedback</h6>
					</div>
					<form method="post" name="formFeedback" class="form-validation" autocomplete="off">
						<div class="row">

							 
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="email" placeholder="Email *" name="txtEmail" id="IDEmail" onblur="ValidateEmailID('IDEmail','lblEmail'); return feedbackEmailCheck(this.value);" >
									<label id="lblEmail" style="color: red"></label>
									<label id="lblEmail121" name="lblEmail1" style="color: yellow"></label>
								</div> 
							</div>
							
							
							<div class="col-xs-12">
								<div class="single-textarea">
									<textarea placeholder="Please provide your valuable feedback ...." name="txtFeedback"></textarea>
								</div> <!-- /.single-textarea -->
							</div> <!-- /.col -->
							<div class="col-xs-12" style="margin-left: 535px;">
								<input class="star required" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="1" />
								<input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="2"/>
								<input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="3" />
								<input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="4"/>
								<input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="5"/>
								 <!-- /.single-textarea -->
							</div>
						</div> <!-- /.row -->
						<br>
						<br>
						<button type="submit" name="btnSubmit" style="margin-left: 500px;" class="hvr-float-shadow" onclick="return FeedbackValidate();">Send Request</button>
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


</html>

