<div class="wrapper">
  <!-- main menu-->
  <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
  <div data-active-color="white" data-background-color="man-of-steel" data-image="app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
      <div class="logo clearfix">
        <a href="index-2.html" class="logo-text float-left">
          <div class="logo-img"><img src="app-assets/img/logo.png"/>
          </div>
          <span class="text align-middle">Seed<br><div style="margin-left: 100px;"> &</div><div style="margin-left: 90px;"> Spark</div></span>
        </a>
        
        <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
          <i data-toggle="expanded" class="ft-toggle-right toggle-icon"></i>
        </a>
        
        <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none">
          <i class="ft-x"></i>
        </a>
      </div>
    </div>
      <!-- Sidebar Header Ends-->
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="sidebar-content">
        <div class="nav-container">
          <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class="nav-item"><a href="Dashboard.php"><i class="fa fa-tachometer"></i><span data-i18n="" class="menu-title">Dashboard</span></a><hr>
            </li>

            <?php 
            if($_SESSION['IsSuper']==1)
              {
            ?>
            <li class=" nav-item"><a href="Admin.php"><i class="fa fa-user-circle-o"></i><span data-i18n="" class="menu-title">Admin</span></a>
            </li>
            <?php
                    }
            ?>            
            <li class="has-sub nav-item"><a href="#"><i class="fa fa-briefcase"></i><span data-i18n="" class="menu-title">Project</span></a>
              <ul class="menu-content">
                    <li class=" nav-item">
                      <!-- badge expert verified Counter start -->
                      <?php 
                        $Initiator_Ver="select count(IsVerified) as InitiatorVer from tblUser where IsVerified=0 and IsInitiator=1";
                        $Exe_Initiator_Ver=mysqli_query($con,$Initiator_Ver) or die(mysqli_error($con));
                        $Fetch_Initiator_Ver=mysqli_fetch_array($Exe_Initiator_Ver);

                        if(!$Fetch_Initiator_Ver['InitiatorVer']==0)
                          {
                      ?>
                          <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">
                      <?php 
                        if(isset($Fetch_Initiator_Ver)) 
                          echo $Fetch_Initiator_Ver['InitiatorVer'];
                      ?>  </span>
                      <?php 
                          }
                      ?>  

                      <!-- badge expert verified Counter start -->   
                      <a href="Initiator.php">Initiator</a>
                    </li>
                     <li class=" nav-item"> 
                      <?php 
                            $Select_Pro="select count(IsApprovedByAdmin) as ProjectVer from tblProject where IsApprovedByAdmin=0 ";
                            $Exe_Select_Pro=mysqli_query($con,$Select_Pro) or die(mysqli_error($con));
                            $Fetch_Select_Pro=mysqli_fetch_array($Exe_Select_Pro);
                            if(!$Fetch_Select_Pro['ProjectVer']==0) 
                              {
                      ?>          <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">
                      <?php if(isset($Fetch_Select_Pro)) 
                              echo $Fetch_Select_Pro['ProjectVer'];
                      ?>
                                   </span>
                      <?php 
                              }
                      ?>

                         <a href="Projects.php">Projects</a>
                        
                    </li>
                    <li class=" nav-item"><a href="Images.php"><!-- <i class="fa fa-picture-o"></i><span data-i18n="" class="menu-title"> -->Images Album<!-- </span> --></a>
            </li>
            <li class=" nav-item"><a href="Video.php"><!-- <i class="fa fa-video-camera"></i><span data-i18n="" class="menu-title"> -->Video Album<!-- </span> --></a>
            </li>
