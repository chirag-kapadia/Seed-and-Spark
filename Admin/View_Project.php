<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
  <!-- Load Files -->
      <?php include_once("Connection.php");?>
      <?php include_once("loadfiles.php");?>
      
  <!-- Load Files -->

    <!-- slide php code start -->
        <?php
         /*select Project Detail Start */
    

            $Select_Q="select * from tblProject where ProjectID='".$_REQUEST['ProjectID']."'";
            $SelExe=mysqli_query($con,$Select_Q) or die(mysqli_error());
            $Fetch=mysqli_fetch_array($SelExe);

              $sel_ppamount1="select * from tblProjectProgress where ProjectID='".$_REQUEST['ProjectID']."'";
            $SelExeppamount1=mysqli_query($con,$sel_ppamount1) or die(mysqli_error($con));
            $Fetchppamount1=mysqli_fetch_array($SelExeppamount1);

           /* $sel_ppamount="select * from tblProjectProgress where ProjectID='".$_REQUEST['ProjectID']."'";
                $SelExeppamount=mysqli_query($con,$sel_ppamount) or die(mysqli_error($con));
                $Fetchppamount=mysqli_fetch_array($SelExeppamount);*/
    /* select Project Detail End */



            if(isset($_REQUEST['btnAcceptRequest']))
            {
                //update project progress in tblproject
                $updat_project_Progress="update tblProject set CompletionStatus='".$_REQUEST['rbtnCompletion']."' where ProjectID=".$_REQUEST['ProjectID'];
                //echo $updat_project_Progress;
                mysqli_query($con,$updat_project_Progress)or die(mysqli_error($con));

                if(isset($_REQUEST['rbtnCompletion']))
                {
                    if($_REQUEST['rbtnCompletion']==25)
                    {
                        $up="update tblProjectProgress set IsAcceptFirstSloat=1 where ProjectID=".$_REQUEST['ProjectID'];
                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
                    }
                    if($_REQUEST['rbtnCompletion']==50)
                    {
                        $up="update tblProjectProgress set IsAcceptSecoundSloat=1 where ProjectID=".$_REQUEST['ProjectID'];
                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
                    }
                    if($_REQUEST['rbtnCompletion']==75)
                    {
                        $up="update tblProjectProgress set IsAcceptThirdSloat=1 where ProjectID=".$_REQUEST['ProjectID'];
                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
                    }
                    if($_REQUEST['rbtnCompletion']==100)
                    {
                        $up="update tblProjectProgress set IsAcceptFourthSloat=1 where ProjectID=".$_REQUEST['ProjectID'];
                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
                    }
                }
               
                
                    //$val1=0+$val1;
                $val1=$Fetchppamount1['AmountPaid'];
                $totalwi=$Fetch['TotalFundingAmount'];
                $wi4=$Fetch['AvgSloatAmount'];
                $val2=$val1+$wi4;
                $remAmount=$totalwi-$val2;
                $update_amt="update tblProjectProgress set AmountPaid='".$val2."', RemainingAmount='".$remAmount."' where ProjectID=".$_REQUEST['ProjectID'];
                mysqli_query($con,$update_amt) or die(mysqli_error($con));
            }


            $Select_Q31="select * from tblProject where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe31=mysqli_query($con,$Select_Q31) or die(mysqli_error($con));
                                                    $Fetch31=mysqli_fetch_array($SelExe31);
                                                    

            if(isset($_REQUEST['btnSendRequest']))
            {
                if($Fetch31['ReturnProjectProgressStatus']==0)
                {
                    $insert_Q="insert into tblReturnProjectProgress values(null,'".$_REQUEST['ProjectID']."',now(),0,0,0,0,0,0,0,0,0,0) ";
                mysqli_query($con,$insert_Q) or die(mysqli_error($con));
                //echo $insert_Q;
                }
                if(isset($_REQUEST['rbtnCompletion1']))
                {
                    if($_REQUEST['rbtnCompletion1']==25)
                    {
                        $up="update tblReturnProjectProgress set FirstSloatR=1 where ProjectID=".$_REQUEST['ProjectID'];
                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
                    }
                    if($_REQUEST['rbtnCompletion1']==50)
                    {
                        $up="update tblReturnProjectProgress set SecoundSloatR=1 where ProjectID=".$_REQUEST['ProjectID'];
                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
                    }
                    if($_REQUEST['rbtnCompletion1']==75)
                    {
                        $up="update tblReturnProjectProgress set ThirdSloatR=1 where ProjectID=".$_REQUEST['ProjectID'];
                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
                    }
                    if($_REQUEST['rbtnCompletion1']==100)
                    {
                        $up="update tblReturnProjectProgress set FourthSloatR=1 where ProjectID=".$_REQUEST['ProjectID'];
                        $exeup=mysqli_query($con,$up) or die(mysqli_error($con));
                    }
                }
                /*$Select_Email="select Email from tbluser where UserID=(select UserID from tblProject where ProjectID='".$_REQUEST['ProjectID']."')";
                $select_qry=mysqli_query($con,$Select_Email);
                $fetch_Email=mysqli_fetch_array($select_qry);
                $subject="";
                $message="Send 25% Amount to Seedandspark";
                $from="Seedandspark@gmail.com";
                mail($fetch_Email,$subject,$message,$from);*/
            }



            function make_query($con)
            {
                $Select_Q2="select * from tblImage where ProjectID='".$_REQUEST['ProjectID']."' ORDER BY ImageID ASC";
                $result=mysqli_query($con,$Select_Q2) or die(mysqli_error());
                return $result;
            }

            function make_slide_indicators($con)
            {
                $output = '';
                $count = 0;
                $result = make_query($con);
                while($row = mysqli_fetch_array($result))
                {
                    if($count == 0)
                    {
                        $output .='
                        <li data-target="#carousel-example-generic" data-slide-to="'.$count.'" class="active"></li>
                        ';
                    }
                    else
                    {
                        $output .='
                        <li data-target="#carousel-example-generic" data-slide-to="'.$count.'" ></li>
                        ';
                    }
                    $count = $count + 1;    
                }
                return $output;
            }

            function make_slides($con)
            {
                $output = '';
                $count = 0;
                $result = make_query($con);
                while ($row=mysqli_fetch_array($result))
                {
                    if($count == 0)
                    {
                        $output .= '<div class="carousel-item active">';
                    }
                    else
                    {
                        $output .= '<div class="carousel-item">';   
                    }
                    $output .='
                        <img src="Project/img/'.$row["ImageName"].'" class="d-block w-100" alt="'.$row["ImageName"].'" style="width:700px;height:500px;" />
                        </div>
                    ';
                    $count = $count + 1;
                }
                return $output;
            }
        ?> 
    <!-- slide php code end -->
