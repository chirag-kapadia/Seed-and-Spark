<?php include_once "Admin/Connection.php"; ?>
<div class="top-header">
					<div class="container">
						<div class="clear-fix">
							<!-- <ul class="float-left top-header-left">
								<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Program</a></li>
								<li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shop</a></li>
								<li><a href="#"><i class="fa fa-mobile" aria-hidden="true"></i> Contact</a></li>
							</ul> --> <!-- /.top-header-left -->
							
								
							
							<ul class="float-right top-header-right">
								<?php
								if(isset($_SESSION['UsserID']))
								{
									echo $_SESSION['UserID'];
									/*For Investor*/
									if($_SESSION['IsInvestor']==1 && $_SESSION['IsVerified']==0)
									{
							?>
								<li><h5 style="color: white;"><marquee >You Are Not Verified By Seed & Spark</marquee></h5>	</li>
								<?php
									}
								}
							?>
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="https://plus.google.com/"><i class="fa fa-google" aria-hidden="true"></i></a></li>
							</ul> <!-- /.top-header-right -->
						</div> <!-- /.clear-fix -->
					</div> <!-- /.container -->
				</div> <!-- /.top-header -->