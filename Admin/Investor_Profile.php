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
        $Investor_Exe=mysqli_query($con,$Select_Query) or die(mysqli_error());
        $Investor_Fetch=mysqli_fetch_array($Investor_Exe);
        //echo $ans1;                                        
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


            <?php
                if(isset($_REQUEST['back']))
                {
            ?>
                 <!-- Back Redirection Link Start -->
                  <a href="Fund.php" class="danger" data-original-title="" title="">
                      <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
                  </a>
                <!-- Back Redirection Link End -->
            <?php
                }
                else
                {
            ?>   
                 <!-- Back Redirection Link Start -->
                  <a href="Investor.php" class="danger" data-original-title="" title="">
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
                            <div class="col-12">
                                <div class="card profile-with-cover">
                                    <div class="card-img-top img-fluid bg-cover height-300" style="background: url('app-assets/img/photos/14.jpg') 50%;"></div>
                                    <div class="media profil-cover-details row">
                                        <div class="col-5">
                                            <div class="align-self-start halfway-fab pl-3 pt-2">
                                                <div class="text-left">
                                                    <h3 class="card-title white"><?php if(isset($Investor_Fetch)) echo $Investor_Fetch['FirstName']." ".$Investor_Fetch['MiddleName'] ." ".$Investor_Fetch['LastName'];?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="align-self-center halfway-fab text-center">
                                                <a class="profile-image">
                                                    <?php
                                                      $imageName=$Investor_Fetch['ProfilePic'];
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
                                                <span class="font-medium-2 text-uppercase"><?php if(isset($Investor_Fetch)) echo $Investor_Fetch['FirstName']." ".$Investor_Fetch['MiddleName'] ." ".$Investor_Fetch['LastName'];?></span>
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
                                                                <?php if(isset($Investor_Fetch)) echo $Investor_Fetch['Email'];?>
                                                            </a> 
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-map-pin font-small-3"></i> Location:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                              
                                                                <?php
                                                                    if(isset($Investor_Fetch['CityID'])) 
                                                                    {
                                                                       // City 
                                                                       $Select_City="select * from tblCity where CityID=".$Investor_Fetch['CityID'];
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
                                                                <?php if(isset($Investor_Fetch)) 
                                                                        {
                                                                            if($Investor_Fetch['Gender']=='M')
                                                                            {
                                                                                echo "Male";
                                                                            }
                                                                           elseif($Investor_Fetch['Gender']=='F')
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
                                                            <span class="display-block overflow-hidden"><?php if(isset($Investor_Fetch)) echo $Investor_Fetch['DOB'];?></span>
                                                            
                                                        </li>
                                                      
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php if(isset($Investor_Fetch)) echo $Investor_Fetch['ContactNo'];?>
                                                            </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> Joined:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php echo $Investor_Fetch['CreatedOn'];?>
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
                                        <h4 class="card-title">Investment Information</h4>
                                    </div>
                                                                       <!--  -->
                                    <table class="table zero-configuration table-condensed" >
                                    
                                      <!--       <th></th>
                                          <th>Image</th>
                                          <th>Project Title</th>
                                          <th>Amount</th>
                                          <th></th>
                                       -->
                                    <tbody >
                                      <!-- Php Select Query Admin list start -->
                                        <?php      
                                          $sr="select f.*, p.ProjectTitle from tblFund f INNER JOIN tblProject p On f.ProjectID = p.ProjectID where f.UserID='".$_REQUEST['UserID']."' ORDER BY f.FundDate DESC";
                                          $res=mysqli_query($con,$sr) or die(mysqli_error());
                                          while($ans=mysqli_fetch_array($res))
                                          {
                                        ?>
                                      <!-- Php Select Query Admin list End -->
                              
                                      <tr>   
                                        <td></td>
                                        <td>
                                             <?php      
                                                    $sr1="select *from tblImage where ProjectID='".$ans['ProjectID']."' and IsDefault=1";
                                                  $res1=mysqli_query($con,$sr1) or die(mysqli_error());
                                                  $ans1=mysqli_fetch_array($res1)
                                                ?>
                                            <img src="project/img/<?php echo $ans1['ImageName'];?>" style="height: 80px;width: 80px;" class="img-thumbnail">
                                        </td>                          
                                        <td><span class="text-bold-500 primary"><?php echo $ans['ProjectTitle'];?> </a></span></td>
                                        <td>₹ <?php echo $ans['FundAmount']; ?>/-</td>                        
                                        <!-- Active Hyperlink Icon -->
                                        <!-- <td id="avv">
                                            <?php if($ans['IsActive']==0)
                                              {
                                            ?>
                                                  <a href="?AID=<?php echo $ans['AdminID']; ?>&UpActive=1"><span class="fa ft-x" style="font-size:25px;color: red"></span></a> 
                                            <?php
                                                } 
                                                else
                                                {
                                            ?>
                                                  <a href="?AID=<?php echo $ans['AdminID']; ?>&UpActive=0"><span class="fa ft-check" style="font-size:25px;color: green"></span></a> 
                                            <?php
                                                }
                                            ?>                          
                                        </td> -->
                                        <td id="avv">
                                          <!-- Update Hyperlink Icon -->
                                          <!-- <?php 
                                            if($_SESSION['IsUpdate']==1 || $_SESSION['IsSuper']==1)
                                            {
                                          ?>
                                          <a href="View_Project.php?ProjectID=<?php echo $ans['ProjectID']?>&back=20&UserID=<?php echo $ans['UserID'];?>" class="success p-0" name="View" data-original-title="" title="" >
                                            <i class="fa ft-eye font-medium-3 mr-2" ></i>
                                          </a>
                                          <?php
                                            }
                                          ?>    -->                              
                                        </td>
                                      </tr>
                                      <?php
                                        }
                                      ?>
                                    </tbody>                  
                                </table> 
                                <!--  -->
                                </div>
                            </div>


                        </div>
                    </section>
                    <!--About section ends-->
                  
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


