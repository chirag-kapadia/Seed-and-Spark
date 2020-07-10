<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <!-- Load Files -->
  <?php include_once("Connection.php");?>
  <?php include_once("loadfiles.php");?> 
  <?php include_once("loadfilesjs.php");?>
  <script type="text/javascript" src="../js/JavaScriptFunctions.js">
</script>
<script type="text/javascript">
  function frmValidate()
  {
    var msg="";
    if(document.getElementById("txtFName").value=="")
    {
      msg +="\nPlease Enter First Name";
      
    }
    if(document.getElementById("txtLName").value=="")
    {
      msg +="\nPlease Enter Last Name";
      
    }
    if(document.getElementById("txtEmail").value=="")
    {
      msg +="\nPlease Enter Email ID";
      
    }
    if(document.getElementById("txtPassword").value=="")
    {
      msg +="\nPlease Enter Password";
      
    }
    if(document.getElementById("txtContactNo").value=="")
    {
      msg +="\nPlease Enter Contact No";
      
    }
    if(document.getElementById("txtCPassword").value=="")
    {
      msg +="\nPlease Enter Correct Password";
      
    }

    
    if(msg!="")
    {
      alert(msg);
      return false;
    }
    return true;
  }
  /*Email validation*/
    function EmailCheck(Email) 
{
  var xhttp = new XMLHttpRequest();
  var Url = "findemail.php?EID="+Email;
  //alert(Url);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("lblEmail").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", Url, true);
  xhttp.send();
}
  /*End Email validation*/
</script>
  <!-- Load Files -->

  <!-- Email Existes JavaScript Start -->
     <!--  <script type="text/javascript">
    
        function ajax(value , page)
        {
          var req=new XMLHttpRequest();
          req.open("GET",page+"?value="+value,true);
          req.send();
          req.onreadystatechange=function(){
            if(req.readyState==4 && req.status==200)
            {
              var res=req.responseText;
              if(res)
              {
                document.getElementById("error").innerHTML="Email Already Exist..!!";
              }              
            }
          }
        }
      </script> -->
  <!-- Email Existes JavaScript End -->
</head>

<!-- PHP Add Admin start  -->
<?php
       if(isset($_REQUEST['btnSubmit']))
      {
        if(isset($_REQUEST['EID']))
        {
          $Update_Query="update tbladmin set FirstName='".$_REQUEST['txtFName']."', LastName='".$_REQUEST['txtLName']."', Gender='".$_REQUEST['rbtnGender']."',ContactNo='".$_REQUEST['txtContactNo']."',Email='".$_REQUEST['txtEmail']."' where AdminID='".$_REQUEST['EID']."'";
          $res1=mysqli_query($con,$Update_Query) or die(mysqli_error());
          header("location:Admin.php");
          //$ans1=mysqli_fetch_array($res1);
          //echo $ans1;                                        
        }
        else
        {
          $da=date("Ymdhis");
          $Insert_Query="insert into tbladmin values('Null','".$_REQUEST['txtFName']."','".$_REQUEST['txtLName']."','".$_REQUEST['rbtnGender']."','".$_REQUEST['txtContactNo']."','".$_REQUEST['txtEmail']."','".base64_encode($_REQUEST['txtPassword'])."',0,1,0,0,0,'".$da."','".$_SESSION['AdminID']."')";
          //echo $in;
          mysqli_query($con,$Insert_Query) or die(mysqli_error());          
          header("location:Admin.php");
        }        
      }  
?> 
<!-- PHP Add Admin End -->

<!-- Php Select Query Admin list start -->
    <?php       
      if(isset($_REQUEST['EID']))
      {
        $s1="select * from tbladmin where AdminID='".$_REQUEST['EID']."'";
        //$sr="select a.*,ap.IsDelete,ap.IsUpdate,ap.IsInsert from tbladmin a, tbladminpermission ap where a.AdminID=ap.AdminID";
        $res1=mysqli_query($con,$s1) or die(mysqli_error());
        $ans1=mysqli_fetch_array($res1);
        //echo $ans1;                                        
      }
    ?>
