<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <!-- Load Files -->
  <?php include_once("Connection.php");?>
  <?php include_once("loadfiles.php");?>
  <!-- Load Files -->
  <script type="text/javascript">
    
    function getCMSDetail(CMSID)
    {
      var xhttp = new XMLHttpRequest();    
      var strURL="findCMS.php?CMSID="+CMSID;     
      //alert(strURL);
      xhttp.onreadystatechange = function() 
      {    
        if (this.readyState == 4 && this.status == 200) 
        {
          /*alert(this.responseText);*/
          /*document.getElementById("editor1").value = this.responseText;*/
          CKEDITOR.instances['editor1'].setData(this.responseText);
        }
      };
      /*var editor = CKEDITOR.instances['editor1'];*/
      /*CKEDITOR.instances['editor1'].setData(this.responseText);
      editor.setData(this.responseText);*/
      xhttp.open("GET", strURL, true);
      xhttp.send();
    }
  </script>
</head>
<script src="ckeditor/ckeditor/ckeditor.js"></script>
  <script src="ckeditor/ckeditor/samples/js/sample.js"></script>
  <link rel="stylesheet" href="ckeditor/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="ckeditor/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

<?php

  if(isset($_REQUEST['btnAddNewCms']))
  {
    $Insert_Cms="insert into tblCms values('Null','".$_REQUEST['txtAddNewCms']."','".$_REQUEST['editor1']."',1,now())";
    mysqli_query($con,$Insert_Cms) or die(mysqli_error());          
          header("location:Cms.php");

  }
  if(isset($_REQUEST['btnDeleteCMS']))
  {
    $del="delete from tblCMS where CMSID='".$_REQUEST['cmbCMS']."'";
    //echo $del;
    mysqli_query($con,$del) or die(mysqli_error($con));
  }

  if(isset($_REQUEST['btnSave']))
  {
    if(isset($_SESSION["CMSID"]))
    {
      //echo "asasasasasasa".$_SESSION["CMSID"];
      $Insert_Cms="Update tblCms set Description='".strip_tags($_REQUEST['editor1'])."',CreatedOn=now() where CMSID='".$_SESSION["CMSID"]."'";
    mysqli_query($con,$Insert_Cms) or die(mysqli_error());          
          header("location:Cms.php");
    }
    

  }
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

      <div class="col-md-12" >
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">CMS Pages</h4>         
          </div>
          <div class="card-body">
            <div class="px-3">
              <form class="form">
                <!-- form body start -->
                <div class="form-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-10">
                        <label for="timesheetinput1">Add CMS :</label>
                        <div class="position-relative has-icon-left">
                          <input name="txtAddNewCms" type="text" id="timesheetinput1" class="form-control"  name="employeename" placeholder="Add New CMS"  >
                          <div class="form-control-position">
                            <i class="fa icon-note"></i>
                          </div>
                        </div>
                      </div>
                      <?php 
                    if($_SESSION['IsInsert']==1 || $_SESSION['IsSuper']==1)
                    {
                  ?>
                      <div class="col-md-2">                        
                        <button name="btnAddNewCms" type="submit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" style="margin-left: 10px;margin-top: 33px;">Add New CMS <i class="fa ft-plus-square position-right"></i></button>                          
                      </div>
                      <?php
                        }
                      ?>
                    </div>                   
                  </div>

                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row">
                      <div class="col-md-8">
                        <fieldset class="form-group">
                          <label for="customSelect">Select CMS Page :</label>
                          <select name="cmbCMS" onchange="getCMSDetail(this.value)" class="custom-select d-block w-100" id="customSelect">
                            <option selected>Open this select menu</option>
                            <?php
                            $select_qurey="select * from tblCms where IsActive=1";
                            $select_exe=mysqli_query($con,$select_qurey) or die(mysqli_error($con));
                            while ($fetch=mysqli_fetch_array($select_exe)) 
                            {
                                
                            
                          ?>
                            <option value="<?php echo $fetch['CMSID'];?>"><?php echo $fetch['PageName'];?></option>
                           <?php
                            }
                           ?>
                          </select>
                        </fieldset> 
                      </div>
                      <?php 
                    if($_SESSION['IsDelete']==1 || $_SESSION['IsSuper']==1)
                    {
                  ?>
                      <div class="col-md-4">
                        <button type="submit" name="btnDeleteCMS" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" style="margin-left: 30px;margin-top: 33px;">Delete CMS <i class="fa ft-trash-2 position-right"></i></button>
                      </div>
                      <?php
                        }
                      ?>
                    </div>                                                      
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- Editor Start -->      
            <form method="post" id="frm" enctype="multipart/form-data" >
            <section class="full-editor">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Editor</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-block">
                       
                        <div class="row">
                          <div class="mx-auto col-md-8">
                            <div id="full-wrapper">
                              <div id="full-container">
                                <textarea cols="80" id="editor1"  name="editor1" rows="10" >

                                </textarea>
                                <script>
                                  CKEDITOR.replace('editor1', {
                                    height: 260,
                                    width: 700,
                                  } );
                                </script>                                
                                <br>
                                <?php 
                    if($_SESSION['IsInsert']==1 || $_SESSION['IsSuper']==1 || $_SESSION['IsUpdate'])
                    {
                  ?>
                                 <div class="text-center">
                                  <button type="submit" name="btnSave" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover">Save <i class="fa ft-log-out position-right"></i></button>
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
          <!-- Editor End -->
        </div>
      </div>
    </div>
  </div>

                        <!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- START footer -->
                            <?php include_once("footer.php");?>
                            <!-- END footer -->  
                        <!-- START Notification Sidebar-->
                        <?php include_once("notificationSideBar.php");?>
                        <!-- END Notification Sidebar-->

                        <?php include_once("loadfilesjs.php");?> 
                      </body>

                      </html>
                      <!-- Snow Editor end -->
