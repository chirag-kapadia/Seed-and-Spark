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
       <div class="content-wrapper" >
              <!-- Research Start -->
              <!--Gallery Hover Effect Starts-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header">Categories</div>                    
                </div>
            </div>            

            <section id="hover-effects" class="card">
              <div class="card-body">
                <div class="card-block my-gallery" itemscope itemtype="http://schema.org/ImageGallery">                    
                  <div class="grid-hover">                    
                    <div class="row" >    
                      <!-- Select Categories In ExpertArea Table Start -->
                      <?php

                        $Select_Query="select * from tblExpertArea";
                        $SelExe=mysqli_query($con,$Select_Query) or die(mysqli_error());
                        while($Fetch=mysqli_fetch_array($SelExe))
                        {
                      ?>
                      <!-- Select Categories In ExpertArea Table End -->
                      
                      <div class="col-md-4 col-12" >  
                        <h5 class="text-bold-400 text-uppercase"><?php echo $Fetch['AreaName'];?></h5>                      
                      <a href="Project_List.php?ExpertID=<?php echo $Fetch['ExpertAreaID']; ?>">
                        <figure class="effect-layla" id="Category_Card" >
                          <img src="Project/ExpertArea/<?php echo $Fetch['AreaImage'];?>" />
                          <figcaption>
                              <h2><?php echo $Fetch['AreaName'];?>
                              <span>Projects</span>
                              </h2>
                            <!-- <p>When Layla appears, she brings an eternal summer along.</p> -->
                            
                          </figcaption>
                        </figure>                      
                      </a>
                      </div>
                    
                      <?php
                        }
                      ?> 
                    </div>
                  </div>                
                </div>
              </div>
            </section>
            

            <!-- Research End -->

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
    
  </body>
</html>