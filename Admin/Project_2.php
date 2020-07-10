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

            <!-- Project List table Start -->
               <!-- <section id="configuration">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4 class="card-title">Project</h4>
                              </div>
                              <div class="card-body collapse show col-lg-12">
                                  <div class="card-block card-dashboard">
                                      
                                      <table class="table table-responsive zero-configuration">
                                          <thead>
                                              <tr>
                                                  
                                                  <th></th>
                                                  <th>Name</th>                          
                                                  <th>Email</th>
                                                  <th>Active</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  
                                                  <td>
                                                      <label class="custom-control custom-checkbox m-0">
                                                          <input type="checkbox" class="custom-control-input">
                                                          <span class="custom-control-indicator"></span>
                                                      </label>
                                                  </td>
                                                  <td>Tiger Nixon</td>
                                                  <td>johncarter@mail.com</td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                                  <td>
                                                      <a class="info p-0" data-original-title="" title="">
                                                          <i class="ft-user font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="success p-0" data-original-title="" title="">
                                                          <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="danger" data-original-title="" title="">
                                           <i class="ft-trash font-medium-3"></i>
                                        </a>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  
                                                  <td>
                                                      <label class="custom-control custom-checkbox m-0">
                                                          <input type="checkbox" class="custom-control-input">
                                                          <span class="custom-control-indicator"></span>
                                                      </label>
                                                  </td>
                                                  <td>Garrett Winters</td>
                                                  <td>johncarter@mail.com</td>
                                                  <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                            
                                                   <td>
                                                      <a class="info p-0" data-original-title="" title="">
                                                          <i class="ft-user font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="success p-0" data-original-title="" title="">
                                                          <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                      </a>
                                                      <a class="danger" data-original-title="" title="">
                                           <i class="ft-trash font-medium-3"></i>
                                        </a>
                                                  </td>
                                              </tr>                               
                                          </tbody>                            
                                      </table>                        
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>  -->
              <!--/ Project List table End -->

              <!-- Horizontal cards start -->
            <section id="horizontal-examples">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <div class="content-header">[Category_Name] Projects </div>
                        <p class="content-sub-header">Cards with horizontal image.</p>
                    </div>
                </div>

                <div class="row match-height">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card horizontal">
                            <div class="card-body">
                                <div class="card-img">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img src="app-assets/img/photos/01.jpg" class="d-block w-100" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/02.jpg" class="d-block w-100" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/03.jpg" class="d-block w-100" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-stacked align-self-center">
                                    <div class="px-3">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Sweet halvah dragée jelly-o halvah carrot cake oat cake.</p>
                                        <!-- Progress fund start -->
                                          <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width:100%">100%
                                            </div>
                                          </div>
                                        <!-- Progress fund start -->

                                        <!-- Read More Button Start -->
                                          <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                            <!-- <span class="float-left">3 hours ago</span> -->
                                            <span class="float-right">
                                              <a  href="View_Project.php" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                                            </span>
                                          </div>
                                        <!-- Read More Button End -->
                                        <!-- <a class="btn btn-raised btn-success">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12">
                        <div class="card horizontal">
                            <div class="card-body">
                                <div class="card-img">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img src="app-assets/img/photos/01.jpg" class="d-block w-100" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/02.jpg" class="d-block w-100" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/03.jpg" class="d-block w-100" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-stacked align-self-center">
                                    <div class="px-3">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Sweet halvah dragée jelly-o halvah carrot cake oat cake.</p>
                                        <!-- Progress fund start -->
                                          <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="30" aria-valuemin="30" aria-valuemax="100" style="width:30%">30%
                                            </div>
                                          </div>
                                        <!-- Progress fund start -->

                                        <!-- Read More Button Start -->
                                          <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                            <!-- <span class="float-left">3 hours ago</span> -->
                                            <span class="float-right">
                                              <a  href="View_Project.php" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                                            </span>
                                          </div>
                                        <!-- Read More Button End -->
                                        <!-- <a class="btn btn-raised btn-success">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12">
                        <div class="card horizontal">
                            <div class="card-body">
                                <div class="card-img">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img src="app-assets/img/photos/01.jpg" class="d-block w-100" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/02.jpg" class="d-block w-100" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/03.jpg" class="d-block w-100" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-stacked align-self-center">
                                    <div class="px-3">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Sweet halvah dragée jelly-o halvah carrot cake oat cake.</p>
                                        <!-- Progress fund start -->
                                          <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="80" aria-valuemax="100" style="width:80%">80%
                                            </div>
                                          </div>
                                        <!-- Progress fund start -->

                                        <!-- Read More Button Start -->
                                          <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                            <!-- <span class="float-left">3 hours ago</span> -->
                                            <span class="float-right">
                                              <a  href="View_Project.php" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                                            </span>
                                          </div>
                                        <!-- Read More Button End -->

                                        <!-- <a class="btn btn-raised btn-success">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12">
                        <div class="card horizontal">
                            <div class="card-body">
                                <div class="card-img">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img src="app-assets/img/photos/01.jpg" class="d-block w-100" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/02.jpg" class="d-block w-100" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/03.jpg" class="d-block w-100" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-stacked align-self-center">
                                    <div class="px-3">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Sweet halvah dragée jelly-o halvah carrot cake oat cake.</p>
                                        <!-- Progress fund start -->
                                          <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="90" aria-valuemin="90" aria-valuemax="100" style="width:90%">90%
                                            </div>
                                          </div>
                                        <!-- Progress fund start -->

                                        <!-- Read More Button Start -->
                                          <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                            <!-- <span class="float-left">3 hours ago</span> -->
                                            <span class="float-right">
                                              <a  href="View_Project.php" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                                            </span>
                                          </div>
                                        <!-- Read More Button End -->
                                        <!-- <a class="btn btn-raised btn-success">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12">
                        <div class="card horizontal">
                            <div class="card-body">
                                <div class="card-img">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img src="app-assets/img/photos/01.jpg" class="d-block w-100" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/02.jpg" class="d-block w-100" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/03.jpg" class="d-block w-100" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-stacked align-self-center">
                                    <div class="px-3">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Sweet halvah dragée jelly-o halvah carrot cake oat cake.</p>
                                        <!-- Progress fund start -->
                                          <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width:60%">60%
                                            </div>
                                          </div>
                                        <!-- Progress fund start -->

                                        <!-- Read More Button Start -->
                                          <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                            <!-- <span class="float-left">3 hours ago</span> -->
                                            <span class="float-right">
                                              <a  href="View_Project.php" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                                            </span>
                                          </div>
                                        <!-- Read More Button End -->

                                        <!-- <a class="btn btn-raised btn-success">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12">
                        <div class="card horizontal">
                            <div class="card-body">
                                <div class="card-img">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img src="app-assets/img/photos/01.jpg" class="d-block w-100" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/02.jpg" class="d-block w-100" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="app-assets/img/photos/03.jpg" class="d-block w-100" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-stacked align-self-center">
                                    <div class="px-3">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Sweet halvah dragée jelly-o halvah carrot cake oat cake.</p>
                                        <!-- Progress fund start -->
                                          <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="10" aria-valuemin="10" aria-valuemax="100" style="width:10%">10%
                                            </div>
                                          </div>
                                        <!-- Progress fund start -->

                                        <!-- Read More Button Start -->
                                          <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                            <!-- <span class="float-left">3 hours ago</span> -->
                                            <span class="float-right">
                                              <a  href="View_Project.php" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                                            </span>
                                          </div>
                                        <!-- Read More Button End -->
                                        <!-- <a class="btn btn-raised btn-success">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- <div class="col-xl-6 col-lg-12">
                        <div class="card horizontal">
                            <div class="card-body">
                                <div class="card-stacked align-self-center">
                                    <div class="px-3">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Toffee sugar plum brownie pastry gummies jelly.</p>
                                        <a class="btn btn-raised btn-danger">Go somewhere</a>
                                    </div>
                                </div>
                                <div class="card-img">
                                    <img class="card-img-top img-fluid" src="app-assets/img/photos/06.jpg" alt="Card image cap">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
          <!-- // Horizontal cards end -->



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