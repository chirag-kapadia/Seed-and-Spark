<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <!-- Load Files -->
  <?php include_once("Connection.php");?>
  <?php include_once("loadfiles.php");?> 
  <?php include_once("loadfilesjs.php");?>
  
</head>

<?php

   /* Update Perform on IsActive field Start*/
          if(isset($_REQUEST['Active']))
          {
            $up="update tblUser set IsActive='".$_REQUEST['Active']."' where UserID='".$_REQUEST['UID']."'";
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

      /* Delete on IsActive field Start*/
          if(isset($_REQUEST['DelID']))
          {
            echo  '<script>confirm("Are You Sure You Want To Delete y/n ?")</script>';
            $up="update tblUser set IsActive=0 where UserID='".$_REQUEST['DelID']."'";
            mysqli_query($con,$up);
          }
      /* Delete on IsActive field End*/

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

      <!-- initiator List table Start -->
      <section id="configuration" >
        <div class="row" >
          <div class="col-12" >
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Initiator</h4>
              </div>
              <div class="card-body collapse show col-lg-12">
                <div class="card-block card-dashboard">
                  <table class="table table-responsive zero-configuration">
                    <thead>
                      <tr>
                        <!-- <th></th> -->
                        <th>Name</th>                          
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Location</th>
                        <?php 
                    if($_SESSION['IsSuper']==1)
                    {
                  ?>
                        <th>Verified</th>
                        <?php }?>
                        <th>Active</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Select Query Initiator List Start -->
                        <?php
                            $select_Query="select * from tblUser where IsInitiator='1' ORDER BY CreatedOn DESC";
                            $select_Exe=mysqli_query($con,$select_Query) or die(mysqli_error($con));
                            //echo $select_Exe;
                            while ($select_fetch=mysqli_fetch_array($select_Exe))
                            {
                        ?>                         

                      <!-- Select Query Initiator List End -->
                      <tr>
                        <!-- <td >
                          <label class="custom-control custom-checkbox m-0" id="avv">
                            <input type="checkbox" class="custom-control-input" >
                            <span class="custom-control-indicator" ></span>
                          </label>
                        </td> -->
                        <td><?php echo $select_fetch['FirstName']." ".$select_fetch['LastName'];?></td>
                        <td><?php echo $select_fetch['Email'];?></td>
                        <td><?php echo $select_fetch['ContactNo'];?></td>
                        <td><!-- <?php echo $select_fetch['CityID'];?> -->
                            <?php
                                  if(isset($select_fetch['CityID'])) 
                                  {
                                     // City 
                                     $Select_City="select * from tblCity where CityID=".$select_fetch['CityID'];
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
                                    echo "Null";
                                  }
                            ?>
                        </td>
                        <?php 
                    if($_SESSION['IsInsert']==1 || $_SESSION['IsSuper']==1)
                    {
                  ?>
                        <td id="avv">
                          <?php if($select_fetch['IsVerified']==0)
                            /*<?php if($z2['IsInsert']==0)*/
                                {
                            ?>
                                  <a href="?UID=<?php echo $select_fetch['UserID']; ?>&Verified=1"><span class="fa ft-x" style="font-size:25px;color: red"></a> 
                            <?php
                                } 
                                else
                                {
                            ?>
                                  <a href="?UID=<?php echo $select_fetch['UserID']; ?>&Verified=0"><span class="fa ft-check" style="font-size:25px;color: green"></a> 
                            <?php
                                }
                            ?>
                        </td>
                        <?php
                          }
                        ?>
                        <td id="avv">
                          <?php if($select_fetch['IsActive']==0)
                              {
                            ?>
                                  <a href="?UID=<?php echo $select_fetch['UserID']; ?>&Active=1"><span class="fa ft-x" style="font-size:25px;color: red"></span></a> 
                            <?php
                                } 
                                else
                                {
                            ?>
                                  <a href="?UID=<?php echo $select_fetch['UserID']; ?>&Active=0"><span class="fa ft-check" style="font-size:25px;color: green"></span></a> 
                            <?php
                                }
                            ?>   
                        </td>
                        <td id="ac1">
                          <a class="info p-0" data-original-title="" title="" href="Initiator_Profile.php?UserID=<?php echo $select_fetch['UserID']?>">
                            <i class="ft-user font-medium-3 mr-2"></i>
                            <?php 
                              $sel_initiatordetail_verified="select count(IsVerified) as iniv from tblInitiatorDetail where IsVerified=0 and UserID=".$select_fetch['UserID'];
                              $Exe_iniv=mysqli_query($con,$sel_initiatordetail_verified) or die(mysqli_error($con));
                              $Fetch_iniv=mysqli_fetch_array($Exe_iniv);

                            if(!$Fetch_iniv['iniv']==0) {?><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php if(isset($Fetch_iniv)) echo $Fetch_iniv['iniv'];?></span><?php }?>
                          </a>
                          <!-- <a class="success p-0" data-original-title="" title="">
                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                          </a> -->
                           
                          <!-- Delete HyperLink Icon --> 
                          <?php 
                            if($_SESSION['IsDelete']==1 || $_SESSION['IsSuper']==1)
                            {
                          ?>
                          <!-- <button onclick="Delete_Alert();" style="background:transparent;"> -->
                          <!-- <a href="?DelID=<?php echo $select_fetch['UserID']?>" class="danger" data-original-title="" title="">
                            <i class="ft-trash font-medium-3"></i>
                          </a> -->
                        <!-- </button> -->
                          <?php
                            }
                          ?>
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
      <!--/ initiator List table End -->

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