</head>

<body data-col="2-columns" class=" 2-columns ">
   <form method="post" enctype="multipart/form-data">   
  <!-- Menu SideBar -->
   <?php include_once("menu.php");?>
  <!-- Menu SideBar End -->

  <div class="main-panel">
    <!-- Navbar (Header) Starts-->
      <?php include_once("header.php");?>
    <!-- Navbar (Header) Ends-->

    


    <div class="main-content">
       <div class="content-wrapper">

        <?php
            if(isset($_REQUEST['back']))
            {
        ?>
                <!-- Back Redirection Link Start -->
                  <a href="Project_List.php?ExpertID=<?php echo $Fetch['ExpertAreaID']; ?>" class="danger" data-original-title="" title="">
                      <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
                  </a>
                <!-- Back Redirection Link End -->
        <?php
            }
            else
            {
        ?>     

             <!-- Back Redirection Link Start -->
              <a href="Fund.php" class="danger" data-original-title="" title="">
                  <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
              </a>
            <!-- Back Redirection Link End -->
        <?php
            }
        ?>

                <!--User Profile Starts-->
                    <!--Basic User Details Starts-->
                    <section id="user-profile">
                        <div class="row">
                            <div class="col-12" >
                              
                               <!-- slider start -->
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <?php echo make_slide_indicators($con);?>
                                        </ol>

                                        <div class="carousel-inner">
                                              <?php echo make_slides($con);?>
                                        </div>

                                        <a href="#carousel-example-generic" class="carousel-control-prev" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>

                                        <a href="#carousel-example-generic" class="carousel-control-next" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">next</span>
                                        </a>
                                    </div>
                                   
                               <!-- slider end -->


                                <div class="card profile-with-cover">                               
                                    <div class="media profil-cover-details row">
                                        <div class="col-5">
                                            <div class="align-self-start halfway-fab pl-3 pt-2">
                                                <div class="text-left">
                                                    <h3 class="card-title white"><?php echo $Fetch['ProjectTitle'];?></h3>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Basic User Details Ends-->

                    <!--About section starts-->
                    <section id="about">
                        <div class="row">
                            <div class="col-12">
                                <div class="content-header"><?php echo $Fetch['ProjectTitle'];?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="mb-3"><br>
                                                <span class="text-bold-500 primary">Description:</span>
                                                <span class="display-block overflow-hidden">
                                                    <?php
                                                        echo $Fetch['Description'];
                                                    ?>
                                                </span>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> Fund Target:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php echo $Fetch['FundTarget'];?>
                                                            </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-map-pin font-small-3"></i> FundType:</a></span>
                                                            <span class="display-block overflow-hidden"><?php echo $Fetch['FundType'];?></span>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <!-- <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-user font-small-3"></i> Package:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php
                                                                    $Select_Q2="select * from tblPackage where PackageID='".$Fetch['PackageID']."'";
                                                                    $SelExe2=mysqli_query($con,$Select_Q2) or die(mysqli_error());
                                                                    $Fetch2=mysqli_fetch_array($SelExe2);

                                                                    echo $Fetch2['PackageName'];
                                                                ?>
                                                            </span>
                                                        </li> -->
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Expected Complition:</a></span>
                                                            <a class="display-block overflow-hidden"><?php 
                                                            if(isset($Fetch['ExpectedComplition']))
                                                                {
                                                                    echo $Fetch['ExpectedComplition'];
                                                                }?></a>
                                                        </li>
                                                        <li class="mb-2">
                                                              <span class="text-bold-500 primary"><a><i class="ft-monitor font-small-3"></i> CompletionStatus:</a></span>
                                                            <a class="display-block overflow-hidden">
                                                                <?php if(isset($Fetch['ComplitionStatus'])) 
                                                                        {
                                                                            echo $Fetch['ComplitionStatus'];
                                                                        }
                                                                        else 
                                                                        { 
                                                                            echo 0;
                                                                        }
                                                                ?>
                                                                    
                                                                </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> CreatedOn:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php echo $Fetch['CreatedOn'];?>
                                                            </span>
                                                        </li>
                                                        <!--  <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-globe font-small-3"></i> FundingStatus:</a></span>
                                                            <span class="display-block overflow-hidden"><?php if(isset($Fetch['FundingStatus']))
                                                                                                                { echo $Fetch['FundingStatus']; 
                                                                                                                }else
                                                                                                                {   
                                                                                                                    echo 0;
                                                                                                                }?></span>
                                                        </li> -->
                                                        <!-- <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-briefcase font-small-3"></i> Occupation:</a></span>
                                                            <span class="display-block overflow-hidden">Ninja Developer</span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-book font-small-3"></i> Joined:</a></span>
                                                            <span class="display-block overflow-hidden">April 1st, 2012</span>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr>
                                            
                                           <!-- <div class="mt-2 overflow-hidden">
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-plane danger font-large-2"></i> <div class="mt-2">Travelling</div></span>
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-speedometer danger font-large-2"></i> <div class="mt-2">Driving</div></span>
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-camera danger font-large-2"></i> <div class="mt-2">Photography</div></span>
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-game-controller danger font-large-2"></i> <div class="mt-2">Gaming</div></span>
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-music-tone-alt danger font-large-2"></i> <div class="mt-2">Music</div></span>
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="ft-monitor danger font-large-2"></i> <div class="mt-2">Surfing</div></span>
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="ft-pie-chart danger font-large-2"></i> <div class="mt-2">Foodie</div></span>
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="ft-tv danger font-large-2"></i> <div class="mt-2">TV</div></span>
                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-basket-loaded danger font-large-2"></i> <div class="mt-2">Shopping</div></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($Fetch['IsApprovedByExpert']==1)
                                {
                            ?>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Approved By Expert Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="row">
                                                <!-- Review Display Start -->
                                                <?php 
                                                    /*Approved By Project Expert DEtail Fetch*/
                                                    $Select_ApprovedExpert="select * from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."' ORDER BY CreatedOn DESC";
                                                    $Exe_ApprovedExpert=mysqli_query($con,$Select_ApprovedExpert) or die(mysqli_error($con));
                                                    $Fetch_ApprovedExpert=mysqli_fetch_array($Exe_ApprovedExpert);

                                                    /*Avg Rating Find*/
                                                    // $Select_Q3="select AVG(Rating) as sty from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    // $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    // $Fetch3=mysqli_fetch_array($SelExe3);
                                                    $Select_Q3="select AVG(Rating) as sty from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    $Fetch3=mysqli_fetch_array($SelExe3);
                                                    
                                                ?>
                                            <!-- Review Display End -->
                                            <div class="col-md-12">
                                                
                                                <span class="text-bold-500 primary">Rating:</span>
                                                <?php 
                                                    if($Fetch3['sty']==1)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'>
                                                            <i class='fa fa-star'></i></span>";
                                                    }
                                                    if($Fetch3['sty']==2)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'><i class='fa fa-star'></i><i class='fa fa-star'></i></span>";
                                                    }
                                                    if($Fetch3['sty']==3)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></span>";
                                                    }
                                                    if($Fetch3['sty']==4)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></span>";
                                                    }
                                                    if($Fetch3['sty']==5)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></span>";
                                                    }
                                                  ?>
                                                <!--  -->
                                                <span class="text-bold-500 primary"><h5 class="text-bold-500 primary float-left">Reviews:</h5></span>
                                                <span class="display-block overflow-hidden" >
                                                    <!-- select Query image start-->
                                                                     <?php 
                                                                        $Select_img="select * from tblUser where UserID='".$Fetch_ApprovedExpert['UserID']."'";
                                                                        $SelExe4=mysqli_query($con,$Select_img) or die(mysqli_error($con));
                                                                        while($Fetch6=mysqli_fetch_array($SelExe4))
                                                                        {
                                                                    ?> 
                                                                <!-- select Query image end-->
                                                    <!-- Review card start-->
                                                         <div class="card"  >
                                                            <div class="card-block pt-3"  >
                                                                <div class="clearfix">                                       
                                                                     <h5 class="text-bold-500 primary float-left"><?php echo $Fetch6['FirstName'].' '.$Fetch6['LastName'];?></h5>                                                              
                                                                </div>
                                                                <p><?php echo $Fetch_ApprovedExpert['Review'];?></p>
                                                                 <?php
                                                                  $imageName=$Fetch6['ProfilePic'];
                                                                  if($imageName=="" || !file_exists("Profile/$imageName"))
                                                                  {
                                                                    $imageName="no1.png";
                                                                  }
                                                                ?>
                                                   
                                                                <img src="Profile/<?php echo $imageName;?>" class="rounded-circle width-50 mr-2">
                                                                <span class="primary"><?php echo $Fetch_ApprovedExpert['CreatedOn'];?></span>
                                                            </div>
                                                        </div>
                                                    <!-- Review card end -->
                                                    <?php
                                                        }
                                                    ?>
                                                </span>


                                                <!--  -->
                                                <span class="text-bold-500 primary">RealisticPercentage:</span>
                                                <span class="display-block overflow-hidden">
                                                    <?php 
                                                    
                                                    $Select_Q3="select AVG(RealisticPercetage) as rl from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    $Fetch3=mysqli_fetch_array($SelExe3);
                                                    
                                                ?>
                                                    <div class="progress mb-2">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $Fetch3['rl'];?>" aria-valuemin="<?php echo $Fetch3['rl'];?>" aria-valuemax="100" style="width:<?php echo $Fetch3['rl'];?>%"><?php echo $Fetch3['rl'];?>%</div>
                                                    </div>                                                    
                                                </span>

                                                <!--  -->
                                                <span class="text-bold-500 primary">SuccessfulPercentage:</span>
                                                <span class="display-block overflow-hidden">
                                                    <?php 
                                                    
                                                    $Select_Q3="select AVG(SuccessfulPercentage) as sp from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    $Fetch3=mysqli_fetch_array($SelExe3);
                                                    
                                                ?>
                                                    <div class="progress mb-2">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $Fetch3['sp'];?>" aria-valuemin="<?php echo $Fetch3['sp'];?>" aria-valuemax="100" style="width:<?php echo $Fetch3['sp'];?>%"><?php echo $Fetch3['sp'];?>%</div>
                                                    </div>                                                    
                                                </span>                                         
                                            </div>
                                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Broklin Institute</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2008 - 2009</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Professor: Leonardo Stagg. Six months of best Developing tools course.</span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> The Ninja College </a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2012 - 2013</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Professor: Steve Ustreil. Gave me the best educational information for Ninja.</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Ninja Developer</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2009-2011</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Ninja Developer for the “PIXINVENT” creative studio. </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Senior Ninja Developer</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2014-Now</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Senior Ninja Developer for the “PIXINVENT” creative studio.</span>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        if($Fetch['IsApprovedByAdmin']==0)
                                        {
                                    ?>
                                    <div class="card-footer">
                                        <div class="text-right">  
                                        <!-- <form method="post">        -->                                   
                                              <button name="btnApproveProject" type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" >Approve Project <i class="fa ft-user"></i></button>

                                              <!-- Approved Code PHP by Admin-->
                                              <?php
                                                if(isset($_REQUEST['btnApproveProject']))
                                                {
                                                    /*Update query Approved project by admin */
                                                    $Update_ApprovedAdmin="update tblProject set IsApprovedByAdmin=1 where ProjectID=".$Fetch['ProjectID'];
                                                    //echo $Update_ApprovedAdmin;
                                                    mysqli_query($con,$Update_ApprovedAdmin) or die(mysql_error($con));
                                                }
                                              ?>
                                            <!-- </form> -->                                            
                                          </div>
                                    </div>
                                    <?php
                                        }
                                    ?>

                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <!-- Calculate Fund Progress start -->
                            <?php
                                $Select_Fund="select sum(FundAmount) as FundAmount from tblFund where ProjectID=".$_REQUEST['ProjectID'];
                                $Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
                                $Fetch_Fund=mysqli_fetch_array($Exe_Fund);
                                $sum= $Fetch_Fund['FundAmount'];
                                //echo $Fetch_Project['FundTarget'];
                                $per=$sum/$Fetch['FundTarget'];
                                //$FundLeft=$Fetch_Project['FundTarget']-$sum;
                            
                             /*Calculate Fund Progress end */
                                 $pern=$per*100;
                                 if($pern>=100)
                                    {      
                                                                  
                            ?>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Project Progress Information</h5>
                                    </div>
                                    <div class="card-body" style="margin-left: 20px;">
                                        <div class="card-block">
                                            <div class="row">
                                                <!-- Review Display Start -->
                                                <?php 
                                                    /*Approved By Project Expert DEtail Fetch*/
                                                    $Select_ApprovedExpert="select * from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."' ORDER BY CreatedOn DESC";
                                                    $Exe_ApprovedExpert=mysqli_query($con,$Select_ApprovedExpert) or die(mysqli_error($con));
                                                    $Fetch_ApprovedExpert=mysqli_fetch_array($Exe_ApprovedExpert);

                                                    /*Avg Rating Find*/
                                                    // $Select_Q3="select AVG(Rating) as sty from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    // $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    // $Fetch3=mysqli_fetch_array($SelExe3);
                                                    $Select_Q3="select AVG(Rating) as sty from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    $Fetch3=mysqli_fetch_array($SelExe3);
                                                    
                                                ?>
                                            <!-- Review Display End -->
                                            <div class="row match-height">
                                                <?php
                                                    //image fetch
                                                    $Select_PPimage="Select * from tblppimage where ProjectID=".$_REQUEST['ProjectID'];
                                                    $Exe_ppimage=mysqli_query($con,$Select_PPimage) or die(mysqli_error($con));
                                                    while($Fetch_ppimage=mysqli_fetch_array($Exe_ppimage))
                                                    {
                                                ?>
                                                <div class="col-xl-3 col-lg-6 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img class="card-img-top img-fluid" src="ProjectProgress/img/<?php echo $Fetch_ppimage['ImageName'];?>" alt="Card image cap" >
                                                           
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                    }
                                                    //video fetch
                                                      $Select_PPvideo="Select * from tblppvideo where ProjectID=".$_REQUEST['ProjectID'];
                                                    $Exe_ppvideo=mysqli_query($con,$Select_PPvideo) or die(mysqli_error($con));
                                                    while($Fetch_ppvideo=mysqli_fetch_array($Exe_ppvideo))
                                                    {
                                                ?>

                                                <div class="col-xl-3 col-lg-6 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <video controls="" class="ql-video ql-align-center" src="ProjectProgress/video/<?php echo $Fetch_ppvideo['VideoName'];?>" style="height:250px;" >
                                        
                                                            </video>
                                                            
                                                           <!--  <div class="card-block">
                                                                <h4 class="card-title">Card title</h4>
                                                                <p class="card-text">Icing powder caramels macaroon. Toffee sugar plum brownie pastry gummies jelly.</p>
                                                                <a class="btn btn-raised btn-warning">Go somewhere</a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                ?>

                                            </div>


                                            <div class="col-md-12">
                                                <!--  -->
                                                 <table class="table table-hover">
                                                            <thead>
                                                                <th>Slot</th>
                                                                <!-- <th>Amount</th> -->
                                                                <th>Request/Not</th>
                                                            </thead>
                                                            <tr>
                                                                <td>First</td>
                                                                <!-- <td><?php echo "₹".$Fetchppamount1['AmountPaid']; ?></td> -->
                                                                <td><?php if($Fetchppamount1['FirstSlot']==1)
                                                                        {
                                                                             echo "Done";
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
                                                                <td><?php if($Fetchppamount1['SecoundSlot']==1)
                                                                        {
                                                                             echo "Done";
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
                                                                <td><?php if($Fetchppamount1['ThirdSlot']==1)
                                                                        {
                                                                             echo "Done";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fourth</td>
                                                                <!--  -->
                                                                <td><?php if($Fetchppamount1['FourthSlot']==1)
                                                                        {
                                                                             echo "Done";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                <span class="text-bold-500 primary">Project Progress:</span>
                                                <span class="display-block overflow-hidden">
                                                    <?php 
                                                    
                                                    $Select_Q3="select AVG(SuccessfulPercentage) as sp from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    $Fetch3=mysqli_fetch_array($SelExe3);
                                                    
                                                ?><br>
                                                   <div class="col-md-12 col-xs-12">
                                                    <div class="single-input">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $Fetch['CompletionStatus'];?>%;background-color: #ff6a00;">Project Progress&nbsp;&nbsp;   
                                                          <?php echo $Fetch['CompletionStatus'];?>%
                                                        </div>
                                                      </div>
                                                     </div>
                                                </div>                                                   
                                                </span><br>
                                                <span class="text-bold-500 primary"> Approve Percentage:</span>
                                                <div class="single-textarea">
                                                    <br>
                                                    <?php
                                                        if($Fetch['CompletionStatus']==0)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion" value="25" required="">&nbsp;&nbsp;&nbsp;25%<br>
                                                    <?php
                                                        }
                                                        if($Fetch['CompletionStatus']==25)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion" value="50" required="">&nbsp;&nbsp;&nbsp;50%<br>
                                                    <?php
                                                        }
                                                        if($Fetch['CompletionStatus']==50)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion" value="75" required="">&nbsp;&nbsp;&nbsp;75%<br>
                                                    <?php
                                                        }
                                                        if($Fetch['CompletionStatus']==75)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion" value="100" required="">&nbsp;&nbsp;&nbsp;100%<br>
                                                    <?php
                                                        }
                                                    ?>
                                                </div> <!-- /.single-textarea -->                                       
                                            </div><br><br>
                                            <div class="col-xs-12">
                                                
                                            </div> <!-- /.col -->
                                             <?php 
                                                if($_SESSION['IsInsert']==1 || $_SESSION['IsSuper']==1)
                                                {
                                              ?>
                                              <div class="col-xs-12">
                                              <div class="text-right">
                                                
                                                  <button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" name="btnAcceptRequest" style="margin-left: 800px;margin-top: 50px;" >Accept Request<i class="fa ft-user-plus"></i></button>
                                                
                                              </div> 
                                          </div>
                                              <?php
                                                }
                                              ?>
                                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Broklin Institute</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2008 - 2009</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Professor: Leonardo Stagg. Six months of best Developing tools course.</span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> The Ninja College </a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2012 - 2013</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Professor: Steve Ustreil. Gave me the best educational information for Ninja.</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Ninja Developer</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2009-2011</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Ninja Developer for the “PIXINVENT” creative studio. </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Senior Ninja Developer</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2014-Now</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Senior Ninja Developer for the “PIXINVENT” creative studio.</span>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        if($Fetch['IsApprovedByAdmin']==0)
                                        {
                                    ?>
                                    <div class="card-footer">
                                        <div class="text-right">  
                                        <!-- <form method="post">            -->                               
                                              <button name="btnApproveProject" type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" >Approve Project <i class="fa ft-user"></i></button>

                                              <!-- Approved Code PHP by Admin-->
                                              <?php
                                                if(isset($_REQUEST['btnApproveProject']))
                                                {
                                                    /*Update query Approved project by admin */
                                                    $Update_ApprovedAdmin="update tblProject set IsApprovedByAdmin=1 where ProjectID=".$Fetch['ProjectID'];
                                                    //echo $Update_ApprovedAdmin;
                                                    mysqli_query($con,$Update_ApprovedAdmin) or die(mysql_error($con));
                                                }
                                              ?>
                                            <!-- </form>          -->                                   
                                          </div>
                                    </div>
                                    <?php
                                        }
                                    ?>

                                </div>
                            </div>
                            <?php


                                }
                               

                                $sel_Rppamount="select * from tblReturnProjectProgress where ProjectID='".$_REQUEST['ProjectID']."'";
            $SelExeRppamount=mysqli_query($con,$sel_Rppamount) or die(mysqli_error($con));
            $FetchRppamount=mysqli_fetch_array($SelExeRppamount);

                                if($Fetchppamount1['IsAcceptFirstSloat']==1 && $Fetchppamount1['IsAcceptSecoundSloat']==1 && $Fetchppamount1['IsAcceptThirdSloat']==1 && $Fetchppamount1['IsAcceptFourthSloat']==1)
                                {
                            ?>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Return Amount</h5>
                                    </div>
                                    <div class="card-body" style="margin-left: 20px;">
                                        <div class="card-block">
                                            <div class="row">
                                                <!-- Review Display Start -->
                                                <?php 
                                                    /*Approved By Project Expert DEtail Fetch*/
                                                   /* $Select_ApprovedExpert="select * from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."' ORDER BY CreatedOn DESC";
                                                    $Exe_ApprovedExpert=mysqli_query($con,$Select_ApprovedExpert) or die(mysqli_error($con));
                                                    $Fetch_ApprovedExpert=mysqli_fetch_array($Exe_ApprovedExpert);*/

                                                    /*Avg Rating Find*/
                                                    // $Select_Q3="select AVG(Rating) as sty from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    // $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    // $Fetch3=mysqli_fetch_array($SelExe3);
                                                   /* $Select_Q3="select AVG(Rating) as sty from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    $Fetch3=mysqli_fetch_array($SelExe3);*/
                                                    
                                                ?>
                                            <!-- Review Display End -->
                                            <div class="row match-height">
                                                <?php
                                                    //image fetch
                                                    /*$Select_PPimage="Select * from tblppimage where ProjectID=".$_REQUEST['ProjectID'];
                                                    $Exe_ppimage=mysqli_query($con,$Select_PPimage) or die(mysqli_error($con));
                                                    while($Fetch_ppimage=mysqli_fetch_array($Exe_ppimage))
                                                    {*/
                                                ?>
                                                <!-- <div class="col-xl-3 col-lg-6 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img class="card-img-top img-fluid" src="ProjectProgress/img/<?php echo $Fetch_ppimage['ImageName'];?>" alt="Card image cap" >
                                                           
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <?php
                                                   /* }
                                                    //video fetch
                                                      $Select_PPvideo="Select * from tblppvideo where ProjectID=".$_REQUEST['ProjectID'];
                                                    $Exe_ppvideo=mysqli_query($con,$Select_PPvideo) or die(mysqli_error($con));
                                                    while($Fetch_ppvideo=mysqli_fetch_array($Exe_ppvideo))
                                                    {*/
                                                ?>

                                               <!--  <div class="col-xl-3 col-lg-6 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <video controls="" class="ql-video ql-align-center" src="ProjectProgress/video/<?php echo $Fetch_ppvideo['VideoName'];?>" style="height:250px;" >
                                        
                                                            </video>
                                                            
                                                          
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <?php
                                                   /* }*/
                                                ?>

                                            </div>


                                            <div class="col-md-12">
                                                <!--  -->
                                                <span class="text-bold-500 primary">Return Amount Request:</span>
                                                <span class="display-block overflow-hidden">
                                                    <?php 
                                                    
                                                    /*$Select_Q3="select AVG(SuccessfulPercentage) as sp from tblExpertReview  where ProjectID='".$_REQUEST['ProjectID']."'";
                                                    $SelExe3=mysqli_query($con,$Select_Q3) or die(mysqli_error($con));
                                                    $Fetch3=mysqli_fetch_array($SelExe3);*/
                                                    
                                                ?><br>
                                                <span>Amount</span> : <h3><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></h3>

                                                   <div class="col-md-12 col-xs-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <th>Slot</th>
                                                                <th>Amount</th>
                                                                <th>Successfull/Not</th>
                                                            </thead>
                                                            <tr>
                                                                <td>First</td>
                                                                <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td>
                                                                <td><?php if($FetchRppamount['IsAcceptFirstSloatR']==1)
                                                                        {
                                                                             echo "Done";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Secound</td>
                                                                <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td>
                                                                <td><?php if($FetchRppamount['IsAcceptSecoundSloatR']==1)
                                                                        {
                                                                             echo "Done";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Third</td>
                                                                <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td>
                                                                <td><?php if($FetchRppamount['IsAcceptThirdSloatR']==1)
                                                                        {
                                                                             echo "Done";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fourth</td>
                                                                <td><?php echo "₹".$FetchRppamount['AmountPaidR']; ?></td>
                                                                <td><?php if($FetchRppamount['IsAcceptFourthSloatR']==1)
                                                                        {
                                                                             echo "Done";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "Not";
                                                                        } ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    <div class="single-input">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $Fetch31['ReturnProjectProgressStatus'];?>%;background-color: #ff6a00;">Project Progress&nbsp;&nbsp;   
                                                          <?php echo $Fetch31['ReturnProjectProgressStatus'];?>%
                                                        </div>
                                                      </div>
                                                     </div>
                                                </div>                                                   
                                                </span><br>
                                                <span class="text-bold-500 primary"> Approve Percentage:</span>
                                                <div class="single-textarea">
                                                    <br>
                                                    <?php
                                                        if($Fetch31['ReturnProjectProgressStatus']==0)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion1" value="25" required="">&nbsp;&nbsp;&nbsp;25%<br>
                                                    <?php
                                                        }
                                                        if($Fetch31['ReturnProjectProgressStatus']==25)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion1" value="50" required="">&nbsp;&nbsp;&nbsp;50%<br>
                                                    <?php
                                                        }
                                                        if($Fetch31['ReturnProjectProgressStatus']==50)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion1" value="75" required="">&nbsp;&nbsp;&nbsp;75%<br>
                                                    <?php
                                                        }
                                                        if($Fetch31['ReturnProjectProgressStatus']==75)
                                                        {
                                                    ?>
                                                    <input type="radio" name="rbtnCompletion1" value="100" required="">&nbsp;&nbsp;&nbsp;100%<br>
                                                    <?php
                                                        }
                                                    ?>
                                                </div> <!-- /.single-textarea -->                                       
                                            </div><br><br>
                                            <div class="col-xs-12">
                                                
                                            </div> <!-- /.col -->
                                             <?php 
                                                if($_SESSION['IsInsert']==1 || $_SESSION['IsSuper']==1)
                                                {
                                              ?>
                                              <div class="col-xs-12">
                                              <div class="text-right">
                                                
                                                  <button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" name="btnSendRequest" style="margin-left: 800px;margin-top: 50px;" >Send Request<i class="fa ft-user-plus"></i></button>
                                                
                                              </div> 
                                          </div>
                                              <?php
                                                }
                                              ?>
                                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Broklin Institute</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2008 - 2009</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Professor: Leonardo Stagg. Six months of best Developing tools course.</span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> The Ninja College </a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2012 - 2013</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Professor: Steve Ustreil. Gave me the best educational information for Ninja.</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Ninja Developer</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2009-2011</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Ninja Developer for the “PIXINVENT” creative studio. </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Senior Ninja Developer</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2014-Now</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Senior Ninja Developer for the “PIXINVENT” creative studio.</span>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        if($Fetch['IsApprovedByAdmin']==0)
                                        {
                                    ?>
                                    <div class="card-footer">
                                        <div class="text-right">  
                                        <!-- <form method="post">            -->                               
                                              <button name="btnApproveProject" type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" >Approve Project <i class="fa ft-user"></i></button>

                                              <!-- Approved Code PHP by Admin-->
                                              <?php
                                                if(isset($_REQUEST['btnApproveProject']))
                                                {
                                                    /*Update query Approved project by admin */
                                                    $Update_ApprovedAdmin="update tblProject set IsApprovedByAdmin=1 where ProjectID=".$Fetch['ProjectID'];
                                                    //echo $Update_ApprovedAdmin;
                                                    mysqli_query($con,$Update_ApprovedAdmin) or die(mysql_error($con));
                                                }
                                              ?>
                                            <!-- </form>          -->                                   
                                          </div>
                                    </div>
                                    <?php
                                        }
                                    ?>

                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </section>
                    <!--About section ends-->

                    <!--User Timeline section starts-->
                    <section id="user">   
                        <div class="row">
                            <div class="col-12">
                                <div class="content-header"> About</div>
                            </div>
                        </div>
                        <div id="timeline" class="timeline-center timeline-wrapper">
                            <ul class="timeline">
                                <li class="timeline-line"></li>
                               <!--  <li class="timeline-group">
                                    <a class="btn btn-raised btn-primary"><i class="fa fa-calendar-o"></i> Today</a>
                                </li> -->
                            </ul>
                            <ul class="timeline">
                                <li class="timeline-line"></li>
                                <!-- Select Images -->
                                        <?php
                                            $select_Query2="Select * from tblImage where ProjectID='".$_REQUEST['ProjectID']."'";
                                            $Exe_Query2=mysqli_query($con,$select_Query2) or die(mysqli_error());
                                            while ($Fetch4=mysqli_fetch_array($Exe_Query2)) 
                                            {                                            
                                        ?>
                                <!-- Select Images -->

                                <li class="timeline-item">
                                    <div class="timeline-badge">
                                    <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><!-- <i class="fa fa-plane"></i> --></span>
                                    </div>
                                    <div class="timeline-card card border-grey border-lighten-2">
                                    <!-- <div class="card-header">
                                        <h4 class="mb-0 card-title"><a>Portfolio project work</a></h4>
                                        <div class="card-subtitle text-muted mt-0">
                                            <span class="font-small-3">5 hours ago</span>
                                        </div>
                                    </div> -->
                                    <div class="card-body">
                                        <img class="img-fluid" src="Project/img/<?php echo $Fetch4['ImageName'];?>" alt="Timeline Image 1" style="width: 500px;height: 500px;">
                                        <div class="card-body">
                                        <!-- <div class="card-block">
                                            <p class="card-text">Nullam facilisis fermentum aliquam. Suspendisse ornare dolor vitae libero hendrerit auctor lacinia a ligula. Curabitur elit tellus, porta ut orci sed, fermentum bibendum nisi.</p>
                                            <div class="list-inline mb-1">
                                            <span class="pr-1"><a class="primary"><span class="fa fa-thumbs-o-up"></span> Like</a></span>
                                            <span class="pr-1"><a class="primary"><span class="fa fa-commenting-o"></span> Comment</a></span>
                                            <span><a class="primary"><span class="fa fa-share-alt"></span> Share</a></span>
                                            </div>
                                        </div> -->
                                        </div>
                                        <!-- <div class="card-footer px-0 py-0">
                                        <div class="card-block">
                                            <form>
                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                    <input type="text" class="form-control" placeholder="Write comments...">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-dashcube"></i>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        </div> -->
                                    </div>
                                    </div>
                                </li> 
                                <?php
                                    }
                                ?> 

                                <!-- Select Video -->
                                        <?php
                                            $select_Query3="Select * from tblVideo where ProjectID='".$_REQUEST['ProjectID']."'";
                                            $Exe_Query3=mysqli_query($con,$select_Query3) or die(mysqli_error());
                                            while ($Fetch5=mysqli_fetch_array($Exe_Query3)) 
                                            {                                            
                                        ?>
                                <!-- Select Video -->          
                                <li class="timeline-item mt-5">
                                    <div class="timeline-badge">
                                    <!-- <span class="avatar avatar-online" data-toggle="tooltip" data-placement="right" title="Eu pid nunc urna integer"><img src="app-assets/img/portrait/small/avatar-s-5.png" alt="avatar" width="40"></span> -->
                                    </div>
                                    <div class="timeline-card card card-inverse">
                                    <!-- <img class="card-img img-fluid" src="app-assets/img/photos/07.jpg" alt="Card image"> -->
                                    <video controls="" class="ql-video ql-align-center" src="Project/Video/<?php echo $Fetch5['VideoName'];?>" style="height:500px;" >
                                        
                                    </video>
                                    <!-- <div class="card-img-overlay bg-overlay">
                                        <h4 class="card-title">Good Morning</h4>
                                        <p class="card-text"><small>15 hours ago</small></p>
                                    </div> -->
                                    </div>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </section>
                    
       </div>
    </div>
        <!-- START footer -->
          <?php include_once("footer.php");?>
        <!-- END footer -->        
        </form>
    
  </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
     
    <!-- START Notification Sidebar-->
      <?php include_once("notificationSideBar.php");?>
    <!-- END Notification Sidebar-->
    
  </body>

<?php include_once("loadfilesjs.php");?>  
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</html>


