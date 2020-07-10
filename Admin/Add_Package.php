<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
  <!-- Load Files -->
    <?php include_once("Connection.php");?>
    <?php include_once("loadfiles.php");?> 
    <?php include_once("loadfilesjs.php");?>
  <!-- Load Files -->
</head>

<!-- PHP Add Admin start  -->
<?php
       if(isset($_REQUEST['btnSubmit']))
      {
        if(isset($_REQUEST['UpPackID']))
        {
          $Update_Query="update tblPackage set PackageName='".$_REQUEST['txtPackageName']."', PackagePrice='".$_REQUEST['txtPackagePrice']."', PackageDuration='".$_REQUEST['txtPackageDuration']."' where PackageID='".$_REQUEST['UpPackID']."'";
          $Update_Exe=mysqli_query($con,$Update_Query) or die(mysqli_error());
          /*$Update_Fetch=mysqli_fetch_array($res1);*/
          //echo $ans1;                                        
        }
        else
        {
          $Insert_Query="insert into tblPackage values('Null','".$_REQUEST['txtPackageName']."','".$_REQUEST['txtPackagePrice']."','".$_REQUEST['txtPackageDuration']."',1)";
          //echo $in;
          mysqli_query($con,$Insert_Query) or die(mysqli_error());          
          header("location:Add_Package.php");
        }        
      }  

      /* Update Perform on IsActive field Start*/
          if(isset($_REQUEST['PackageActive']))
          {
            $up="update tblPackage set IsActive='".$_REQUEST['PackageActive']."' where PackageID='".$_REQUEST['PackID']."'";
            mysqli_query($con,$up);
          }
      /* Update Perform on IsActive field End*/

      /* Update Perform Start*/
          if(isset($_REQUEST['UpPackID']))
          {
            $Sel_Query2="select * from tblPackage where PackageID='".$_REQUEST['UpPackID']."'";
            $Query2_Exe=mysqli_query($con,$Sel_Query2) or die(mysqli_error());
            $Query2_Fetch=mysqli_fetch_array($Query2_Exe) or die(mysqli_error());
          }
      /* Update Perform End*/

?> 
<!-- PHP Add Admin End -->

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
          
        <!-- Back Redirection Link Start -->
          <a href="Project_Package.php" class="danger" data-original-title="" title="">
              <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
          </a>
        <!-- Back Redirection Link End -->

          <!-- Package Form  start -->
          <div class="col-md-12" >
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Add Package</h4>
              </div>
              
              <div class="card-body">
                <div class="px-3">
                  <form class="form">
                    <!-- form body start -->
                    <div class="form-body">
                      <div class="form-group">
                        <label for="timesheetinput1">Package Name :</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="timesheetinput1" class="form-control"  name="txtPackageName" value="<?php if(isset($_REQUEST['UpPackID'])) echo $Query2_Fetch['PackageName'];?>" placeholder="Package Name" required="">
                              <div class="form-control-position">
                              <i class="ft-user"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="timesheetinput1">Package Price :</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="timesheetinput1" class="form-control"  name="txtPackagePrice" value="<?php if(isset($_REQUEST['UpPackID'])) echo $Query2_Fetch['PackagePrice'];?>" placeholder="Package Price" required="">
                              <div class="form-control-position">
                              <i class="ft-user"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="timesheetinput1">Package Duration :</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="timesheetinput1" class="form-control"  name="txtPackageDuration" value="<?php if(isset($_REQUEST['UpPackID'])) echo $Query2_Fetch['PackageDuration'];?>" placeholder="Duration(in Day)" required="">
                              <div class="form-control-position">
                              <i class="ft-user"></i>
                              </div>
                          </div>
                      </div>                      
                    </div>
                    <!-- form body end -->


                    <!-- form button start -->
                    <div class="text-right">
                  <button type="submit" name="btnSubmit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover">Submit <i class="fa fa-thumbs-o-up position-right"></i></button>
                  <button type="reset" class="btn btn-raised gradient-pomegranate white big-shadow">Reset <i class="fa fa-refresh position-right"></i></button>
                    </div>
                    <!-- form button end -->
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Package Form  End -->

          <!-- Package List table start -->
          <section id="configuration">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <!-- <div class="text-right">
                      <a href="Add_Package.php"><button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover">Add New Package <i class="fa fa-plus-square-o"></i></button></a>
                    </div>  -->
                    <h4 class="card-title">Packages</h4>
                  </div>
                  <div class="card-body collapse show col-lg-12">
                    <div class="card-block card-dashboard">
          
                      <table class="table table-responsive zero-configuration">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Active</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Php Select Query Admin list start -->
                            <?php       
                                $Sel_Query_Package="select * from tblPackage";
                                $Package_Exe=mysqli_query($con,$Sel_Query_Package) or die(mysqli_error());
                                while($Package_Fetch=mysqli_fetch_array($Package_Exe))
                                {                                      
                            ?>
                        <!-- Php Select Query Admin list End -->
                          <tr>                                                  
                            <td id="avv">
                              <label class="custom-control custom-checkbox m-0">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                              </label>
                            </td>
                            <td><?php echo $Package_Fetch['PackageName'];?></td>
                            <td><?php echo $Package_Fetch['PackagePrice'];?></td>
                            <td><?php echo $Package_Fetch['PackageDuration'];?> day</td>
                            <td id="avv">
                            <?php 
                            if($Package_Fetch['IsActive']==0)
                              {
                            ?>
                                  <a href="?PackID=<?php echo $Package_Fetch['PackageID']; ?>&PackageActive=1"><span class="fa ft-x" style="font-size:25px;color: red"></span></a> 
                            <?php
                                } 
                                else
                                {
                            ?>
                                  <a href="?PackID=<?php echo $Package_Fetch['PackageID']; ?>&PackageActive=0"><span class="fa ft-check" style="font-size:25px;color: green"></span></a> 
                            <?php
                                }
                            ?>                          
                        </td>
                            <td id="avv">
                              <a href="?UpPackID=<?php echo $Package_Fetch['PackageID'];?>" class="success p-0" data-original-title="" title="">
                                <i class="ft-edit-2 font-medium-3 mr-2"></i>
                              </a>
                              <a class="danger" data-original-title="" title="">
                                <i class="ft-trash font-medium-3"></i>
                              </a>
                            </td>
                          </tr>
                          <!--  -->
                          <?php
                            }
                          ?>
                          <!--  -->
                        </tbody>                            
                      </table>                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!--/ Package List table End -->


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