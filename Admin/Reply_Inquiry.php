

<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <!-- Load Files -->
  <?php include_once("Connection.php");?>
  <?php include_once("loadfiles.php");?>

  <!-- Load Files -->
</head>

<!-- Reply Code start -->
    <?php 

      $Select_Query="select * from tblInquiry where InquiryID='".$_REQUEST['CID']."'";
      $Exe_Query=mysqli_query($con,$Select_Query) or die(mysqli_error($con));
      $Fetch=mysqli_fetch_array($Exe_Query);
                      
                      
      if(isset($_REQUEST['btnSend']))
      {
        //echo $_REQUEST['txtAnswer'];
         $msg = $_REQUEST['txtAnswer'];
          // use wordwrap() if lines are longer than 70 characters
          $msg1 = strip_tags($msg);
          //$Email=$fetchData['Email'];
          $Email=$Fetch['Email'];
          //echo$Email;
          $Done=mail("$Email","Seed & Spark",$msg1);
          //echo $Done;
          if($Done)
          {
            echo"<script> alert('Email Send Successfull');</script>";
            //$dt=date('dFYh:i:s');
            $Update_Query="update tblInquiry set  Reply='".$_REQUEST['txtAnswer']."',RepliedOn=now(),IsReplied=1,RepliedBy='".$_SESSION['FirstName'].' '.$_SESSION['LastName']."' where InquiryID='".$_REQUEST['CID']."'";
            //echo $Update_Query;
            $Exe_Update=mysqli_query($con,$Update_Query) or die(mysql_error($con));
            header("location:Inquiry.php");
          }             
      }
    ?>
<!-- Reply Code end -->


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
                  <a href="Fund.php" class="danger" data-original-title="" title="">
                      <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
                  </a>
        <!-- Back Redirection Link End -->
      <!-- Inquiry Reply Start -->
      <section id="configuration">
        
             <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4 class="card-title">News letter</h4>
                  </div> -->
                  <div class="card-body">
                    <div class="card-block">
                      
                      <!--  -->
                      <form method="post">
                      <div class="modal-header bg-success white" style="width:100%">
                        <h4 class="modal-title" id="myModalLabel9">Reply</h4>
                      </div>
                      <div class="modal-body">
                          <h5>To:</h5>
                          <p><?php echo $Fetch['Email'];
                                  $Email=$Fetch['Email'];
                           ?></p>
                          <hr>
                          <h5>Subject</h5>
                            <p><?php echo $Fetch['Subject']; ?></p>
                              <fieldset class="form-group floating-label-form-group">
                                <label for="title1">Answer:</label>
                                   <textarea name="txtAnswer" class="form-control" id="title1" rows="3" placeholder="Answer"></textarea>
                              </fieldset>
                              <br>
                          <button name="btnSend" type="submit" class="btn btn-outline-primary">Send</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <!--  -->
       
      </section>
    <!--/ ContactUs Reply End -->
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