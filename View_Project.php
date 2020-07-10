<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once "Admin/Connection.php"; ?>
		<?php include_once("LoadFiles.php");?>
		<script src="js2/jquery.js" type="text/javascript"></script>
<script src='js2/jquery.rating.js' type="text/javascript" language="javascript"></script>
<link href='js2/jquery.rating.css' type="text/css" rel="stylesheet"/>

		<!-- Font Awesome Icon Library -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<style>
			.checked {
			    color: orange;
			}
			</style>
		<!-- Font Awesome Icon Library -->
		<!-- Expert Rating New -->

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
			    background: black;
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
				$Exe_Project=mysqli_query($con,$Select_Project) or die(mysqlI_error($con));
				$Fetch_Project=mysqli_fetch_array($Exe_Project);
			?>
			<!-- Fetch Project Detail Query end-->


			<!-- Comment Count start -->
				<?php 
					$Count="select Count(Rating) as Rate from tblComment where ProjectID=".$_REQUEST['ProjectID'];
					$Exe_Count=mysqli_query($con,$Count) or die(mysqlI_error($con));
					$Fetch_Count=mysqli_fetch_array($Exe_Count);
				?>
			<!-- Comment Count start -->
			<!-- Theme Inner Banner ____________________________ -->
			<section>
				<div class="Theme-Inner-Banner inner-banner-bg-img-one">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1><?php echo $Fetch_Project['ProjectTitle'];?></h1>
								<p>All About the Project</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Project details</a></li>
								</ul>
								<a href="faq.php" class="hvr-bounce-to-right">FAQ's</a>
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
											<li>₹ <?php if(isset($sum)) {echo $sum;}else{echo "0";};?> Raised of ₹ <?php echo $Fetch_Project['FundTarget'];?> Goal</li>
											<!-- Donation people Counting start -->
												<?php
													$Select_Fund="select Count(*) as Count from tblFund where ProjectID=".$Fetch_Project['ProjectID'];
													$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
													$Fetch_Fund=mysqli_fetch_array($Exe_Fund);

												?>
											<!-- Donation people Counting end -->

											<li><span><?php echo $Fetch_Fund['Count'];?></span> Donations</li>
										</ul>
										
										<?php 
											if(isset($_SESSION['IsInvestor']))
											{
												if($_SESSION['IsInvestor']==1)
												{
										?>
										<a href="PaymentDemo.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>">Invest this project</a>
										<?php
												}
											}
										?>
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
<ul class="rating">
													
												<?php 
													$Count_Avg="select *,avg(Rating) as Rate from tblComment where ProjectID=".$_REQUEST['ProjectID'];
													$Exe_Count_avg=mysqli_query($con,$Count_Avg) or die(mysqlI_error($con));
													$Fetch_Count_avg=mysqli_fetch_array($Exe_Count_avg);
													
		                                                    if(round($Fetch_Count_avg['Rate'])==1)
		                                                    { 
		                                                       /* echo "<td><i class='fa fa-star'></i></td>";*/
		                                                ?>
		                                                		<span class="fa fa-star checked"></span>
																<span class="fa fa-star "></span>
																<span class="fa fa-star "></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
		                                                <?php
		                                                    }
		                                                    if(round($Fetch_Count_avg['Rate'])==2)
		                                                    { 
		                                                  ?>
		                                                  		<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star "></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
		                                                  <?php
		                                                        /*echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";*/
		                                                    }
		                                                    if(round($Fetch_Count_avg['Rate'])==3)
		                                                    { 
		                                                   ?>
		                                                   		<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
		                                                   <?php
		                                                        /*echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";*/
		                                                    }
		                                                    if(round($Fetch_Count_avg['Rate'])==4)
		                                                    { 
		                                                   ?>
		                                                   		<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
		                                                   <?php
		                                                       /* echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";*/
		                                                    }
		                                                    if(round($Fetch_Count_avg['Rate'])==5)
		                                                    { 
		                                                    ?>
		                                                    	<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
		                                                    <?php
		                                                        /*echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";*/
		                                                    }
		                                                  ?>
												</ul>
										<ul class="count-down">
											<li>
												<span><?php echo $RemainingDay;?></span>
												<p>Days</p>
											</li>
											<?php if($RemainingDay<=0 && ($per*100)<100)
												{
											?>
											<li>
												<span>Bank</span>
												<p><a href="BankDetail.php">Loan</a></p>
											</li>
											<?php 
												}
											?>
											<li>
												<span><?php echo $Fetch_Project['FundReturnInterestRate'];?></span>
												<p>Intrest Rate</p>
											</li>
											<!--<li>
												<span>03</span>
												<p>Seconds</p>
											</li> -->
										</ul>
									</div> <!-- /.Causes-Text -->
								</div> <!-- /.Causes-Item -->
								<div class="Details-Info">
									<h3><?php echo $Fetch_Project['ProjectTitle'];?></h3>
									<ul class="info-list-one">
										<li>
											<h6><?php 
													$date_Project=date('M d, Y',strtotime($Fetch_Project['CreatedOn']));
													echo $date_Project;
												?>
											</h6>
										</li>
										<li><?php echo $Fetch_Count['Rate'];?> Comment</li>
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
								<h5>Approved By : <?php //echo $Fetch_Project['ApprovedByExpert'];?></h5>
								<!-- select Approved Expert Detail start -->
										<?php 
											$select_ApprovedExpert="select * from tblUser where UserID=".$Fetch_Project['ApprovedByExpert'];
											$Exe_ApprovedExpert=mysqli_query($con,$select_ApprovedExpert) or die(mysqli_error($con));
											$Fetch_ApprovedExpert=mysqli_fetch_array($Exe_ApprovedExpert);

											$sel_ExpertReview="select * from tblExpertReview where ProjectID=".$_REQUEST['ProjectID'];
											$Exe_REview=mysqli_query($con,$sel_ExpertReview)or die(mysqli_error($con));
											$Fetch_Review=mysqli_fetch_array($Exe_REview);
										?>
									<!-- select Approved Expert Detail end -->
							
									
									
								<div class="Admin-Text">
									
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
												<h3 style="color:white;"><?php echo $Fetch_ApprovedExpert['FirstName'].' '.$Fetch_ApprovedExpert['LastName'];?></h3>
											</div>
											<ul class="float-right">							
												
			                                           <?php 
		                                                    if($Fetch_Review['Rating']==1)
		                                                    { 
		                                                       /* echo "<td><i class='fa fa-star'></i></td>";*/
		                                                ?>
		                                                		<span class="fa fa-star checked"></span>
																<span class="fa fa-star "></span>
																<span class="fa fa-star "></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
		                                                <?php
		                                                    }
		                                                    if($Fetch_Review['Rating']==2)
		                                                    { 
		                                                  ?>
		                                                  		<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star "></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
		                                                  <?php
		                                                        /*echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";*/
		                                                    }
		                                                    if($Fetch_Review['Rating']==3)
		                                                    { 
		                                                   ?>
		                                                   		<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
		                                                   <?php
		                                                        /*echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";*/
		                                                    }
		                                                    if($Fetch_Review['Rating']==4)
		                                                    { 
		                                                   ?>
		                                                   		<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
		                                                   <?php
		                                                       /* echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";*/
		                                                    }
		                                                    if($Fetch_Review['Rating']==5)
		                                                    { 
		                                                    ?>
		                                                    	<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
		                                                    <?php
		                                                        /*echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";*/
		                                                    }
		                                                  ?>
												
											</ul>
											<ul class="float-right">							

												<div class="col-sm-12 col-xs-12">
												<label style="font-size: 12px; "><h6 style="color:white;">Realistic Percentage</h6></label>
												<!-- <input type="range" min="1" max="100" value="0" class="slider" id="myRange" name="txtRealistic" required="">
  												<p>Value: <span id="demo"  ></span></p> -->
  												<!-- Range slider javascript start -->
  												<?php $a1=$Fetch_Review['SuccessfulPercentage'];?>
  												<!-- <script type="text/javascript">
													var slider = document.getElementById("myRange");
													var output = document.getElementById("demo");
													output.innerHTML = slider.value;

													slider.oninput = function() {
													  output.innerHTML = this.value;
													}
												</script> -->
												<!-- Range slider javascript end -->
												<div class="progress">
												  <div class="progress-bar" role="progressbar" aria-valuenow="70"
												  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a1; ?>%">
												    <?php echo $a1; ?>%
												  </div>
												</div>
											</div>
											<div class="col-sm-12 col-xs-12">
												<label style="font-size: 12px;"><h6 style="color:white;">Successfull Percentage</h6></label>
												<!-- <input type="range" min="1" max="100" value="0" class="slider" id="myRange1" name="txtSuccessful" required="">
  												<p>Value: <span id="demo1" name="txtSuccessful"></span></p> -->
  												<!-- Range slider javascript start -->
  												<?php $a2=$Fetch_Review['RealisticPercetage'];?>
  												<!-- <script type="text/javascript">
													var slider1 = document.getElementById("myRange1");
													var output1 = document.getElementById("demo1");
													output1.innerHTML = slider1.value;

													slider1.oninput = function() {
													  output1.innerHTML = this.value;
													}
												</script> -->
												<!-- Range slider javascript end -->
												<div class="progress">
												  <div class="progress-bar" role="progressbar" aria-valuenow="70"
												  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a2; ?>%">
												    <?php echo $a2; ?>%
												  </div>
												</div>
											</div>
											</ul>
										</div> <!-- /.clearfix -->
										<p>
											<?php echo $Fetch_Review['Review'];?>
										</p>
										<div class="float-left">
											
										</div>
									</div> <!-- /.Text -->
								</div> <!-- /.Admin-Text -->
								
								
								 <div class="Three-Comments-Section">
									<h4>Comments (<?php echo $Fetch_Count['Rate'];?>)</h4>
									<ul>

										<!-- Fetch Comment Data Start-->
											<?php 

												$Sel_comment="select c.*,u.FirstName,u.LastName,u.ProfilePic from tblComment c, tblUser u where c.UserID = u.UserID and ProjectID=".$_REQUEST['ProjectID'];
												$Exe_Comment=mysqli_query($con,$Sel_comment) or die(mysqli_error($con));
												while($Fetch_Comment=mysqli_fetch_array($Exe_Comment))
												{
											?>



										<!-- Fetch Comment Data End -->


										<li>
											<div class="Comments-Item">
												<?php
			                                      $imageName=$Fetch_Comment['ProfilePic'];
			                                      if($imageName=="" || !file_exists("Admin/Profile/$imageName"))
			                                      {
			                                        $imageName="no1.png";
			                                      }
			                                    ?>
			                                    <!-- <img src="Admin/Profile/<?php echo $imageName;?>" style="margin-left: 470px;height: 200px;width: 200px; class="rounded-circle img-border gradient-summer width-100" alt="Card image"> -->
												<img src="Admin/Profile/<?php echo $imageName;?>" alt="image">
												<h6><?php echo $Fetch_Comment['FirstName']." ".$Fetch_Comment['LastName'];?></h6>
												<span><?php
														$Time_Comment=date('M d, Y',strtotime($Fetch_Comment['CreatedOn']));
												 echo $Time_Comment;?></span>
												 <ul class="float-right">	
												<!-- <input name="star" type="radio" class="star" disabled="disabled" <?php if(isset($Fetch_Comment['Rating'])) { if($Fetch_Comment['Rating']==1) { ?> checked="checked"<?php  }}?>  align="middle"/>
												<input name="star" type="radio" class="star" disabled="disabled" <?php if(isset($Fetch_Comment['Rating'])) { if($Fetch_Comment['Rating']==2) { ?> checked="checked"<?php  }}?> align="middle"/>
												<input name="star" type="radio" class="star" disabled="disabled" <?php if(isset($Fetch_Comment['Rating'])) { if($Fetch_Comment['Rating']==3) { ?> checked="checked"<?php  }}?> align="middle"/>
												<input name="star" type="radio" class="star" disabled="disabled" <?php if(isset($Fetch_Comment['Rating'])) { if($Fetch_Comment['Rating']==4) { ?> checked="checked"<?php  }}?> align="middle" />
												<input name="star" type="radio" class="star" disabled="disabled" <?php if(isset($Fetch_Comment['Rating'])) { if($Fetch_Comment['Rating']==5) { ?> checked="checked"<?php  }}?> align="middle" /> -->
												<?php 
			                                          

			                                          for($i=1;$i<=5;$i++)
			                                          {
			                                            ?>
			  									<input name="star<?php echo $Fetch_Comment['CommentID']; ?>" type="radio" class="star" disabled="disabled" align="middle" <?php 
			                                            if($i<=$Fetch_Comment['Rating']) echo 'checked="checked"'; ?> />

			                                            <?php 
			                                          } 
			                                          ?>
												</ul>
												<p><?php echo $Fetch_Comment['Comment'];?></p>
												<!-- <a href="#" class="hvr-float-shadow">Reply</a> -->
											</div> 
										</li> 
										<?php
											}

										?>
										<!-- <li>
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
										</li>  -->
									</ul> 
								</div> 

								<?php 
									if(isset($_REQUEST['btnSubmit']))
									{
										$insertComment="insert into tblcomment values(null,'".$_SESSION['UserID']."','".$_REQUEST['ProjectID']."','".$_REQUEST['txtComment']."',1,now(),'".$_REQUEST["test-1-rating-5"]."')";
										//echo $insertComment;
										$Exe_Comment=mysqli_query($con,$insertComment) or die(mysqli_error($con));

									}
								
								if(isset($_SESSION['UserID']))
								{
									if($_SESSION['IsExpert'] && $_SESSION['IsVerified'] && $_SESSION['IsActive'] || $_SESSION['IsInvestor'] && $_SESSION['IsVerified'] && $_SESSION['IsActive'])
									{
								?>
								 <div class="Leave-A-Comment">
									<h4>Leave a Comment</h4>
									<form method="Post">
										<div class="row">
											<div class="col-xs-12"><textarea placeholder="Review *" name="txtComment"></textarea></div>
											<!-- <div class="col-sm-4 col-xs-12"><input type="text" placeholder="Your Name *" name="txtName"></div> -->
											<div class="col-xs-12">
												<input class="star required" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="1" />
												<input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="2"/>
												<input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="3" />
												<input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="4"/>
												<input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="5"/>
												 <!-- /.single-textarea -->
											</div>
											<div class="col-xs-12"><button class="hvr-float-shadow" name="btnSubmit">Done</button></div>
										</div> 
									</form> 
								</div>  
								<?php

									}
								}
								?>
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