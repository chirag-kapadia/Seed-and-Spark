<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <!-- Load Files -->
  <?php include_once("Connection.php");?>
  <?php include_once("loadfiles.php");?> 

</head>
  <!-- PHP Add Admin start  -->
  <?php     
      if(isset($_REQUEST['btnSubmit']))
      {
        $da=date("Ymdhis");
        $Insert_Query="insert into tbladmin values('Null','".$_REQUEST['txtFName']."','".$_REQUEST['txtLName']."','".$_REQUEST['rbtnGender']."','".$_REQUEST['txtContactNo']."','".$_REQUEST['txtEmail']."','".base64_encode($_REQUEST['txtPassword'])."',0,1,'".$_REQUEST['chkInsert']."','".$_REQUEST['chkUpdate']."','".$_REQUEST['chkDelete']."','".$da."','".$_SESSION['AdminID']."')";
          //echo $in;
          mysqli_query($con,$Insert_Query) or die(mysqli_error());          
          header("location:Admin.php");
      }    

      /* Update Perform on IsInsert field Start*/
          if(isset($_REQUEST['UpInsert']))
          {
            $up="update tbladmin set IsInsert='".$_REQUEST['UpInsert']."' where AdminID='".$_REQUEST['AID']."'";
            mysqli_query($con,$up);
          }
      /* Update Perform on IsInsert field End*/

      /* Update Perform on IsUpdate field Start*/
          if(isset($_REQUEST['UpUpdate']))
          {
            $up="update tbladmin set IsUpdate='".$_REQUEST['UpUpdate']."' where AdminID='".$_REQUEST['AID']."'";
            mysqli_query($con,$up);
          }
      /* Update Perform on IsUpdate field End*/

      /* Update Perform on IsDelete field Start*/
          if(isset($_REQUEST['UpDelete']))
          {
            $up="update tbladmin set IsDelete='".$_REQUEST['UpDelete']."' where AdminID='".$_REQUEST['AID']."'";
            mysqli_query($con,$up);
          }
      /* Update Perform on IsDelete field End*/

      /* Update Perform on IsActive field Start*/
          if(isset($_REQUEST['UpActive']))
          {
            $up="update tbladmin set IsActive='".$_REQUEST['UpActive']."' where AdminID='".$_REQUEST['AID']."'";
            mysqli_query($con,$up);
          }
      /* Update Perform on IsActive field End*/

      /* Delete on IsActive field Start*/
          if(isset($_REQUEST['DelID']))
          {
  ?>
            <script type="text/javascript" src="al.js"></script>
  <?php
            echo  '<script>confirm("Are You Sure You Want To Delete y/n ?")</script>';
            $up="update tbladmin set IsActive=0 where AdminID='".$_REQUEST['DelID']."'";
            mysqli_query($con,$up);
          }
      /* Delete on IsActive field End*/
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
        <div class="content-wrapper">

        <!-- Admin List table Start -->
        <section id="configuration">
          <div class="row">
            
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <?php 
                    if($_SESSION['IsInsert']==1 || $_SESSION['IsSuper']==1)
                    {
                  ?>
                  <div class="text-right">
                    <a href="Add_Admin.php">
                      <button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" >Add New Admin <i class="fa ft-user-plus"></i></button>
                    </a>
                  </div> 
                  <?php
                    }
                  ?>
                  <h4 class="card-title">Admin List</h4>
                </div>
                <div class="card-body collapse show">
                  <div class="card-block card-dashboard">
                    <table class="table zero-configuration" >
                      <thead >
                        <tr>                                    
                          <!-- <th></th> -->
                          <th>Name</th>                           
                          <th>Email</th>
                          <th>Insert</th>
                          <th>Update</th>
                          <th>Delete</th>                                    
                          <th>Active</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    <tbody >
                      <!-- Php Select Query Admin list start -->
                        <?php       
                          $sr="select * from tbladmin where IsSuper=0 ORDER BY CreatedOn DESC";
                          $res=mysqli_query($con,$sr) or die(mysqli_error());
                          while($ans=mysqli_fetch_array($res))
                          {
                        ?>
                      <!-- Php Select Query Admin list End -->
              
                      <tr>                                    
                        <!-- <td id="avv">
                          <label class="custom-control custom-checkbox m-0">
                            <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-indicator" ></span>
                          </label>
                        </td> -->
                        <td><?php echo $ans['FirstName']." ".$ans['LastName'];?></td>
                        <td><?php echo $ans['Email']; ?></td>
                        <!-- Insert Permission Hyperlink Icon -->
                        <td id="avv">
                            <?php if($ans['IsInsert']==0)
                                {
                            ?>
                                  <a href="?AID=<?php echo $ans['AdminID']; ?>&UpInsert=1"><span class="fa ft-x" style="font-size:25px;color: red"></a> 
                            <?php
                                } 
                                else
                                {
                            ?>
                                  <a href="?AID=<?php echo $ans['AdminID']; ?>&UpInsert=0"><span class="fa ft-check" style="font-size:25px;color: green"></a> 
                            <?php
                                }
                            ?>
                        </td>
                        <!-- Update Permission Hyperlink Icon -->
                        <td id="avv">
                             <?php if($ans['IsUpdate']==0)
                                {
                            ?>
                                  <a href="?AID=<?php echo $ans['AdminID']; ?>&UpUpdate=1"><span class="fa ft-x" style="font-size:25px;color: red"></a> 
                            <?php
                                } 
                                else
                                {
                            ?>
                                  <a href="?AID=<?php echo $ans['AdminID']; ?>&UpUpdate=0"><span class="fa ft-check" style="font-size:25px;color: green"></a> 
                            <?php
                                }
                            ?>
                        </td>
                        <!-- Delete Permission Hyperlink Icon -->
                        <td id="avv">
                             <?php if($ans['IsDelete']==0)
                                 {
                            ?>
                                  <a href="?AID=<?php echo $ans['AdminID']; ?>&UpDelete=1"><span class="fa ft-x" style="font-size:25px;color: red"></a> 
                            <?php
                                } 
                                else
                                {
                            ?>
                                  <a href="?AID=<?php echo $ans['AdminID']; ?>&UpDelete=0"><span class="fa ft-check" style="font-size:25px;color: green"></a> 
                            <?php
                                }
                            ?>
                        </td>
                        <!-- Active Hyperlink Icon -->
                        <td id="avv">
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
                        </td>
                        <td id="avv">

                          <!-- View Profile Hyperlink Icon -->
                          <a class="info p-0" data-original-title="" title="" href="Admin_Profile.php?View=<?php echo $ans['AdminID']?>" >
                            <i class="ft-user font-medium-3 mr-2"></i>
                          </a>

                          <!-- Update Hyperlink Icon -->
                          <?php 
                            if($_SESSION['IsUpdate']==1 || $_SESSION['IsSuper']==1)
                            {
                          ?>
<!--                           <a href="Add_Admin.php?EID=<?php echo $ans['AdminID']?>" class="success p-0" name="Edit" data-original-title="" title="" >
                            <i class="ft-edit-2 font-medium-3 mr-2" ></i>
                          </a> -->
                          <?php
                            }
                          ?>
                           
                           <!-- Delete HyperLink Icon --> 
                          <?php 
                            if($_SESSION['IsDelete']==1 || $_SESSION['IsSuper']==1)
                            {
                          ?>
                          <!-- <button onclick="Delete_Alert();" style="background:transparent;"> -->
                          <a href="?DelID=<?php echo $ans['AdminID']?>" class="danger" data-original-title="" title="">
                            <i class="ft-trash font-medium-3"></i>
                          </a>
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
        <!--/ Admin List table End -->

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
     
  <!-- Load file js -->
    <?php include_once("loadfilesjs.php");?>  
  <!-- Load file js -->
  

  <!-- Script Alert Start -->
      <!-- <script type="text/javascript">
        function Delete_Alert()
        {
          swal("Good job!", "You clicked the button!", "success");
        }
      </script> -->
  <!-- Script Alert End -->
  </body>
</html>