          <!-- Admin Form  start -->
<div class="col-md-12" >
            <div class="card">
              <div class="card-header">
          <h4 class="card-title" id="basic-layout-form">Admin Details</h4>
         
        </div>
              <div class="card-body">
                <div class="px-3">
                  <form class="form">
                    <!-- form body start -->
                    <div class="form-body">

                      <div class="form-group">
                        <label for="timesheetinput1">First Name :</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="timesheetinput1" class="form-control"  name="employeename" placeholder="first name" required >
                              <div class="form-control-position">
                              <i class="ft-user"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="timesheetinput1">Last Name :</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="txtFirstName" class="form-control"  name="txtFirstName" placeholder="Last name" required>
                              <div class="form-control-position">
                              <i class="ft-user"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="userinput5">Email :</label>
                         <div class="position-relative has-icon-left">
                          <input class="form-control border-primary" type="email"  id="userinput5" placeholder="E-mail " required>
                           <div class="form-control-position">
                              <i class="ft-at-sign"></i>
                            </div>
                           </div>
                      </div>

                      <div class="form-group">
                        <label for="timesheetinput2">Password :</label>
                          <div class="position-relative has-icon-left">
                            <input type="Password" name="Password" class="form-control" placeholder="Password (Minimum 6 digit....)" minlength="6" required>
                              <div class="form-control-position">
                              <i class="fa fa-unlock-alt"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="timesheetinput2">Confirm Password :</label>
                          <div class="position-relative has-icon-left">
                            <input type="Password" name="txtCPassword" class="form-control" placeholder="Repeat Password.."  data-validation-match-match="Password" required >
                              <div class="form-control-position">
                              <i class="fa fa-unlock-alt"></i>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="userinput5">Contact No :</label>
                         <div class="position-relative has-icon-left">
                          <input class="form-control border-primary" type="text"  id="userinput5" placeholder="ContactNo" pattern="[0-9]{10}">
                           <div class="form-control-position" data-validation-pattern-message="Must enter 10 digit only">
                              <i class="fa fa-phone"></i>
                            </div>
                           </div>
                      </div>

                    <div class="form-group">
                      <label>Gender :</label>
                        <div class="input-group">
                          <label class="display-inline-block custom-control custom-radio ml-1">
                            <input type="radio" name="customer1" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description ml-0">Male</span>
                          </label>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="customer1" checked class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description ml-0">FeMale</span>
                          </label>
                        </div>
                    </div>
                      
                    </div>
              <!-- form body end -->


              <!-- form button start -->
                <div class="text-right">
                  <button type="submit" class="btn btn-success">Submit <i class="fa fa-thumbs-o-up position-right"></i></button>
                  <button type="reset" class="btn btn-danger">Reset <i class="fa fa-refresh position-right"></i></button>
                </div>
            </form>

          </div>
        </div>
      </div>
</div>

<!-- Admin Form  End -->


<!-- Admin List table start -->
      <section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Action Buttons</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <table class="table table-responsive text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>IsInsert</th>
                                    <th>IsUpdate</th>
                                    <th>IsDelete</th>
                                    <th>IsSuper</th>
                                    <th>IsActive</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <label class="custom-control custom-checkbox m-0">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>John</td>
                                    <td>Carter</td>
                                    <td>johncarter@mail.com</td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td>
                                        <a class="info p-0" data-original-title="" title="">
                                            <i class="ft-user font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="success p-0" data-original-title="" title="">
                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="danger p-0" data-original-title="" title="">
                                            <i class="ft-x font-medium-3 mr-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <label class="custom-control custom-checkbox m-0">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>Peter</td>
                                    <td>Parker</td>
                                    <td>peterparker@mail.com</td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td>
                                        <a class="info p-0" data-original-title="" title="">
                                            <i class="ft-user font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="success p-0" data-original-title="" title="">
                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="danger p-0" data-original-title="" title="">
                                            <i class="ft-x font-medium-3 mr-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <label class="custom-control custom-checkbox m-0">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>John</td>
                                    <td>Rambo</td>
                                    <td>johnrambo@mail.com</td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td><span class="fa fa-check" style="font-size:25px;color: green"></span></td>
                                    <td>
                                        <a class="info p-0" data-original-title="" title="">
                                            <i class="ft-user font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="success p-0" data-original-title="" title="">
                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="danger p-0" data-original-title="" title="">
                                            <i class="ft-x font-medium-3 mr-2"></i>
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
</section>
<!-- Admin List table End -->