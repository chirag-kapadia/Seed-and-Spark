<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
  <!-- Load Files -->
      <?php include_once("Connection.php");?>
      <?php include_once("loadfiles.php");?>
      <?php include_once("loadfilesjs.php");?>  
  <!-- Load Files -->
</head>

<!-- Php Select Query Admin list start -->
    <?php       
      if(isset($_REQUEST['UserID']))
      {
        $Select_Query="select * from tblUser where UserID='".$_REQUEST['UserID']."'";
        //$sr="select a.*,ap.IsDelete,ap.IsUpdate,ap.IsInsert from tbladmin a, tbladminpermission ap where a.AdminID=ap.AdminID";
        $Initiator_Exe=mysqli_query($con,$Select_Query) or die(mysqli_error($con));
        $Initiator_Fetch=mysqli_fetch_array($Initiator_Exe);
        //echo $ans1;                                        
      }

      if(isset($_REQUEST['btnInitiatorDetailVerified']))
      {
        //check ExpertDetail Update Query to  Verified In tblExpertDetail
        $Update_Iniator="update tblInitiatorDetail set IsVerified=1 where UserID=".$_REQUEST['UserID'];
        mysqli_query($con,$Update_Iniator) or die(mysqli_error($con));

      }
    ?>
<!-- Php Select Query Admin list End -->

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
              <a href="Initiator.php" class="danger" data-original-title="" title="">
                  <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
              </a>
            <!-- Back Redirection Link End -->




                <!--User Profile Starts-->
                    <!--Basic User Details Starts-->
                    <section id="user-profile">
                        <div class="row">
                            <div class="col-12">
                                <div class="card profile-with-cover">
                                    <div class="card-img-top img-fluid bg-cover height-300" style="background: url('app-assets/img/photos/14.jpg') 50%;"></div>
                                    <div class="media profil-cover-details row">
                                        <div class="col-5">
                                            <div class="align-self-start halfway-fab pl-3 pt-2">
                                                <div class="text-left">
                                                    <h3 class="card-title white"><?php if(isset($Initiator_Fetch)) echo $Initiator_Fetch['FirstName']." ".$Initiator_Fetch['LastName'];?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="align-self-center halfway-fab text-center">
                                                <a class="profile-image">
                                                    <?php
                                                      $imageName=$Initiator_Fetch['ProfilePic'];
                                                      if($imageName=="" || !file_exists("Profile/$imageName"))
                                                      {
                                                        $imageName="no1.png";
                                                      }
                                                    ?>
                                                    <img src="Profile/<?php echo $imageName;?>" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-section">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 ">
                                                <ul class="profile-menu no-list-style">
                                                    <li>
                                                        <a href="#about" class="primary font-medium-2 font-weight-600"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#user" class="primary font-medium-2 font-weight-600"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-2 col-md-2 text-center">
                                                <span class="font-medium-2 text-uppercase"><br><?php if(isset($Initiator_Fetch)) echo $Initiator_Fetch['FirstName']." ".$Initiator_Fetch['LastName'];?></span>
                                                
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <ul class="profile-menu no-list-style">
                                                    <li>
                                                        <a href="#friends" class="primary font-medium-2 font-weight-600"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#photos" class="primary font-medium-2 font-weight-600"></a>
                                                    </li>
                                                </ul>
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
                                <div class="content-header">About</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Personal Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="mb-3">
                                                <span class="text-bold-500 primary">About Me:</span>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                           <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                                                            <a class="display-block overflow-hidden">
                                                                <?php if(isset($Initiator_Fetch)) echo $Initiator_Fetch['Email'];?>
                                                            </a> 
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-map-pin font-small-3"></i> Location:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php 
                                                                    if(isset($Initiator_Fetch['CityID'])) 
                                                                    {
                                                                        // City 
                                                                        $Select_City="select * from tblCity where CityID=".$Initiator_Fetch['CityID'];
                                                                        $Exe_City=mysqli_query($con,$Select_City)or die(mysqli_error($con));
                                                                        $Fetch_City=mysqli_fetch_array($Exe_City);

                                                                        //State
                                                                        $Select_State="select * from tblState where StateID=".$Fetch_City['StateID'];
                                                                        $Exe_State=mysqli_query($con,$Select_State)or die(mysqli_error($con));
                                                                        $Fetch_State=mysqli_fetch_array($Exe_State);

                                                                        //Country
                                                                        $Select_Country="select * from tblCountry where CountryID=".$Fetch_State['CountryID'];
                                                                        $Exe_Country=mysqli_query($con,$Select_Country)or die(mysqli_error($con));
                                                                        $Fetch_Country=mysqli_fetch_array($Exe_Country);

                                                                        //Country
                                                                        echo $Fetch_City['CityName'].',  '.$Fetch_State['StateName'].',  '.$Fetch_Country['CountryName'];  
                                                                            /*echo $Initiator_Fetch['CityID'];*/
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "___________";
                                                                    }
                                                                ?>
                                                            </span>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-user font-small-3"></i> Gender:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php if(isset($Initiator_Fetch)) 
                                                                        {
                                                                            if($Initiator_Fetch['Gender']=='M')
                                                                            {
                                                                                echo "Male";
                                                                            }
                                                                           elseif($Initiator_Fetch['Gender']=='F')
                                                                            {
                                                                                
                                                                                echo "Female";
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "___________";
                                                                            }
                                                                        }
                                                                ?>  
                                                            </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> Birthday:</a></span>
                                                            <span class="display-block overflow-hidden"><?php if(isset($Initiator_Fetch)) echo $Initiator_Fetch['DOB'];?></span>
                                                            
                                                        </li>
                                                      
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php if(isset($Initiator_Fetch)) echo $Initiator_Fetch['ContactNo'];?>
                                                            </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-calendar font-small-3"></i> Joined:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php echo $Initiator_Fetch['CreatedOn'];?>
                                                            </span>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr>
                                            
                                            
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                             <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Initiator Bank Information</h5>
                                    </div>
                                    <!-- Initiator Bank detail -->
                                        <?php
                                              $sel_Initiator="select * from tblinitiatordetail where UserID=".$_REQUEST['UserID'];
                                              $Exe_Ini=mysqli_query($con,$sel_Initiator) or die(mysqli_error($con));
                                              $Fetch_Ini=mysqli_fetch_array($Exe_Ini);

                                        ?>
                                    <!-- Initiator Bank detail -->
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="row">
                                                 
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <?php
                                                      $imageName=$Fetch_Ini['GovtID'];
                                                      if($imageName=="" || !file_exists("IDProof/".$imageName))
                                                      {
                                                        $imageName="no1.png";
                                                      }
                                                    ?>
                                                    <img src="IDProof/<?php echo $imageName;?>" style="width:600px;height:300px;" >
                                                    <!-- <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Bank Account Detail :</a></span>
                                                         
                                                            <span class="line-height-2 display-block overflow-hidden"><?php if(isset($Fetch_Ini['A/CNo']))
                                                            {echo $Fetch_Ini['A/CNo'];}?></span>
                                                        </li>
                                                      <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> IFSC Code : </a></span>
                                                            
                                                            <span class="line-height-2 display-block overflow-hidden">
                                                                <?php if(isset($Fetch_Ini['IFSCcode']))
                                                            {echo $Fetch_Ini['IFSCcode'];}?>
                                                            </span>
                                                        </li> 
                                                    </ul> -->
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i>Debit/Credit CardNo :</a></span>
                                                            <!-- <span class="grey line-height-0 display-block mb-2 font-small-2">2009-2011</span> -->
                                                            <span class="line-height-2 display-block overflow-hidden"><?php if(isset($Fetch_Ini['CardNo']))
                                                            {echo $Fetch_Ini['CardNo'];}?> </span>
                                                        </li>
                                                         <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Bank Account Detail :</a></span>
                                                         
                                                            <span class="line-height-2 display-block overflow-hidden"><?php if(isset($Fetch_Ini['A/CNo']))
                                                            {echo $Fetch_Ini['A/CNo'];}?></span>
                                                        </li>
                                                         <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> IFSC Code : </a></span>
                                                            
                                                            <span class="line-height-2 display-block overflow-hidden">
                                                                <?php if(isset($Fetch_Ini['IFSCcode']))
                                                            {echo $Fetch_Ini['IFSCcode'];}?>
                                                            </span>
                                                        </li> 
                                                        <!-- <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Senior Ninja Developer</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2014-Now</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Senior Ninja Developer for the “PIXINVENT” creative studio.</span>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                     <?php 
                                      if($_SESSION['IsSuper']==1 && $Fetch_Ini['IsVerified']==0)
                                      {
                                      ?>
                                      <div class="text-right">
                                        <!-- <a href="Add_Admin.php"> -->
                                          <form method="post">
                                          <button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" name="btnInitiatorDetailVerified" style="margin-right: 30px;">Verified Initiator Detail <i class="fa ft-thumbs-up"></i></button>
                                          </form>
                                        <!-- </a> -->
                                      </div> 
                                      <?php
                                        }
                                      ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--About section ends-->

                    <!--User Timeline section starts-->
                    
                    <section id="user">   
                        <div class="row">
                            <div class="col-12">
                                <div class="content-header">Projects</div>
                            </div>
                        </div>
                        <div id="timeline" class="timeline-center timeline-wrapper">
                            <!-- <ul class="timeline">
                                <li class="timeline-line"></li>
                                <li class="timeline-group">
                                    <a class="btn btn-raised btn-primary"><i class="fa fa-calendar-o"></i> Today</a>
                                </li>
                            </ul> -->
                            <ul class="timeline">
                                <li class="timeline-line"></li>

                                <!-- Select User's Project  Start -->
                                  <?php
                                    //"sssssssssssssssssssssssssssssssss".$_REQUEST['ExpertID'];
                                    
                                    $Select_Query="select * from tblProject where UserID=".$_REQUEST['UserID'];
                                    $SelExe=mysqli_query($con,$Select_Query) or die(mysqli_error());
                                    while($Fetch=mysqli_fetch_array($SelExe))
                                    {
                                  ?>
                                  <!-- Select User's Project  End -->


                                <li class="timeline-item">
                                    <div class="timeline-badge">
                                        <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="fa fa-plane"></i></span>
                                    </div>
                                    <div class="timeline-card card border-grey border-lighten-2">
                                        <div class="card-header">
                                            <h4 class="mb-0 card-title"><a><?php echo $Fetch['ProjectTitle'];?></a></h4>
                                            <!-- <div class="card-subtitle text-muted mt-0">
                                                <span class="font-small-3">5 hours ago</span>
                                            </div> -->
                                        </div>
                                        <div class="card-body">
                                            <!-- Select Project Image Start -->
                                              <?php
                                                $Select_Query2="select * from tblImage where IsDefault=1 and ProjectID=".$Fetch['ProjectID'];
                                                $SelExe2=mysqli_query($con,$Select_Query2) or die(mysqli_error($con));
                                                $Fetch2=mysqli_fetch_array($SelExe2);
                                              ?>
                                              <!-- Select Project Image End -->


                                            <img class="img-fluid" src="Project/img/<?php echo $Fetch2['ImageName']; ?>" alt="Timeline Image 1">
                                            <div class="card-body">
                                            <div class="card-block">
                                                <p class="card-text">
                                                    <?php echo $Fetch['Description'];?>
                                                </p>
                                                <!-- <div class="list-inline mb-1">
                                                <span class="pr-1"><a class="primary"><span class="fa fa-thumbs-o-up"></span> Like</a></span>
                                                <span class="pr-1"><a class="primary"><span class="fa fa-commenting-o"></span> Comment</a></span>
                                                <span><a class="primary"><span class="fa fa-share-alt"></span> Share</a></span>
                                                </div> -->
                                            </div>
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

                                             <!-- Progress fund start -->
                                        <?php 
                                            $Select_Query21="select * from tblProject where ProjectID=".$Fetch['ProjectID'];
                                            $SelExe21=mysqli_query($con,$Select_Query21) or die(mysqli_error($con));
                                            $Fetch21=mysqli_fetch_array($SelExe21);
                                          if($Fetch21['IsApprovedByExpert']==1 && $Fetch21['IsApprovedByAdmin']==1)
                                          {
                                        ?>
                                         <div class="col-md-10">
                                        <h7 class="card-title">Funding Status</h7>
                                       
                                          <div class="progress mb-2">
                                            
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:<?php echo $Fetch21['FundingStatus'];?>%"><?php echo $Fetch21['FundingStatus'];?>%
                                            </div>
                                          </div>
                                          </div>
                                           <div class="col-md-10">
                                          <h7 class="card-title">Project Progress</h7>
                                          <div class="progress mb-2">
                                            
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:<?php echo $Fetch21['CompletionStatus'];?>%"><?php echo $Fetch21['CompletionStatus'];?>%
                                            </div>
                                          </div>
                                      </div>
                                          <?php 
                                            }
                                          ?>
                                        <!-- Progress fund start -->
                                        </div>
                                    </div>
                                </li>            
                                    <?php

                                        }
                                    ?>
                               <!--  <li class="timeline-item mt-5">
                                    <div class="timeline-badge">
                                    <span class="avatar avatar-online" data-toggle="tooltip" data-placement="right" title="Eu pid nunc urna integer"><img src="app-assets/img/portrait/small/avatar-s-5.png" alt="avatar" width="40"></span>
                                    </div>
                                    <div class="timeline-card card card-inverse">
                                    <img class="card-img img-fluid" src="app-assets/img/photos/07.jpg" alt="Card image">
                                    <div class="card-img-overlay bg-overlay">
                                        <h4 class="card-title">Good Morning</h4>
                                        <p class="card-text"><small>15 hours ago</small></p>
                                    </div>
                                    </div>
                                </li> -->
                            </ul>

                        </div>
                    </section>
                    <!--User Timeline section ends-->

                   
                    <!--User Profile Starts-->



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


