
<?php include_once("Admin/Connection.php");
	
	if(isset($_REQUEST['btnSubmit']))
	{	

		if($_SESSION['IsVerified']==1)
		{
		/*$insert_Fund="insert into tblFund values(null,'".$_REQUEST['ProjectID']."','".$_SESSION['UserID']."',now(),'".$_REQUEST['txtAmount']."','Investment',null)";
		$Exe_Fund=mysqli_query($con,$insert_Fund) or die(mysqli_error($con));*/
		$_SESSION['ProjectID']=$_REQUEST['ProjectID'];

		/*$Select_Fund1="select * from tblFund where ProjectID=".$_REQUEST['ProjectID'];
		$Exe_Fund1=mysqli_query($con,$Select_Fund1) or die(mysqli_error($con));
		$Fetch_Fund1=mysqli_fetch_array($Exe_Fund1);


		$Select_Fund="select sum(FundAmount) as FundAmount from tblFund where ProjectID=".$_REQUEST['ProjectID'];
		$Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
		$Fetch_Fund=mysqli_fetch_array($Exe_Fund);
		$sum=$Fetch_Fund['FundAmount'];
		$Target=$Fetch_Fund1['FundTarget'];
	    //$per=$sum/$Fetch_Project['FundTarget'];
	    //$FundLeft=$Fetch_Project['FundTarget']-$sum;
		$LeftAmount=$Target-$sum;								
			if($LeftAmount>=$_REQUEST['amount'])
			{
				//return false;
			}
			else
			{
				echo "<script>alert('Only echo $LeftAmount Remaining To achive Target ')</script>";
			}*/
		}
		else
		{
			echo "<script>alert('You Are Not Verified By Seed & Spark ')</script>";
		}

	}


  /*
   *  @author   Gopal Joshi
   *  @wesite   www.sgeek.org
   *  @about    PayUMoney Payment Gateway integration in PHP
   */
  //$merchant_key  = "6itBpfwk";
	//$salt          = "YjjSWOnny3";
  //$merchant_id   = 4951382;
	
  $merchant_key  = "gtKFFx";//"gtKFFx";
	$salt          = "eCwWELxi";
	$payu_base_url = "https://test.payu.in"; // For Test environment
	$action        = '';
	$currentDir	   = 'http://localhost/Seed&Spark/';
	$posted = array();
	if(!empty($_POST)) {
	  foreach($_POST as $key => $value) {    
	    $posted[$key] = $value; 
	  }
	}
	//print_r($posted["productinfo"]); 
	//$posted["productinfo"] = array()
	$formError = 0;
	if(empty($posted['txnid'])) {
	  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	} else {
	  $txnid = $posted['txnid'];
	}

	$hash         = '';
	$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

	if(empty($posted['hash']) && sizeof($posted) > 0) {
	  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
	  ){
	    $formError = 1;

	  } else {
	   	$hashVarsSeq = explode('|', $hashSequence);
	    $hash_string = '';	
		foreach($hashVarsSeq as $hash_var) {
	      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
	      $hash_string .= '|';
	    }
	    $hash_string .= $salt;
	    $hash = strtolower(hash('sha512', $hash_string));
	    $action = $payu_base_url . '/_payment';
	  }
	} elseif(!empty($posted['hash'])) {
	  $hash = $posted['hash'];
	  $action = $payu_base_url . '/_payment';
	}
?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:20:50 GMT -->
<head>
		<?php include_once("LoadFiles.php");?>
		<script type="text/javascript">
			function frmSubmit()
			{
				//alert("hello");
				// if(document.getElementById("lblCheckAmount").innerText.includes('Only')==true)
				// {
				// 	alert('Nai Cha');
				// 	return false;
				// }
				var h1=document.getElementById("hdn").value;
				var h2=document.getElementById("Amount").value;
				if(h2>=h1)
				{
					alert("Only Remaining To achive Target");
					return false;
				}
				
			}
			/*function frmSubmit()
			{
				alert('hello');
				
			}*/
