<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once("LoadFiles.php");?>
		<?php include_once("Admin/Connection.php");?>
		<script type="text/javascript" src="js/JavaScriptFunctions.js"></script>
				<link rel="stylesheet" type="text/css" href="Date/jquery-ui.css">

<script src="Date/jquery.js"></script>
<script src="Date/jquery-ui.js"></script>
		<!-- bootstrap-select.min.js -->
		

		<script type="text/javascript">
		$(document).ready(function(){
           $(".calendar").datepicker({
           	minDate:-0,
             });
		});
	</script>
	</head>

		<script type="text/javascript">
			
			function AllFrmValidation()
			{
				var msg="";
				if(document.getElementById("cmbArea").value=="")
				{
					msg +="\nPlease Select Exprt Area";
					
				}
				if(document.getElementById("txtProjectTitle").value=="")
				{
					msg +="\nPlease Enter Project Title";
					
				}
				if(document.getElementById("txtSDescription").value=="")
				{
					msg +="\nPlease Enter Small Description";
					
				}
				if(document.getElementById("txtFundTarget").value=="")
				{
					msg +="\nPlease Enter Fund Target";
					
				}				

				if(document.getElementById("txtFundinterest").value=="")
				{
					msg +="\nPlease Enter Fund Interest Rate";
					
				}

				if(document.getElementById("txtFileImage").value=="")
				{
					msg +="\nPlease select Images";
					
				}
				if(document.getElementById("txtFileVideo").value=="")
				{
					msg +="\nPlease select Video";
					
				}
				if(document.getElementById("txtExpectdDate").value=="")
				{
					msg +="\nPlease Enter Expected Complition Date";
					
				}				
				if(document.getElementById("txtBDescription").value=="")
				{
					msg +="\nPlease Enter Description";
					
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
		</script>

		<!-- Add Project start-->
			<?php

				/*check Initiator bank account details verified or not*/
				$select_Initiator_Detail_verified="select * from tblInitiatorDetail where UserID=".$_SESSION['UserID'];
				$Exe_IDV=mysqli_query($con,$select_Initiator_Detail_verified) or die(mysqli_error($con));
				$Fetch_IDV=mysqli_fetch_array($Exe_IDV);

				if(isset($_REQUEST['btnSubmit']))
				{	
					if(isset($_SESSION['UserID']))
					{
						if($_SESSION['IsInitiator']==1)
						{
							if($Fetch_IDV['IsVerified']==1)
							{	
								if($_SESSION['IsVerified']==1)
								{
									if($_SESSION['IsActive']==1)
									{
										/*Calculate Our Fees amount*/
								        
										$IR=5;
										$OurFees=($_REQUEST['txtFundTarget']*$IR)/100;							    
								      	/*Calculate Our Fees amount*/

								      	$date_Con=date('Y-m-d',strtotime($_REQUEST['txtExpectdDate']));
                                 		$insert_Project="insert into tblProject values(null,'".$_REQUEST['cmbArea']."','".$_SESSION['UserID']."',null,'".$_REQUEST['txtProjectTitle']."','".$_REQUEST['txtSDescription']."','".$_REQUEST['txtBDescription']."','".$_REQUEST['txtFundTarget']."','".$_REQUEST['txtFundinterest']."','Investment',0,'$date_Con',0,0,1,now(),0,null,null,0,0,'$OurFees',0,0,0,0)";
										//echo $insert_Project;
										$Exe_InsertProject=mysqli_query($con,$insert_Project)or die(mysqli_error($con));
										$Last_ProjectID=mysqli_insert_id($con);

                                 		foreach($_FILES["txtFileImage"]["name"] as $key => $a ) 
	                                    {

	                                        $fname=$_FILES['txtFileImage']['name'][$key]; 
	                                        $inimg="insert into tblimage values(Null,'$Last_ProjectID','$fname',now(),1,0)";  
	                                        //echo "aaaaaaaaaaaaaaaa".$fname;
	                                        //echo $inimg."<br>";  
	                                        mysqli_query($con,$inimg);
	                                        move_uploaded_file($_FILES['txtFileImage']['tmp_name'][$key],"Admin/Project/img/".$fname);  
	                                        $lastimgid=mysqli_insert_id($con);
	                                    }
	                                    	$upDefault="update tblimage set IsDefault=1 where ImageID=".$lastimgid;
	                                    	mysqli_query($con,$upDefault) or die(mysqli_error($con));
                               			foreach($_FILES["txtFileVideo"]["name"] as $key => $a ) 
                                        {
                                            $fname=$_FILES['txtFileVideo']['name'][$key]; 
                                            $inimg="insert into tblVideo values(Null,'$Last_ProjectID','$fname',now(),1,0)";  
                                            //echo "aaaaaaaaaaaaaaaa".$fname;
                                            //echo $inimg."<br>";  
                                            mysqli_query($con,$inimg);
                                            move_uploaded_file($_FILES['txtFileVideo']['tmp_name'][$key],"Admin/Project/video/".$fname); 
                                            $lastvideoid=mysqli_insert_id($con); 
                                        }
                                        $upDefault2="update tblvideo set IsDefault=1 where VideoID=".$lastvideoid;
                                        mysqli_query($con,$upDefault2) or die(mysqli_error($con));
                                        echo "<script>alert('Your Project Will be Approved Within 24 hour by Seed & Spark then live')</script>";

                                        /*website return Insert */
                                        $OurFeesSlot4=$OurFees/4;
                                        $upDate="insert into tblWebsiteReturn values(null,1,'".$Last_ProjectID."','".$OurFees."','".$OurFeesSlot4."',0,0,0,0,null,null,null,null)";
                                        mysqli_query($con,$upDate)or die(mysqli_error($con));
                                        /*Website return insert*/
                                        header("location:index.php");
									}/*close IsActive*/
									else
									{
										echo "<script>alert('You Are Not Active By Seed & Spark ')</script>";
									}
								}/*close Verified*/
								else
								{
									echo "<script>alert('You Are Not Verified By Seed & Spark ')</script>";		
								}
							}
							else
							{
								echo "<script>alert('Your Bank Account Details Are not verified ')</script>";		
							}
						}/*Close IsInvestor*/
						else
						{
							echo "<script>alert('You Are Not Investor ')</script>";
						}
					}/*close UserID*/
					else
					{
						//echo "<script>alert('Please Login')</script>";
						echo  '<script>confirm("Please Login First y/n ?")</script>';
						//header("location:Login.php");
					}

				}
			?>
		<!-- Add Project end -->
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
								<h1>Project Form</h1>
								<p>Provide the details of your project</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Project Form</a></li>
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
						<!-- <h2>Never Hesitate to Reach Out</h2> -->
						<h6>Project Form</h6>
					</div>
					<form method="post" class="form-validation" autocomplete="off" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<select class="selectpicker" name="cmbArea" id="cmbArea">
										<?php
											$select="select * from tblexpertarea";
											$select_qry=mysqli_query($con,$select);
											while($res=mysqli_fetch_array($select_qry))
											{
										?>
												<option value="<?php echo $res['ExpertAreaID'];?>"><?php echo $res['AreaName'];?></option>	
											<?php
									}
									?>
										
									</select>		
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="Project Title *" name="txtProjectTitle" id="txtProjectTitle">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-xs-12">
								<div class="single-textarea">
									<textarea placeholder="Small description ..........." name="txtSDescription" id="txtSDescription"></textarea>
								</div> <!-- /.single-textarea -->
							</div> <!-- /.col -->						
							<div class="col-md-6 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="Fund Target *" name="txtFundTarget" onkeypress="return NumbersOnly(event);" id="txtFundTarget">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-md-6 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="Fund Interest Rate *" name="txtFundinterest" onkeypress="return NumbersOnly(event);" id="txtFundinterest">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input onfocus="(this.type='file')"  placeholder="Select Project Images *" accept=".png, .jpg, .jpeg, .gif" name="txtFileImage[]" id="txtFileImage" multiple="multiple">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input onfocus="(this.type='file')"  placeholder="Select Project Videos *" accept=".mp4, .avi" name="txtFileVideo[]" id="txtFileVideo" multiple="multiple">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input onblur="(this.type='text')"  class="calendar" onfocus="(this.type='text')"  placeholder="Expected Project Complition date *" name="txtExpectdDate" id="txtExpectdDate">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-xs-12">
								<div class="single-textarea">
									<textarea placeholder="Write A Brief Description About Your Project........" name="txtBDescription" id="txtBDescription"></textarea>
								</div> <!-- /.single-textarea -->
							</div> <!-- /.col -->
						</div> <!-- /.row -->
						<button type="Submit" onclick="return AllFrmValidation();" class="hvr-float-shadow" name="btnSubmit">Submit</button>
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

		
		<?php //include_once("LoadFilesJS.php");?>

		<script src="vendor/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>

<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:23:11 GMT -->
</html>