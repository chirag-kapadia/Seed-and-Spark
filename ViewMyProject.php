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
								<p>Every Project Has its own inmportance<br>Invest it</p>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><span>-</span></li>
									<li><a href="#">Causes details</a></li>
								</ul>
								<a href="faq.php" class="hvr-bounce-to-right">FAQ'S</a>
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
											<li>Invested</li>
											<li>
												<div class="donate-piechart tran3s">
									                <div class="piechart"  data-border-color="rgba(253,88,11,1)" data-value="<?php echo $per;?>">
													  <span><?php echo $per;?></span>
													</div>
									            </div> <!-- /.donate-piechart -->
											</li>
											<li>₹<?php if(isset($sum)) {echo $sum;}else{echo "0";};?> Raised of ₹<?php echo $Fetch_Project['FundTarget'];?> Goal</li>
											<!-- Donation people Counting start -->
												<?php
													$Select_Fund="select Count(*) as Count from tblFund where ProjectID=".$Fetch_Project['ProjectID'];
													$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
													$Fetch_Fund=mysqli_fetch_array($Exe_Fund);

												?>
											<!-- Donation people Counting end -->

											<a href="InvesterList.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>" style="color: #ff6a00"><li><span><?php echo $Fetch_Fund['Count'];?></span> Donations</li></a>
										</ul>

											<?php
												$sel_ppinfo="select * from tblProjectProgress where ProjectID=".$_REQUEST['ProjectID'];
												$Exe_ppinfo=mysqli_query($con,$sel_ppinfo) or die(mysqli_error($con));
												$Fetch_ppinfo=mysqli_fetch_array($Exe_ppinfo);


											$pern=$per*100;
											 if($pern>=100)
												{
													
													if($Fetch_ppinfo['IsAcceptFirstSloat']==1 || $Fetch_ppinfo['IsAcceptFirstSloat']==0)
													{
											?>
										 				<a href="ProjectProgress.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>">Project Progress First Sloat</a>
										 <?php
										 			}
										 			if($Fetch_ppinfo['IsAcceptFirstSloat']==1 )
										 			{
										 		?>
										 				<a href="ProjectProgress.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>">Project Progress Second Sloat</a>
										 	
										 	<?php	
										 			}
										 			if($Fetch_ppinfo['IsAcceptSecoundSloat']==1)
										 			{
										 	?>
										 				<a href="ProjectProgress.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>">Project Progress Third Sloat</a>
										 	<?php
										 			}
										 			if($Fetch_ppinfo['IsAcceptThirdSloat']==1)
										 			{	
										 	?>
										 				<a href="ProjectProgress.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>">Project Progress Fourth Sloat</a>
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
										<ul class="count-down">
											<li>
												<span><?php echo $RemainingDay;?></span>
												<p>Days</p>
											</li>
											<li>
												<?php
													$sel_ppAmountPaid="select * from tblProjectProgress where ProjectID=".$_REQUEST['ProjectID'];
													$Exe_ppAmountPaid=mysqli_query($con,$sel_ppAmountPaid) or die(mysqli_error($con));
													$Fetch_ppAmountPaid=mysqli_fetch_array($Exe_ppAmountPaid);
												?>
												<span><?php
													if(isset($Fetch_ppAmountPaid['AmountPaid']))
													{
												 		echo "₹. ".$Fetch_ppAmountPaid['AmountPaid'];
												 	}
												 	else
												 		{
																echo "₹. 0";												 		
												 		}
												 	?>
												</span>
												<p>Payment Done</p>
											</li><!--
											<li>
												<span>43</span>
												<p>Minutes</p>
											</li>
											<li>
												<span>03</span>
												<p>Seconds</p>
											</li> -->
										</ul>
										<?php 
											   
                                                    
                                                    $Select_Q32="select * from tblReturnProjectProgress where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe32=mysqli_query($con,$Select_Q32) or die(mysqli_error($con));
                                                    $Fetch32=mysqli_fetch_array($SelExe32);
                                                    
                                                    $sel_ppamount1="select * from tblReturnProjectProgress where ProjectID='".$_REQUEST['ProjectID']."'";
										                $SelExeppamount1=mysqli_query($con,$sel_ppamount1) or die(mysqli_error($con));
										                $Fetchppamount1=mysqli_fetch_array($SelExeppamount1);
                                                

											if($Fetch_ppinfo['IsAcceptFirstSloat']==1 && $Fetch_ppinfo['IsAcceptSecoundSloat']==1 && $Fetch_ppinfo['IsAcceptThirdSloat']==1 && $Fetch_ppinfo['IsAcceptFourthSloat']==1 )
											{

												/**/
													if(isset($_REQUEST['btnSendAmount']))
													{
														//update project progress in tblproject
										                $updat_Rproject_Progress="update tblProject set ReturnProjectProgressStatus='".$_REQUEST['rbtnCompletion3']."' where ProjectID=".$_REQUEST['ProjectID'];
										                //echo $updat_project_Progress;
										                mysqli_query($con,$updat_Rproject_Progress)or die(mysqli_error($con));

										                if(isset($_REQUEST['rbtnCompletion3']))
										                {
										                    if($_REQUEST['rbtnCompletion3']==25)
										                    {
										                        $up="update tblReturnProjectProgress set IsAcceptFirstSloatR=1 where ProjectID=".$_REQUEST['ProjectID'];
										                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
										                    }
										                    if($_REQUEST['rbtnCompletion3']==50)
										                    {
										                        $up="update tblReturnProjectProgress set IsAcceptSecoundSloatR=1 where ProjectID=".$_REQUEST['ProjectID'];
										                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
										                    }
										                    if($_REQUEST['rbtnCompletion3']==75)
										                    {
										                        $up="update tblReturnProjectProgress set IsAcceptThirdSloatR=1 where ProjectID=".$_REQUEST['ProjectID'];
										                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
										                    }
										                    if($_REQUEST['rbtnCompletion3']==100)
										                    {
										                        $up="update tblReturnProjectProgress set IsAcceptFourthSloatR=1 where ProjectID=".$_REQUEST['ProjectID'];
										                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
										                    }
										                }
										               
										                
										                    //$val1=0+$val1;
										                $val1=$Fetchppamount1['AmountPaidR']."<br>";
										                $totalwi=$Fetch_Project['TotalReturnAmount']."<br>";

										                $wi4=$Fetch_Project['AvgReturnAmount']."<br>";
										                 $val2=$val1+$wi4."<br>";
										                $remAmount=$totalwi-$val2."<br>";
										                $update_amt="update tblReturnProjectProgress set AmountPaidR='".$val2."', RemainingAmountR='".$remAmount."' where ProjectID=".$_REQUEST['ProjectID'];
										                //echo $update_amt."<br>";
										                mysqli_query($con,$update_amt) or die(mysqli_error($con));


										                //Select Fund detail for returning amount to investor ---update query
										                $Sel_FundReturn="select * from tblFund where ProjectID=".$_REQUEST['ProjectID'];
										                $Exe_FundReturn=mysqli_query($con,$Sel_FundReturn) or die(mysqli_error($con));
										                while($Fetch_FundReturn=mysqli_fetch_array($Exe_FundReturn))
										                {	
										                	$FundID=$Fetch_FundReturn['FundID'];
										                	$UserID=$Fetch_FundReturn['UserID'];
										                	$ProjectID=$Fetch_FundReturn['ProjectID'];
										                	$RTotalAmt=$Fetch_FundReturn['ReturnAmount'];
										                	$RInt4Amt=$Fetch_FundReturn['ReturnIntrestAmount'];
										                	//Total investor amount with intrest rate
										                	$intTotalAmt=$Fetch32['AmountPaidR'];
										                	$Paid=$intTotalAmt-$RInt4Amt;

										                	if($Fetch_Project['ReturnProjectProgressStatus']==00)
										                	{
										                		$update_investor_return="update tblFund set IsFirstReturn=1, FirstSlotSendOn=now() where FundID='".$FundID."'";
										                		mysqli_query($con,$update_investor_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==25)
										                	{
										                		$update_investor_return="update tblFund set IsSecoundReturn=1, SecondSlotSendOn=now() where FundID='".$FundID."'";
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_investor_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==50)
										                	{
										                		$update_investor_return="update tblFund set IsThirdReturn=1, ThirdSlotSendOn=now() where FundID='".$FundID."'";
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_investor_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==75)
										                	{
										                		$update_investor_return="update tblFund set IsFourthReturn=1, FourthSlotSendOn=now() where FundID='".$FundID."'";
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_investor_return)or die(mysqli_error($con));
										                	}
										                }


										                /*Returning Amount to Expert */
										                $Sel_FundReturn_Expert="select * from tblExpertReturn where ProjectID=".$_REQUEST['ProjectID'];
										                $Exe_FundReturn_Expert=mysqli_query($con,$Sel_FundReturn_Expert) or die(mysqli_error($con));
										                while($Fetch_FundReturn_Expert=mysqli_fetch_array($Exe_FundReturn_Expert))
										                {	
										                	$ExpertReturnID=$Fetch_FundReturn_Expert['ExpertReturnID'];
										                	$UserIDExpert=$Fetch_FundReturn_Expert['UserID'];
										                	$ProjectIDExpert=$Fetch_FundReturn_Expert['ProjectID'];
										                	$RTotalAmtExpert=$Fetch_FundReturn_Expert['ReturnTotalAmount'];
										                	$RInt4AmtExpert=$Fetch_FundReturn_Expert['Sloat4Amount'];
										                	//Total investor amount with intrest rate
										                	//$intTotalAmt=$Fetch32['AmountPaidR'];
										                	//$Paid=$intTotalAmt-$RInt4Amt;

										                	if($Fetch_Project['ReturnProjectProgressStatus']==00)
										                	{
										                		$update_Expert_return="update tblExpertReturn set IsFirstReturn=1, FirstSlotSendOn=now() where ExpertReturnID='".$ExpertReturnID."'";
										                		mysqli_query($con,$update_Expert_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==25)
										                	{
										                		$update_Expert_return="update tblExpertReturn set IsSecondReturn=1, SecondSlotSendOn=now() where ExpertReturnID='".$ExpertReturnID."'";
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_Expert_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==50)
										                	{
										                		$update_Expert_return="update tblExpertReturn set IsThirdReturn=1, ThirdSlotSendOn=now() where ExpertReturnID='".$ExpertReturnID."'";
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_Expert_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==75)
										                	{
										                		$update_Expert_return="update tblExpertReturn set IsFourthReturn=1, FourthSlotSendOn=now() where ExpertReturnID='".$ExpertReturnID."'";
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_Expert_return)or die(mysqli_error($con));
										                	}
										                }


										               /*Returning Amount to Website -Admin in tblwebsite return */
										                $Sel_FundReturn_Web="select * from tblWebsiteReturn where ProjectID=".$_REQUEST['ProjectID'];
										                $Exe_FundReturn_Web=mysqli_query($con,$Sel_FundReturn_Web) or die(mysqli_error($con));
										                while($Fetch_FundReturn_Web=mysqli_fetch_array($Exe_FundReturn_Web))
										                {	
										                	$WebsiteReturnID=$Fetch_FundReturn_Web['WebsiteReturnID'];
										                	$AdminIDWeb=$Fetch_FundReturn_Web['AdminID'];
										                	$ProjectIDWeb=$Fetch_FundReturn_Web['ProjectID'];
										                	$RTotalAmtWeb=$Fetch_FundReturn_Web['ReturnTotalAmount'];
										                	$RInt4AmtWeb=$Fetch_FundReturn_Web['Slot4Amount'];
										                	//Total investor amount with intrest rate
										                	//$intTotalAmt=$Fetch32['AmountPaidR'];
										                	//$Paid=$intTotalAmt-$RInt4Amt;

										                	if($Fetch_Project['ReturnProjectProgressStatus']==00)
										                	{
										                		$update_Web_return="update tblWebsiteReturn set IsFirstReturn=1, FirstSlotSendOn=now() where WebsiteReturnID=".$WebsiteReturnID;
										                		mysqli_query($con,$update_Web_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==25)
										                	{
										                		$update_Web_return="update tblWebsiteReturn set IsSecondReturn=1, SecondSlotSendOn=now() where WebsiteReturnID=".$WebsiteReturnID;
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_Web_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==50)
										                	{
										                		$update_Web_return="update tblWebsiteReturn set IsThirdReturn=1, ThirdSlotSendOn=now() where WebsiteReturnID=".$WebsiteReturnID;
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_Web_return)or die(mysqli_error($con));
										                	}
										                	if($Fetch_Project['ReturnProjectProgressStatus']==75)
										                	{
										                		$update_Web_return="update tblWebsiteReturn set IsFourthReturn=1, FourthSlotSendOn=now() where WebsiteReturnID=".$WebsiteReturnID;
										                		//echo $update_investor_return;
										                		mysqli_query($con,$update_Web_return)or die(mysqli_error($con));
										                	}
										                }

										                //Complete Project Update
										                if($Fetch_FundReturn_Web['IsFourthReturn']==1 && $Fetch_FundReturn_Expert['IsFourthReturn']==1 && $Fetch_FundReturn['IsFourthReturn']==1)
										                {
										                	$Update_Project_Complete="update tblproject set IsComplete=1 where ProjectID=".$_REQUEST['ProjectID'];
															$Exe_Project_Complete=mysqli_query($con,$Update_Project_Complete) or die(mysql_error($con));
															$Fetch_Project_Complete=mysqli_fetch_array($Exe_Project_Complete);
										                }

										                //header("location:ViewMyProject.php?ProjectID=echo $_REQUEST['ProjectID']");
													}
												/**/

										?>

										<ul>
											<li>
												 <div class="col-md-8">
                                                <!--  -->
                                                <span class="text-bold-500 primary"><h2 style="color: #ff6a00;">Return Project Progress:</h2> </span>
                                                <span class="display-block overflow-hidden">
                                                	
                                                	<table class="table table-hover">
                                                            <thead >
                                                                <th style="text-align: center;">Slot</th>
                                                                <!-- <th>Amount</th> -->
                                                                <th style="text-align: center;">Request/Not</th>
                                                            </thead>
                                                            <tr>
                                                                <td>First</td>
                                                                <!-- <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td> -->
                                                                <td><?php if($Fetchppamount1['FirstSloatR']==1)
                                                                        {
                                                                             echo "yes";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Secound</td>
                                                                <!-- <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td> -->
                                                                <td><?php if($Fetchppamount1['SecoundSloatR']==1)
                                                                        {
                                                                             echo "Yes";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Third</td>
                                                                <!-- <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td> -->
                                                                <td><?php if($Fetchppamount1['ThirdSloatR']==1)
                                                                        {
                                                                             echo "Yes";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fourth</td>
                                                                <!-- <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td> -->
                                                                <td><?php if($Fetchppamount1['FourthSloatR']==1)
                                                                        {
                                                                             echo "Yes";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                  <br>
                                                   <div class="col-md-12 col-xs-12">
                                                    <div class="single-input">
                                                    	<form method="post">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $Fetch_Project['ReturnProjectProgressStatus'];?>%;background-color: #ff6a00;">Project Progress&nbsp;&nbsp;   
                                                          <?php echo $Fetch_Project['ReturnProjectProgressStatus'];?>%
                                                        </div>
                                                      </div>
                                                     </div>
                                                </div>                                                   
                                                </span><br>
                                                <span class="text-bold-500 primary"> Approve Percentage:</span>
                                                <div class="single-textarea">
                                                    <br>
                                                    <?php
                                                        if($Fetch_Project['ReturnProjectProgressStatus']==0)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion3" value="25" required="">&nbsp;&nbsp;&nbsp;25%<br>
                                                    <?php
                                                        }
                                                        if($Fetch_Project['ReturnProjectProgressStatus']==25)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion3" value="50" required="">&nbsp;&nbsp;&nbsp;50%<br>
                                                    <?php
                                                        }
                                                        if($Fetch_Project['ReturnProjectProgressStatus']==50)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion3" value="75" required="">&nbsp;&nbsp;&nbsp;75%<br>
                                                    <?php
                                                        }
                                                        if($Fetch_Project['ReturnProjectProgressStatus']==75)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion3" value="100" required="">&nbsp;&nbsp;&nbsp;100%<br>
                                                    <?php
                                                        }
                                                    ?>
                                                </div> <!-- /.single-textarea -->                                       
                                            </div><br><br>
                                            <div class="col-xs-8">
                                                
                                            </div> <!-- /.col -->
                                             
                                              <div class="col-xs-8">
                                              <div class="text-right">
                                                
                                                  <button type="submit" class="hvr-float-shadow" style="color: white;background-color: #ff6a00;"  name="btnSendAmount"  >Send Amount</button>
                                                </form>
                                              </div> 
                                          	</div>
                                          	
											</li>
										</ul>
										<?php
											}
										?>
									</div> <!-- /.Causes-Text -->
								</div> <!-- /.Causes-Item -->
								<div class="Details-Info">
									<h3><?php echo $Fetch_Project['ProjectTitle'];?></h3>
									<ul class="info-list-one">
										<li>
											<h6><?php 
													$date_Project=date('M d,Y',strtotime($Fetch_Project['CreatedOn']));
													echo $date_Project;
												?>
											</h6>
										</li>
										<!-- <li>7 Comment</li> -->
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
												<?php //echo $_REQUEST['ProjectID'];?>
												<a href="ExpertReturnList.php?ProjectID=<?php echo $_REQUEST['ProjectID'];?>"><h3 style="color:white;"><?php echo $Fetch_ApprovedExpert['FirstName'].' '.$Fetch_ApprovedExpert['LastName'];?></h3></a>
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
								/*		$insert_qry="insert into tblexpertreview value(null,'".$_REQUEST['ProjectID']."','".$_SESSION['UserID']."','".$_REQUEST["test-1-rating-5"]."','".$_REQUEST['txtReview']."',now(),null,'".$_REQUEST['chkRealistic']."','".$_REQUEST['chkSuccessfull']."',0,'".$_REQUEST['txtRealistic']."','".$_REQUEST['txtSuccessful']."')";
										//echo $insert_qry;
										$insert=mysqli_query($con,$insert_qry) or die(mysqli_error($con));*/


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
											    												<?php if(isset($_REQUEST["test-1-rating-5"])){ 
																											
																			}
													?>
											</div>
											
											<div class="col-xs-12">
												<textarea placeholder="Review" name="txtReview" required=""></textarea>
											</div>
											<div class="col-sm-4 col-xs-12"><label>Realistics: &nbsp;&nbsp;</label>
												 <input type="checkbox" name="chkRealistic" value="1" required="">
											

											</div>
											<div class="col-sm-4 col-xs-12"><label>Successfull</label>
												<input type="checkbox" name="chkSuccessfull" value="1" required="" >
												
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