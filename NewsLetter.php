<?php include_once("Admin/Connection.php");?>
<script type="text/javascript">
	function frmValidate()
	{
		var msg="";
		//alert("Hello");

		if(document.getElementById("lblNewsletter").innerText=="Email already Exists.")
		{
			//msg +="\nEmail already Exists.";

			alert(msg+="Email is already Exists");
			return false;
			
		}

		if(msg!="")
		{
			alert(msg);
			return false;
		}
		return true;
	}
</script>
<script type="text/javascript">
      function EmailCheck(EmailID) 
{
  var xhttp = new XMLHttpRequest();
  var Url = "AjaxNewsletter.php?EID="+EmailID;
  //alert(Url);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("lblNewsletter").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", Url, true);
  xhttp.send();
}
  </script>

<?php
	if(isset($_REQUEST['btnNewsletter']))
	{

		  $insert_query="insert into tblnewsletter values(Null,'".$_REQUEST['txtNewsletter']."',now(),Null,1)";
		//echo $insert_query; 
		
		mysqli_query($con,$insert_query) or die(mysqli_error($con));


	}
?>
<div class="main-footer-top-section">
					<div class="container">
						<div class="footer-top-item">
							<h3>To get daily Updates into your inbox Subcribe to our Newsletter.</h3>
							<div class="Subscribe-footer-form">
								<!-- <p>Latest news delivered right to your inbox!</p> -->
								<form method="post">
									<input type="text" name="txtNewsletter" onblur = "EmailCheck(this.value);">
									<br>
									<label id="lblNewsletter" style="color: white;"></label>
									<button class="tran3s hvr-bounce-to-right" name="btnNewsletter" onclick="return frmValidate();s">Subscribe</button>
								</form>
							</div> <!-- /.Subscribe-footer-form -->
						</div> <!-- /.footer-top-item -->
					</div> <!-- /.container -->
				</div> <!-- /.main-footer-top-section -->