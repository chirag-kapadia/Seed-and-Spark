 <?php 

    $con=mysqli_connect("localhost","root","","dbseed") or die(mysqli_error($con));
    session_start();
    

    /* ----  logout session function start ---- */
    function notlogout()
    {
    	if(!isset($_SESSION["AdminID"]))
    	{
    		header("location:index.php");
    	}
    }
    /*---- logout session function End -----*/
 


    
   
    ?>