<div class="middle-header">
					<div class="container">
						<div class="row">
							<?php
								include_once("Admin/Connection.php");

								if(isset($_SESSION['UserID']))
								{ 
									/*select Initiatodetai Verified or not start*/
									$sel="select * from tblInitiatorDetail where UserID=".$_SESSION['UserID'];
									$Exe_sel=mysqli_query($con,$sel)or die(mysqli_error($con));
									$Fetch_sel=mysqli_fetch_array($Exe_sel);
									/*select Initiatodetai Verified or not end*/

									if($_SESSION['IsInvestor']==1 && $_SESSION['IsVerified']==0 || $_SESSION['IsInitiator']==1 && $_SESSION['IsVerified']==0 || $_SESSION['IsExpert']==1 && $_SESSION['IsVerified']==0)
									{
							?>
							<h5 style="color: red;"><marquee >You Are Not Verified By Seed & Spark</marquee></h5>	
							<?php
									}	
									if($_SESSION['IsInitiator']==1 && $Fetch_sel['IsVerified']==0)
									{
							?>
										<h5 style="color: red;"><marquee >Please Verify Yourself</marquee></h5>		
							<?php
									}								
								}
							?>	
							<div class="col-md-4 col-xs-12">
								<div class="them-logo"><a href="index.php"><img src="images/logo/logo.png" alt="logo"></a></div><!-- /.them-logo -->
							</div> <!-- /.col -->
							<div class="col-md-8 col-xs-12">
								<div class="middle-header-contant">
									<ul class="clear-fix" style="margin-left: 100px;">
										
										<li>
											<i class="flaticon-smartphone"></i>
											<p>Want to talk with us</p>
											<span>+91 9998110998</span>
										</li>
										<li>
											<i class="flaticon-envelope"></i>
											<p>Email Us</p>
											<a href="https://www.gmail.com/">seedandspark@gmail.com</a>
										</li>
									</ul> <!-- /.clear-fix -->

								</div> <!-- /.middle-header-contant -->
							</div> <!-- /.col -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.middle-header -->