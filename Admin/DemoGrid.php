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
            <!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Zero configuration</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <p class="card-text">DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</p>
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                    <th>IsActive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-trash-o" style="color: red;font-size: 25px;"></span><span class="fa fa-tags" style="color: yellow;font-size: 25px;"></span><span class="fa fa-search-plus" style="color: teal;font-size: 25px;"></span></td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                              <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-trash-o" style="color: red;font-size: 25px;"></span><span class="fa fa-tags" style="color: yellow;font-size: 25px;"></span><span class="fa fa-search-plus" style="color: teal;font-size: 25px;"></span></td>
                                </tr>                                
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Zero configuration table -->
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