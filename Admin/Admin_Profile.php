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

    <!-- Php Select Query Admin list start -->
        <?php       
            if(isset($_REQUEST['View']))
            {
                $s2="select * from tbladmin where AdminID='".$_REQUEST['View']."'";
                //$sr="select a.*,ap.IsDelete,ap.IsUpdate,ap.IsInsert from tbladmin a, tbladminpermission ap where a.AdminID=ap.AdminID";
                $res2=mysqli_query($con,$s2) or die(mysqli_error());
                $ans2=mysqli_fetch_array($res2);
                /*echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".$_REQUEST['View'];*/
            }                         
        ?>
    <!-- Php Select Query Admin list End -->


    <div class="main-content">
       <div class="content-wrapper">

            <!-- Back Redirection Link Start -->
              <a href="Admin.php" class="danger" data-original-title="" title="">
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
                                                    <h3 class="card-title white"><?php if(isset($ans2)) echo $ans2['FirstName']." ".$ans2['LastName'];?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="align-self-center halfway-fab text-center">
                                                <a class="profile-image">
                                                    <img src="app-assets/img/portrait/avatars/avatar-08.png" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- <div class="col-5">
                                            <div class="media-body halfway-fab align-self-end">
                                                <div class="text-right d-none d-sm-none d-md-none d-lg-block">
                                                    <button type="button" class="btn btn-primary btn-raised mr-2"><i class="fa fa-plus"></i> Follow</button>
                                                    <button type="button" class="btn btn-success btn-raised mr-3"><i class="fa fa-dashcube"></i> Message</button>
                                                </div>
                                                <div class="text-right d-block d-sm-block d-md-block d-lg-none">
                                                    <button type="button" class="btn btn-primary btn-raised mr-2"><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="btn btn-success btn-raised mr-3"><i class="fa fa-dashcube"></i></button>
                                                </div>
                                            </div>
                                        </div> -->
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
                                                <span class="font-medium-2 text-uppercase"><?php if(isset($ans2)) echo $ans2['FirstName']."  ".$ans2['LastName'];?></span>
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
                                            <div class="mb-3">
                                                <span class="text-bold-500 primary">About Me:</span>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                         <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                                                            <a class="display-block overflow-hidden"><?php if(isset($ans2)) echo $ans2['Email'];?></a>
                                                        </li>
                                                        
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-users font-small-3"></i> Created By:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php
                                                                    $a=true;
                                                                    $selCreatedby="select FirstName,LastName from tbladmin where IsSuper='".$a."' and AdminID='".$ans2['CreatedBy']."'";
                                                                    $c1=mysqli_query($con,$selCreatedby)or die(mysqli_error());
                                                                    while($c2=mysqli_fetch_array($c1))
                                                                    {
                                                                        echo $c2['FirstName']." ".$c2['LastName'];
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
                                                                <?php if(isset($ans2)) 
                                                                        {
                                                                            if($ans2['Gender']=='M')
                                                                            {
                                                                                echo "Male";
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "Female";
                                                                            }
                                                                        }
                                                                ?>                                                                    
                                                            </span>
                                                        </li>
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-calendar font-small-3"></i> Joined:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php echo $ans2['CreatedOn'];?>
                                                            </span>
                                                        </li>
                                                        <!-- <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> Active:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php if(isset($ans2)) 
                                                                        {
                                                                            if($ans2['IsActive']==1)
                                                                                echo "Yes";
                                                                            else
                                                                                echo "No";
                                                                        }
                                                                ?> 
                                                            </span>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <ul class="no-list-style">
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                                                            <span class="display-block overflow-hidden"><?php if(isset($ans2)) echo $ans2['ContactNo'];?></span>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr>
                                            
                                        </div>
                                    </div>
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


