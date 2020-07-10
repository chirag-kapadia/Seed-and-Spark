<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
<body>
  <section class="header-section">
        <!-- Top Header -->
        <?php include_once("TopHeader.php");?>
        
        <!-- Top Header -->
        <?php include_once("MiddleHeader.php");?>
        
        <!-- Theme Main Menu ____________________________ -->
        <?php //include_once("Menu.php");?>
      </section>
<?php
include_once("LoadFiles.php");
if (isset($_REQUEST['btnindex'])) 
{
    header("location:index.php");
}


include_once("Admin/Connection.php");

    
  $status      =$_POST["status"];
  $firstname   =$_POST["firstname"];
  $amount      =$_POST["amount"];
  $txnid       =$_POST["txnid"];
  $posted_hash =$_POST["hash"];
  $key         =$_POST["key"];
  $productinfo =$_POST["productinfo"];
  $email       =$_POST["email"];
  $salt        ="eCwWELxi";

  if (isset($_POST["additionalCharges"])) {
    $additionalCharges =$_POST["additionalCharges"];
    $retHashSeq        = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
          
  } else {
    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  }

  $hash = hash("sha512", $retHashSeq);
  if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";

  } else {
    echo "<center><h3 >Thank You.<br> Your Investment is ". $status .".</h3></center>";
    echo "<center><h4>Your Transaction ID for this transaction is ".$txnid.".</h4></center>";
    echo "<center><h4>We have received a payment of Rs. " . $amount . ". Your Receipt will send On Your E-Mail.</h4></center>";

    //payment 
     /*select intrest rate*/
      $Select_Project="select * from tblProject where ProjectID=".$_SESSION['ProjectID'];
      $Exe_Project=mysqli_query($con,$Select_Project)or die(mysqli_error($con));
      $Fetch_Project=mysqli_fetch_array($Exe_Project);

      /*Calculate intrest rate amount*/
        $IR=$Fetch_Project['FundReturnInterestRate'];
        $New_ReturnAmount=(($amount*$IR)/100) +  $amount;
        /*Total Intrest Aount devide by 4 */
        $Amount_4Sloat=$New_ReturnAmount/4;
      /*Calculate intrest rate amount*/
    /*select intrest rate*/

  $Insert_Fund="insert into tblFund values(null,'".$_SESSION['ProjectID']."','".$_SESSION['UserID']."',now(),'$amount','Investment','$txnid','$New_ReturnAmount','$Amount_4Sloat',0,0,0,0,null,null,null,null)";
  //echo $Insert_Fund;
  mysqli_query($con,$Insert_Fund)or die(mysqli_error($con));

  /*Funding status update*/
      $Select_Fund="select sum(FundAmount) as FundAmount from tblFund where ProjectID=".$_SESSION['ProjectID'];
      $Exe_Fund=mysqli_query($con,$Select_Fund) or die(mysqli_error($con));
      $Fetch_Fund=mysqli_fetch_array($Exe_Fund);
      $sum= $Fetch_Fund['FundAmount'];

      $sum2=$sum-$Fetch_Project['OurFees'];
      //echo $Fetch_Project['FundTarget'];
      $per=($sum/$Fetch_Project['FundTarget'])*100;
      //echo $per;
      $avgSloatAmount=$sum/4;
      $IR2=$IR+5+1;
      $TotalReturnAmt=($sum+($sum*$IR2)/100);
      $AvgReturnAmount=$TotalReturnAmt/4;
      $Update="update tblProject set FundingStatus=$per, TotalFundingAmount=$sum,AvgSloatAmount=$avgSloatAmount,TotalReturnAmount=$TotalReturnAmt, AvgReturnAmount=$AvgReturnAmount where ProjectID=".$_SESSION['ProjectID'];
      mysqli_query($con,$Update)or die(mysqli_error($con));
  /*Funding status update*/

  /*insert into tblInvoice*/
    $insert_invoice="insert into tblinvoice values(null,'".$_SESSION['UserID']."','".$_SESSION['ProjectID']."','$amount',now())";
    //echo $insert_invoice; 
    
    mysqli_query($con,$insert_invoice) or die(mysqli_error($con));
    $lastinvoiceid=mysqli_insert_id($con);
  /*insert into tblInvoice*/

  /*Select User name*/
    $select_Data="select * from tbluser where UserID=".$_SESSION['UserID'];
    $select=mysqli_query($con,$select_Data);
    $Fetch_Data2=mysqli_fetch_array($select);
  /*Select User name*/

  /*Update tblExpert Return*/

    $sel_lastExpertreturnId="select * from tblExpertReturn where ProjectID=".$_SESSION['ProjectID'];
    $exeERID=mysqli_query($con,$sel_lastExpertreturnId)or die(mysqli_error($con));
    $fetch_ERID=mysqli_fetch_array($exeERID);

    $Expert_Total_Return=($sum*1)/100;
    $Slotamt4=$Expert_Total_Return/4;
    $update_expertReturn="update tblExpertReturn set ReturnTotalAmount='".$Expert_Total_Return."',Sloat4Amount='".$Slotamt4."' where ExpertReturnID=".$fetch_ERID['ExpertReturnID'];
    mysqli_query($con,$update_expertReturn)or die(mysqli_error($con));
/*Update tblExpert Return*/
    
 include_once("LoadFilesJS.php");
  }         
?> 
  <center>
    <?php
      $select="select * from tblinvoice where InvoiceID=".$lastinvoiceid;
      $selectqry=mysqli_query($con,$select) or die(mysqli_error($con));
      $Fetch_Data=mysqli_fetch_array($selectqry);
      //echo $Fetch_Data['InvoiceID'];
    ?>
    <br>
    <div class="col-xs-12">
      <form method="post">
        <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="Images/logo/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $Fetch_Data['InvoiceID'];?><br>
                                Created: <?php echo $Fetch_Data['CreatedOn'];?><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Seed&spark.co.in, Inc.<br>
                                H.NO 123 Citylight<br>
                                Surat, Gujarat 395005
                            </td>
                            
                            <td>
                                <?php echo $Fetch_Data2['FirstName']." ".$Fetch_Data2['LastName']?><br>
                                <?php echo $Fetch_Data2['ContactNo']?><br>
                                <?php echo $Fetch_Data2['Email']?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Amount #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Online
                </td>
                
                <td>
                    <?php echo $amount;?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Project
                </td>
                
                <td>
                    Total Amount
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo $Fetch_Project['ProjectTitle'];?>
                </td>
                
                <td>
                    <?php echo $amount;?> 
                </td>
            </tr>            
            
            
            
        </table>
    </div>
    
    <br>
    
      <button type="submit" class="hvr-float-shadow" name="btnindex" style="background-color: #ff6a00;color:white;height: 50px;width: 100px;">Back</button>
      <form method="post">
      <!-- <a target="#" href="Paymentstatament.php?TID=<?php echo $lastinvoiceid;?>"  >download</a> -->
      </form>
    </div>
  </center>
  </body> 
