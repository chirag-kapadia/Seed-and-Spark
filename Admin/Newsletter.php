<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
  
  <!-- Load Files -->
      <?php include_once("Connection.php");?>
      <?php include_once("loadfiles.php");?>
  <!-- Load Files -->
<script src="ckeditor/ckeditor/ckeditor.js"></script>
  <script src="ckeditor/ckeditor/samples/js/sample.js"></script>
  <link rel="stylesheet" href="ckeditor/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="ckeditor/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

</head>




<!-- start -->

    <?php
    if(isset($_REQUEST['btnSend']))
    {
      // echo $_REQUEST['editor1'];
      //      exit;         

          $selectqry="select * from tblnewsletter where IsActve=1";
          $select=mysqli_query($con,$selectqry);
          while($fetchData=mysqli_fetch_array($select))
          {            
              $msg = $_REQUEST['editor1'];
              // use wordwrap() if lines are longer than 70 characters
             $msg1 = strip_tags($msg);
              //$Email=$fetchData['Email'];
              $Email=$fetchData['Email'];
              //echo $Email;
              $Done=mail("$Email","Seed & Spark",$msg1);
              //echo $Done;
              if($Done)
              {
                echo"<script> alert('Email Send Successfull');</script>";
              }             
          }
        }
   
          
    ?>
    
<!-- end -->
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
          <!-- Snow Editor start -->
          <form method="post" id="frm" enctype="multipart/form-data" >
            <section class="full-editor">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">News letter</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-block">
                       
                        <div class="row">
                          <div class="mx-auto col-md-8">
                            <div id="full-wrapper">
                              <div id="full-container">
                                <textarea cols="80" id="editor1" name="editor1" rows="10" >

                                </textarea>
                                <script>
                                  CKEDITOR.replace('editor1', {
                                    height: 260,
                                    width: 700,
                                  } );
                                </script>                                
                                <br>
                                <?php
                                  if($_SESSION['IsSuper']==1 || $_SESSION['IsInsert']==1)
                                  {
                                ?>
                                 <div class="text-center">
                                  <button type="submit" name="btnSend" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover">Send <i class="fa ft-log-out position-right"></i></button>
                                 </div>
                                <?php 
                              }
                              ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        </form>
      <!-- Snow Editor end -->
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