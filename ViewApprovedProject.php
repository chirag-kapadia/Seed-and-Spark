<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once "Admin/Connection.php"; ?>
		<?php include_once("LoadFiles.php");?>
		<script src="js2/jquery.js" type="text/javascript"></script>
<script src='js2/jquery.rating.js' type="text/javascript" language="javascript"></script>
<link href='js2/jquery.rating.css' type="text/css" rel="stylesheet"/>

		<!-- Slider Range start-->
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
		<!-- Slider Range end -->
		<!-- Rating Style start -->
		 
    </style>
    <!-- Rating style end -->
	</head>
	
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

			<!-- Fetch Project Detail Query start-->
			<?php 

				$Select_Project="select * from tblProject where ProjectID=".$_REQUEST['ProjectID'];
				$Exe_Project=mysqli_query($con,$Select_Project) or die(mysql_error($con));
				$Fetch_Project=mysqli_fetch_array($Exe_Project);
			?>
			<!-- Fetch Project Detail Query end-->
			<!-- Theme Inner Banner ____________________________ -->
			<section>
				<div class="Theme-Inner-Banner inner-banner-bg-img-one">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1><?php echo $Fetch_Project['ProjectTitle'];?></h1>
								<p>SPONSOR A CHILD AND CHANGE THEIR LIFE FOR <br>GOOD</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Causes details</a></li>
								</ul>
								<a href="#" class="hvr-bounce-to-right">Need Our Help</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>

			<!-- Causes Sidebar ____________________________ -->
			<section class="">
				<div class="container">
					<div class="Rcent-Causes-Item-Wrapper Causes-Details-Wrapper">
						<div class="row">
							<div class="col-md-8 col-xs-12 margin-top">
								<div class="Causes-Item Causes-Details-Item clear-fix">
									<div class="Causes-Img">
										<!-- Select Project Image Query -->
										<?php
                                            $Select_image="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch_Project['ProjectID'];
                                            $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error());
                                            $Fetch_image=mysqli_fetch_array($Exe_image)
                                        ?>
										<!-- <img src="images/causes/img-21.jpg" alt="image"> -->
										<img src="Admin/Project/img/<?php echo $Fetch_image['ImageName'];?>" style="height: 600px;width:700px;" alt="image">
									</div> <!-- /.Causes-Img -->
									<div class="Causes-Text">
										<!-- Funding Detail start -->
											<!-- Calculate Fund Progress start -->
												<?php
													$Select_Fund="select sum(FundAmount) as FundAmount from tblFund where ProjectID=".$Fetch_Project['ProjectID'];
													$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
													$Fetch_Fund=mysqli_fetch_array($Exe_Fund);
													$sum= $Fetch_Fund['FundAmount'];
													//echo $Fetch_Project['FundTarget'];
                                                    $per=$sum/$Fetch_Project['FundTarget'];
                                                    $FundLeft=$Fetch_Project['FundTarget']-$sum;
												?>
												<!-- Calculate Fund Progress end -->
											<!-- Funding Detail end -->
										<ul class="ul-One">
											<li>Donated</li>
											<li>
												<div class="donate-piechart tran3s">
									                <div class="piechart"  data-border-color="rgba(253,88,11,1)" data-value="<?php echo $per;?>">
													  <span><?php echo $per;?></span>
													</div>
									            </div> <!-- /.donate-piechart -->
											</li>
											<li>$<?php if(isset($sum)) {echo $sum;}else{echo "0";};?> Raised of $<?php echo $Fetch_Project['FundTarget'];?> Goal</li>
											<!-- Donation people Counting start -->
												<?php
													$Select_Fund="select Count(*) as Count from tblFund where ProjectID=".$Fetch_Project['ProjectID'];
													$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
													$Fetch_Fund=mysqli_fetch_array($Exe_Fund);

												?>
											<!-- Donation people Counting end -->

											<li><span><?php echo $Fetch_Fund['Count'];?></span> Donations</li>
										</ul>
										
										<a href="">Invest this project</a>
										<!-- Remaining Days of Project Count start  -->
											<?php
												$date=$Fetch_Project['CreatedOn'];
												$NewDate=Date('y-m-d', strtotime($date."+60 days"));	 
											     $a=date_create($NewDate); 
												 $now=date('y-m-d');
												  $d = date_create($now);
												 $NewDate1 = date_diff($d,$a);
												 $RemainingDay=$NewDate1->format("%a ");

											?>
										<!-- Remaining Days of Project Count start  -->
										<ul class="count-down">
											<li>
												<span><?php echo $RemainingDay;?></span>
												<p>Days</p>
											</li>
											<!-- <li>
												<span>21</span>
												<p>Hours</p>
											</li>
											<li>
												<span>43</span>
												<p>Minutes</p>
											</li>
											<li>
												<span>03</span>
												<p>Seconds</p>
											</li> -->
										</ul>
									</div> <!-- /.Causes-Text -->
								</div> <!-- /.Causes-Item -->
								<div class="Details-Info">
									<h3><?php echo $Fetch_Project['ProjectTitle'];?></h3>
									<ul class="info-list-one">
										<li>July 8, 2017
									<h3><?php echo $Fetch_Project['CreatedOn'];?></h3>
										</li>
										<li>7 Comment</li>
										<!-- User Detail Fetch start -->
										<?php
											$select_User="select * from tblUser where UserID=".$Fetch_Project['UserID'];
											$Exe_User=mysqli_query($con,$select_User) or die(mysqli_error($con));
											$Fetch_User=mysqli_fetch_array($Exe_User);
										?>
										<!-- User Detail Fetch end -->
										<li>Post By : <?php echo $Fetch_User['FirstName'].' '.$Fetch_User['LastName'];?></li>
									</ul>
									<p><?php echo $Fetch_Project['Description'];?></p>
									
									<div class="Details-Info-Slide">
										<div id="Details-Slider" class="owl-carousel owl-theme">
											<?php
	                                            $Select_image2="select * from tblImage where ProjectID=".$Fetch_Project['ProjectID'];
	                                            $Exe_image2=mysqli_query($con,$Select_image2) or die(mysqli_error());
	                                            while($Fetch_image2=mysqli_fetch_array($Exe_image2))
	                                            {
	                                        ?>
											<div class="item"><img src="Admin/Project/img/<?php echo $Fetch_image2['ImageName'];?>" style="height: 600px;width:700px;" alt="image"><!-- <img src="" alt="image"> --></div><!-- /.item -->
											<?php
												}
											?>
										</div> <!-- /#Details-Slider -->
									</div> <!-- /.Details-Info-Slide -->
									
									<!-- <div class="Share-Div">
										<p><i>Our organisation has never shied away from taking on the toughest challenges – from protecting future generations from tobacco, to tackling the cancers that are hardest to treat. There is still much to do, but I’m highly encouraged by the progress that we’ve made to date and remain confident that we’re on the right track.</i> <i class="flaticon-right-quotation-sign quotation"></i></p>
										<ul class="Share-tex">
											<li>Dr Iain Foulkes</li>
											<li>Executive Director, Research and Innovation, Chcharity</li>
										</ul>
										<ul class="Share-List">
											<li><span>Share : </span></li>
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										</ul>
									</div> --> <!-- /.Share-Div -->
								</div> <!-- /.Details-Info --><br><br>
								<?php if($Fetch_Project['IsApprovedByExpert']==1 && $Fetch_Project['IsApprovedByAdmin']==1)
									{
								?>
								<h5>Approved By : <?php //echo $Fetch_Project['ApprovedByExpert'];?></h5>
								<div class="Admin-Text">
									<!-- select Approved Expert Detail start -->
										<?php 
											$select_ApprovedExpert="select * from tblUser where UserID=".$Fetch_Project['ApprovedByExpert'];
											$Exe_ApprovedExpert=mysqli_query($con,$select_ApprovedExpert) or die(mysqli_error($con));
											$Fetch_ApprovedExpert=mysqli_fetch_array($Exe_ApprovedExpert);

											//Expert Area Detail
											$sel_ExpertArea="select * from tblexpertreview where UserID=".$Fetch_Project['ApprovedByExpert'];
											$Exe_ExpertArea=mysqli_query($con,$sel_ExpertArea)or die(mysqli_error($con));
											$Fetch_ExpertAre=mysqli_fetch_array($Exe_ExpertArea);
										?>
									<!-- select Approved Expert Detail end -->
									<?php
                                      $imageName=$Fetch_ApprovedExpert['ProfilePic'];
                                      if($imageName=="" || !file_exists("Admin/Profile/$imageName"))
                                      {
                                        $imageName="no1.png";
                                      }
                                    ?>
									<img src="Admin/Profile/<?php echo $imageName;?>" alt="image">
									<div class="Text">
										<div class="clearfix">
											<div class="float-left">
												<h6><?php echo $Fetch_ApprovedExpert['FirstName'].' '.$Fetch_ApprovedExpert['LastName'];?></h6>
											</div>
											<ul class="float-right">
												<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											</ul>
										</div> <!-- /.clearfix -->



										<p><?php echo $Fetch_ExpertAre['Review'];?>
											
										</p><br><br>
									</div> <!-- /.Text -->
								</div> <!-- /.Admin-Text -->
								<?php
									}
								?>
								<!-- <div class="Three-Comments-Section">
									<h4>Comments (3)</h4>
									<ul>
										<li>
											<div class="Comments-Item">
												<img src="images/causes/6.jpg" alt="image">
												<h6>Simran Jastic</h6>
												<span>3 months ago</span>
												<p>My birthday is on the 15th February. My favourite game is playing with dolls. In Koh Krolor life is hard for children like me.</p>
												<a href="#" class="hvr-float-shadow">Reply</a>
											</div>
										</li>
										<li>
											<div class="Comments-Item">
												<img src="images/causes/7.jpg" alt="image">
												<h6>Mahfuz R</h6>
												<span>2 months ago</span>
												<p>My birthday is on the 15th February. My favourite game is playing with dolls. In Koh Krolor life is hard for children like me.</p>
												<a href="#" class="hvr-float-shadow">Reply</a>
											</div>
											<ul>
												<li>
													<div class="Comments-Item">
														<img src="images/causes/8.jpg" alt="image">
														<h6>Asfia A</h6>
														<span>5 months ago</span>
														<p>My birthday is on the 15th February. My favourite game is playing with dolls. In Koh Krolor life is hard for children like me.</p>
														<a href="#" class="hvr-float-shadow">Reply</a>
													</div> 
												</li> 
											</ul>
										</li>
									</ul>
								</div> --> <!-- /.Three-Comments-Section -->
								<?php
									if(isset($_REQUEST['btnApprovedProject']))
									{
										/*$insert_qry="insert into tblexpertreview value(null,'".$_REQUEST['ProjectID']."','".$_SESSION['UserID']."','".$_REQUEST["test-1-rating-5"]."','".$_REQUEST['txtReview']."',now(),null,'".$_REQUEST['chkRealistic']."','".$_REQUEST['chkSuccessfull']."',0,'".$_REQUEST['txtRealistic']."','".$_REQUEST['txtSuccessful']."')";
										//echo $insert_qry;
										$insert=mysqli_query($con,$insert_qry) or die(mysqli_error($con));
*/

										/*$update="update tblproject set ApprovedByExpert='".$_SESSION['UserID']."',IsApprovedByExpert=1 where ProjectID=".$_REQUEST['ProjectID'];
										//echo $update;
										mysqli_query($con,$update) or die(mysqli_error($con));*/

									}
								?>
								<!-- <div class="Leave-A-Comment">
									<h4>Leave a Comment</h4>
									<form method="post">
										<div class="row">
											<div class="col-xs-12" >

												<input class="star required" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="1" />
											    <input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="2"/>
											    <input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="3" />
											    <input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="4"/>
											    <input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="5"/>
											    												
											</div>
											
											<div class="col-xs-12">
												<textarea placeholder="Review" name="txtReview" required=""></textarea>
											</div>
											<div class="col-sm-4 col-xs-12"><label>Realistics: &nbsp;&nbsp;</label>
												 <input type="checkbox" name="chkRealistic" value="1" required="">
												

											</div>
											<div class="col-sm-4 col-xs-12"><label>Successfull</label>
												<input type="checkbox" name="chkSuccessfull" value="1" required="" >
												<a href="#" style="color: #e3e3e5"><i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: xx-large;"></i></a>&nbsp;&nbsp;&nbsp;
												<a href="#" style="color: #e3e3e5"><i class="fa fa-thumbs-down" aria-hidden="true" style="font-size: xx-large;"></i></a>
											</div>
											<div class="col-sm-12 col-xs-12">
												<label>Realistic Percentage</label>
												<input type="range" min="1" max="100" value="0" class="slider" id="myRange" name="txtRealistic" required="">
  												<p>Value: <span id="demo"></span></p>
  												
  												<script type="text/javascript">
													var slider = document.getElementById("myRange");
													var output = document.getElementById("demo");
													output.innerHTML = slider.value;

													slider.oninput = function() {
													  output.innerHTML = this.value;
													}
												</script>
												
											</div>
											<div class="col-sm-12 col-xs-12">
												<label>Successfull Percentage</label>
												<input type="range" min="1" max="100" value="0" class="slider" id="myRange1" name="txtSuccessful" required="">
  												<p>Value: <span id="demo1" name="txtSuccessful"></span></p>
  												
  												<script type="text/javascript">
													var slider1 = document.getElementById("myRange1");
													var output1 = document.getElementById("demo1");
													output1.innerHTML = slider1.value;

													slider1.oninput = function() {
													  output1.innerHTML = this.value;
													}
												</script>
												
											</div>
											<div class="col-xs-12">
												<button class="hvr-float-shadow" name="btnApprovedProject">Approved Prpject</button></div>
										</div> 
									</form> 
									<br>
									<br>
								</div>  -->
							</div> 

							<!-- Right Sidebar -->
							<?php include_once("RightSidebar.php");?>
						<!-- Right Sidebar -->
						</div> <!-- /.row -->
					</div> <!-- /.Rcent-Causes-Item-Wrapper -->
				</div> <!-- /.container -->
			</section> <!-- /.Rcent-Causes-Section -->

			

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