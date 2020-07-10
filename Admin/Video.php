<!DOCTYPE html>
<html lang="en" class="loading">

<head>  
  <!-- Load Files -->
  <?php include_once("Connection.php");?>
  <?php include_once("loadfiles.php");?> 

</head>

<?php

  if(isset($_REQUEST['ProjectID']))
  {
    $_SESSION['ProjectID']=$_REQUEST['ProjectID'];
    header("location:Album_Video_View.php");
  }

    /* Update Perform on IsActive field Start*/
          if(isset($_REQUEST['UpActive']))
          {
            $up="update tblAlbum set IsActive='".$_REQUEST['UpActive']."' where AlbumID='".$_REQUEST['AID']."'";
            mysqli_query($con,$up);
          }
      /* Update Perform on IsActive field End*/



// delete image 
  /*if(isset($_REQUEST["btndelete"]))
  {
    $s1="select * from  where ProductID='".$_REQUEST['Del']."'";
    $res=mysqli_query($con,$s1) or die(mysqli_error($con));
    while ($rs=mysqli_fetch_array($res)) 
    {
      unlink("img/".$rs['ImageName']);
    }
    $de1="delete from tblproductImage where ProductID='".$_REQUEST['Del']."'";
    mysqli_query($con,$de1) or die(mysqli_error($con));
    
  }*/


      /* Delete on IsActive field Start*/
          if(isset($_REQUEST['DelID']))
          {
                $up="update tblAlbum set IsActive=0 where AlbumID='".$_REQUEST['DelID']."'";
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
          <div class="content-wrapper">

            <!-- Album List table Start -->
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
                        <!-- <a href="#">
                          <button type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" data-toggle="modal" data-target="#iconForm" >Add New Album <i class="fa ft-user-plus"></i></button>
                        </a> -->             
                            <!--  -->
                            <?php 
                              if(isset($_REQUEST['btnAdd']))
                              {
                                /*if(isset($_REQUEST["txtfileUpload"]))
                                {*/
                                  /*echo $_REQUEST['txtAlbumName'];*/
                                  $insert_Album="insert into tblAlbum values('Null','".$_REQUEST['txtAlbumName']."',1,1)";
                                  //echo $insert_Album;                                    
                                  $Exe_Album=mysqli_query($con,$insert_Album)or die(mysqli_error($con));
                                  //$albumid=mysqli_insert_id($con);
                                  //echo $albumid;

                                  /*foreach($_FILES["txtfileUpload"]["name"] as $key => $a ) 
                                  {
                                    $fname=$_FILES['txtfileUpload']['name'][$key]; 
                                    $inimg="insert into tblVideoAlbum values(Null,'$fname',$albumid,0)";  
                                    echo "aaaaaaaaaaaaaaaa".$fname;
                                    echo $inimg;  
                                    mysqli_query($con,$inimg);
                                    move_uploaded_file($_FILES['txtfileUpload']['tmp_name'][$key],"Album/".$fname);
                                  }*/
                                /*}*/
                                /*else
                                {
                                  echo "<script>alert('please select Video')</script>";
                                }*/
                              }
                            ?>
                            <!--  -->

                        <!-- Modal start-->
                          <div class="modal fade text-left" id="iconForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                     <h3 class="modal-title" id="myModalLabel34">Add Video Album</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                  </div>
                                  <form method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                       <label>Album Name: </label>
                                          <div class="form-group position-relative has-icon-left">
                                             <input name="txtAlbumName" type="text" placeholder="Album Name" class="form-control">
                                              <div class="form-control-position">
                                                <i class="fa fa-image font-large-1 line-height-1 text-muted icon-align"></i>
                                              </div>
                                          </div>

                                          <!-- <label>File: </label>
                                            <div class="form-group position-relative has-icon-left">
                                              <input name="txtfileUpload[]" type="file" class="form-control" multiple="multiple" accept=".mp4, .webm, .mkv, .avi"> -->
                                              <!-- <div class="form-control-position">
                                                <i class="fa fa-envelope font-medium-5 line-height-1 text-muted icon-align"></i>
                                              </div> -->
                                           <!--  </div> -->
                                    </div>
                              
                                    <div class="modal-footer">
                                      <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                                      <input name="btnAdd" type="submit" class="btn btn-outline-primary btn-lg" value="Add">
                                    </div>
                                  </form>
                                </div>
                            </div>
                          </div>
                        <!-- Modal end -->
                      </div> 
                      <?php
                        }
                      ?>
                     
                      <h4 class="card-title">Video Album </h4>
                </div>
                <div class="card-body collapse show">
                  <div class="card-block card-dashboard">
                    <table class="table zero-configuration" >
                      <thead >
                        <tr>                                    
                              <!-- <th></th> -->
                              <th>ProjectName</th>                                                              
                              <!-- <th>Active</th> -->
                              <th>Action</th>
                            </tr>
                          </thead>
                        <tbody >
                          <!-- Php Select Query Album list start -->
                            <?php       
                              $sr="select * from tblProject ";
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
                            <td><?php echo $ans['ProjectTitle'];?></td>
                                             
                            <!-- Active Hyperlink Icon -->
                            <!-- <td id="avv">
                              <?php if($ans['IsActive']==0)
                                  {
                                ?>
                                      <a href="?AID=<?php echo $ans['ProjectID']; ?>&UpActive=1">
                                        <span class="fa ft-x" style="font-size:25px;color: red"></span>
                                      </a> 
                                <?php
                                    } 
                                    else
                                    {
                                ?>
                                      <a href="?AID=<?php echo $ans['ProjectID']; ?>&UpActive=0"><span class="fa ft-check" style="font-size:25px;color: green"></span></a> 
                                <?php
                                    }
                                ?>                          
                            </td> -->
                            <td id="avv">
                                <!-- View Profile Hyperlink Icon -->
                                  <a class="info p-0" data-original-title="" title="" href="?ProjectID=<?php echo $ans['ProjectID']?>" >
                                    <i class="ft-eye font-medium-3 mr-2"></i>
                                  </a>                                 
                                   
                                   <!-- Delete HyperLink Icon --> 
                                  <?php 
                                    if($_SESSION['IsDelete']==1 || $_SESSION['IsSuper']==1)
                                    {
                                  ?>                                 
                                   <!--  <a href="?DelID=<?php echo $ans['ProjectID']?>" class="danger" data-original-title="" title="">
                                      <i class="ft-trash font-medium-3"></i>
                                    </a>  -->                               
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



