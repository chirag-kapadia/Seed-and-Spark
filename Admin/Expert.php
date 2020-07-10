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
            $up="update tblUser set IsActive='".$_REQUEST['UpActive']."' where UserID='".$_REQUEST['UID']."'";
            mysqli_query($con,$up);
          }
      /* Update Perform on IsActive field End*/
      /* Update Perform on IsVeriified field Start*/
          if(isset($_REQUEST['Verified']))
          {
            $up="update tblUser set IsVerified='".$_REQUEST['Verified']."' where UserID='".$_REQUEST['UID']."'";
            mysqli_query($con,$up);
          }
      /* Update Perform on IsVeriified field End*/
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

              <!-- Expert List table Start -->
              <section id="configuration">
                          <div class="row">                            
                              <div class="col-12">
                                  <div class="card">
                                      <div class="card-header">
                                        <h4 class="card-title">Expert List</h4>
                                      </div>
                                      <div class="card-body collapse show">
                                          <div class="card-block card-dashboard">                         
                                             <table class="table zero-configuration">
                                                  <thead>
                                                      <tr>                                    
                                                          <!-- <th></th> -->
                                                          <th>Name</th>                           
                                                          <!-- <th>Expert Area</th> -->
                                                          <th>ContactNo</th>
                                                          <?php 
                                                        if($_SESSION['IsSuper']==1)
                                                        {
                                                      ?>
                                                          <th>Verified</th>
                                                          <?php
                                                            }
                                                        ?>
                                                          <th>Active</th>
                                                          <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                      <!-- Php Select Query Investor list start -->
                                                        <?php       
                                                          $Select_Q="select * from tbluser where IsExpert='1' ORDER BY CreatedOn DESC";
                                                          $Sel_Exe=mysqli_query($con,$Select_Q) or die(mysqli_error($con));
                                                          while($Fetch=mysqli_fetch_array($Sel_Exe))
                                                          {
                                                        ?>
                                                      <!-- Php Select Query Investor list End -->

                                                      <tr>
                                                          
                                                          <!-- <td>
                                                              <label class="custom-control custom-checkbox m-0">
                                                                  <input type="checkbox" class="custom-control-input">
                                                                  <span class="custom-control-indicator" style="margin-left: 10px;"></span>
                                                              </label>
                                                          </td> -->
                                                          <td><?php echo $Fetch['FirstName'].' '.$Fetch['LastName'];?></td>
                                                              <!-- Fetch Expert AreaName join query Start -->
                                                                  <?php       
                                                                $Select_Q2="select * from tblExpertArea ea inner join tblExpertDetail e on ea.ExpertAreaID = e.ExpertAreaID where e.UserID='".$Fetch['UserID']."'";
                                                                $Sel_Exe2=mysqli_query($con,$Select_Q2) or die(mysqli_error());
                                                                $Fetch2=mysqli_fetch_array($Sel_Exe2);
                                                                ?>
                                                              <!-- Fetch Expert AreaName join query End -->
                                                          <!-- <td><?php echo $Fetch2['AreaName'];?></td> -->
                                                          <td><?php echo $Fetch['ContactNo'];?></td>
                                                           <?php 
                                                            if($_SESSION['IsSuper']==1)
                                                            {
                                                          ?>
                                                          <td id="avv">
                                                            <?php if($Fetch['IsVerified']==0)
                                                              /*<?php if($z2['IsInsert']==0)*/
                                                                  {
                                                              ?>
                                                                    <a href="?UID=<?php echo $Fetch['UserID']; ?>&Verified=1"><span class="fa ft-x" style="font-size:25px;color: red"></a> 
                                                              <?php
                                                                  } 
                                                                  else
                                                                  {
                                                              ?>
                                                                    <a href="?UID=<?php echo $Fetch['UserID']; ?>&Verified=0"><span class="fa ft-check" style="font-size:25px;color: green"></a> 
                                                              <?php
                                                                  }
                                                              ?>
                                                          </td>
                                                          <?php
                                                            }
                                                          ?>
                                                          <td id="ac1">
                                                            <?php if($Fetch['IsActive']==0)
                                                                  {
                                                            ?>
                                                                  <a href="?UID=<?php echo $Fetch['UserID']; ?>&UpActive=1"><span class="fa ft-x" style="font-size:25px;color: red"></span></a> 
                                                            <?php
                                                                  } 
                                                                  else
                                                                  {
                                                            ?>
                                                                  <a href="?UID=<?php echo $Fetch['UserID']; ?>&UpActive=0"><span class="fa ft-check" style="font-size:25px;color: green"></span></a> 
                                                            <?php
                                                                  }
                                                            ?>
                                                          </td>
                                                          <td id="ac1">
                                                              <a class="info p-0" data-original-title="" title="" href="Expert_Profile.php?UserID=<?php echo $Fetch['UserID']?>">
                                                                  <i class="ft-user font-medium-3 mr-2"></i>
                                                                  <?php 
                                                                      $sel_Expertdetail_verified="select count(IsVerified) as ExpertVer from tblExpertDetail where IsVerified=0 and UserID=".$Fetch['UserID'];
                                                                      $Exe_Expert=mysqli_query($con,$sel_Expertdetail_verified) or die(mysqli_error($con));
                                                                      $Fetch_Expert=mysqli_fetch_array($Exe_Expert);

                                                                      if(!$Fetch_Expert['ExpertVer']==0) 
                                                                        {
                                                                  ?>
                                                                            <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">
                                                                  <?php 
                                                                      if(isset($Fetch_Expert)) 
                                                                        echo $Fetch_Expert['ExpertVer'];
                                                                  ?>                                                              
                                                                            </span>
                                                                  <?php 
                                                                        }
                                                                  ?>
                                                              </a>
                                                              <!-- <a class="success p-0" data-original-title="" title="">
                                                                  <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                              </a> -->                                        
                                                              <!-- <a class="danger" data-original-title="" title="">
                                                                 <i class="ft-trash font-medium-3"></i>
                                                              </a> -->
                                                          </td>
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
              <!--/ Expert List table End -->

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