<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
  <!-- Load Files -->
      <?php include_once("Connection.php");?>
      <?php include_once("loadfiles.php");?>
      <?php include_once("loadfilesjs.php");?>  
      <script type="text/javascript" src="../js/JavaScriptFunctions.js"></script>
      <script type="text/javascript">
          function ChangePasswordValidation()
            {
                
                if(document.forms["ChangePasswordForm"]["txtCurrentName"].value=="")
                {
                    alert("Please Enter Current Name");
                    return false;
                }
                if(document.forms["ChangePasswordForm"]["txtNewName"].value=="")
                {
                    
                    alert("Please Enter New Name");
                    return false;
                    
                }
                if(document.forms["ChangePasswordForm"]["txtReEnterPassword"].value=="")
                {
                    
                     alert("Please Enter Re-Enter Password");
                    return false;
                }
                if(document.getElementById("lblCurrentName").innerText=="INVALID PASSWORD")
                {
            
                    alert("Invalid Password.");
                    return false;
            
                }
                if(document.getElementById("lblReEnterPassword").innerText=="* PASSWORD & CONFIRM PASSWORD DOES NOT MATCH")
                {
            
                    alert("New Password & Re-Password does not match.");
                    return false;
            
                }
                
                return true;
            }
      </script>
      <script type="text/javascript">
         /*Password validation*/
        function ChangePasswordCheck(CPassword) 
        {
            var xhttp = new XMLHttpRequest();
            var Url = "AjaxAChangePassword.php?CPass="+CPassword;
            //alert(Url);
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    document.getElementById("lblCurrentName").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", Url, true);
            xhttp.send();
        }
        /*End Contact validation*/
    </script>
  <!-- Load Files -->
</head>
<?php
    if(isset($_REQUEST['btnSaveChange']))
    {
        $update="update tbladmin set Password='".base64_encode($_REQUEST['txtNewName'])."' where AdminID=".$_SESSION['AdminID'];
            //echo $update;
        $update_qry=mysqli_query($con,$update);
    }
