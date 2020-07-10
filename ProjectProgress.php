<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once("LoadFiles.php");?>
		<?php include_once("Admin/Connection.php");?>
		
				<?php
					$Project_Sel="select * from tblProject where ProjectID=".$_REQUEST['ProjectID'];
					$Exe_Project=mysqli_query($con,$Project_Sel) or die(mysqli_error($con));
					$Fetch_Project=mysqli_fetch_array($Exe_Project);
				?>
		<!-- bootstrap-select.min.js -->
		  
 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
		
	</head>

		<?php
			if(isset($_REQUEST['btnSubmit']))
			{
				foreach($_FILES["txtFileImage"]["name"] as $key => $a ) 
                {
                    $fname=$_FILES['txtFileImage']['name'][$key]; 
                    $inimg="insert into tblppimage values(null,'".$_REQUEST['ProjectID']."','$fname',now())";  
                    //echo $fname."<br>";
                    //echo $inimg."<br>";  
                    mysqli_query($con,$inimg) or die(mysqli_error($con));
                    move_uploaded_file($_FILES['txtFileImage']['tmp_name'][$key],"Admin/ProjectProgress/img/".$fname);  
                }
       			foreach($_FILES["txtFileVideo"]["name"] as $key => $a ) 
                {
                    $fname=$_FILES['txtFileVideo']['name'][$key]; 
                    $inimg="insert into tblppvideo values(null,'".$_REQUEST['ProjectID']."','$fname',now())";  
                    //echo $fname."<br>";
                    //echo $inimg."<br>";  
                    mysqli_query($con,$inimg)or die(mysqli_error($con));
                    move_uploaded_file($_FILES['txtFileVideo']['tmp_name'][$key],"Admin/ProjectProgress/video/".$fname);  
                }

                /*$sel_Insertpp="select * from tblProjectProgress where ProjectID=".$_REQUEST['ProjectID'];
                $ExeInsertpp=mysqli_query($con,$sel_Insertpp) or die(mysqli_error($con));
                $FetchInsertpp=mysqli_fetch_array($ExeInsertpp);*/

                if($Fetch_Project['CompletionStatus']==0)
                {
                	$insert_Q="insert into tblProjectProgress values(null,'".$_REQUEST['ProjectID']."',now(),0,0,0,0,0,0,0,0,0,0,0) ";
                mysqli_query($con,$insert_Q) or die(mysqli_error($con));
                //echo $insert_Q;
            	}
                if(isset($_REQUEST['rbtnCompletion']))
                {
	                if($_REQUEST['rbtnCompletion']==25)
	                {
	                	$up="update tblProjectProgress set FirstSlot=1 where ProjectID=".$_REQUEST['ProjectID'];
	                	$exeup=mysqli_query($con,$up) or die(mysqli_error($con));
	            	}
	            	if($_REQUEST['rbtnCompletion']==50)
	                {
	                	$up="update tblProjectProgress set SecoundSlot=1 where ProjectID=".$_REQUEST['ProjectID'];
	                	$exeup=mysqli_query($con,$up) or die(mysqli_error($con));
	            	}
	            	if($_REQUEST['rbtnCompletion']==75)
	                {
	                	$up="update tblProjectProgress set ThirdSlot=1 where ProjectID=".$_REQUEST['ProjectID'];
	                	$exeup=mysqli_query($con,$up) or die(mysqli_error($con));
	            	}
	            	if($_REQUEST['rbtnCompletion']==100)
	                {
	                	$up="update tblProjectProgress set FourthSlot=1 where ProjectID=".$_REQUEST['ProjectID'];
	                	$exeup=mysqli_query($con,$up) or die(mysqli_error($con));
	            	}
	            }


	            /*header("location:ViewMyProject.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>");*/
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
								<h1>Project Progress</h1>
								<p>Provide the details about your project</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Project Progress</a></li>
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
						<h6>Project Progress</h6>
					</div>
					<form method="post" class="form-validation" autocomplete="off" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input type="text" placeholder="Project Title *" name="txtProjectTitle" readonly id="txtProjectTitle" value="<?php if(isset($Fetch_Project['ProjectTitle'])) echo $Fetch_Project['ProjectTitle'];?>">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
								<div class="progress">
								    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $Fetch_Project['CompletionStatus'];?>%;background-color: #ff6a00;">Project Progress&nbsp;&nbsp;	
								      <?php echo $Fetch_Project['CompletionStatus'];?>%
								    </div>
								  </div>
								 </div>
							</div>
							<?php
								


							?>
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input onfocus="(this.type='file')"  placeholder="Select Project Progress Images *" accept=".png, .jpg, .jpeg, .gif" name="txtFileImage[]" id="txtFileImage" multiple="multiple" required="">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							<div class="col-md-12 col-xs-12">
								<div class="single-input">
									<input onfocus="(this.type='file')"  placeholder="Select Project Progress Videos *" accept=".mp4, .avi" name="txtFileVideo[]" id="txtFileVideo" multiple="multiple" required="">
								</div> <!-- /.single-input -->
							</div> <!-- /.col -->
							
							<div class="col-xs-12">
								<div class="single-textarea">
									<h5>Project Progress :</h5><br>
									<?php
										if($Fetch_Project['CompletionStatus']==0)
										{
									?>
									<input type="radio" name="rbtnCompletion" value="25" required="">&nbsp;&nbsp;&nbsp;25%<br>
									<?php
										}
										if($Fetch_Project['CompletionStatus']==25)
										{
									?>
									<input type="radio" name="rbtnCompletion" value="50" required="">&nbsp;&nbsp;&nbsp;50%<br>
									<?php
										}
										if($Fetch_Project['CompletionStatus']==50)
										{
									?>
									<input type="radio" name="rbtnCompletion" value="75" required="">&nbsp;&nbsp;&nbsp;75%<br>
									<?php
										}
										if($Fetch_Project['CompletionStatus']==75)
										{
									?>
									<input type="radio" name="rbtnCompletion" value="100" required="">&nbsp;&nbsp;&nbsp;100%<br>
									<?php
										}
									?>
								</div> <!-- /.single-textarea -->
							</div> <!-- /.col -->						
							
						</div> <!-- /.row -->
						<button type="Submit" class="hvr-float-shadow" name="btnSubmit">Submit</button>
					</form> <!-- /Form -->
				</div> <!-- /.container -->

			</section> <!-- /.Join-Volunteer-Pages -->

			

			<!-- them-main-footer-section _________________________________ -->
			<footer class="them-main-footer-section">
				<!-- NewsLetter -->
				<?php //include_once("NewsLetter.php");?>

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