<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
  <!-- Load Files -->
    <?php include_once("Connection.php");?>
    <?php include_once("loadfiles.php");?> 
    <?php include_once("loadfilesjs.php");?>
  <!-- Load Files -->
</head>

<?php

  /* Update Perform on IsActive field Start*/
          if(isset($_REQUEST['UpActive']))
          {
            $up="update tblProjectPackage set IsActive='".$_REQUEST['UpActive']."' where ProjectPackageID='".$_REQUEST['ProPackID']."'";
            mysqli_query($con,$up);
          }
  /* Update Perform on IsActive field End*/
?>



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

        <!-- Package List table start -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card-header">
                  <div class="text-right">
                    <a href="Add_Package.php"><button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover">Add New Package <i class="fa fa-plus-square-o"></i></button>
                    </a>
                  </div> 
                  <h4 class="card-title">Project Packages</h4>
                </div>
          
                <div class="card-body collapse show col-lg-12">
                  <div class="card-block card-dashboard">
                    <table class="table table-responsive zero-configuration">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Project</th>                          
                          <th>Package</th>
                          <th>Duration</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <!-- <th>Active</th>
                          <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Select Project Package Rescord Query Start-->
                            <?php
                                $Select_Q="select pp.*, p.ProjectTitle,ppp.PackageName,ppp.PackageDuration from tblprojectpackage pp,tblProject p,tblPackage ppp
where pp.ProjectID=p.ProjectID and pp.PackageID=ppp.PackageID";
                                $Select_Exe=mysqli_query($con,$Select_Q) or die(mysqli_error());
                                while($Fetch=mysqli_fetch_array($Select_Exe))
                                {
                            ?>
                        <!-- Select Project Package Rescord Query Start-->
                        <tr>                                                  
                          <td>
                            <label class="custom-control custom-checkbox m-0">
                              <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                          </td>
                          <td><?php echo $Fetch['ProjectTitle'];?></td>
                          <td><?php echo $Fetch['PackageName'];?></td>
                          <td><?php echo $Fetch['PackageDuration'];?> (days)</td>
                          <td><?php echo $Fetch['StartDate'];?></td>
                          <td><?php echo $Fetch['EndDate'];?></td>
                         <!--  <td id="ac1">
                             <?php if($Fetch['IsActive']==0)
                              {
                            ?>
                                  <a href="?ProPackID=<?php echo $Fetch['ProjectPackageID']; ?>&UpActive=1"><span class="fa ft-x" style="font-size:25px;color: red"></span></a> 
                            <?php
                                } 
                                else
                                {
                            ?>
                                  <a href="?ProPackID=<?php echo $Fetch['ProjectPackageID']; ?>&UpActive=0"><span class="fa ft-check" style="font-size:25px;color: green"></span></a> 
                            <?php
                                }
                            ?>
                          </td>
                          <td id="ac1"> -->
                            <!-- <a class="info p-0" data-original-title="" title="">
                              <i class="ft-user font-medium-3 mr-2"></i>
                            </a>
                            <a class="success p-0" data-original-title="" title="">
                              <i class="ft-edit-2 font-medium-3 mr-2"></i>
                            </a> -->
                            <!-- <a class="danger" data-original-title="" title="">
                              <i class="ft-trash font-medium-3"></i>
                            </a>
                          </td> -->
                        </tr>
                          <?php
                              }
                          ?>
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