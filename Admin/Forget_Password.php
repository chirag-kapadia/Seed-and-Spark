 <!-- Load Files -->
      <?php include_once("Connection.php");?>
      <?php include_once("loadfiles.php");?>
      <?php include_once("loadfilesjs.php");?>  
  <script type="text/javascript">
    function alerterror()
    {
      var msg="";
      //alert("Hello");
      if(document.forms["forgetForm"]["txtForgetEmail"].value=="")
      {
          
        alert("Please Enter Email Address");
        return false;
          
      }
      if(document.getElementById("lblForPass").innerText=="PLEASE CHECK EMAIL.")
      {
      
        //alert("Hello");
        alert(msg+="Please Check Email.");
        return false;
      
      }

    
    return true;
  }
  </script><!-- Load Files -->
  <script type="text/javascript">
      function EmailCheck(Email) 
{
  var xhttp = new XMLHttpRequest();
  var Url = "Forgetfindemail.php?EID="+Email;
  //alert(Url);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("lblForPass").innerHTML = this.responseText;
     
    }
  };
  xhttp.open("GET", Url, true);
  xhttp.send();
}

  </script>
  
  <?php
    if(isset($_REQUEST['btnsubmit']))
    {
      $select="select Password from tbladmin where Email='".$_REQUEST['txtForgetEmail']."'";
        //echo $select;
        $select_qry=mysqli_query($con,$select);
        //echo $select_qry;
         $res=mysqli_fetch_array($select_qry);
          $Password=base64_decode($res['Password']);
          $to=$_REQUEST['txtForgetEmail'];
          $subject = "Forget Password";   
          $message = " We have sent your Password Below. \n Email : ".$_REQUEST['txtForgetEmail']."\n Password : ".$Password;
          $from = "seedandspark1@gmail.com";
          $headers = "From:" . $from;
          $set=mail($to,$subject,$message,$from);
        header("location:index.php");
    }
    if(isset($_REQUEST['btnCancel']))
    {
      header("location:index.php");
    }
  ?>
<!--Forgot Password Starts-->
<section>
    <div class="container-fluid gradient-red-pink">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card bg-blue-grey bg-darken-3 px-4">
                    <div class="card-header">
                        <div class="card-image text-center">
                            <i class="icon-key font-large-5 blue-grey lighten-4"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <div class="text-center">
                                <h4 class="text-uppercase text-bold-400 white">Forgot Password</h4>
                            </div>
                            <form class="pt-4" method="post" name="forgetForm">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="txtForgetEmail" id="txtForPass" placeholder="Your Email Address" onblur = "EmailCheck(this.value);" >
                                    <label id="lblForPass" style="color: white;"></label>
                                   
                                </div>
                                
                                <div class="form-group pt-2">
                                    <div class="text-center mt-3">
                                        <button type="Submit"  class="btn btn-danger btn-raised btn-block" name="btnsubmit" onclick="return alerterror();" >Submit</button>
                                        <button type="Submit" class="btn btn-secondary btn-raised btn-block" name="btnCancel">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="card-footer bg-blue-grey bg-darken-3">
                            <div class="float-left white"><a href="Login.php">Login</a></div>
                            <div class="float-right white">New User? <a href="Register.php">Register Now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Forgot Password Ends-->