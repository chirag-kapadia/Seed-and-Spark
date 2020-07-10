<?php include_once("Admin/Connection.php");?>
<style type="text/css">
 	.scrollabletextbox {
						    height:400px;
						    width:200px;
						    
						    font-size: 82%;
						    overflow:scroll;
						}
						/* width */
						::-webkit-scrollbar {
						    width: 10px;
						}

						/* Track */
						::-webkit-scrollbar-track {
						    background: #f1f1f1; 
						}
						 
						/* Handle */
						::-webkit-scrollbar-thumb {
						    background: #fd580b; 
						}

						/* Handle on hover */
						::-webkit-scrollbar-thumb:hover {
						    background: #fd580b; 
						}
 </style>

<div class="theme-main-menu">
					<div class="container">
						<div class="main-menu menu-skew-div clear-fix">
							<!-- Menu -->
							<nav class="navbar">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed tran3s" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
										<span class="sr-only tran3s">Toggle navigation</span>
										<span class="icon-bar tran3s"></span>
										<span class="icon-bar tran3s"></span>
										<span class="icon-bar tran3s"></span>
									</button>
								</div>
								
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="navbar-collapse-1">
									<ul class="nav navbar-nav">
										<li class="dropdown-holder current-page-item Active-manu"><a href="index.php">Home</a></li>

										<li class="dropdown-holder"><a href="#">Categories</a>
											<ul class="sub-menu scrollabletextbox">
												<!-- fetch Expert Area in Menu Select Query Start -->
												<?php 

													$select_ExpertArea="select * from tblExpertArea";
													$Exe_ExpertArea=mysqli_query($con,$select_ExpertArea)or die(mysqli_error($con));
													while($Fetch_ExpertArea=mysqli_fetch_array($Exe_ExpertArea))
													{
                                                                    												
												?>
												<!-- fetch Expert Area in Menu Select Query end -->

												<li><a href="projects.php?ExpertAreaID=<?php echo $Fetch_ExpertArea['ExpertAreaID']; ?>"  class="tran3s"><?php echo $Fetch_ExpertArea['AreaName']; ?> </a></li>
												<?php
													}
												?>												
											</ul>
										</li>
											<?php 
										          if(isset($_SESSION['IsInitiator']))
										          {
													if($_SESSION['IsInitiator']==1)
						   							{
						   						?>
						   						<?php
						   							$Ini_Verified2="select * from tblUser where UserID=".$_SESSION['UserID'];
													$Ini_Exe2=mysqli_query($con,$Ini_Verified2) or die(mysqli_error($con));
													$Fetch_Ini2=mysqli_fetch_array($Ini_Exe2);

													$Ini_Verified="select * from tblInitiatorDetail where UserID=".$_SESSION['UserID'];
													$Ini_Exe=mysqli_query($con,$Ini_Verified) or die(mysqli_error($con));
													$Fetch_Ini=mysqli_fetch_array($Ini_Exe);
												?>
										<li class="dropdown-holder"><a href="#">Start Project</a>
											<ul class="sub-menu">							
												<?php if($Fetch_Ini['IsVerified']==0)
														{
												?>				
												<li><a href="InitiatorForm.php"  >Verify Yourself</a></li>
												<?php
														}
														if($Fetch_Ini2['IsVerified']==1)
														{
												?>
												<li><a href="ProjectForm.php" >Start Project</a></li>
												<?php
														}
												?>
												<li><a href="MyProject.php">My Projects</a></li>								
											</ul>
										</li>

										<?php
													}	
							   					}
							   						
										          if(isset($_SESSION['IsExpert']))
										          {
													if($_SESSION['IsExpert']==1)
						   							{

													$Exe_Verified="select * from tblUser where UserID=".$_SESSION['UserID'];
													$Expert_Exe=mysqli_query($con,$Exe_Verified) or die(mysqli_error($con));
													$Fetch_Expert=mysqli_fetch_array($Expert_Exe);
												?>
									   <li class="dropdown-holder"><a href="#">Project</a>
											<ul class="sub-menu ">
												<?php if($Fetch_Expert['IsVerified']==1)
														{
												?>
												
						   							<li><a href="PendingProject.php"><i style="color: white!important;display: contents!important;" class="fa fa-sign-out-alt" ></i> &nbsp; Pending Projects</a></li>
						   							<li><a href="ApprovedProject.php"><i style="color: white!important;display: contents!important;" class="fa fa-sign-out-alt" ></i> &nbsp; Approved Projects </a></li>
						   							<?php
						   								}
						   								else
						   								{
						   									?>
						   									<li><a href="ExpertForm.php"><i style="color: white!important;display: contents!important;" class="fa fa-sign-out-alt" ></i> &nbsp; Fill Your Detail </a></li>
						   									<?php

						   								}
						   							?>
											</ul>
										</li>
												<?php
														}
							   						}
							   						?>
										<!-- <li class="dropdown-holder"><a href="ProjectForm.php">Start Project</a>
											
										</li> -->

										<li class="dropdown-holder"><a href="Experts.php">Experts</a>

										</li>	

										<!-- <li class="dropdown-holder"><a href="faq.php">FAQ's</a> -->

										
			   								
				   						
										<li><a href="ContactUs.php">Contact</a></li>
																		
									</ul>
								</div>
							</nav>

							<div class="float-right">
								<div class="search-button-content clear-fix">
									<!-- <button class="cart tran3s"><i class="flaticon-shopping-bag"></i> <span>0</span></button> -->
						   			<!-- <button class="search tran3s" id="search-button"><i class="flaticon-search"></i></button> -->
						   			<!-- <div class="search-box tran5s" id="searchWrapper">
						   				<button id="close-button" class="p-color"><i class="fa fa-times" aria-hidden="true"></i></button>
						   				<div class="container">
						   					<img src="images/logo/theme-main-logo-1.png" alt="Logo">
						   					<form action="#">
						   						<input type="text" placeholder="Search....">
						   						<button class="p-bg-color"><i class="fa fa-search" aria-hidden="true"></i></button>
						   						
						   					</form>
						   				</div>
						   			</div> --> <!-- /.search-box -->

						   			
								   		<nav class="navbar">								
										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse" id="navbar-collapse-1">
											
											<ul class="nav navbar-nav">
												
												<?php if(isset($_SESSION['UserID']))
													{
												 ?>
													
												<li class="dropdown-holder"><a href="#" style="color: white;"><i style="color: white!important;display: contents!important;" class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['FirstName'].'  '.$_SESSION['LastName'];?></a>
												<?php
													}
													else
													{
												?>
												<li class="dropdown-holder"><a href="Login.php" style="color: white;"><i style="color: white!important;display: contents!important;" class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;</i></span>Sign In</a>
												<?php
													}
												?>
													<ul class="sub-menu ">
														
														<?php 
								   				if(isset($_SESSION['UserID']))
								   				{
								   			?>			
								   						<li><a href="EditProfile.php" class="a-comon main-menu-button "><i style="color: black!important;display: contents!important;" class="fa fa-sign-out-alt"></i> &nbsp;Edit Profile </a></li>
								   						<li><a href="ChangePassword.php" class="a-comon main-menu-button "><i style="color: black!important;display: contents!important;" class="fa fa-key"></i> &nbsp;ChangePassword </a></li>
														<li><a href="Logout.php" class="a-comon main-menu-button "><i style="color: black!important;display: contents!important;" class="fa fa-sign-out-alt"></i> &nbsp;Log Out </a></li>
														<?php
								   				}
								   				else
								   				{
								   			?>
														<!-- <li><a href="Login.php" class="a-comon main-menu-button "><i class="fa fa-user"></i> &nbsp;Sign in </a></li> -->
													</ul>
												</li>
												<?php
								   				}
								   			?>
																					
											</ul>
										</div>
										</nav>
						   			
						   		</div> <!-- /.right-content -->
							</div> <!-- /.float-right -->
							
						</div> <!-- / menu-skew-div -->
					</div> <!-- /.container main-menu -->
				</div> <!-- /.main-menu -->