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
                    <!-- Feedback List table Start -->
              <section id="configuration">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4 class="card-title">Feedback</h4>
                              </div>
                              <div class="card-body collapse show col-lg-12">
                                  <div class="card-block card-dashboard">
                                      
                                      <table class="table table-responsive zero-configuration">
                                          <thead>
                                              <tr>                                          
                                                  <!-- <th></th> -->
                                                  <th>Feedback</th>                          
                                                  <th>Email</th>
                                                  <th>CreatedOn</th>
                                                  <th>Rating</th>                                               
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                                  /*$Select_Query="select f.*, u.FirstName, u.LastName from tblFeedback f inner join tblUser u on f.UserID = u.UserID ORDER BY CreatedOn DESC";*/
                                                  $Select_Query="select * from tblFeedback ORDER BY CreatedOn DESC";
                                                  $Select_Exe=mysqli_query($con,$Select_Query) or die(mysqli_error($con));
                                                  while($Fetch=mysqli_fetch_array($Select_Exe))
                                                  {
                                              ?>
                                              <tr>
                                                  <!-- <td>
                                                      <label class="custom-control custom-checkbox m-0">
                                                          <input type="checkbox" class="custom-control-input">
                                                          <span class="custom-control-indicator"></span>
                                                      </label>
                                                  </td> -->
                                                  <td> <?php echo $Fetch['Feedback'];?></td>
                                                  <td><?php echo $Fetch['Email'];?></td>
                                                  <td><?php echo $Fetch['CreatedOn'];?></td>
                                                  <?php 
                                                    if($Fetch['Rating']==1)
                                                    { 
                                                        echo "<td><i class='fa fa-star'></i></td>";
                                                    }
                                                    if($Fetch['Rating']==2)
                                                    { 
                                                        echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";
                                                    }
                                                    if($Fetch['Rating']==3)
                                                    { 
                                                        echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";
                                                    }
                                                    if($Fetch['Rating']==4)
                                                    { 
                                                        echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";
                                                    }
                                                    if($Fetch['Rating']==5)
                                                    { 
                                                        echo "<td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>";
                                                    }
                                                  ?>
                                                  
                                                  
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
              <!--/ Feedback List table End -->
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