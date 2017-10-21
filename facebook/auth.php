<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(isset($_SESSION['SESS_email']) /*|| isset($_SESSION['SESS_password'])*/ == '') 
    {
	header("location: login.php");
		exit();
	}

?>