function CheckAmount(Amount,$PID) 
{
				//alert("hello");
  var xhttp = new XMLHttpRequest();
  var Url = "AjaxChechAmount.php?AID="+Amount+"&PID="+$PID;
  //alert(Url);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	//alert(this.responseText);
     document.getElementById("lblCheckAmount").innerHTML = this.responseText;
      //document.getElementById("hdn").value = this.responseText;
    
  

    }
  };
  xhttp.open("GET", Url, true);
  xhttp.send();
}
</script>
		<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  
      
  </script>
	</head>
	
	<body onload="submitPayuForm()">
	<form action="<?php echo $action; ?>" method="post" name="payuForm" >
	
      <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    
		<div class="main-page-wrapper">

			<!-- Header _________________________________ -->
			<section class="header-section">
				<!-- Top Header -->
				<?php include_once("TopHeader.php");?>
				
				<!-- Top Header -->
				<?php include_once("MiddleHeader.php");?>
				
				<!-- Theme Main Menu ____________________________ -->
				
			</section>

				<!-- Join Volunteer ____________________________ -->
				<?php
					$select_qry="select * from tbluser where UserID=".$_SESSION['UserID'];
					$select=mysqli_query($con,$select_qry) or die(mysqli_error($con));
					$fetchData=mysqli_fetch_array($select);

				?>
		<!-- 	 <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr> -->
        	<?php
        		if(isset($_REQUEST['LeftAmt']))
        		{
        			 $_SESSION['LeftAmt']=$_REQUEST['LeftAmt']+1;
        		}

        	 ?>
