

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

    <div class="main-content">
       <div class="content-wrapper">
                      <!-- Supportus List table Start -->
              <section id="configuration">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4 class="card-title">Support Us</h4>
                              </div>
                              <div class="card-body collapse show col-lg-12">
                                  <div class="card-block card-dashboard">
                                      
                                      <table class="table table-responsive zero-configuration">
                                          <thead>
                                              <tr>
                                                  
                                                  <th></th>
                                                  <th>Name</th>                          
                                                  <th>Email</th>
                                                  <th>Contact No</th>
                                                  <th>Amount</th>
                                                  <th>Supported On</th>

                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $Select_Q="select * from tblSupport ORDER BY SupportedOn DESC";
                                              $Select_Exe=mysqli_query($con,$Select_Q) or die(mysql_error($con));
                                              while($Fetch=mysqli_fetch_array($Select_Exe))
                                              {
                                            ?>
                                              <tr>                                                  
                                                  <td id="avv">
                                                      <label class="custom-control custom-checkbox m-0">
                                                          <input type="checkbox" class="custom-control-input">
                                                          <span class="custom-control-indicator"></span>
                                                      </label>
                                                  </td>
                                                  <td><?php echo $Fetch['Name'];?></td>
                                                  <td><?php echo $Fetch['Email'];?></td>
                                                  <td><?php echo $Fetch['ContactNo'];?></td>
                                                  <td><?php echo $Fetch['SupportAmount'];?></td>
                                                  <td><?php echo $Fetch['SupportedOn'];?></td>
                                                  <td id="avv">
                                                      <!-- <a class="info p-0" data-original-title="" title="">
                                                          <i class="ft-user font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="success p-0" data-original-title="" title="">
                                                          <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                      </a> -->
                                                      <a class="danger" data-original-title="" title="">
                                                          <i class="ft-trash font-medium-3"></i>
                                                      </a>
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
              <!--/ Supportus List table End -->
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