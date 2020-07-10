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

        <!-- Investor List table Start -->
          <section id="configuration">
            <div class="row">                            
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Investor List</h4>
                  </div>
                  <div class="card-body collapse show">
                    <div class="card-block card-dashboard">                         
                      <table class="table zero-configuration">
                        <thead>
                          <tr>                                    
                            <!-- <th></th> -->
                            <th>Name</th>                           
                            <th>Email</th>
                            <th>ContactNo</th>
                            <th>Funded Projects</th>
                             <?php 
                              if($_SESSION['IsSuper']==1)
                              {
                            ?>
                            <th>Verified</th>
                            <?php
                              }
                            ?>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          <!-- Php Select Query Investor list start -->
                            <?php       
                              $Select_Q="select * from tbluser where IsInvestor='1' ORDER BY CreatedOn DESC";
                              //$sr="select a.*,ap.IsDelete,ap.IsUpdate,ap.IsInsert from tbladmin a, tbladminpermission ap where a.AdminID=ap.AdminID";
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
                            <td><?php echo $Fetch['Email'];?></td>
                            <td><?php echo $Fetch['ContactNo'];?></td>
                            
                            <td>
                              <!--  -->
                                  <?php       
                                    $Select_Q2="select count(UserID) as count from tblFund where UserID='".$Fetch['UserID']."'";
                                    //$sr="select a.*,ap.IsDelete,ap.IsUpdate,ap.IsInsert from tbladmin a, tbladminpermission ap where a.AdminID=ap.AdminID";
                                    $Sel_Exe2=mysqli_query($con,$Select_Q2) or die(mysqli_error());
                                    /*echo count($Sel_Exe2);*/
                                    $Fetch2=mysqli_fetch_array($Sel_Exe2);
                                    echo $Fetch2['count'];
                                    //echo count($Fetch2);

                                  ?>
                              <!--  -->
                            </td>
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
                              <a class="info p-0" data-original-title="" title="" href="Investor_Profile.php?UserID=<?php echo $Fetch['UserID']?> ">
                                <i class="ft-user font-medium-3 mr-2"></i>
                              </a>
                         <!-- <a class="success p-0" data-original-title="" title="">
                                <i class="ft-edit-2 font-medium-3 mr-2"></i>
                              </a>  -->                                       
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
        <!--/ Investor List table End -->

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