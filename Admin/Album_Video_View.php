<!DOCTYPE html>
<html lang="en" class="loading">

<head>  
  <!-- Load Files -->
  <?php include_once("Connection.php");?>
  <?php include_once("loadfiles.php");?> 

</head>

<!--  -->
  <?php
    if(isset($_REQUEST["upi"]))
    {
      $strUp="update tblVideo set IsDefault=0 where ProjectID=".$_SESSION['ProjectID'];
      mysqli_query($con,$strUp) or die(mysqli_error($con));
      $upimg="update tblVideo set IsDefault='".$_REQUEST["upi"]."' where VideoID='".$_REQUEST["PIID"]."'";
      mysqli_query($con,$upimg) or die(mysqli_error($con));
    }


    //Add new Video
  /*  if(isset($_REQUEST["btnAddVideo"]))
    {
      foreach($_FILES["txtaddvideo"]["name"] as $key => $a ) 
      {
        $fname=$_FILES['txtaddvideo']['name'][$key]; 
        $inimg="insert into tblVideoAlbum values(Null,'$fname','".$_SESSION["AlbumID"]."',0)";  
        //echo "aaaaaaaaaaaaaaaa".$fname;
        //echo $inimg;  
        mysqli_query($con,$inimg);
        move_uploaded_file($_FILES['txtaddvideo']['tmp_name'][$key],"Project/video/".$fname);  
      } 
    }*/


      // delete image 
      if(isset($_REQUEST["DelID"]))
      {
        $Sel_img="select * from tblVideo where VideoID='".$_REQUEST['DelID']."'";
        $Exe_img=mysqli_query($con,$Sel_img) or die(mysqli_error($con));
        while ($Fetch_img=mysqli_fetch_array($Exe_img)) 
        {
          if(file_exists('Project/video/'.$Fetch_img['VideoName']))
          {
            unlink("Project/video/".$Fetch_img['VideoName']);
          }
        }
        $delete_img="delete from tblVideo where VideoID='".$_REQUEST['DelID']."'";
        mysqli_query($con,$delete_img) or die(mysqli_error($con));
        /*echo "aaaaaaaaaaaaaa".$_REQUEST["DelID"];*/
        
      }

  ?>
<!--  -->

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
              <a href="Video.php" class="danger" data-original-title="" title="">
                  <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
              </a>
            <!-- Back Redirection Link End -->

            <!-- Album List table Start -->
            <section id="configuration">
              <div class="row">                
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                     

                       <!-- Php Select Query Album Name start -->
                            <?php       
                              $select_Query="select * from tblProject where ProjectID='".$_SESSION['ProjectID']."' ";
                              $Exe=mysqli_query($con,$select_Query) or die(mysqli_error($con));
                              $Fetch=mysqli_fetch_array($Exe);
                            ?>
                          <!-- Php Select Query Album Name End -->
                      <h4 class="card-title">Video's of <b><u><?php echo $Fetch['ProjectTitle']?></u></b> Project</h4>
                    </div>
                    <!-- Add Image start-->
                     <?php 
                        if($_SESSION['IsInsert']==1 || $_SESSION['IsSuper']==1)
                        {
                      ?>
                      <!-- <div class="text-left">
                       <form method="post" enctype="multipart/form-data">
                        <div class="col-xl-12 col-lg-12 col-md-12" style="margin-left: 100px;">
                          <div class="row">
                            <div class="col-md-8">
                              <fieldset class="form-group">
                                <label for="file">With Browse button :</label>
                                <label class="custom-file center-block d-block">
                                  
                                  <input type="file" name="txtaddvideo[]" class="form-control-file" id="basicInputFile" multiple="multiple" accept=".mp4, .webm, .mkv, .avi">
                                  <span class="custom-file-control"></span>
                                </label>
                              </fieldset>
                            </div>
                            <div class="col-md-4">
                                
                              <button type="submit" name="btnAddVideo" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" style="margin-left: 30px;margin-top: 33px;">Add Video <i class="fa ft-plus-square position-right"></i></button>
                            
                            </div>
                          </div>                  
                        </div>
                          </form> -->
                        <!-- <div class="form-group">
                          <label>Add Video:</label>
                          <div class="row">
                            <div class="col-md-8">
                              
                              <input type="file" name="addimg[]" class="form-control" multiple="multiple"><br>
                            </div>
                            <div class="col-md-2">
                              <input type="submit" name="btnDone" value="Done / Add" class="btn btn-success">
                            </div>
                          </div>
                        </div>  --> 
                      <!-- </div>  -->
                      <?php
                        }
                      ?>
                          
                    <!-- Add Image end -->
                    <div class="card-body collapse show">
                      <div class="card-block card-dashboard">
                        <table class="table zero-configuration" >
                          <thead >
                            <tr>                                    
                              <!-- <th></th> -->
                              <th>Video</th>                                                               
                              <th>Default</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                        <tbody >
                          <!-- Php Select Query Album list start -->
                            <?php       
                              $sr="select * from tblVideo where ProjectID='".$_SESSION['ProjectID']."' ";
                              $res=mysqli_query($con,$sr) or die(mysqli_error($con));
                              while($ans=mysqli_fetch_array($res))
                              {
                            ?>
                          <!-- Php Select Query Album list End -->
                  
                          <tr>                                    
                            <!-- <td id="avv">
                              <label class="custom-control custom-checkbox m-0">
                                <input type="checkbox" class="custom-control-input">
                                  <span class="custom-control-indicator" ></span>
                              </label>
                            </td> -->
                            <td>
                                <?php
                                  $VideoName=$ans['VideoName'];
                                  if($VideoName=="" || !file_exists("Project/video/$VideoName"))
                                  {
                                    $VideoName="no.png";
                                  }
                                ?>
                               
                                    <video controls="" class="ql-video ql-align-center" src="Project/video/<?php echo $VideoName;?>" style="height:500px;width: 500px;" ></video>                      
                                
                              </td>
                            <td>
                              <?php if($ans["IsDefault"]==1)
                                {
                              ?>
                                <a href="?PIID=<?php echo $ans["VideoID"];?>&upi=0" >
                                  
                                  <span class="fa ft-check" style="font-size:25px;color: green"></span>
                                </a>
                              <?php
                                }
                                else
                                {
                              ?>
                                <a href="?PIID=<?php echo $ans["VideoID"];?>&upi=1" >
                                  
                                  <span class="fa ft-x" style="font-size:25px;color: red"></span>
                                </a>
                              <?php
                                }
                              ?>
                            </td>
                            <td id="avv">
                               
                                   <!-- Delete HyperLink Icon --> 
                                  <?php 
                                    if($_SESSION['IsDelete']==1 || $_SESSION['IsSuper']==1)
                                    {
                                  ?>
                                  <!-- <button onclick="Delete_Alert();" style="background:transparent;"> -->
                                  <a href="?DelID=<?php echo $ans['VideoID']?>" class="danger" data-original-title="" title="">
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
            <!--/ Album List table End -->

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

</body>
</html>

