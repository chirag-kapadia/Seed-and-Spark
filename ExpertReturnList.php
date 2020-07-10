<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once("LoadFiles.php");?>
		<?php include_once("Admin/Connection.php");?>
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
			<span class="text-bold-500 primary"><h2 style="color: #ff6a00;text-align: center;">Expert Return</h2> </span>
                <span class="display-block overflow-hidden">                                                	
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                            <th style="text-align: center;">Name</th>
                                                                <!-- <th>Amount</th> -->
                             <!-- <th style="text-align: center;">Invest Amount</th> -->
                             <th style="text-align: center;">TotalReturnIntrestAmount</th>
                             <th style="text-align: center;">Return Amount Paid</th>
                             <!-- <th>Amount Remaining</th> -->
                        </thead>
			<?php
				$selectProject="select * from tblExpertReturn where ProjectID=".$_REQUEST['ProjectID'];
				$selectqry=mysqli_query($con,$selectProject);
				while($FetchDetails=mysqli_fetch_array($selectqry))
				{
			?>
					
                                                            <tr>
                                                                <td><?php
                                                                 $selectName="select * from tbluser where UserID=".$FetchDetails['UserID'];
                                                                 $selectqry1=mysqli_query($con,$selectName);
																	$FetchDetails1=mysqli_fetch_array($selectqry1);
																	echo $FetchDetails1['FirstName']." ".$FetchDetails1['LastName'];
                                                                 ?></td>
                                                                <!-- <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td> -->
                                                                <!-- <td><?php echo "₹".$FetchDetails['FundAmount'];?>
                                                                </td> -->
                                                                <td><?php echo "₹".$FetchDetails['ReturnTotalAmount'];?></td>
                                                                <td><?php 
                                                                	if($FetchDetails['IsFirstReturn']==1)
                                                                	{
                                                                		echo "Slot 1 :₹".$FetchDetails['Sloat4Amount']."   ";
                                                                	}
                                                                	if($FetchDetails['IsSecondReturn']==1)
                                                                	{
                                                                		//echo "Slot 2 :₹".$FetchDetails['ReturnIntrestAmount']*2;
                                                                		echo "Slot 2 :₹".$FetchDetails['Sloat4Amount']."   ";
                                                                	}
                                                                	if($FetchDetails['IsThirdReturn']==1)
                                                                	{
                                                                		//echo "Slot 3 :₹".$FetchDetails['ReturnIntrestAmount']*3;
                                                                		echo "Slot 3 :₹".$FetchDetails['Sloat4Amount']."   ";
                                                                	}
                                                                	if($FetchDetails['IsFourthReturn']==1)
                                                                	{
                                                                		//echo "Slot 4 :₹".$FetchDetails['ReturnIntrestAmount']*4;
                                                                		echo "Slot 4 :₹".$FetchDetails['Sloat4Amount']."   ";
                                                                	}

                                                                	?>


                                                                </td>
		                                                        <!-- <td>
		                                                        	<?php 
                                                                	if($FetchDetails['IsFirstReturn']==1)
                                                                	{
                                                                		$amt=$FetchDetails['ReturnAmount']-$FetchDetails['ReturnIntrestAmount'];
                                                                		echo "Slot 1 :₹".$amt;
                                                                	}
                                                                	if($FetchDetails['IsSecoundReturn']==1)
                                                                	{
                                                                		$val=$FetchDetails['ReturnIntrestAmount']*2;
                                                                		$amt=$FetchDetails['ReturnAmount']-$val;
                                                                		echo "Slot 2 :₹".$amt;
                                                                	}
                                                                	if($FetchDetails['IsThirdReturn']==1)
                                                                	{
                                                                		$val=$FetchDetails['ReturnIntrestAmount']*3;
                                                                		$amt=$FetchDetails['ReturnAmount']-$val;
                                                                		echo "Slot 3 :₹".$amt;
                                                                	}
                                                                	if($FetchDetails['IsFourthReturn']==1)
                                                                	{
                                                                		$val=$FetchDetails['ReturnIntrestAmount']*4;
                                                                		$amt=$FetchDetails['ReturnAmount']-$val;
                                                                		echo "Slot 4 :₹".$amt;
                                                                	}

                                                                	?>
                                                                	
                                                                </td> -->
                                                            </tr>
                                                           
                                                        
				<?php
					}
				?>
									</table>

			

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