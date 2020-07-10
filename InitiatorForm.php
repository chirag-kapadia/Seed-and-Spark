<?php include_once("Admin/Connection.php");?>
<!DOCTYPE html>
<html lang="en">


<head>
	<?php include_once("LoadFiles.php");?>
	<script type="text/javascript" src="js/JavaScriptFunctions.js">

	</script>
</head>
	<script type="text/javascript">
  /*function frmValidate()
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

  */ 

   </script>
   <?php
   		if(isset($_REQUEST['btnSubmit']))
   		{
				$insert="insert into tblInitiatorDetail values(null,'".$_SESSION['UserID']."','".$_FILES['fileGovIssueDocument']['name']."','".$_REQUEST['txtBankA/cNo']."','".$_REQUEST['txtIFSCcode']."','".$_REQUEST['txtDebit/CreditNo']."',0)";
				$Exe_insert=mysqli_query($con,$insert) or die(mysqli_error($con));   	
				//echo $insert;
   		
	   			$fname=$_FILES['fileGovIssueDocument']['name']; 
		        move_uploaded_file($_FILES['fileGovIssueDocument']['tmp_name'],"Admin/IDProof/".$fname);  

		        header("Location:index.php");	   		
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

		<!-- Expert Form -->
		<!-- select Expert  -->
		<?php
		$User=$_SESSION["UserID"];
		$select="select * from tbluser where UserID='$User'";
		$select_qry=mysqli_query($con,$select) or die(mysqli_error($con));
		$ans1=mysqli_fetch_array($select_qry);
		
		?>

		<!-- Theme Inner Banner ____________________________ -->
			<section>
				<div class="Theme-Inner-Banner inner-banner-bg-img-one">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1>Initiator Form</h1>
								<p>SPONSOR A CHILD AND CHANGE THEIR LIFE FOR <br>GOOD</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Iniator Form</a></li>
								</ul>
								<a href="#" class="hvr-bounce-to-right">Need Our Help</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>

		<section class="Join-Volunteer-Pages margin-bottom">
			<div class="container">
				<div class="Theme-title text-center">
						<h2>Finally Lets Confirm Your Eligiblity</h2>
						<h6>Teel us where you are based and confirm a few other details to prove your individuality</h6>
				</div>
				<br>
				<form method="post" class="form-validation" autocomplete="off" enctype="multipart/form-data">
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
						<hr>
						<!-- <div class="col-md-12 col-xs-12">
							<div class="single-input">
								<input type="checkbox" name="chkbankDetail" style="height: 20px;width: 20px;" id="chkbankDetail" value="1" required="">&nbsp;&nbsp;&nbsp;I can verify a bank account and goverment issued ID.
							</div> 
						</div>
						
						<div class="col-md-12 col-xs-12">
							<div class="single-input">
								<input type="checkbox" name="chkCreitDebitDetail" style="height: 20px;width: 20px; " id="chkCreitDebitDetail" value="1" required="">&nbsp;&nbsp;&nbsp;I have a  Debit/Credit Card.
							</div> 
						</div> -->
						<hr>
						<!-- <div class="col-xs-12">
							<div class="single-input">
								<input type="text" placeholder="Goverment Issued ID *" name="txtGovIssueID" id="txtGovIssueID">
								<label id="lblGovIssueID" style="color: red"></label>
							</div> 
						</div>  --><!-- /.col -->
						<div class="col-xs-12">
							<div class="single-input">
								<input onfocus="(this.type='file')" placeholder="Goverment Issued Document ID Upload *" accept=".png, .jpg, .jpeg" name="fileGovIssueDocument" id="fileGovIssueDocument">
								<label id="lblGovIssueDocument" style="color: red"></label>
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-xs-12">
							<div class="single-input">
								<input type="text" placeholder="Bank A/c No *" name="txtBankA/cNo" id="txtBankA/cNo" maxlength="16" minlength="11">
								<label id="lblBankA/cNo" style="color: red"></label>
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-xs-12">
							<div class="single-input">
								<input type="text" placeholder="Bank IFSC Code *" maxlength="11" minlength="11" name="txtIFSCcode" id="txtIFSCcode">
								<label id="lblIFSCcode" style="color: red"></label>
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<div class="col-xs-12">
							<div class="single-input">
								<input type="text" placeholder="Debit/Credit Card No *" maxlength="16" minlength="16" name="txtDebit/CreditNo" id="txtDebit/CreditNo">
								<label id="lblDebit/CreditNo" style="color: red"></label>
							</div> <!-- /.single-input -->
						</div> <!-- /.col -->
						<!-- <div class="col-xs-12">
							<div class="single-input">
								<input type="text" name="txtCerIssueDate" id="txtCerIssueDate" placeholder="Certificate Issue Date"  onblur="ValidateControl('txtCerIssueDate','lblFirstName','Certificate Issue Date')"; onfocus="(this.type='date')" onblur="(this.type='text')" id="txtCerIssueDate" value="<?php if(isset($Fetch_ExpertArea)) echo $Fetch_ExpertArea['CertificateDate']; ?>">
								<label id="lblCerIssueDate" style="color: red" ></label>
							</div> 
						</div> -->
					</div> <!-- /.row -->
					<button class="hvr-float-shadow" text="Submit" name="btnSubmit"  style="margin-left:450px;">Submit</button>
				</form> <!-- /Form -->
			</div> <!-- /.container -->

			
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