<!-- Php Select Query Admin list End -->

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
        <!-- Back Redirection Link Start -->
          <a href="Admin.php" class="danger" data-original-title="" title="">
              <i class="fa ft-arrow-left" style="font-size: xx-large;margin-left: 30px;"></i>
          </a>
        <!-- Back Redirection Link End -->

      <!-- Admin Form  start -->
      <div class="col-md-12" >
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Admin Details</h4>         
          </div>
          <div class="card-body">
            <div class="px-3">
              <form class="form" method="post">
                <!-- form body start -->
                <div class="form-body">

                  <div class="form-group">
                    <label for="timesheetinput1">First Name :</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="txtFName" onblur="ValidateControl('txtFName','lblFName','First Name')"; onkeypress="return CharsOnly(event);" class="form-control"  name="txtFName" value="<?php if(isset($ans1)) echo $ans1['FirstName']; ?>" placeholder="Enter First Name"  >
                      <div class="form-control-position">
                        <i class="ft-user"></i>
                      </div>
                    </div>
                    <label id="lblFName" style="color: red;"></label>
                  </div>

                  <div class="form-group">
                    <label for="timesheetinput1">Last Name :</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="txtLName" onblur="ValidateControl('txtLName','lblLName','Last Name')"; onkeypress="return CharsOnly(event);" class="form-control"  name="txtLName" value="<?php if(isset($ans1)) echo $ans1['LastName']; ?>" placeholder="Enter Last Name" >
                      <div class="form-control-position">
                        <i class="ft-user"></i>
                      </div>
                    </div>
                    <label id="lblLName" style="color: red;"></label>
                  </div>

                  <div class="form-group">
                    <label for="userinput5">Email :</label>
                    <div class="position-relative has-icon-left">
                      <input class="form-control border-primary" name="txtEmail" type="email"  id="txtEmail" onblur = "EmailCheck(this.value); ValidateControl('txtEmail','lblEmail1','Email');" onkeypress=" ValidateEmailID('txtEmail','lblEmail2');" value="<?php if(isset($ans1)) echo $ans1['Email']; ?>" placeholder="Enter E-mail" >
                      <div class="form-control-position">
                        <i class="ft-at-sign"></i>
                      </div>
                    </div>
                     <label id="lblEmail" style="color: red;"></label>
                     <label id="lblEmail1" style="color: red;"></label>
                     <label id="lblEmail2" style="color: red;"></label>
                    <!-- <div><p style="color: red; size: 14px;" id="error"></p></div> -->
                  </div>

                    <?php if(!isset($ans1)) 
                      {
                    ?>
                  <div class="form-group" >
                    <label for="timesheetinput2">Password :</label>
                    <div class="position-relative has-icon-left">
                      <input type="Password" name="txtPassword" id="txtPassword" onblur="ValidateControl('txtPassword','lblPassword','Password')"; value="<?php if(isset($ans1)) echo base64_decode($ans1['Password']);?>" class="form-control" placeholder="Enter Password (Minimum 6 digit....)" minlength="6" >
                      <div class="form-control-position">
                        <i class="fa fa-unlock-alt"></i>
                      </div>
                    </div>
                     <label id="lblPassword" style="color: red;"></label>
                  </div>

                  <div class="form-group" >
                    <label for="timesheetinput2">Confirm Password :</label>
                    <div class="position-relative has-icon-left">
                      <input type="Password" name="txtCPassword" id="txtCPassword" onblur="return ValidatePassword('txtPassword','txtCPassword','lblCPassword');return   ValidateControl('txtCPassword','lblCPassword','Confirm Password')"; class="form-control" value="<?php if(isset($ans1)) echo base64_decode($ans1['Password']);?>"  placeholder="Enter Re-enter Password.." data-validation-match-match="txtPassword"  >
                      <div class="form-control-position">
                        <i class="fa fa-unlock-alt"></i>
                      </div>
                    </div>
                     <label id="lblCPassword" style="color: red;"></label>
                  </div>
                  <?php } ?>
                  <div class="form-group">
                    <label for="userinput5">Contact No :</label>
                    <div class="position-relative has-icon-left">
                      <input class="form-control border-primary" name="txtContactNo" type="text"  id="txtContactNo" onblur="ValidateControl('txtContactNo','lblContactNo','Contact No ')"; onkeypress=" return NumbersOnly(event);" value="<?php if(isset($ans1)) echo $ans1['ContactNo']; ?>" placeholder="Enter Contact No" pattern="[0-9]{10}" maxlength="10">
                      <div class="form-control-position" data-validation-pattern-message="Must enter 10 digit only">
                        <i class="fa fa-phone"></i>
                      </div>
                    </div>
                    <label id="lblContactNo" style="color: red;"></label>
                  </div>

                  <div class="form-group">
                    <label>Gender :</label>
                    <div class="input-group">
                      <label class="display-inline-block custom-control custom-radio ml-1">
                        <input type="radio" name="rbtnGender" value="M" class="custom-control-input" required="" <?php if( isset($ans1) && $ans1["Gender"]=='M') echo 'checked="checked"'?>>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description ml-0">Male</span>
                      </label>
                      <label class="display-inline-block custom-control custom-radio">
                        <input type="radio" name="rbtnGender" value="F" class="custom-control-input" required="" <?php if( isset($ans1) && $ans1["Gender"]=='F') echo 'checked="checked"'?>>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description ml-0">FeMale</span>
                      </label>
                    </div>
                  </div>
                    
                   <!--  <div class="form-group">
                      <label>Permission :</label>
                      <div class="input-group">
                        <label class="display-inline-block custom-control custom-checkbox ml-1">
                          
                          <input type="checkbox" name="chkInsert" value="1" class="custom-control-input" <?php if( isset($ans1) && $ans1["IsInsert"]==1) echo 'checked="checked"'?>>
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description ml-0">Insert</span>
                        </label>
                        <label class="display-inline-block custom-control custom-checkbox">
                          
                           <input type="checkbox" name="chkUpdate" value="1" class="custom-control-input" <?php if( isset($ans1) && $ans1["IsUpdate"]==1) echo 'checked="checked"'?>>
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description ml-0">Update</span>
                        </label>
                        <label class="display-inline-block custom-control custom-checkbox">
                          <input type="checkbox" name="chkDelete" value="1" class="custom-control-input" <?php if( isset($ans1) && $ans1["IsDelete"]==1) echo 'checked="checked"'?>>
                          
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description ml-0">Delete</span>
                        </label>
                      </div>
                    </div> -->

                </div>
                <!-- form body end -->

                <!-- form button start -->
                <div class="text-right">
                  <button type="submit" name="btnSubmit" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" onclick="return frmValidate();">Submit <i class="fa fa-thumbs-o-up position-right"></i></button>
                  <button type="reset" class="btn btn-raised gradient-pomegranate white big-shadow">Reset <i class="fa fa-refresh position-right"></i></button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- Admin Form  End -->
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









