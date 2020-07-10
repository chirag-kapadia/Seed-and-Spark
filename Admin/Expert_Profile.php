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
        $Expert_Exe=mysqli_query($con,$Select_Query) or die(mysqli_error());
        $Expert_Fetch=mysqli_fetch_array($Expert_Exe);
        //echo $ans1;                                        
      }
      if(isset($_REQUEST['btnExpertDetailVerified']))
      {
        //check ExpertDetail Update Query to  Verified In tblExpertDetail
        $Update_Expert="update tblExpertDetail set IsVerified=1 where UserID=".$_REQUEST['UserID'];
        mysqli_query($con,$Update_Expert) or die(mysqli_error($con));

      }

      /*select Expert Detail*/
      $sel_Expert="select * from tblExpertDetail where UserID=".$_REQUEST['UserID'];
      $Exe_Exp=mysqli_query($con,$sel_Expert) or die(mysqli_error($con));
      $Fetch_Exp=mysqli_fetch_array($Exe_Exp);

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
              <a href="Expert.php" class="danger" data-original-title="" title="">
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
                                                    <h3 class="card-title white"><?php if(isset($Expert_Fetch)) echo $Expert_Fetch['FirstName']." ".$Expert_Fetch['MiddleName'] ." ".$Expert_Fetch['LastName'];?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="align-self-center halfway-fab text-center">
                                                <a class="profile-image">
                                                    <?php
                                                      $imageName=$Expert_Fetch['ProfilePic'];
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
                                                <span class="font-medium-2 text-uppercase"><?php if(isset($Expert_Fetch)) echo $Expert_Fetch['FirstName']." ".$Expert_Fetch['MiddleName'] ." ".$Expert_Fetch['LastName'];?></span>
                                                <!-- <p class="grey font-small-2">Ninja Developer</p> -->
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
                                            
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4">
                                                     <ul class="no-list-style">
                                                        <li class="mb-2">
                                                           <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                                                            <a class="display-block overflow-hidden">
                                                                <?php if(isset($Expert_Fetch)) echo $Expert_Fetch['Email'];?>
                                                            </a> 
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-map-pin font-small-3"></i> Location:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                
                                                                    <?php
                                                                          if(isset($Expert_Fetch['CityID'])) 
                                                                          {
                                                                             // City 
                                                                             $Select_City="select * from tblCity where CityID=".$Expert_Fetch['CityID'];
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
                                                                <?php if(isset($Expert_Fetch)) 
                                                                        {
                                                                            if($Expert_Fetch['Gender']=='M')
                                                                            {
                                                                                echo "Male";
                                                                            }
                                                                            elseif($Expert_Fetch['Gender']=='F')
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
                                                            <span class="display-block overflow-hidden"><?php if(isset($Expert_Fetch)) echo $Expert_Fetch['DOB'];?></span>
                                                            
                                                        </li>
                                                      
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php if(isset($Expert_Fetch)) echo $Expert_Fetch['ContactNo'];?>
                                                            </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> Joined:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php echo $Expert_Fetch['CreatedOn'];?>
                                                            </span>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr>
                                           <!--  <div class="mt-3">
                                                <span class="text-bold-500 primary">Skills:</span>
                                                <span class="display-block overflow-hidden">I like to ride the cycle to work, swimming, listning music and 
                                                    working out. I also like reading magazines, go to museums, watching good movies and eat spicy food while 
                                                    it’s raining outside.Twin siblings Dipper and Mabel Pines spend the summer at their uncle's tourist trap 
                                                    in the enigmatic town of Gravity Falls.A mysterious Hollywood stuntman and mechanic moonlights as a 
                                                    getaway driver.Scuba Diving, Skiing, Surfing, Photography, Long drive.
                                                </span>
                                            </div> -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Expert Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Certificate :</a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2"><?php if(isset($Fetch_Exp['CertificateDate']))
                                                            {echo $Fetch_Exp['CertificateDate'];}?></span>
                                                            <span class="line-height-2 display-block overflow-hidden"><?php if(isset($Fetch_Exp['CertificateType']))
                                                            {echo $Fetch_Exp['CertificateType'];}?></span>
                                                        </li>
                                                       <!--  <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> The Ninja College </a></span>
                                                            <span class="grey line-height-0 display-block mb-2 font-small-2">2012 - 2013</span>
                                                            <span class="line-height-2 display-block overflow-hidden">Professor: Steve Ustreil. Gave me the best educational information for Ninja.</span>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="primary text-bold-500"><a><i class="ft-home font-small-3"></i> Experience</a></span>
                                                            <!-- <span class="grey line-height-0 display-block mb-2 font-small-2">2009-2011</span> -->
                                                            <span class="line-height-2 display-block overflow-hidden"><?php if(isset($Fetch_Exp['Experience']))
                                                            {echo $Fetch_Exp['Experience'];}?> </span>
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
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Expertise  Area</h5>
                                    </div>

                                    <div class="mt-2 overflow-hidden">
                                       <!-- Fetch Expert AreaName join query Start -->
                                        <?php       
                                            $Select_Q2="select e.*, ea.ExpertAreaID, ea.AreaName, ea.ExpertIcon from tblExpertArea ea inner join tblExpertDetail e on ea.ExpertAreaID = e.ExpertAreaID where e.UserID='".$_REQUEST['UserID']."'";
                                            $Sel_Exe2=mysqli_query($con,$Select_Q2) or die(mysqli_error());
                                            while($Fetch2=mysqli_fetch_array($Sel_Exe2))
                                            {
                                        ?> 
                                    <!-- Fetch Expert AreaName join query End -->

                                                <span class="mr-3 mt-2 text-center float-left width-100"> <i class="<?php echo $Fetch2['ExpertIcon'];?> danger font-large-2"></i> <div class="mt-2"><?php echo $Fetch2['AreaName'];?></div></span>
                                            <?PHP

                                                }
                                            ?>
                                            </div>
                                            
                                            <hr>
                                             <?php 
                                              if($_SESSION['IsSuper']==1 && $Fetch_Exp['IsVerified']==0)
                                              {
                                              ?>
                                              <div class="text-right">
                                                <!-- <a href="Add_Admin.php"> -->
                                                  <form method="post">
                                                  <button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" name="btnExpertDetailVerified" style="margin-right: 30px;">Verified Expert Detail <i class="fa ft-thumbs-up"></i></button>
                                                  </form>
                                                <!-- </a> -->
                                              </div> 
                                              <?php
                                                }
                                              ?>

                                </div>
                            </div>


                            <hr>
                            <!-- Php Select Query Admin list start -->
                                        <?php      
                                          $sr="select er.*, p.* from tblExpertReview er INNER JOIN tblProject p On er.ProjectID = p.ProjectID where er.UserID='".$_REQUEST['UserID']."' ORDER BY er.CreatedOn DESC";
                                          $res=mysqli_query($con,$sr) or die(mysqli_error());
                                          while($ans=mysqli_fetch_array($res))
                                          {
                                        ?>
                                      <!-- Php Select Query Admin list End -->
                            <div class="col-xl-3 col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                         <?php      
                                                    $sr1="select *from tblImage where ProjectID='".$ans['ProjectID']."' and IsDefault=1";
                                                  $res1=mysqli_query($con,$sr1) or die(mysqli_error());
                                                  $ans1=mysqli_fetch_array($res1)
                                                ?>
                                            <!-- <img src="project/img/<?php echo $ans1['ImageName'];?>" style="height: 80px;width: 80px;" class="img-thumbnail"> -->
                                        <img class="card-img-top img-fluid" src="project/img/<?php echo $ans1['ImageName'];?>" alt="Card image cap" style="height: 250px;width: 280px;" >
                                        <div class="card-block">
                                            <h4 class="card-title"><?php echo $ans['ProjectTitle'];?></h4>
                                            <!--  -->
                                                <?php 
                                                    if($ans['Rating']==1)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'>
                                                            <i class='fa fa-star'></i></span>";
                                                    }
                                                    if($ans['Rating']==2)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'><i class='fa fa-star'></i><i class='fa fa-star'></i></span>";
                                                    }
                                                    if($ans['Rating']==3)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></span>";
                                                    }
                                                    if($ans['Rating']==4)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></span>";
                                                    }
                                                    if($ans['Rating']==5)
                                                    { 
                                                        echo "<span class='display-block overflow-hidden'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></span>";
                                                    }
                                                  ?>
                                            <!--  -->
                                            
                                            <!-- <a class="btn btn-raised btn-warning">Go somewhere</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </section>
                    <!--About section ends-->

                    <!--User Timeline section starts-->
                    
                    <!--User Timeline section ends-->

                    <!--User's friend section starts-->
                   <!--  <section id="friends">
                        <div class="row">
                            <div class="col-12">
                                <div class="content-header">Friends</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <img src="app-assets/img/portrait/small/avatar-s-3.png" alt="Brek" width="150" class="rounded-circle gradient-mint">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block text-center">
                                            <h4 class="card-title">Brek Padio</h4>
                                            <p class="category text-gray font-small-4">CEO / Co-Founder</p>
                                            <a class="btn btn-lg gradient-mint font-small-2 white p-2 mr-2">Add as Friend</a>
                                            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
                                            <hr class="grey">
                                            <div class="row grey">
                                                <div class="col-4">
                                                    <a><i class="ft-star mr-1"></i> <span>4.9</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-globe mr-1"></i> <span>USA</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-book mr-1"></i> <span>21</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <img src="app-assets/img/portrait/small/avatar-s-18.png" alt="Jassi" width="150" class="rounded-circle gradient-pomegranate">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block text-center">
                                            <h4 class="card-title">Jassi Lee</h4>
                                            <p class="category text-gray font-small-4">Ninja Developer</p>
                                            <a class="btn btn-lg gradient-pomegranate font-small-2 white p-2 mr-2">Add as Friend</a>
                                            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
                                            <hr class="grey">
                                            <div class="row grey">
                                                <div class="col-4">
                                                    <a><i class="ft-star mr-1">star</i> <span>4.7</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-globe mr-1"></i> <span>Canada</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-book mr-1"></i> <span>14</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <img src="app-assets/img/portrait/small/avatar-s-11.png" alt="Brek" width="150" class="rounded-circle gradient-orange-amber">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block text-center">
                                            <h4 class="card-title">Peter Steven</h4>
                                            <p class="category text-gray font-small-4">Android Developer</p>
                                            <a class="btn btn-lg gradient-orange-amber font-small-2 white p-2 mr-2">Add as Friend</a>
                                            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
                                            <hr class="grey">
                                            <div class="row grey">
                                                <div class="col-4">
                                                    <a><i class="ft-star mr-1">star</i> <span>5.0</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-globe mr-1"></i> <span>India</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-book mr-1"></i> <span>18</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <img src="app-assets/img/portrait/small/avatar-s-6.png" alt="Maitri" width="150" class="rounded-circle gradient-red-pink">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block text-center">
                                            <h4 class="card-title">Maitri Rajput</h4>
                                            <p class="category text-gray font-small-4">UX Designer</p>
                                            <a class="btn btn-lg gradient-red-pink font-small-2 white p-2 mr-2">Add as Friend</a>
                                            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
                                            <hr class="grey">
                                            <div class="row grey">
                                                <div class="col-4">
                                                    <a><i class="ft-star mr-1">star</i> <span>4.5</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-globe mr-1"></i> <span>India</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-book mr-1"></i> <span>19</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <img src="app-assets/img/portrait/small/avatar-s-9.png" alt="Anibal" width="150" class="rounded-circle gradient-blackberry">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block text-center">
                                            <h4 class="card-title">Anibal Santo</h4>
                                            <p class="category text-gray font-small-4">Project Developer</p>
                                            <a class="btn btn-lg gradient-blackberry font-small-2 white p-2 mr-2">Add as Friend</a>
                                            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
                                            <hr class="grey">
                                            <div class="row grey">
                                                <div class="col-4">
                                                    <a><i class="ft-star mr-1">star</i> <span>4.8</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-globe mr-1"></i> <span>London</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-book mr-1"></i> <span>20</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <img src="app-assets/img/portrait/small/avatar-s-12.png" alt="Gini" width="150" class="rounded-circle gradient-back-to-earth">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block text-center">
                                            <h4 class="card-title">Gini Fredre</h4>
                                            <p class="category text-gray font-small-4">HR</p>
                                            <a class="btn btn-lg gradient-back-to-earth font-small-2 white p-2 mr-2">Add as Friend</a>
                                            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
                                            <hr class="grey">
                                            <div class="row grey">
                                                <div class="col-4">
                                                    <a><i class="ft-star mr-1">star</i> <span>4.4</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-globe mr-1"></i> <span>Korea</span></a>
                                                </div>
                                                <div class="col-4">
                                                    <a><i class="ft-book mr-1"></i> <span>15</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->
                    <!--User's friend section starts-->

                    <!--User's uploaded photos section starts-->
                    <!-- <section id="photos">
                        <div class="row">
                            <div class="col-12">
                                <div class="content-header">Photos</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Photos Uploaded</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="row">
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/1.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/2.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/3.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/4.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                            </div>
                                            <div class="row">
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/5.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/6.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/7.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/8.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                            </div>
                                            <div class="row">
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/9.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/10.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/11.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/12.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                            </div>
                                            <div class="row">
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/13.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/14.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/15.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                                <figure class="col-lg-3 col-md-6 col-12">
                                                    <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/16.jpg" itemprop="thumbnail" alt="Image description" />
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->
                    <!--User's uploaded photos section starts-->
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