<section class="Join-Volunteer-Pages margin-bottom">
        				<div class="row" style="margin-left: 50px;">
							<div class="col-md-8 col-xs-12 col-md-offset-2">
								<div class="single-input">Name <span class="mand">*</span>:
									<input type="text" placeholder=" Your Name *" name="txtName" id="txtName" value="<?php echo $fetchData['FirstName'].' '.$fetchData['LastName']?>" readonly="" >
									
								</div> 
							</div> 

							<div class="col-md-8 col-xs-12 col-md-offset-2">
								<div class="single-input">Email <span class="mand">*</span>:
									<input type="email" placeholder="Email *" name="txtEmail" id="txtEmail" value="<?php echo $fetchData['Email']?>" readonly="">
									
								</div> 
							</div>
							<div class="col-md-8 col-xs-12 col-md-offset-2">
								<div class="single-input">ContactNo <span class="mand">*</span>:
									<input type="text" placeholder="ContactNo *" name="txtContactNo" id="txtContactNo" minlength="10" maxlength="10" value="<?php echo $fetchData['ContactNo']?>" readonly="">
									
								</div> 
							</div>
							<div class="col-md-8 col-xs-12 col-md-offset-2">
								<div class="single-input"><div class="single-input">Amount <span class="mand">*</span>:
									<!-- <input type="number" placeholder="Amount *" name="txtContactNo" id="txtContactNo" > -->
									<?php $PID=$_REQUEST['ProjectID']; ?>
									<input name="amount" id="Amount" type="number" onblur="CheckAmount(this.value,<?php echo $PID; ?>);" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
									<label id="lblCheckAmount" style="color: red;"></label>
									<input type="hidden" name="hdn"  id="hdn" value="<?php if(isset($_SESSION['LeftAmt'])) echo $_SESSION['LeftAmt'];?>">
								</div> 
							</div>
							<div class="col-md-8 col-xs-12 ">
								<div class="single-input">
									<!-- <input type="number" placeholder="Amount *" name="txtContactNo" id="txtContactNo" > -->
									<button type="submit" name="btnSubmit"  style="margin-left: 400px;width: 150px;height: 50px;color: white;background-color: #ff6a00;" class="hvr-float-shadow" onclick="return frmSubmit();" >Pay</button>
									
								</div> 
							</div>
							
						</div>
          <!-- Amount <span class="mand">*</span>:
          <td> --><!-- <input name="amount" type="number" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /> --><!-- </td> -->
          <!-- <td>First Name <span class="mand">*</span>: </td> -->
          <!-- <td> --><input type="hidden" name="firstname" id="firstname" value="Hi" /><!-- </td>
        </tr>
        <tr>
          <td>Email <span class="mand">*</span>: </td>
          <td> --><input type="hidden" name="email" id="email" value="fen@gmail.com" /><!-- </td>
          <td>Phone <span class="mand">*</span>: </td>
          <td> --><input type="hidden" name="phone" value="7896541236" /><!-- </td>
        </tr>
        <tr>
          <td>Product Info <span class="mand">*</span>: </td>
          <td colspan="3"> --><!-- <textarea name="productinfo">hiii</textarea> --><input type="hidden" name="productinfo" value="ggggg"><!-- </td>
        </tr>
        <tr>
          <td>Success URL <span class="mand">*</span>: </td>
          <td colspan="3"> --><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir.'success.php' : $posted['surl'] ?>" size="64" /><!-- </td>
        </tr>
        <tr>
          <td>Failure URL <span class="mand">*</span>: </td>
          <td colspan="3"> --><input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'failure.php' : $posted['furl'] ?>" size="64" /><!-- </td>
        </tr>

        <tr>
          <td colspan="3"> --><input type="hidden" name="service_provider" value="" size="64" /><!-- </td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td> --><input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /><!-- </td>
          <td>Cancel URI: </td>
          <td> --><input type="hidden" name="curl" value="" /><!-- </td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td> --><input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /><!-- </td>
          <td>Address2: </td>
          <td> --><input type="hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /><!-- </td>
        </tr>
        <tr>
          <td>City: </td>
          <td> --><input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /><!-- </td>
          <td>State: </td>
          <td> --><input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /><!-- </td>
        </tr>
        <tr>
          <td>Country: </td>
          <td> --><input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /><!-- </td>
          <td>Zipcode: </td>
          <td> --><input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /><!-- </td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td> --><input type="hidden" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /><!-- </td>
          <td>UDF2: </td>
          <td> --><input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /><!-- </td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td> --><input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /><!-- </td>
          <td>UDF4: </td>
          <td> --><input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /><!-- </td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td> --><input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /><!-- </td>
          <td>PG: </td>
          <td> --><input type="hidden" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /><!-- </td>
        </tr> -->								</div> 
							</div>
							
						</div> <!-- /.row -->
						
					</form> <!-- /Form -->
				</div> <!-- /.container -->

				<!--Contact Form Validation Markup -->
				<!-- Contact alert -->
				<!-- <div class="alert-wrapper" id="alert-success">
					<div id="success">
						<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
						<div class="wrapper">
			               	<p>Your message was sent successfully.</p>
			             </div>
			        </div>
			    </div> --> <!-- End of .alert_wrapper -->
			    <!-- <div class="alert-wrapper" id="alert-error">
			        <div id="error">
			           	<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
			           	<div class="wrapper">
			               	<p>Sorry!Something Went Wrong.</p>
			            </div>
			        </div>
			    </div> --> <!-- End of .alert_wrapper -->
			</section> <!-- /.Join-Volunteer-Pages -->

			

			<!-- them-main-footer-section _________________________________ -->
			<footer class="them-main-footer-section">
				<!-- NewsLetter -->
				
				<!-- Bottom footer -->
				<?php include_once("Bottom_Footer.php");?>				
			</footer> <!-- /.them-main-footer-section -->
			<!--  PAGE===END  _________________________________ -->
		</div> <!-- /.main-page-wrapper -->
		

		<!-- Scroll Top Button -->
		<button class="scroll-top tran7s p-color-bg">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</button>

		
		<?php include_once("LoadFilesJS.php");?>
	</body>

<!-- Mirrored from themazine.com/html/chcharity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2018 14:23:11 GMT -->
</html>