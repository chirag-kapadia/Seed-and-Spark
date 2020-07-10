<?php include_once("Admin/Connection.php");?>
<!DOCTYPE html>
<html lang="en">
	

<head>
		<?php include_once("LoadFiles.php");?>
		
		<script type="text/javascript" src="js/JavaScriptFunctions.js"></script>
		<script type="text/javascript">
			
			function Vali()
			{
				var msg="";
				if(document.getElementById("txtFirstName").value=="")
				{
					msg +="\nPlease Enter FirstName";
				}
				if(document.getElementById("txtLastName").value=="")
				{
					msg +="\nPlease Enter LastName";
				}
				if(document.getElementById("txtDob").value=="")
				{
					msg +="\nPlease Enter Date Of Birth";
				}
				if(document.getElementById("txtEmail").value=="")
				{
					msg +="\nPlease Enter Email Id";
				}
				if(document.getElementById("txtPassword").value=="")
				{
					msg +="\nPlease Enter Password";
				}
				if(document.getElementById("txtConfirmPassword").value=="")
				{
					msg +="\nPlease Enter Re-Enter Password";
					
				}
				if(document.getElementById("txtContactNo").value=="")
				{
					msg +="\nPlease Enter Contact No";
					
				}
				if(document.getElementById("lblConfirmPassword").innerText=="* Password & Confirm Password does not match")
				{
			
					alert(msg+="Password & Confirm Password does not match");
					return false;
			
				}
				if(document.getElementById("lblDate").innerText=="* You are Under Age (Below 18).")
				{
			
					alert(msg+="You are not eligible to Register our Website");
					return false;
			
				}
				if(document.getElementById("lblEmail1").innerText=="* Email already Exists.")
				{
			
					alert(msg+="Email is already Exists");
					return false;
			
				}
				if(document.getElementById("lblContactNo1").innerText=="Contact Number already Exists.")
				{
			
					alert(msg+="Contact Number already Exists.");
					return false;
			
				}
				if(msg!="")
				{
					alert(msg);
					return false;
				}
				return true;
			}

			function checkCheckBoxes(checkboxes) 
			{
				if (checkboxes.chkInvestor.checked == false &&
					checkboxes.chkInitiator.checked == false &&
  					checkboxes.chkExpert.checked == false) //my txtcmd_____ is Name of Control
				{
					alert ('Please select atlest one user Type!');
					return false;
				} 
				else
				{    
					return true;
				}
			}
		function EmailCheck12(EmailID)
		{
			
				  	var xhttp = new XMLHttpRequest();
				  	var Url = "AjaxEmailCheck.php?EID="+EmailID;
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
	
		 /*Contact validation*/
		function ContactNoCheck(ContactNo) 
		{
		 	var xhttp = new XMLHttpRequest();
		 	var Url = "AjaxContactNoCheck.php?CNO="+ContactNo;
  			//alert(Url);
  			xhttp.onreadystatechange = function()
  			{
  				if (this.readyState == 4 && this.status == 200) 
  				{
  					document.getElementById("lblContactNo1").innerHTML = this.responseText;
  				}
  			};
  			xhttp.open("GET", Url, true);
  			xhttp.send();
		}
  		/*End Contact validation*/

		</script>
	</head>
	
	<!-- PHP User Registration Code Start -->
	
	</script>
		<?php
			if(isset($_REQUEST['btnSubmit']))
			{	
				if(!isset($_REQUEST['chkInitiator']))
	           {
	            $_REQUEST['chkInitiator']=0;
	           }
	           if(!isset($_REQUEST['chkInvestor']))
	           {
	            $_REQUEST['chkInvestor']=0;
	           }
	           if(!isset($_REQUEST['chkExpert']))
	           {
	            $_REQUEST['chkExpert']=0;
	           }
				$Insert_Query="insert into tblUser values(null,'".$_REQUEST['txtFirstName']."',null,'".$_REQUEST['txtLastName']."','".$_REQUEST['txtContactNo']."','".$_REQUEST['txtDob']."',null,null,'".$_REQUEST['txtEmail']."','".base64_encode($_REQUEST['txtPassword'])."',null,'".$_REQUEST['chkInitiator']."','".$_REQUEST['chkInvestor']."','".$_REQUEST['chkExpert']."',0,0,now())";
         		//echo $Insert_Query;
         		 $Exe_Insert=mysqli_query($con,$Insert_Query)or die(mysqli_error($con));
          	$Last_Insert_ID=mysqli_insert_id($con);
         		 //$LastUID=mysqli_insert_id($con);
         		//$_SESSION['LastUID']=mysqli_insert_id($con);
         		/*if(isset($_REQUEST['chkExpert']))	
         		{
         			if($_REQUEST['chkExpert']==1)
         			{
         				$insert_ExpertDetail="insert into tblExpertDetail values(null,$Last_Insert_ID,null,null,null,null,0,0)";
         				$Exe_ExpertDetail=mysqli_query($con,$insert_ExpertDetail) or die(mysqli_error($con));
         			}
         		}*/
         		/*if(isset($_REQUEST['chkInitiator']))
         		{
         			if($_REQUEST['chkInitiator']==1)
         			{
         				$insert_InitiatorDetail="insert into tblInitiatorDetail values(null,'$Last_Insert_ID',null,null,null,null,0)";
         				$Exe_InitiatorDetail=mysqli_query($con,$insert_InitiatorDetail) or die(mysqli_error($con));
         			}
         		}*/
         

          	/*Send Email*/
          		$Email=$_REQUEST['txtEmail'];
          		$Subject="Email Verification";
				$Code2=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
				$from="seedandspark1@gmail.com";

				mail($Email,$Subject,$Code2,$from);	

				$_SESSION['Code']=$Code2;
				//echo $_SESSION['Code'];
				header("location:CheckCode.php?UserID='$Last_Insert_ID'");
          	/*End Send Email*/

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
								<h1>Registration</h1>
								<p></p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">SignUp</a></li>
								</ul>
								
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
					<form  method="post" onsubmit="return checkCheckBoxes(this);">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="First name *" name="txtFirstName" id="txtFirstName" onkeypress="return CharsOnly(event);" onblur="ValidateControl('txtFirstName','lblFirstName','First Name')"; >
									<label id="lblFirstName" style="color: red" ></label>
								</div> 
							</div> 
							<div class="col-md-6 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="Last name *" name="txtLastName" id="txtLastName" onkeypress="return CharsOnly(event);" onblur="ValidateControl('txtLastName','lblLastName','Last Name')"; >
									<label id="lblLastName" style="color: red" ></label>
								</div> 
							</div> 
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input onfocus="(this.type='Date')"  placeholder="Date of Birth *"  name="txtDob" id="txtDob" onblur="ValidateAge('txtDob','lblDate');" >
									<label id="lblDate" style="color: red" ></label>
								</div> 
							</div>
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="email" placeholder="Email *" name="txtEmail" id="txtEmail" onblur="ValidateEmailID('txtEmail','lblEmail'); return EmailCheck12(this.value);" >
									<label id="lblEmail" style="color: red"></label>
									<label id="lblEmail1" style="color: yellow"></label>
								</div> 
							</div>
							<!-- <div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="Email Verification Code *" name="txtCode" id="txtCode" onkeypress="return NumbersOnly(event);" maxlength="6" >
									<label id="lblCheckCode" style="color: red"></label>
								</div> 
							</div> -->
							<div class="col-md-6 col-xs-12">
								<div class="single-input">
									<input type="password" placeholder="Password *" name="txtPassword" id="txtPassword" onblur="ValidateControl('txtPassword','lblPassword','Password')"; minlength="8" maxlength="16">
									<label id="lblPassword" style="color: red"></label>
								</div> 
							</div> 
							<div class="col-md-6 col-xs-12">
								<div class="single-input">
									<input type="password" placeholder="Re-Enter Password *" name="txtConfirmPassword" id="txtConfirmPassword" onblur="ValidatePassword('txtPassword','txtConfirmPassword','lblConfirmPassword');" minlength="8" maxlength="16" >
									<label id="lblConfirmPassword" style="color: red"></label>
								</div> 
							</div> 
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="ContactNo *" onblur = "ContactNoCheck(this.value);" name="txtContactNo" id="txtContactNo" maxlength="10" onkeypress="return NumbersOnly(event);" onblur="ValidateControl('txtContactNo','lblContactNo','Contact Nnumber');">
									<label id="lblContactNo" style="color: red"></label>
									<label id="lblContactNo1" style="color: red"></label>
								</div> 
							</div>
							
							<div class="col-xs-12">
								<div class="col-md-4" style="">
									<input type="checkbox" style="height: 20px;width: 20px; margin-left: 170px" checked="checked" name="chkInvestor" id="chkInvestor"  value="1" >&nbsp;Investor<br><br>
									<label style="margin-left: 130px;"><ul><li type="circle" style="color: SS;font-family: Calibri Light">If you want to invest in a project</li></ul></label>
								</div>
								<div class="col-md-4" style="width: ">
									<input type="checkbox" style="height: 20px;width: 20px; margin-left: 160px;" name="chkInitiator" value="1">&nbsp;Initiator<br><br>
									<label style="margin-left: 110px;"><ul><li type="circle" style="color: ;font-family: Calibri Light">If you have an idea and want to start a project</li></ul></label>
								</div>
								<div class="col-md-4" style="">
									<input type="checkbox" style="height: 20px;width: 20px; margin-left: 140px;" name="chkExpert" value="1">&nbsp;Expert	<br><br>						
									<label style="margin-left: 110px;"><ul>
										<li type="circle" style="color: ;font-family: Calibri Light">If you are an Expert and want to give your review.</li></ul></label>
								</div>
							</div>  
						</div> <!-- /.row --><br>

						<button type="submit" name="btnSubmit" style="margin-left: 500px;" class="hvr-float-shadow" onclick="return Vali(this);">Submit</button>
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