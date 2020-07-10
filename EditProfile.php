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
				if(document.getElementById("txtFirstName").value=="")
				{
					msg +="\nPlease Enter FirstName";
					
				}
				if(document.getElementById("txtMiddleName").value=="")
				{
					msg +="\nPlease Enter MiddleName";
					
				}
				if(document.getElementById("txtLastName").value=="")
				{
					msg +="\nPlease Enter LastName";
					
				}
				if(document.getElementById("txtEmail").value=="")
				{
					msg +="\nPlease Enter Email Id";
					
				}
				
				if(document.getElementById("txtContactNo").value=="")
				{
					msg +="\nPlease Enter Contact No";
					
				}				

				/*if(document.getElementById("lblEmail").value=="Email already Exists.")
				{
					msg +="\nBhail Error to Vanch";
					
				}
*/
				if(msg!="")
				{
					alert(msg);
					return false;
				}
				return true;
			}

			/*function checkCheckBoxes(checkboxes) 
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
			}*/
		
	
		 /*Contact validation*/


		  function getState(CountryID) 
		  {
		      var xhttp = new XMLHttpRequest();      
		      var strURL="findState.php?ConID="+CountryID;       
		      //alert(strURL);
		      xhttp.onreadystatechange = function() 
		      {      
		      if (this.readyState == 4 && this.status == 200) 
		      {
		       //alert(this.responseText);
		       document.getElementById("statediv").innerHTML = this.responseText;
		      }
		    };
		    xhttp.open("GET", strURL, true);
		    xhttp.send();
		  }

		function getCity(StateID) 
		{
		    var xhttp = new XMLHttpRequest();
		    var strURL="findCity.php?StID="+StateID;  
		    xhttp.onreadystatechange = function() 
		    {    
		    if (this.readyState == 4 && this.status == 200) {
		     document.getElementById("citydiv").innerHTML = this.responseText;
		    }
		  };
		  xhttp.open("GET", strURL, true);
		  xhttp.send();
		}

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
/*
	           if(file_exists($_FILES['txtFileup']['name']))
	           {
	           		$img=$_FILES['txtFileup']['name'];
	           }
	           else
	           {
	           		$img=$oldimg;
	           }*/
	           if(!empty($_FILES['txtFileup']['name']))
				{	if(file_exists($_REQUEST['txthdnImageNameOld']))
					{
						$oldimg=$_REQUEST['txthdnImageNameOld'];

					unlink("Admin/Profile/$oldimg");
					}
					$img2=date("HMmd").$_FILES['txtFileup']['name'];
					move_uploaded_file($_FILES['txtFileup']['tmp_name'],"Admin/Profile/$img2");
				}
				else
				{
					$img2=$_REQUEST["txthdnImageNameOld"];
				}
	           $Update="update tbluser set FirstName='".$_REQUEST['txtFirstName']."',MiddleName='".$_REQUEST['txtMiddleName']."',LastName='".$_REQUEST['txtLastName']."',ContactNo='".$_REQUEST['txtContactNo']."',CityID='".$_REQUEST['cmbCity']."',Gender='".$_REQUEST['rbtnGender']."',ProfilePic='".$img2."' where UserID=".$_SESSION['UserID'];
	           //echo $Update;
	           $Exe_Insert=mysqli_query($con,$Update)or die(mysqli_error($con));
          		//header("location:index.php");

				//$Insert_Query="insert into tblUser values('Null','".$_REQUEST['txtFirstName']."','Null','".$_REQUEST['txtLastName']."','".$_REQUEST['txtContactNo']."','".$_REQUEST['txtDob']."','Null','Null','".$_REQUEST['txtEmail']."','".base64_encode($_REQUEST['txtPassword'])."','Null','".$_REQUEST['chkInitiator']."','".$_REQUEST['chkInvestor']."','".$_REQUEST['chkExpert']."','Null',1,now())";
         		//echo $Insert_Query;
         
         		//$Exe_Insert=mysqli_query($con,$Insert_Query)or die(mysqli_error($con));
          		//header("location:index.php");
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
								<h1>Edit Profile</h1>
								<p>Personify Yourself </p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Edit Profile</a></li>
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
					<!-- Expert Form -->
					<?php
					$User=$_SESSION["UserID"];
					$select="select * from tbluser where UserID='$User'";
					$select_qry=mysqli_query($con,$select);
					$ans1=mysqli_fetch_array($select_qry);
					?>
					<form  method="post" enctype="multipart/form-data">
						<div class="row">
						<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<?php
                                      $imageName=$ans1['ProfilePic'];
                                      if($imageName=="" || !file_exists("Admin/Profile/$imageName"))
                                      {
                                        $imageName="no1.png";
                                      }
                                    ?>
                                    <img src="Admin/Profile/<?php echo $imageName;?>" style="margin-left: 470px;height: 200px;width: 200px; class="rounded-circle img-border gradient-summer width-100" alt="Card image">
								</div> 
							</div>
							</div> 
						<div class="row">
							<!-- <div class="col-md-12 col-xs-12">
								<div class="single-input">
									<?php
                                      $imageName=$ans1['ProfilePic'];
                                      if($imageName=="" || !file_exists("Admin/Profile/$imageName"))
                                      {
                                        $imageName="no1.png";
                                      }
                                    ?>
                                    <img src="Admin/Profile/<?php echo $imageName;?>" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
								</div> 
							</div>  --><br><br><br><br><br><br>
							<div class="col-md-4 col-xs-12">
								<div class="single-input">
									<input type="text" readonly="" placeholder="First name *" name="txtFirstName" id="txtFirstName" onkeypress="return CharsOnly(event);" onblur="ValidateControl('txtFirstName','lblFirstName','First Name')"; value="<?php if(isset($ans1)) echo $ans1['FirstName']; ?>">
									<label id="lblFirstName" style="color: red" ></label>
								</div> 
							</div> 
							<div class="col-md-4 col-xs-12">
								<div class="single-input">
									<input type="text" readonly="" placeholder="Middle name *" name="txtMiddleName" id="txtMiddleName" onkeypress="return CharsOnly(event);" onblur="ValidateControl('txtMiddleName','lblMiddleName','Middle Name')"; value="<?php if(isset($ans1)) echo $ans1['MiddleName']; ?>" >
									<label id="lblMiddleName" style="color: red" ></label>
								</div> 
							</div> 
							<div class="col-md-4 col-xs-12">
								<div class="single-input">
									<input type="text" readonly="" placeholder="Last name *" name="txtLastName" id="txtLastName" onkeypress="return CharsOnly(event);" onblur="ValidateControl('txtLastName','lblLastName','Last Name')"; value="<?php if(isset($ans1)) echo $ans1['LastName']; ?>">
									<label id="lblLastName" style="color: red" ></label>
								</div> 
							</div> 
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="email" placeholder="Email *" readonly="" name="txtEmail" id="txtEmail" value="<?php if(isset($ans1)) echo $ans1['Email']; ?>">
								</div> 
							</div>						
							
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="ContactNo *" onblur = "ContactNoCheck(this.value);" name="txtContactNo" id="txtContactNo" maxlength="10" onkeypress="return NumbersOnly(event);" onblur="ValidateControl('txtContactNo','lblContactNo','Contact Nnumber')"; value="<?php if(isset($ans1)) echo $ans1['ContactNo']; ?>">
									<label id="lblContactNo" style="color: red"></label>
									<label id="lblContactNo1" style="color: red"></label>
								</div> 
							</div>

							<div class="col-md-4 col-xs-12">
								<!-- <div class="col-xs-12"> -->
								<div class="single-input">
									<select class="form-control" name="cmbCountry" onChange="getState(this.value)" required="" >
										
										<option selected="selected" >Select Country</option>
										  <?php
										      $select_Country="select * from tblCountry";
										      $select_query=mysqli_query($con,$select_Country) or die(mysqli_error($con));
										      while($fetch_Country=mysqli_fetch_array($select_query))
										      {
										  ?>                  
										      <option value="<?php echo $fetch_Country['CountryID']?>"><?php echo $fetch_Country['CountryName']?></option>
										      <?php
										        }
										      ?> 
									</select>
									
								</div> <!-- /.col -->
								<!-- </div> -->

							</div>
							<div class="col-md-4 col-xs-12">
								<!-- <div class="col-xs-12"> -->
								<div class="single-input" id="statediv">
									<select class="form-control" name="cmbState" required="" >
							            <option selected="selected">Select Country First</option>            
							        </select>									
								</div> <!-- /.col -->
								<!-- </div> -->

							</div>
							<div class="col-md-4 col-xs-12">
								<!-- <div class="col-xs-12"> -->
								<div class="single-input" id="citydiv">
									<select class="form-control" name="cmbCity" required="" >
							            <option selected="selected">Select State First</option>							                               
							        </select>									
								</div> <!-- /.col -->
								<!-- </div> -->
							</div>	

							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									
									<input type="file" placeholder="Change Profile" name="txtFileup" id="txtFileup" value="<?php if(isset($ans1)) echo $ans1['ProfilePic']; ?>">
									<input type="text" name="txthdnImageNameOld" value="<?php echo $ans1['ProfilePic'];?>" hidden >
								</div> 
							</div>

							<div class="col-md-4 col-xs-12">
								<!-- <div class="col-xs-12"> -->
								<div class="single-input" id="citydiv" style="margin-left: 490px;font-size: x-large;">
									<input type="radio" name="rbtnGender" value="Male" style="height: 15px;width: 15px;">&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="rbtnGender" value="Female" style="height: 15px;width: 15px;" >&nbsp;&nbsp;Female								
								</div> <!-- /.col -->
								<!-- </div> -->
							</div>				
							
							<!-- <div class="col-xs-12">
								<div class="col-md-4" style="">
									<input type="checkbox" style="height: 20px;width: 20px; margin-left: 170px" checked="checked" name="chkInvestor" style="" value="1" >&nbsp;Investor<br><br>
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
							</div>  --> 
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