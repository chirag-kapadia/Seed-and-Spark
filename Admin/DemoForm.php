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

       			          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="px-3">
                  <form class="form">
                    <!-- form body start -->
                    <div class="form-body">
                      
                      <div class="form-group">
                        <label for="timesheetinput1">Employee Name</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="timesheetinput1" class="form-control"  name="employeename">
                              <div class="form-control-position">
                              <i class="ft-user"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="timesheetinput2">Project Name</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="timesheetinput2" class="form-control"  name="projectname">
                              <div class="form-control-position">
                              <i class="fa fa-briefcase"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="timesheetinput3">Date</label>
                          <div class="position-relative has-icon-left">
                            <input type="date" id="timesheetinput3" class="form-control" name="date">
                              <div class="form-control-position">
                                <i class="ft-message-square"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="issueinput5">Priority</label>
                          <select id="issueinput5" name="priority" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <label>Rate Per Hour</label>
                          <div class="input-group">
                            <span class="input-group-addon">$</span>
                              <input type="text" class="form-control"  aria-label="Amount (to the nearest dollar)" name="rateperhour">
                            <span class="input-group-addon">.00</span>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="timesheetinput5">Start Time</label>
                              <div class="position-relative has-icon-left">
                                <input type="time" id="timesheetinput5" class="form-control" name="starttime">
                                  <div class="form-control-position">
                                  <i class="ft-clock"></i>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="timesheetinput6">End Time</label>
                              <div class="position-relative has-icon-left">
                                <input type="time" id="timesheetinput6" class="form-control" name="endtime">
                                  <div class="form-control-position">
                                  <i class="ft-clock"></i>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Existing Customer</label>
                          <div class="input-group">
                            <label class="display-inline-block custom-control custom-radio ml-1">
                              <input type="radio" name="customer1" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description ml-0">Yes</span>
                            </label>
                            <label class="display-inline-block custom-control custom-radio">
                              <input type="radio" name="customer1" checked class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description ml-0">No</span>
                            </label>
                          </div>
                      </div>

                      <div class="form-group">
                        <label>Select File</label>
                          <input type="file" class="form-control-file" id="projectinput8">
                      </div>

                      <div class="form-group">
                        <label for="timesheetinput7">Notes</label>
                          <div class="position-relative has-icon-left">
                            <textarea id="timesheetinput7" rows="5" class="form-control" name="notes" ></textarea>
                              <div class="form-control-position">
                              <i class="ft-file"></i>
                              </div>
                          </div>
                      </div>
                    </div>
              <!-- form body end -->


              <!-- form button start -->
              <div class="form-actions right">
                <button type="button" class="btn btn-raised btn-warning mr-1">
                  <i class="ft-x"></i> Cancel
                </button>
                <button type="button" class="btn btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              </div>
              <!-- form button End -->
            </form>

          </div>
        </div>
      </div>
    </div>

	</div>


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




