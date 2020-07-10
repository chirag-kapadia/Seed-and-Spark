<?php include_once("Admin/Connection.php");?>
<!DOCTYPE html>
<html lang="en">


<head>
	<?php include_once("LoadFiles.php");?>
	<script type="text/javascript" src="js/JavaScriptFunctions.js">

	</script>
</head>
	<script type="text/javascript">
  function frmValidate()
  {
    var msg="";
    if(document.getElementById("txtName").value=="")
    {
      msg +="\nPlease Enter Name";
      
    }
    if(document.getElementById("txtEmail").value=="")
    {
      msg +="\nPlease Enter Email";
      
    }
    if(document.getElementById("txtPhone").value=="")
    {
      msg +="\nPlease Enter Phone";
      
    }
    if(document.getElementById("txtCertificate").value=="")
    {
      msg +="\nPlease Enter your Certificate for.. ";
      
    }
    if(document.getElementById("txtCerIssueDate").value=="")
    {
      msg +="\nPlease Enter Certificate Issue Date";
      
    }
    if(document.getElementById("txtExperience").value=="") 
    {
          msg +="\nPlease Enter Experience";   
    }
    if(document.getElementById("cmdArea").value=="")
    {
      msg +="\nPlease select Area Name";
      
    }
  	if(msg!="")
    {
      alert(msg);
      return false;
    }
    return true;
  }

   

   </script>
   <?php
   		if(isset($_REQUEST['btnSubmit']))
   		{
   			foreach ($_REQUEST['cmdArea'] as $key => $value) 
	   		{
				print_r($_REQUEST['cmdArea'][$key]);
				$insert="insert into tblexpertdetail values('NULL','".$_SESSION['UserID']."','".$_REQUEST['cmdArea'][$key]."','".$_REQUEST['txtCertificate']."','".$_REQUEST['txtCerIssueDate']."','".$_REQUEST['txtExperience']."',0,1)";
				$Exe_insert=mysqli_query($con,$insert) or die(mysqli_error($con));   	
				//echo $insert;
				header("Location:index.php");
	   		}	
   		}
   		
   		//$insert="insert into tblexpertdetail values('NULL','".$_SESSION['UserID']_."',)";
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

		<!-- Expert Form -->
		<!-- select Expert  -->
		<?php
		$User=$_SESSION["UserID"];
		$select="select * from tbluser where UserID='$User'";
		$select_qry=mysqli_query($con,$select) or die(mysqli_error($con));
		$ans1=mysqli_fetch_array($select_qry);
	

		/*<!-- select ExpertAreaDetail  -->*/
		
		$select_ExpertArea="select * from tblExpertDetail where UserID='$User'";
		$Exe_ExpertArea=mysqli_query($con,$select_ExpertArea) or die(mysqli_error($con));
		$Fetch_ExpertArea=mysqli_fetch_array($Exe_ExpertArea);
		?>

		<!-- Theme Inner Banner ____________________________ -->
			<section>
				<div class="Theme-Inner-Banner inner-banner-bg-img-one">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1>Expert Form</h1>
								<p>SPONSOR A CHILD AND CHANGE THEIR LIFE FOR <br>GOOD</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Expert Form</a></li>
								</ul>
								<a href="#" class="hvr-bounce-to-right">Need Our Help</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>

		<section class="Join-Volunteer-Pages margin-bottom">
			<div class="container">
				<br>
				<form method="post" class="form-validation" autocomplete="off">
					<div class="row" style="width: 700px;margin-left:200px;">
						<div class="col-md-4 col-xs-12">
							<div class="single-input">
								<input type="text" name="txtName" id="txtName" readonly="" value="<?php if(isset($ans1)) echo $ans1['FirstName']; ?>">
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-md-4 col-xs-12">
							<div class="single-input">
								<input type="email" readonly="" name="txtEmail" id="txtEmail" value="<?php if(isset($ans1)) echo $ans1['Email']; ?>">
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-md-4 col-xs-12">
							<div class="single-input">
								<input type="text" readonly="" name="txtPhone" id="txtPhone" value="<?php if(isset($ans1)) echo $ans1['ContactNo']; ?>">
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-xs-12">

							<div class="single-input">
								<input type="text" placeholder="Certificate for *" name="txtCertificate" id="txtCertificate"  onblur="ValidateControl('txtCertificate','lblCertificate','Certificate for!')"; onkeypress="return CharsOnly(event);" value="<?php if(isset($Fetch_ExpertArea)) echo $Fetch_ExpertArea['CertificateType']; ?>" >
								<label id="lblCertificate" style="color: red"></label>
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-xs-12">
							<div class="single-input">
								<input type="text" name="txtCerIssueDate" id="txtCerIssueDate" placeholder="Certificate Issue Date"  onblur="ValidateControl('txtCerIssueDate','lblFirstName','Certificate Issue Date')"; onfocus="(this.type='date')" onblur="(this.type='text')" id="txtCerIssueDate" value="<?php if(isset($Fetch_ExpertArea)) echo $Fetch_ExpertArea['CertificateDate']; ?>">
								<label id="lblCerIssueDate" style="color: red" ></label>
							</div> <!-- /.col -->
						</div>
						<div class="col-xs-12">
							<div class="single-textarea">
								<textarea placeholder="Write something about your experience ...." name="txtExperience" id="txtExperience" onblur="ValidateControl('txtExperience','lblExperience','Experience')"; onkeypress="return CharNumber(event);" value="<?php if(isset($Fetch_ExpertArea)) echo $Fetch_ExpertArea['Experience']; ?>"></textarea>
								<label id="lblExperience" style="color: red"></label>
							</div> <!-- /.single-textarea -->
							
						</div> <!-- /.col -->
						<div class="col-xs-12">
							<div class="single-input">
								<select class="selectpicker" id="cmdArea" multiple="" name="cmdArea[]" onblur="ValidateControl('cmdArea','lblAreaName','Area Name')"; >
									
									<?php
									$select="select * from tblexpertarea";
									$select_qry=mysqli_query($con,$select) or die(mysqli_error($con));
									while($res=mysqli_fetch_array($select_qry))
									{
										?>
										<option value="<?php echo $res['ExpertAreaID'];?>"><?php echo $res['AreaName'];?></option>
										<?php
									}
									?>
								</select>
								<label id="lblAreaName" style="color: red"></label>
							</div> <!-- /.col -->
						</div>


					</div> <!-- /.row -->
					<button class="hvr-float-shadow" text="Submit" name="btnSubmit" onclick="return frmValidate();" style="margin-left:450px;">Send Request</button>
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
		<!-- End Expert Form -->



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