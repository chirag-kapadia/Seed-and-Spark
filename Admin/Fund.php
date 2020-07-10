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
       <div class="content-wrapper" >

          <!--Statistics cards Starts-->
            <div class="row">
              <!--  total project -->
              <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card gradient-blackberry">
                  <div class="card-body">
                    <div class="card-block pt-2 pb-0">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h3 class="font-large-1 mb-0">
                            <?php
                              $Select_Project_Count="Select count(*) as Count from tblProject";
                              $Exe_Project_Count=mysqli_query($con,$Select_Project_Count) or die(mysqli_error($con));
                              $Fetch_Project_Count=mysqli_fetch_array($Exe_Project_Count);
                              echo $Fetch_Project_Count['Count'];
                            ?>
                          </h3>
                          <span>Total Project</span>
                        </div>
                        <div class="media-right white text-right">
                          <i class="icon-pie-chart font-large-1"></i>
                        </div>
                      </div>
                    </div>
                    <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">         
                    </div>
                  </div>
                </div>
              </div>
              
              <!--  Live Project -->
              <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card gradient-pomegranate">
                  <div class="card-body">
                    <div class="card-block pt-2 pb-0">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h3 class="font-large-1 mb-0">
                            <?php
                              $Select_LiveProject_Count="Select count(*) as Count from tblProject where IsActive=1";
                              $Exe_LiveProject_Count=mysqli_query($con,$Select_LiveProject_Count) or die(mysqli_error($con));
                              $Fetch_LiveProject_Count=mysqli_fetch_array($Exe_LiveProject_Count);
                              echo $Fetch_LiveProject_Count['Count'];
                            ?>
                          </h3>
                          <span>Total Live Project</span>
                        </div>
                        <div class="media-right white text-right">
                          <i class="icon-wallet font-large-1"></i>
                        </div>
                      </div>
                    </div>
                    <div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">          
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card gradient-green-tea">
                  <div class="card-body">
                    <div class="card-block pt-2 pb-0">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h3 class="font-large-1 mb-0">
                            <?php
                              $Total_Fund_Count="Select sum(FundAmount) as TotalFund from tblFund";
                              $Exe_Total_Fund=mysqli_query($con,$Total_Fund_Count) or die(mysqli_error($con));
                              $Fetch_Total_Fund=mysqli_fetch_array($Exe_Total_Fund);
                              echo "₹ ".$Fetch_Total_Fund['TotalFund'];
                            ?>
                          </h3>
                          <span>Total Fund</span>
                        </div>
                        <div class="media-right white text-right">
                          <i class="icon-graph font-large-1"></i>
                        </div>
                      </div>
                    </div>
                    <div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">        
                    </div>
                  </div>
                </div>
              </div>
              
              
            </div>
            <!--Statistics cards Ends-->

              

          <!-- Start Project List & Investor List -->
              <div class="row match-height">
                <!--Start Project List-->
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Project List</h4>
                           
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action flex-column align-items-start active">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-3"></h5>
                                        <small></small>
                                        </div>                                        
                                    </li>
                                    <!-- Select ProjectList Start -->
                                    <?php
                                      
                                      $Select_Query="select * from tblProject where IsApprovedByExpert=1 and IsApprovedByAdmin=1 and IsActive=1";
                                      $SelExe=mysqli_query($con,$Select_Query) or die(mysqli_error());
                                      while($Fetch=mysqli_fetch_array($SelExe))
                                      {
                                    ?>
                                    <!-- Select ProjectList End -->
                                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-3"><a href="View_Project.php?ProjectID=<?php echo $Fetch['ProjectID'];?>" class="card-title lead"><?php echo $Fetch['ProjectTitle'];?></a></h5>
                                        <!-- Fund Total Count -->
                                        <?php
                                          $Total_Fund_Count_Pro="Select sum(FundAmount) as TotalFund from tblFund where ProjectID=".$Fetch['ProjectID'];
                                          $Exe_Total_Fund_Pro=mysqli_query($con,$Total_Fund_Count_Pro) or die(mysqli_error($con));
                                          $Fetch_Total_Fund_Pro=mysqli_fetch_array($Exe_Total_Fund_Pro);
                                          //echo "₹ ".$Fetch_Total_Fund_Pro['TotalFund'];
                                        ?>
                                        <!--  -->
                                        <small class="text-muted"><?php if(isset($Fetch_Total_Fund_Pro['TotalFund'])) 
                                                                        {
                                                                            echo "₹ ".$Fetch_Total_Fund_Pro['TotalFund'];
                                                                        }
                                                                        else
                                                                        { 
                                                                          echo "₹ 0";
                                                                        }
                                                                  ?>
                                        </small>
                                        </div>                                        
                                    </li>
                                    <?php
                                      }
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>        
                </div>
                <!--End Project List-->

                <!-- Start Investor List -->
                 <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Investor List</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action flex-column align-items-start active">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-3"></h5>
                                        <small></small>
                                        </div>                                        
                                    </li>
                                    <!-- Select InvestortList Start -->
                                    <?php
                                      
                                      $Select_Query2="select * from tblUser where IsInvestor=1";
                                      $SelExe2=mysqli_query($con,$Select_Query2) or die(mysqli_error($con));
                                      while($Fetch2=mysqli_fetch_array($SelExe2))
                                      {
                                    ?>
                                    <!-- Select InvestorList End -->
                                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-3"><a href="Investor_Profile.php?UserID=<?php echo $Fetch2['UserID']?>&back=15" class="card-title lead"><?php echo $Fetch2['FirstName'].' '.$Fetch2['LastName']?></a></h5>
                                         <!-- Fund Total Count -->
                                        <?php
                                          $Total_Fund_Count_Inv="Select sum(FundAmount) as TotalFund from tblFund where UserID=".$Fetch2['UserID'];
                                          $Exe_Total_Fund_Inv=mysqli_query($con,$Total_Fund_Count_Inv) or die(mysqli_error($con));
                                          $Fetch_Total_Fund_Inv=mysqli_fetch_array($Exe_Total_Fund_Inv);
                                          //echo "₹ ".$Fetch_Total_Fund_Pro['TotalFund'];
                                        ?>
                                        <!--  -->
                                        <small class="text-muted">
                                          <?php if(isset($Fetch_Total_Fund_Inv['TotalFund'])) 
                                                                        {
                                                                            echo "₹ ".$Fetch_Total_Fund_Inv['TotalFund'];
                                                                        }
                                                                        else
                                                                        { 
                                                                          echo "₹ 0";
                                                                        }
                                                                  ?>
                                        </small>
                                        </div>                                        
                                    </li>
                                    <?php
                                      }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>        
                </div>
                <!--End Investor List-->        
            </div>
          <!-- End Project List & Investor List -->

              <!-- Fund List table Start -->
              <!-- <section id="configuration">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4 class="card-title">Fund</h4>
                              </div>
                              <div class="card-body collapse show col-lg-12">
                                  <div class="card-block card-dashboard">
                                      
                                      <table class="table table-responsive zero-configuration">
                                          <thead>
                                              <tr>
                                                  
                                                  <th></th>
                                                  <th>Name</th>                          
                                                  <th>Email</th>
                                                  <th>Insert</th>
                                                  <th>Update</th>
                                                  <th>Delete</th>
                                                  <th>Super</th>
                                                  <th>Active</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  
                                                  <td>
                                                      <label class="custom-control custom-checkbox m-0">
                                                          <input type="checkbox" class="custom-control-input">
                                                          <span class="custom-control-indicator"></span>
                                                      </label>
                                                  </td>
                                                  <td>Tiger Nixon</td>
                                                  <td>johncarter@mail.com</td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                             
                                                   <td>
                                                      <a class="info p-0" data-original-title="" title="">
                                                          <i class="ft-user font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="success p-0" data-original-title="" title="">
                                                          <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="danger p-0" data-original-title="" title="">
                                                          <i class="ft-x font-medium-3 mr-2"></i>
                                                      </a>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  
                                                  <td>
                                                      <label class="custom-control custom-checkbox m-0">
                                                          <input type="checkbox" class="custom-control-input">
                                                          <span class="custom-control-indicator"></span>
                                                      </label>
                                                  </td>
                                                  <td>Garrett Winters</td>
                                                  <td>johncarter@mail.com</td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                            <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                            
                                                   <td>
                                                      <a class="info p-0" data-original-title="" title="">
                                                          <i class="ft-user font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="success p-0" data-original-title="" title="">
                                                          <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="danger p-0" data-original-title="" title="">
                                                          <i class="ft-x font-medium-3 mr-2"></i>
                                                      </a>
                                                  </td>
                                              </tr>                               
                                          </tbody>                            
                                      </table>                        
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section> -->
              <!--/ Fund List table End -->

       </div>
        <!-- START footer -->
          <?php include_once("footer.php");?>
        <!-- END footer -->        

    </div>
  </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
     
    <!-- START Notification Sidebar-->
      <?php include_once("notificationSideBar.php");?>
    <!-- END Notification Sidebar-->
    
  </body>
</html>