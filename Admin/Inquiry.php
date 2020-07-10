

<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <!-- Load Files -->
  <?php include_once("Connection.php");?>
  <?php include_once("loadfiles.php");?>

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
      <!-- Inquiry List table Start -->
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <h4 class="card-title">Inquiry</h4><br>
                <div class="text-right">
                  <a href="All_Inquiry.php"><button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover">All <i class="fa fa-plus-square-o"></i></button></a>
                </div> 
              </div>
              <div class="card-body collapse show col-lg-12">
                <div class="card-block card-dashboard">

                  <table class="table table-responsive zero-configuration">
                    <thead>
                      <tr>                                                  
                        <!-- <th></th> -->
                        <th>Name</th>
                        <th>Subject</th>                          
                        <th>Email</th>
                        <!-- <th>ContactNo</th> -->
                        <th>CreatedOn</th>
                                                  <!-- <th>Reply</th>
                                                    <th>RepliedOn</th> -->
                                                    <!-- <th>IsReplied</th> -->
                                                    <!-- <th>RepliedBy</th> -->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       <!-- Php Select Query Admin list start -->
                        <?php       
                          $sr="select * from tblInquiry where IsReplied=0 ORDER BY CreatedOn DESC";
                          $res=mysqli_query($con,$sr) or die(mysqli_error($con));
                          while($ans=mysqli_fetch_array($res))
                          {
                        ?>
                      <!-- Php Select Query Admin list End -->
                      <tr>                                                  
                        <!-- <td id="avv">
                          <label class="custom-control custom-checkbox m-0">
                            <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                          </label>
                        </td> -->
                        <td><?php echo $ans['Name'];?></td>
                        <td><?php echo $ans['Subject'];?></td>
                        <td><?php echo $ans['Email'];?></td>
                        <!-- <td><?php echo $ans['ContactNo'];?></td> -->
                        <td><?php echo $ans['CreatedOn'];?></td>
                      <!-- <td>QRSTUVWXYZ</td>
                           <td>15/5/1133</td> -->
                      <!-- <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td> -->
                      <!-- <td>Admin Name</td> -->
                        <td id="avv">
                          <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                              <!-- Button trigger modal -->
                              <!--  <button type="button" class="btn btn-outline-success btn-block btn-lg" data-toggle="modal" data-target="#success">
                              Launch Modal
                              </button> -->
                              <a href="Reply_Inquiry.php?CID=<?php echo $ans['InquiryID']; ?>" class="success p-0" data-original-title="" title="" >
                                <i class="fa icon-action-undo font-medium-3 mr-2"></i>
                              </a>

                              
                            </div>
                          </div>
                      <!-- <a class="info p-0" data-original-title="" title="">
                            <i class="fa fas fa-eye font-medium-3 mr-2"></i>
                          </a>
                          <a class="success p-0" data-original-title="" title="">
                            <i class="fa icon-action-undo font-medium-3 mr-2"></i>
                          </a>
                          <a class="danger p-0" data-original-title="" title="">
                            <i class="ft-x font-medium-3 mr-2"></i>
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
    <!--/ Inquiry List table End -->
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
      <?php include_once("loadfilesjs.php");?>  
</body>
</html>