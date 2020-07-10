 <link rel="apple-touch-icon" sizes="60x60" href="app-assets/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="app-assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="app-assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="app-assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/sweetalert2.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
 <head>
     <style type="text/css">
         #error{

         }
     </style>
 </head>
 <!-- Load Files -->
      <?php include_once("Connection.php");?>
      <?php include_once("loadfiles.php");?>
      
  <!-- Load Files -->


<!-- Php Login Code Admin -->
    <?php
        if(isset($_REQUEST['btnSubmit']))
        {
            $str="select * from tbladmin where Email='".$_REQUEST['txtLEmail']."' and Password='".base64_encode($_REQUEST['txtLPass'])."'";
            $rs=mysqli_query($con,$str) or die(mysqli_error());
            if(mysqli_num_rows($rs)>0)
            {
                $res=mysqli_fetch_array($rs);
                $_SESSION["AdminID"]=$res["AdminID"];
                $_SESSION["FirstName"]=$res["FirstName"];
                $_SESSION["LastName"]=$res["LastName"];
                $_SESSION["IsSuper"]=$res["IsSuper"];
                $_SESSION["IsInsert"]=$res["IsInsert"];
                $_SESSION["IsUpdate"]=$res["IsUpdate"];
                $_SESSION["IsDelete"]=$res["IsDelete"];
                $_SESSION['IsActive']=$res["IsActive"];
                if($_SESSION['IsActive']==1)
                {
                    header("Location:dashboard.php");
                }
                else
                {
            ?>
                     <script type="text/javascript" id="error">alert('You are Not Active By Seed & Spark');</script>
            <?php
                }
            }
            else
            {
    ?>
               <!--  <div class="col-sm-6 col-12">
                        <button type="button" class="btn btn-danger btn-raised btn-block mb-5" id="type-error" >Error</button>
                    </div> -->
                <script type="text/javascript" id="error">alert('Invalid Email / Password');</script>
    <?php
            }
        }
    ?>

<!-- End Php Login Code Admin -->




<!--Login Page Starts-->
<section id="login">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center" style="background-image: url('app-assets/img/.jpg');" >
                <div class="card gradient-indigo-purple text-center width-400" >
                    <div class="card-img overlap">
                        <img alt="element 06" class="mb-1" src="app-assets/img/portrait/avatars/avatar-08.png" width="190">
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <h2 style="color: white;">Login</h2>
                            <form method="post" action="#">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="txtLEmail" id="inputEmail" placeholder="Email"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="txtLPass" id="inputPass" placeholder="Password" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                <input type="checkbox" class="custom-control-input" >
                                                <!-- <span class="custom-control-indicator ml-4"></span>
                                                <span class="pl-2">Remember Me</span> -->
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                         <button type="Submit" name="btnSubmit" class="btn btn-pink btn-block btn-raised">Submit</button>
                                        <button type="button" class="btn btn-secondary btn-block btn-raised">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left"><a href="Forget_Password.php" style="color: white;">Recover Password ?</a></div>
                        <!-- <div class="float-right"><a href="Register.php">New User?</a></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include_once("loadfilesjs.php");?>  



<!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="app-assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="app-assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="app-assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="app-assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="app-assets/js/sweet-alerts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
<!--Login Page Ends