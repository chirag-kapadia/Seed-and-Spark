<?php
	include_once("connection.php");
	unset($_SESSION["AdminID"]);
	session_destroy();
	header("location:Index.php");
?>