

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

      <!-- Back Redirection Link Start -->
              <a href="Inquiry.php" class="danger" data-original-title="" title="">
                  <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
              </a>
            <!-- Back Redirection Link End -->


      <!-- Inquiry List table Start -->
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <h4 class="card-title">Inquiry</h4><br>
                
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
                          $sr="select * from tblInquiry ORDER BY CreatedOn DESC";
                          $res=mysqli_query($con,$sr) or die(mysqli_error());
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
                              <?php 
                                if($ans['IsReplied']==1)
                                {
                              ?>
                                  <i class="fa ft-check font-medium-3 mr-2"></i>
                              <?php
                                }
                                else
                                {
                                ?>
                                     <a href="Reply_Inquiry.php?CID=<?php echo $ans['InquiryID']; ?>" class="success p-0 " data-original-title="" title="" disable >
                                        <i class="fa icon-action-undo font-medium-3 mr-2"></i>
                                      </a>
                                <?php
                                }
                              ?>
                             

                              <!-- Modal -->
                              
                                <!-- <div class="modal fade text-left"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-success white">
                                        <h4 class="modal-title" id="myModalLabel9"><i class="fa icon-envelope-letter"></i> Reply</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body"> -->
                                        <!-- Php Select Query Admin list start -->
                                          <?php       
                                           /* $Select_Query="select * from tblInquiry where InquiryID='".$_REQUEST['CID']."'";
                                            $Exe_Query=mysqli_query($con,$Select_Query) or die(mysqli_error());
                                            $Fetch=mysqli_fetch_array($Exe_Query);*/
                                            
                                          ?>
                                        <!-- Php Select Query Admin list End -->
                                        <!-- <h5><i class="fa "></i> To : <?php echo $Fetch['Email']; ?></h5>
                                          <p><?php echo $Fetch['Subject']; ?></p>
                                          
                                          <hr>
                                          <h5><i class="fa "></i> Answer :</h5>
                                          <textarea style="width: 450px;height: 150px;" ></textarea> -->
                                          <!-- <div class="alert alert-success" role="alert">
                                          <span class="text-bold-600">Well done!</span> You successfully read this important alert message.
                                          </div> -->
                                      <!-- </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-outline-success">Send</button>
                                      </div>
                                    </div>
                                  </div>
                                </div> -->



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
    </div>
    <!-- START footer -->
      <?php include_once("footer.php");?>
    <!-- END footer -->        

  
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
      <?php include_once("notificationSideBar.php");?>
    <!-- END Notification Sidebar-->
      <?php include_once("loadfilesjs.php");?>  
</body>
</html>