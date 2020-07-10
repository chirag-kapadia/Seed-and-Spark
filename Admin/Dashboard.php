<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
  <!-- Load Files -->
      <?php include_once("Connection.php");?>
      <?php include_once("FusionCharts.php");?>

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
        <!-- Dashboard Start -->
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




            <!--  -->

              <div class="row" matchHeight="card">
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card">
        <div class="card-body">
          <div class="px-3 py-3">
            <div class="media">
              <div class="media-body text-left">
                <h3 class="mb-1 danger">
                  <?php
                              $Investor_Count="Select count(*) as Investor from tblUser where Isinvestor=1";
                              $Exe_Investor_Count=mysqli_query($con,$Investor_Count) or die(mysqli_error($con));
                              $Fetch_Investor_Count=mysqli_fetch_array($Exe_Investor_Count);
                              echo $Fetch_Investor_Count['Investor'];
                            ?>
                </h3>
                <span>Total Investor</span>
              </div>
              <!-- <div class="media-right align-self-center">
                <i class="icon-rocket danger font-large-2 float-right"></i>
              </div> -->
              <div class="media-right align-self-center">
                <i class="icon-user success font-large-2 float-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card">
        <div class="card-body">
          <div class="px-3 py-3">
            <div class="media">
              <div class="media-body text-left">
                <h3 class="mb-1 success">
                   <?php
                              $Initiator_Count="Select count(*) as Initiator from tblUser where Isinitiator=1";
                              $Exe_Initiator_Count=mysqli_query($con,$Initiator_Count) or die(mysqli_error($con));
                              $Fetch_Initiator_Count=mysqli_fetch_array($Exe_Initiator_Count);
                              echo $Fetch_Initiator_Count['Initiator'];
                            ?>
                </h3>
                <span>Total Initiator</span>
              </div>
              <div class="media-right align-self-center">
                <i class="icon-user primary font-large-2 float-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card">
        <div class="card-body">
          <div class="px-3 py-3">
            <div class="media">
              <div class="media-body text-left">
                <h3 class="mb-1 warning">
                  <?php
                              $Expert_Count="Select count(*) as Expert from tblUser where IsExpert=1";
                              $Exe_Expert_Count=mysqli_query($con,$Expert_Count) or die(mysqli_error($con));
                              $Fetch_Expert_Count=mysqli_fetch_array($Exe_Expert_Count);
                              echo $Fetch_Expert_Count['Expert'];
                            ?>
                </h3>
                <span>Total Expert</span>
              </div>
              <!-- <div class="media-right align-self-center">
                <i class="icon-pie-chart warning font-large-2 float-right"></i>
              </div> -->
              <div class="media-right align-self-center">
                <i class="icon-user success font-large-2 float-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card">
        <div class="card-body">
          <div class="px-3 py-3">
            <div class="media">
              <div class="media-body text-left">
                <h3 class="mb-1 primary"><?php
                  $Pro_Count="Select count(FundingStatus) as Pro from tblProject where FundingStatus=100";
                              $Exe_Pro_Count=mysqli_query($con,$Pro_Count) or die(mysqli_error($con));
                              $Fetch_Pro_Count=mysqli_fetch_array($Exe_Pro_Count);
                              echo $Fetch_Pro_Count['Pro'];
                ?></h3>
                <span>100% Funded Project</span>
              </div>
              <div class="media-right align-self-center">
                <i class="icon-support primary font-large-2 float-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Column3D Chart Star  -->
  <form action="" method="post">    
    <div class="full_w" style="margin-top:20px;">
      <div class="h_title">Monthly User Column3D Chart</div>
        <!-- <h2>Monthly User Column3D Chart</h2> -->
        <div class="sep"></div>
        <?php
          $str="select distinct year(CreatedOn) as Year from tblUser order by CreatedOn ";
          //echo $str;exit;
          $rs=mysqli_query($con,$str) or die(mysqli_error($con));
        ?>

        <?php 
          $month=array();
          for($i=1;$i<=12;$i++)
          { 
            $query="SELECT count(*) as CNT FROM tblUser where month(CreatedOn)=".$i."";
            //echo "<br>".$query;
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            while($obj=mysqli_fetch_object($result))
            {
              $month[$i]=$obj->CNT;
            }
          }
        ?>

        <div id="" style="min-width: 350px; height: 350px; margin: 0 auto; padding:12px; ">
          <?php
            $strXML  = "<chart caption='User Statistics' xAxisName='Month' yAxisName='User' showValues='0' formatNumberScale='0' >";        
            for($i=1;$i<=12;$i++)
            {
              $strXML .= "<set label='".date("M",mktime(0,0,0,$i,1,2013))."' value='".$month[$i]."' />";        
            }     
            $strXML .= "</chart>";  
            echo renderChartHTML("FusionCharts/Column3D.swf", "", $strXML, "myNext", 600, 350, false);
          ?>
          <center><label><b><font ><?php if(isset ($val)) echo $val;?></font></b></label> </center>
        </div>
    </div>
  </form>
  <!-- Column3D Chart end -->
  
  <!-- Pie3D Chart Star  -->
  <form action="" method="post">    
    <div class="full_w" style="margin-top:20px;">
      <div class="h_title">Monthly Project Pie3D Chart</div>
        <!-- <h2>Monthly User Column3D Chart</h2> -->
        <div class="sep"></div>
        <?php
          $str="select distinct year(CreatedOn) as Year from tblProject order by CreatedOn ";
          //echo $str;exit;
          $rs=mysqli_query($con,$str) or die(mysqli_error($con));
        ?>

        <?php 
          $month=array();
          for($i=1;$i<=12;$i++)
          { 
            $query="SELECT count(*) as CNT FROM tblProject where month(CreatedOn)=".$i."";
            //echo "<br>".$query;
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            while($obj=mysqli_fetch_object($result))
            {
              $month[$i]=$obj->CNT;
            }
          }
        ?>

        <div id="" style="min-width: 350px; height: 350px; margin: 0 auto; padding:12px; ">
          <?php
            $strXML  = "<chart caption='Project Statistics' xAxisName='Month' yAxisName='tblProject' showValues='0' formatNumberScale='0' >";        
            for($i=1;$i<=12;$i++)
            {
              $strXML .= "<set label='".date("M",mktime(0,0,0,$i,1,2013))."' value='".$month[$i]."' />";        
            }     
            $strXML .= "</chart>";  
            echo renderChartHTML("FusionCharts/Pie3D.swf", "", $strXML, "myNext", 600, 350, false);
          ?>
          <center><label><b><font ><?php if(isset ($val)) echo $val;?></font></b></label> </center>
        </div>
    </div>
  </form>
  <!-- Pie3D Chart end -->

  <!-- Doughnut3D Chart Star  -->
  <form action="" method="post">    
    <div class="full_w" style="margin-top:20px;">
      <div class="h_title">Monthly Inquiry Column3D Chart</div>
        <!-- <h2>Monthly User Column3D Chart</h2> -->
        <div class="sep"></div>
        <?php
          $str="select distinct year(CreatedOn) as Year from tblInquiry order by CreatedOn ";
          //echo $str;exit;
          $rs=mysqli_query($con,$str) or die(mysqli_error($con));
        ?>

        <?php 
          $month=array();
          for($i=1;$i<=12;$i++)
          { 
            $query="SELECT count(*) as CNT FROM tblInquiry where month(CreatedOn)=".$i."";
            //echo "<br>".$query;
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            while($obj=mysqli_fetch_object($result))
            {
              $month[$i]=$obj->CNT;
            }
          }
        ?>

        <div id="" style="min-width: 350px; height: 350px; margin: 0 auto; padding:12px; ">
          <?php
            $strXML  = "<chart caption='Inquiry Statistics' xAxisName='Month' yAxisName='Inquiry' showValues='0' formatNumberScale='0' >";        
            for($i=1;$i<=12;$i++)
            {
              $strXML .= "<set label='".date("M",mktime(0,0,0,$i,1,2013))."' value='".$month[$i]."' />";        
            }     
            $strXML .= "</chart>";  
            echo renderChartHTML("FusionCharts/Doughnut3D.swf", "", $strXML, "myNext", 600, 350, false);
          ?>
          <center><label><b><font ><?php if(isset ($val)) echo $val;?></font></b></label> </center>
        </div>
    </div>
  </form>
  <!-- Doughnut3D Chart end -->

    <!-- SSGrid Chart Star  -->
  <form action="" method="post">    
    <div class="full_w" style="margin-top:20px;">
      <div class="h_title">Monthly Fund Column3D Chart</div>
        <!-- <h2>Monthly User Column3D Chart</h2> -->
        <div class="sep"></div>
        <?php
          $str="select distinct year(FundDate) as Year from tblFund order by FundDate ";
          //echo $str;exit;
          $rs=mysqli_query($con,$str) or die(mysqli_error($con));
        ?>

        <?php 
          $month=array();
          for($i=1;$i<=12;$i++)
          { 
            $query="SELECT count(*) as CNT FROM tblFund where month(FundDate)=".$i."";
            //echo "<br>".$query;
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            while($obj=mysqli_fetch_object($result))
            {
              $month[$i]=$obj->CNT;
            }
          }
        ?>

        <div id="" style="min-width: 350px; height: 350px; margin: 0 auto; padding:12px; ">
          <?php
            $strXML  = "<chart caption='Fund Statistics' xAxisName='Month' yAxisName='Fund' showValues='0' formatNumberScale='0' >";        
            for($i=1;$i<=12;$i++)
            {
              $strXML .= "<set label='".date("M",mktime(0,0,0,$i,1,2013))."' value='".$month[$i]."' />";        
            }     
            $strXML .= "</chart>";  
            echo renderChartHTML("FusionCharts/SSGrid.swf", "", $strXML, "myNext", 600, 350, false);
          ?>
          <center><label><b><font ><?php if(isset ($val)) echo $val;?></font></b></label> </center>
        </div>
    </div>
  </form>
  <!-- SSGrid Chart end -->
            <!--  -->
            <!--Line with Area Chart 1 Starts-->
            <!-- <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">PRODUCTS SALES</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <div class="chart-info mb-3 ml-3">
                        <span class="gradient-blackberry d-inline-block rounded-circle mr-1" style="width:15px; height:15px;"></span> Sales
                        <span class="gradient-mint d-inline-block rounded-circle mr-1 ml-2" style="width:15px; height:15px;"></span> Visits
                      </div>
                      <div id="line-area" class="height-350 lineArea">            
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!--Line with Area Chart 1 Ends-->

            <!-- <div class="row match-height">
              <div class="col-xl-4 col-lg-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Statistics</h4>
                  </div>
                  <div class="card-body">

                    <p class="font-medium-2 text-muted text-center pb-2">Last 6 Months Sales</p>
                    <div id="Stack-bar-chart" class="height-300 Stackbarchart mb-2">        
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-8 col-lg-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Shopping Cart</h4>
                  </div>
                  <div class="card-body">
                    <table class="table table-responsive text-center">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Product</th>
                          <th>Quantity</th>
                          <th>Status</th>
                          <th>Amount</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><img class="media-object round-media height-50" src="app-assets/img/elements/01.png" alt="Generic placeholder image" /></td>
                          <td>Ferrero Rocher</td>
                          <td>1</td>
                          <td>
                            <a class="btn white btn-round btn-primary">Active</a>
                          </td>
                          <td>$19.94</td>
                          <td>
                            <a class="danger" data-original-title="" title="">
                              <i class="ft-x"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td><img class="media-object round-media height-50" src="app-assets/img/elements/07.png" alt="Generic placeholder image" /></td>
                          <td>Headphones</td>
                          <td>2</td>
                          <td>
                            <a class="btn white btn-round btn-danger">Disabled</a>
                          </td>
                          <td>$99.00</td>
                          <td>
                            <a class="danger" data-original-title="" title="">
                              <i class="ft-x"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td><img class="media-object round-media height-50" src="app-assets/img/elements/11.png" alt="Generic placeholder image" /></td>
                          <td>Camera</td>
                          <td>1</td>
                          <td>
                            <a class="btn white btn-round btn-info">Paused</a>
                          </td>
                          <td>$299.00</td>
                          <td>
                            <a class="danger" data-original-title="" title="">
                              <i class="ft-x"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td><img class="media-object round-media height-50" src="app-assets/img/elements/14.png" alt="Generic placeholder image" /></td>
                          <td>Beer</td>
                          <td>2</td>
                          <td>
                            <a class="btn white btn-round btn-success">Active</a>
                          </td>
                          <td>$24.51</td>
                          <td>
                            <a class="danger" data-original-title="" title="">
                              <i class="ft-x"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> -->

           <!--  <div class="row match-height">
              <div class="col-xl-8 col-lg-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Visit & Sales Statistics</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <div class="chart-info mb-2">
                        <span class="text-uppercase mr-3"><i class="fa fa-circle primary font-small-2 mr-1"></i> Sales</span>
                        <span class="text-uppercase"><i class="fa fa-circle deep-purple font-small-2 mr-1"></i> Visits</span>
                      </div>
                      <div id="line-area2" class="height-400 lineAreaDashboard">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-12 col-12">
                <div class="card gradient-blackberry">
                  <div class="card-body">
                    <div class="card-block">
                      <h4 class="card-title white">Statistics</h4>
                      <div class="p-2 text-center">
                        <a class="white font-medium-1">Month</a>
                        <a class="btn btn-raised btn-round bg-white mx-3 px-3">Week</a>
                        <a class="white font-medium-1">Day</a>
                      </div>
                      <div class="my-3 text-center white">
                        <a class="font-large-2 d-block mb-1">$ 78.89 <span class="ft-arrow-up font-large-2"></span></a>
                        <span class="font-medium-1">Week2   +15.44</span>
                      </div>
                    </div>
                    <div id="lineChart" class="height-250 lineChart lineChartShadow">
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

           <!--  <div class="row match-height">
              <div class="col-xl-4 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Statistics</h4>
                  </div>
                  <div class="card-body">

                    <p class="font-medium-2 text-muted text-center">Hobbies</p>
                    <div id="bar-chart" class="height-250 BarChartShadow BarChart">         
                    </div>

                    <div class="card-block">
                      <div class="row">
                        <div class="col text-center">
                          <span class="gradient-pomegranate d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">48</span>
                          <span>Sport</span>
                        </div>
                        <div class="col text-center">
                          <span class="gradient-green-tea d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">9</span>
                          <span>Music</span>
                        </div>
                        <div class="col text-center">
                          <span class="gradient-blackberry d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">26</span>
                          <span>Travel</span>
                        </div>
                        <div class="col text-center">
                          <span class="gradient-ibiza-sunset d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">17</span>
                          <span>News</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title mb-0">User List</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <div class="media mb-1">
                        <a> 
                          <img alt="96x96" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle" src="app-assets/img/portrait/small/avatar-s-12.png">
                        </a>
                        <div class="media-body">
                          <h4 class="font-medium-1 mt-1 mb-0">Jessica Rice</h4>
                          <p class="text-muted font-small-3">UX Designer</p>
                        </div>
                        <div class="mt-1">
                          <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input type="checkbox" class="custom-control-input" checked>
                            <span class="custom-control-indicator"></span>
                          </label>
                        </div>
                      </div>
                      <div class="media mb-1">
                        <a> 
                          <img alt="96x96" class="media-object d-flex mr-3 bg-danger height-50 rounded-circle" src="app-assets/img/portrait/small/avatar-s-11.png">
                        </a>
                        <div class="media-body">
                          <h4 class="font-medium-1 mt-1 mb-0">Jacob Rios</h4>
                          <p class="text-muted font-small-3">HTML Developer</p>
                        </div>
                        <div class="mt-1">
                          <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                          </label>
                        </div>
                      </div>
                      <div class="media mb-1">
                        <a> 
                          <img alt="96x96" class="media-object d-flex mr-3 bg-success height-50 rounded-circle" src="app-assets/img/portrait/small/avatar-s-3.png">
                        </a>
                        <div class="media-body">
                          <h4 class="font-medium-1 mt-1 mb-0">Russell Delgado</h4>
                          <p class="text-muted font-small-3">Database Designer</p>
                        </div>
                        <div class="mt-1">
                          <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                          </label>
                        </div>
                      </div>
                      <div class="media mb-1">
                        <a> 
                          <img alt="96x96" class="media-object d-flex mr-3 bg-warning height-50 rounded-circle" src="app-assets/img/portrait/small/avatar-s-6.png">
                        </a>
                        <div class="media-body">
                          <h4 class="font-medium-1 mt-1 mb-0">Sara McDonald</h4>
                          <p class="text-muted font-small-3">Team Leader</p>
                        </div>
                        <div class="mt-1">
                          <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input type="checkbox" class="custom-control-input" checked>
                            <span class="custom-control-indicator"></span>
                          </label>
                        </div>
                      </div>
                      <div class="media mb-1">
                        <a> 
                            <img alt="96x96" class="media-object d-flex mr-3 bg-info height-50 rounded-circle" src="app-assets/img/portrait/small/avatar-s-18.png">
                          </a>
                        <div class="media-body">
                          <h4 class="font-medium-1 mt-1 mb-0">Janet Lucas</h4>
                          <p class="text-muted font-small-3">Project Manger</p>
                        </div>
                        <div class="mt-1">
                          <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                          </label>
                        </div>
                      </div>
                      <div class="action-buttons mt-2 text-center">
                        <a class="btn btn-raised gradient-blackberry py-2 px-4 white mr-2">Add New</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Project Stats</h4>
                  </div>
                  <div class="card-body">

                    <p class="font-medium-2 text-muted text-center">Project Tasks</p>
                    <div id="donut-dashboard-chart" class="height-250 donut">
                    </div>

                    <div class="card-block">
                      <div class="row mb-3">
                        <div class="col">
                          <span class="mb-1 text-muted d-block">23% - Started</span>
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 23%;" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="col">
                          <span class="mb-1 text-muted d-block">14% - In Progress</span>
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-amber" role="progressbar" style="width: 14%;" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col">
                          <span class="mb-1 text-muted d-block">35% - Remaining</span>
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-deep-purple bg-lighten-1" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0"
                             aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="col">
                          <span class="mb-1 text-muted d-block">28% - Done</span>
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-blue" role="progressbar" style="width: 28%;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->


       </div>
 </div>
       <!-- Dashboard Start -->
       
        <!-- START footer -->
          <?php include_once("footer.php");?>
        <!-- END footer -->        

   
  </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
     
    <!-- START Notification Sidebar-->
      <?php //include_once("notificationSideBar.php");?>
    <!-- END Notification Sidebar-->
    
  </body>
</html>