?>
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
                 
                          $sr="select * from tbladmin ";
                          $res=mysqli_query($con,$sr) or die(mysqli_error($con));
                          $ans=mysqli_fetch_array($res);           
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
                                                    <h3 class="card-title white"><?php if(isset($ans)) echo $ans['FirstName']." ".$ans['LastName'];?></h3>
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
                                                <span class="font-medium-2 text-uppercase"><?php if(isset($ans)) echo $ans['FirstName']."  ".$ans['LastName'];?></span>
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

                        
                        <button type="button" style="margin-left: 1000px;" class="btn btn-primary" data-toggle="modal" data-target="#iconModal">Change Password</button>
                          <!-- Model Change Password -->
                          <div class="modal fade text-left" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form method="post" name="ChangePasswordForm"> 
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-road2"></i> Change Password</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                    <h5><i class="fa fa-arrow-right"></i> Change Current Password</h5>
                                      
                                        
                                        <div class="form-group">
                                          <div class="position-relative has-icon-left">
                                            <input type="text" id="txtCurrentName" onblur="ValidateControl('txtCurrentName','lblCurrentName','Current Password'); return ChangePasswordCheck(this.value)";  class="form-control"  name="txtCurrentName" placeholder="Enter Current Password" >
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                          </div>
                                          <label id="lblCurrentName" style="color: red;"></label>
                                        </div>
                                        
                                        <div class="form-group">
                                          <div class="position-relative has-icon-left">
                                            <input type="text" id="txtNewName" onblur="ValidateControl('txtNewName','lblNewName','New Name')"; class="form-control"  name="txtNewName" placeholder="Enter New Password"  >
                                                <div class="form-control-position">
                                                  <i class="ft-user"></i>
                                                </div>
                                          </div>
                                            <label id="lblNewName" style="color: red;"></label>
                                        </div>
                                        
                                        <div class="form-group">
                                          <div class="position-relative has-icon-left">
                                            <input type="text" id="txtReEnterPassword" onblur="ValidatePassword('txtNewName','txtReEnterPassword','lblReEnterPassword')"; class="form-control"  name="txtReEnterPassword" placeholder="Enter Re-Enter Password"  >
                                              <div class="form-control-position">
                                                <i class="ft-user"></i>
                                              </div>
                                          </div>
                                          <label id="lblReEnterPassword" style="color: red;"></label>
                                        </div>
                                      <hr>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                    <button type="Submit" onclick="return ChangePasswordValidation();" class="btn btn-outline-primary" name="btnSaveChange">Save changes</button>
                                  </div>
                                </form>
                               </div>
                            </div>
                          </div>
               
                          <!-- End Change Password -->           
                                    
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
                                                            <a class="display-block overflow-hidden"><?php if(isset($ans)) echo $ans['Email'];?></a>
                                                        </li>
                                                        
                                                        <li class="mb-2">
                                                            <span class="text-bold-500 primary"><a><i class="icon-users font-small-3"></i> Created By:</a></span>
                                                            <span class="display-block overflow-hidden">
                                                                <?php
                                                                    $a=true;
                                                                    $selCreatedby="select FirstName,LastName from tbladmin where IsSuper='".$a."' and AdminID='".$ans['CreatedBy']."'";
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
                                                                <?php if(isset($ans)) 
                                                                        {
                                                                            if($ans['Gender']=='M')
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
                                                                <?php echo $ans['CreatedOn'];?>
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
                                                            <span class="display-block overflow-hidden"><?php if(isset($ans)) echo $ans['ContactNo'];?></span>
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

                        <?php 

                              if(isset($_SESSION['IsSuper']))
                              {
                                if($_SESSION['IsSuper']==1)
                                {

                        ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Payment Information</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="card-block">
                                            <!-- <div class="mb-3">
                                                <span class="text-bold-500 primary">About Me:</span>
                                            </div> -->
                                            <hr>
                                            <div class="row">
                                                <table class="table table-hover">
                                                  <thead>
                                                    <th>ProjectName</th>
                                                    <th>TotalReturnAmount</th>
                                                    <th>PaidAmount</th>
                                                  </thead>
                                                  <!-- select -->
                                                    <?php
                                                      $sel="select * from tblWebsiteReturn";
                                                      $Exe_sel=mysqli_query($con,$sel)or die(mysqli_error($con));
                                                      while($Fetch_sel=mysqli_fetch_array($Exe_sel))
                                                      {
                                                    ?>
                                                  <!-- select -->
                                                  <tbody>
                                                    <td>
                                                      <?php
                                                        $sel_Project="select * from tblProject where ProjectID=".$Fetch_sel['ProjectID'];
                                                        $Exe_Project=mysqli_query($con,$sel_Project) or die(mysqli_error($con));
                                                        $Fetch_Project=mysqli_fetch_array($Exe_Project);
                                                        echo $Fetch_Project['ProjectTitle'];
                                                      ?>
                                                    </td>
                                                    <td><?php echo $Fetch_sel['ReturnTotalAmount'];?></td>
                                                    <td>
                                                      <?php 
                                                                  if($Fetch_sel['IsFirstReturn']==1)
                                                                  {
                                                                    echo "Slot 1 :₹".$Fetch_sel['Slot4Amount']."   ";
                                                                  }
                                                                  if($Fetch_sel['IsSecondReturn']==1)
                                                                  {
                                                                    //echo "Slot 2 :₹".$FetchDetails['ReturnIntrestAmount']*2;
                                                                    echo "Slot 2 :₹".$Fetch_sel['Slot4Amount']."   ";
                                                                  }
                                                                  if($Fetch_sel['IsThirdReturn']==1)
                                                                  {
                                                                    //echo "Slot 3 :₹".$FetchDetails['ReturnIntrestAmount']*3;
                                                                    echo "Slot 3 :₹".$Fetch_sel['Slot4Amount']."   ";
                                                                  }
                                                                  if($Fetch_sel['IsFourthReturn']==1)
                                                                  {
                                                                    //echo "Slot 4 :₹".$FetchDetails['ReturnIntrestAmount']*4;
                                                                    echo "Slot 4 :₹".$Fetch_sel['Slot4Amount']."   ";
                                                                  }

                                                                  ?>
                                                    </td>
                                                  </tbody>
                                                  <?php
                                                    }
                                                  ?>
                                                </table>
                                            </div>
                                            <hr>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <?php
                          }
                        }

                        ?>


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
      <script src="app-assets/js/components-modal.min.js" type="text/javascript"></script>
    <!-- END Notification Sidebar-->
    
  </body>
</html>


