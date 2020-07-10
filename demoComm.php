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
								
								
								


								<div class="review-tab">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#home">Description</a></li>
										<!-- <li><a data-toggle="tab" href="#menu1">Additional information</a></li> -->
										<li><a data-toggle="tab" href="#menu2">Reviews (<?php echo $Fetch_Count['Rate'];?>)</a></li>
									</ul>
									<div class="tab-content">
										<div id="home" class="tab-pane fade in active">
									    	<p><?php echo $Fetch_Project['Description'];?></p>
									    	<p>Further, Google is no longer permitting the use of its ads on sites that trigger pop-under pages, even if the pop-unders do not contain an ad</p>
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

												$Sel_comment="select c.*,u.FirstName,u.LastName,u.ProfilePic from tblComment c, tblUser u where c.UserID = u.UserID and ProjectID=".$_REQUEST['ProjectID'];
												$Exe_Comment=mysqli_query($con,$Sel_comment) or die(mysqli_error($con));
												while($Fetch_Comment=mysqli_fetch_array($Exe_Comment))
												{
											?>
										<!-- Fetch Comment Data End -->
									    	<div id="review">
												<div class="single-review clearfix">
													<?php
			                                      $imageName=$Fetch_Comment['ProfilePic'];
			                                      if($imageName=="" || !file_exists("Admin/Profile/$imageName"))
			                                      {
			                                        $imageName="no1.png";
			                                      }
			                                    ?>
			                                    	<!-- <img src="Admin/Profile/<?php echo $imageName;?>" alt="" class="float-left"> -->
													
													<div class="text float-left">
														<div class="clearfix">
															<!-- <div class="float-left">
																<h6><?php echo $Fetch_Comment['FirstName']." ".$Fetch_Comment['LastName'];?></h6>
																<span><?php
														$Time_Comment=date('M d, Y',strtotime($Fetch_Comment['CreatedOn']));
												 echo $Time_Comment;?></span>
																
																
															</div> -->
															<ul class="float-right">
																<?php 
			                                          //$rat=$Fetch_Count_avg['CommentID']/$row['UserCount'];
			                                    //      echo $rat;

			                                          for($i=1;$i<=5;$i++)
			                                          {
			                                            ?>
			  									<input name="star<?php echo $Fetch_Comment['CommentID']; ?>" type="radio" class="star" disabled="disabled" align="middle" <?php 
			                                            if($i<=$Fetch_Comment['Rating']) echo 'checked="checked"'; ?> />

			                                            <?php 
			                                          } 
			                                          ?>
																
															</ul>
														</div> <!-- /.clearfix -->
														<!-- <p><?php echo $Fetch_Comment['Comment'];?></p> -->
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

								
							</div> <!-- /.single-product-details -->
							
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