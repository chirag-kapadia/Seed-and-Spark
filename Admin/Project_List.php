<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
  <!-- Load Files -->
      <?php include_once("Connection.php");?>
      <?php include_once("loadfiles.php");?>
      <?php include_once("loadfilesjs.php");?>  
  <!-- Load Files -->
</head>

<body data-col="2-columns" class=" 2-columns ">
      
  <!-- Menu SideBar -->
   <?php include_once("menu.php");?>
  <!-- Menu SideBar End -->

  <div class="main-panel">
    <!-- Navbar (Header) Starts-->
      <?php include_once("header.php");?>
    <!-- Navbar (Header) Ends-->

    <div class="main-content">
       <div class="content-wrapper">
          <!-- Back Redirection Link Start -->
          <a href="Projects.php" class="danger" data-original-title="" title="">
              <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
          </a>
        <!-- Back Redirection Link End -->


          <!-- Horizontal cards start -->
            <section id="horizontal-examples">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <!-- <div class="content-header">Art Projects </div> -->
                        
                    </div>
                </div>


                <div class="row match-height">
                    <!-- Select Art Project In tblProject Start -->
                      <?php
                        //"sssssssssssssssssssssssssssssssss".$_REQUEST['ExpertID'];
                        $_SESSION['ExpertID']=$_REQUEST['ExpertID'];
                        $Select_Query="select * from tblProject where ExpertAreaID=".$_SESSION['ExpertID'];
                        $SelExe=mysqli_query($con,$Select_Query) or die(mysqli_error());
                        while($Fetch=mysqli_fetch_array($SelExe))
                        {
                      ?>
                      <!-- Select Art Project In tblProject End -->
                    <div class="col-xl-6 col-lg-12">
                        <div class="card horizontal">
                            <div class="card-body">
                                <div class="card-img">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol> -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                            <?php
                                            $Select_Query1="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch['ProjectID'];
                                            $SelExe1=mysqli_query($con,$Select_Query1) or die(mysqli_error());
                                            while($Fetch1=mysqli_fetch_array($SelExe1))
                                            {
                                            ?>
                                            
                                                <img src="Project/img/<?php echo $Fetch1['ImageName'];?>" style="width:220px;height:220px" >
                                            
                                            <?php
                                          }
                                            ?>
                                          </div>
                                        </div>
                                       <!--  <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a> -->
                                    </div>
                                </div>
                                <div class="card-stacked align-self-center">
                                    <div class="px-3">
                                        <h4 class="card-title"><?php echo $Fetch['ProjectTitle'];?></h4>
                                        <!-- <hr> -->
                                        <!-- <p class="card-text">Sweet halvah dragée jelly-o halvah carrot cake oat cake.</p> -->
                                        <!-- Progress fund start -->
                                        <?php 
                                          if($Fetch['IsApprovedByExpert']==1 && $Fetch['IsApprovedByAdmin']==1)
                                          {
                                        ?>
                                        <h7 class="card-title">Funding Status</h7>
                                          <div class="progress mb-2">
                                            
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:<?php echo $Fetch['FundingStatus'];?>%"><?php echo $Fetch['FundingStatus'];?>%
                                            </div>
                                          </div>
                                          <h7 class="card-title">Project Progress</h7>
                                          <div class="progress mb-2">
                                            
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:<?php echo $Fetch['CompletionStatus'];?>%"><?php echo $Fetch['CompletionStatus'];?>%
                                            </div>
                                          </div>
                                          <?php 
                                            }
                                          ?>
                                        <!-- Progress fund start -->

                                        <!-- Read More Button Start -->
                                          <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                            <!-- <span class="float-left">3 hours ago</span> -->
                                            <!-- Check Approved By Expert Message -->
                                            <?php 
                                              if($Fetch['IsApprovedByExpert']==0)
                                              {
                                            ?>
                                            <span class="float-left">
                                              <a  href="#" class="card-link">Not Approved By Expert </i></a><br><i class="fa ft-x" style="color: red;font-size: xx-large;" ></i>
                                            </span><br><br><br><br><br>
                                            <?php
                                              }                                              
                                            ?>

                                            <!-- Check Approved By Seed & Spark Message -->
                                             <?php 
                                              if($Fetch['IsApprovedByExpert']==1)
                                              {
                                                if($Fetch['IsApprovedByAdmin']==0)
                                                {
                                            ?>
                                            <span class="float-left">
                                              <a  href="#" class="card-link">Wait For Approval By Seed & Spark </i></a><br><i class="fa fa-hourglass-start" style="color: black;font-size: xx-large;" ></i>
                                            </span><br><br><br><br><br>
                                            <?php
                                                }
                                              }                                              
                                            ?>

                                            <!-- Read More Button -->
                                            <span class="float-right">
                                              <a  href="View_Project.php?ProjectID=<?php echo $Fetch['ProjectID'];?>&back=10" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                                            </span>
                                          </div>
                                        <!-- Read More Button End -->
                                        <!-- <a class="btn btn-raised btn-success">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <?php
                        }
                    ?>
                    <!--  -->
                </div>
            </section>
          <!-- // Horizontal cards end -->


       </div>
     </div>
        <!-- START footer -->
          <?php include_once("footer.php");?>
        <!-- END footer -->       
  </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
     
    <!-- START Notification Sidebar-->
      <?php include_once("notificationSideBar.php");?>
    <!-- END Notification Sidebar-->
    
  </body>
</html>