<!--                     <li class=" nav-item"><a href="Project_Package.php">Project Package</a>
            </li> -->
              </ul>
            </li>
             <!-- badge expert verified Counter start -->
            <?php 
              $Investor_Ver="select count(IsVerified) as InvestorVer from tblUser where IsVerified=0 and IsInvestor=1";
              $Exe_Investor_Ver=mysqli_query($con,$Investor_Ver) or die(mysqli_error($con));
              $Fetch_Investor_Ver=mysqli_fetch_array($Exe_Investor_Ver);
            ?>  
            <li class=" nav-item"><a href="Investor.php"><i class="fa fa-inr"></i><span data-i18n="" class="menu-title">Investor</span>
                 <?php if(!$Fetch_Investor_Ver['InvestorVer']==0) {?><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php if(isset($Fetch_Investor_Ver)) echo $Fetch_Investor_Ver['InvestorVer'];?></span><?php }?>
            </a>
            </li>
            <!-- expert Dropdown menu -->
            <!-- <li class="has-sub nav-item"><a href="#"><i class="fa fa-graduation-cap"></i><span data-i18n="" class="menu-title">Expert</span></a>
              <ul class="menu-content">
                    <li class=" nav-item"><a href="Expert.php">Expert</a>
                    </li>
                    <li class=" nav-item"><a href="ExpertArea.php">Expertise Area</a>
                    </li>
                    
              </ul>
            </li>  -->
            <!-- End expert Dropdown menu -->  


            <!-- badge expert verified Counter start -->
              <?php 
              $Expert_Ver="select count(IsVerified) as ExpertVerify from tblUser where IsVerified=0 and IsExpert=1";
              $Exe_Expert_Ver=mysqli_query($con,$Expert_Ver) or die(mysqli_error($con));
              $Fetch_Expert_Ver=mysqli_fetch_array($Exe_Expert_Ver);

            ?>  

            <!-- badge expert verified Counter start -->       
            <li class="nav-item"><a href="Expert.php"><i class="fa fa-graduation-cap"></i><span data-i18n="" class="menu-title">Expert</span>
              <?php if(!$Fetch_Expert_Ver['ExpertVerify']==0) {?><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php if(isset($Fetch_Expert_Ver)) echo $Fetch_Expert_Ver['ExpertVerify'];?></span><?php }?>
            </a>
            </li>  
            <li class=" nav-item"><a href="Fund.php"><i class="fa fa-money"></i><span data-i18n="" class="menu-title">Fund</span></a>
            </li>          
            <!-- <li class=" nav-item"><a href="Review.php"><i class="fa fa-commenting-o"></i><span data-i18n="" class="menu-title">Reviews</span></a>
            </li> -->
            <!-- <li class=" nav-item"><a href="Packages.php"><i class="fa ft-layers"></i><span data-i18n="" class="menu-title">Packages</span></a>
            </li> -->
            <li class=" nav-item"><a href="Cms.php"><i class="ft-file-text"></i><span data-i18n="" class="menu-title">CMS</span></a>
            </li>
            <!-- badge Inquiry Counter start -->
            <?php 
              $Inquiry="select count(IsReplied) as Reply from tblInquiry where IsReplied=0";
              $Exe_Inquiry=mysqli_query($con,$Inquiry) or die(mysqli_error($con));
              $Fetch_Inquiry=mysqli_fetch_array($Exe_Inquiry);

            ?>
            <!-- badge Inquiry Counter end -->
            <li class=" nav-item"><a href="Inquiry.php"><i class="fa fa-phone"></i><span data-i18n="" class="menu-title">Inquiry</span>
              <?php if(!$Fetch_Inquiry['Reply']==0) {?><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php if(isset($Fetch_Inquiry)) echo $Fetch_Inquiry['Reply'];?></span><?php }?></a>
            </li>
            <li class=" nav-item"><a href="Feedback.php"><i class="fa fa-comments-o"></i><span data-i18n="" class="menu-title">Feedback</span></a>
            </li>
            <li class=" nav-item"><a href="Newsletter.php"><i class="fa fa-newspaper-o"></i><span data-i18n="" class="menu-title">Newsletter</span></a>
            </li>
            <!-- <li class=" nav-item"><a href="SupportUs.php"><i class="fa fa-handshake-o"></i><span data-i18n="" class="menu-title">Support Us</span></a>
            </li> -->
            <li class=" nav-item"><a href=""><!-- <i class="fa fa-handshake-o"></i><span data-i18n="" class="menu-title"></span> --></a>
            </li>

          </ul>
        </div>
      </div>
      <!-- main menu content-->
      <div class="sidebar-background"></div>
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
      <!-- / main menu-->