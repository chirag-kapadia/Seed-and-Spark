<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		
		<?php include_once("LoadFiles.php");?>
		<?php include_once "Admin/Connection.php"; ?>
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

					$Count_Avg="select *,avg(Rating) as Rate from tblComment where ProjectID=".$_REQUEST['ProjectID'];
					$Exe_Count_avg=mysqli_query($con,$Count_Avg) or die(mysqlI_error($con));
					$Fetch_Count_avg=mysqli_fetch_array($Exe_Count_avg);
				?>
			<!-- Comment Count start -->


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
				<div class="Theme-Inner-Banner inner-banner-bg-img-two">
					<div class="banner-opacity">
						<div class="container">
							<div class="banner-content">
								<h1><?php echo $Fetch_Project['ProjectTitle'];?></h1>
								<p>Poject Description</br>invest It</p>
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Project details</a></li>
								</ul>
								<a href="faq.php" class="hvr-bounce-to-right">FAQ's</a>
							</div> <!-- /.banner-content -->
						</div> <!-- /.container -->
					</div> <!-- /.banner-opacity -->
				</div> <!-- /.Theme-Inner-Banner -->
			</section>
			<!-- Select Project Image Query -->
				<?php
                    $Select_image="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch_Project['ProjectID'];
                    $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error());
                    $Fetch_image=mysqli_fetch_array($Exe_image);

                /*<!-- Funding Detail start -->*/
					/*<!-- Calculate Fund Progress start -->*/
											
						$Select_Fund="select sum(FundAmount) as FundAmount from tblFund where ProjectID=".$Fetch_Project['ProjectID'];
						$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
						$Fetch_Fund=mysqli_fetch_array($Exe_Fund);
						$sum= $Fetch_Fund['FundAmount'];
						//echo $Fetch_Project['FundTarget'];
                        $per=$sum/$Fetch_Project['FundTarget'];
                        $FundLeft=$Fetch_Project['FundTarget']-$sum;
					
					/*<!-- Calculate Fund Progress end -->
				<!-- Funding Detail end -->*/

				/*<!-- Remaining Days of Project Count start  -->*/
											
					$date=$Fetch_Project['CreatedOn'];
					$NewDate=Date('y-m-d', strtotime($date."+60 days"));	 
				    $a=date_create($NewDate); 
					$now=date('y-m-d');
					$d = date_create($now);
					$NewDate1 = date_diff($d,$a);
					$RemainingDay=$NewDate1->format("%a ");

											

										/*<!-- Remaining Days of Project Count start  -->*/
                ?>
				<!-- <img src="images/causes/img-21.jpg" alt="image"> -->
			<!-- Shop Details ____________________________ -->
			<section class="Shop-Pages">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-8 col-xs-12 float-right">
							<div class="single-product-details">
								<div class="row">
									<div class="col-lg-7 col-xs-12">
										<div class="product-order-img">
											<div class="vig-img">
												<img src="Admin/Project/img/<?php echo $Fetch_image['ImageName'];?>"  alt="image">
												<!-- <img src="images/shop/img-11.jpg" alt="image"> --></div>
										</div> <!-- /.product-order-img -->
									</div> <!-- /.col -->
									<div class="col-lg-5 col-xs-12">
										<div class="product-order-details">
											<h6><?php echo $Fetch_Project['ProjectTitle'];?></h6>
											<ul class="ul-One">
											
											
											
										</ul>
											<div class="rating-and-tag">
												<ul class="tag">
													<li>Category: <?php 
														$select_Categories="select * from tblExpertArea where ExpertAreaID=".$Fetch_Project['ExpertAreaID'];
														$Exe_Cat=mysqli_query($con,$select_Categories)or die(mysqlI_error($con));
														$Fetch_Cat=mysqli_fetch_array($Exe_Cat);


													echo $Fetch_Cat['AreaName'];?> </li>
												</ul>
												<ul class="rating">
													
												<?php 
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
											</div>
											<p><?php echo $Fetch_Project['SmallDescription'];?></p>
											<div class="value-decrease-and-button">
												<div class="value-decrease-and-select">
													<center>
													<ul>
														<!-- <li>
															<ul class="value-section">
																<li><button class="tran3s" id="value-decrease"><i class="fa fa-minus" aria-hidden="true"></i></button> </li>
																<li id="product-value">1</li>
																<li><button class="tran3s" id="value-increase"><i class="fa fa-plus" aria-hidden="true"></i></button> </li>
															</ul>
														</li> -->
														<li>Invested</li>
														<li>
															<div class="donate-piechart tran3s">
												                <div class="piechart"  data-border-color="rgba(253,88,11,1)" data-value="<?php echo $per;?>">
																  <span><?php echo $per;?></span>
																</div>
												            </div> <!-- /.donate-piechart -->
														</li><br>
														<li><span><b style="color: #ff6a00;">₹ <?php if(isset($sum)) {echo $sum;}else{echo "0";};?></b> Raised of <b style="color: #ff6a00;">₹ <?php echo $Fetch_Project['FundTarget'];?></b> Target</span></li>
											<!-- Donation people Counting start -->
												<?php
													$Select_Fund="select Count(*) as Count from tblFund where ProjectID=".$Fetch_Project['ProjectID'];
													$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
													$Fetch_Fund=mysqli_fetch_array($Exe_Fund);

												?>
											<!-- Donation people Counting end -->

											<li><span style="color: #ff6a00;"><b><?php echo $Fetch_Fund['Count'];?></b></span> Donations</li><br>
														<li>
															<?php 
																if(isset($_SESSION['IsInvestor']))
																{
																	if($sum<$Fetch_Project['FundTarget'])
																	{
																		if($_SESSION['IsInvestor']==1 && $_SESSION["IsVerified"]==1)
																		{

																		
															?>

																		<a style="width: 250px;height: 50px;color: white;background-color: #ff6a00;" class="hvr-float-shadow" href="PaymentDemo.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>&LeftAmt=<?php echo $FundLeft;?>">Invest this project</a>
															<?php
																		}	
																	}
																	else
																	{
																		echo "<span><h5 style='color: #ff6a00;'>Fund Target Completed</h5></span>";
																	}
																}
															?>
														</li>
													</ul> 
													</center>
												</div>			
											</div>
										</div> <!-- /.product-order-details -->
									</div> <!-- /.col -->
								</div> <!-- /.row -->
								
								<!-- Approved by start -->
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
								<!-- Approved by End -->


								<div class="review-tab">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#home">Description</a></li>
										<!-- <li><a data-toggle="tab" href="#menu1">Additional information</a></li> -->
										<li><a data-toggle="tab" href="#menu2">Reviews (<?php echo $Fetch_Count['Rate'];?>)</a></li>
									</ul>
									<div class="tab-content">
										<div id="home" class="tab-pane fade in active">
									    	<p><?php echo $Fetch_Project['Description'];?></p>
									    	
										</div>
									  <!-- 	<div id="menu1" class="tab-pane fade">
									    	<h4>Ten steps to making </h4>
									    	<ul>
									    		<li>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
									    		<li>2. Suspendisse accumsan nunc velit, vel ullamcorper</li>
									    		<li>3. Quisque mollis tellus diam, non blandit magna accumsan quis.</li>
									    		<li>4. Sed ultricies eleifend felis pretium cursus.</li>
									    		<li>5. Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
									    		<li>6. Suspendisse accumsan nunc velit, vel ullamcorper</li>
									    		<li>7. Quisque mollis tellus diam, non blandit magna accumsan quis.</li>
									    		<li>8. Sed ultricies eleifend felis pretium cursus.</li>
									    	</ul>
									  	</div> -->
									  	<div id="menu2" class="tab-pane fade">
									  		<!-- Fetch Comment Data Start-->
											<?php 

												$Sel_comment_r1="select c.*,u.FirstName,u.LastName,u.ProfilePic from tblComment c, tblUser u where c.UserID = u.UserID and ProjectID=".$_REQUEST['ProjectID'];
												$Exe_Comment_r1=mysqli_query($con,$Sel_comment_r1) or die(mysqli_error($con));
												while($Fetch_Comment_review1=mysqli_fetch_array($Exe_Comment_r1))
												{
											?>
										<!-- Fetch Comment Data End -->
									    	<div id="review">
												<div class="single-review clearfix">
													<?php
			                                      $imageName=$Fetch_Comment_review1['ProfilePic'];
			                                      if($imageName=="" || !file_exists("Admin/Profile/$imageName"))
			                                      {
			                                        $imageName="no1.png";
			                                      }
			                                    ?>
			                                    	 <img src="Admin/Profile/<?php echo $imageName;?>" alt="" class="float-left"> 
													
													<div class="text float-left">
														<div class="clearfix">
															 <div class="float-left">
																<h6><?php echo $Fetch_Comment_review1['FirstName']." ".$Fetch_Comment_review1['LastName'];?></h6>
																<span><?php
														$Time_Comment=date('M d, Y',strtotime($Fetch_Comment_review1['CreatedOn']));
												 echo $Time_Comment;?></span>
																
																
															</div> 
															<ul class="float-right">
																<?php 
			                                          

			                                          for($i=1;$i<=5;$i++)
			                                          {
			                                            ?>
			  									<input name="star<?php echo $Fetch_Comment_review1['CommentID']; ?>" type="radio" class="star" disabled="disabled" align="middle" <?php 
			                                            if($i<=$Fetch_Comment_review1['Rating']) echo 'checked="checked"'; ?> />

			                                            <?php 
			                                          } 
			                                          ?>
																
															</ul>
														</div> <!-- /.clearfix -->
														<p><?php echo $Fetch_Comment_review1['Comment'];?></p>
													</div> <!-- /.text -->
												</div> <!-- /.single-review -->
											</div> <!-- /.review -->
											<?php
												}

											?>


											<!-- Comment -->
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
									</div>
								</div> <!-- /.review-tab -->

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

									<?php
	                                            $Select_video2="select * from tblVideo where IsDefault=1 and ProjectID=".$Fetch_Project['ProjectID'];
	                                            $Exe_video2=mysqli_query($con,$Select_video2) or die(mysqli_error());
	                                            while($Fetch_Video2=mysqli_fetch_array($Exe_video2))
	                                            {
	                                        ?>
	                                        	
									<video controls="" style="width: 700px;" autoplay="" > 
										<source src="Admin/Project/video/<?php echo $Fetch_Video2['VideoName'];?>" type="video/mp4">
  										<!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
										
									</video>
										<?php
												}
										?>
							</div> <!-- /.single-product-details -->							
						</div> <!-- /.col -->

						<div class="col-lg-3 col-md-4 col-xs-12">
							<!-- ================ Shop Side Bar ================== -->
							<div class="Shop-Side-Bar">
								<!-- <form action="#">
									<input type="text" placeholder="Search Product">
									<button>Search</button>
								</form> <!-- /form -->
								<h4>Project Categories :</h4>
								<ul class="Light-Shop">
									<?php
										$sel_ExpertArea="select * from tblExpertArea";
										$Exe_ExpertArea=mysqli_query($con,$sel_ExpertArea)or die(mysqli_error($con));
										while($Fetch_ExpertArea=mysqli_fetch_array($Exe_ExpertArea))
										{
									?>
									<li><a href="projects.php?ExpertAreaID=<?php echo $Fetch_ExpertArea['ExpertAreaID']; ?>"><?php echo $Fetch_ExpertArea['AreaName'];?></a></li>
									<?php
										}
									?>
									<!-- <li><a href="#">Cloth</a></li>
									<li><a href="#">LED</a></li>
									<li><a href="#">Technology</a></li>
									<li><a href="#">Electronic</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">User Experience</a></li>
									<li><a href="#">Charity</a></li> -->
								</ul> <!-- /.Light-Shop -->
								<h4>Recent Project</h4>

								<ul class="Popular-Product">
									<?php
										$Select_Project="Select * from tblProject where IsApprovedByExpert=1 and IsApprovedByAdmin=1 and IsActive=1 ORDER BY CreatedOn DESC LIMIT 10";
										$Exe_Project=mysqli_query($con,$Select_Project)or die(mysqli_error($con));
										while($Fetch_Project=mysqli_fetch_array($Exe_Project))
										{
									?>		
									<li>
										<?php
                                            $Select_image="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch_Project['ProjectID'];
                                            $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error());
                                            $Fetch_image=mysqli_fetch_array($Exe_image);
                                        ?>
										<!-- <img src="images/shop/1.jpg" alt="image"> -->
										<img src="Admin/Project/img/<?php echo $Fetch_image['ImageName'];?>" />
										<!-- <h6><a href="#">LED Light</a></h6> -->
										<h6><a href="ViewProject2.php?ProjectID=<?php echo $Fetch_Project['ProjectID'];?>"><?php echo $Fetch_Project['ProjectTitle']?></a></h6>
										<span>
															<?php 
																$date_Project=date('M d, Y',strtotime($Fetch_Project['CreatedOn']));
																echo $date_Project;
															?>
													</span>

										<!-- <span>$ 235</span> -->
									</li>
									<!-- <li>
										<img src="images/shop/2.jpg" alt="image">
										<h6><a href="#">Wood Table</a></h6>
										<span>$ 35</span>
									</li>
									<li>
										<img src="images/shop/3.jpg" alt="image">
										<h6><a href="#">Light LED</a></h6>
										<span>$ 76</span>
									</li>
									<li>
										<img src="images/shop/4.jpg" alt="image">
										<h6><a href="#">Offic chair</a></h6>
										<span>$ 134</span>
									</li> -->
									<?php
										}
									?>
								</ul> <!-- /.Popular-Product -->
							</div> <!-- /.Shop-Side-Bar -->
						</div> <!-- /.col -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</section> <!-- /.Shop-Pages -->
			

			

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