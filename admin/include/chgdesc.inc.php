<?php

	if(isset($_POST['submit'])) {
		session_start();

		require 'dbh.inc.php';

		
		$uid = $_GET['id'];

		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$desc = mysqli_real_escape_string($conn, $_POST['udesc']);
		$prof = mysqli_real_escape_string($conn, $_POST['prof']);
		
		$sql = "UPDATE changedesc SET fname='$fname', lname='$lname', udesc='$desc', profession = '$prof' WHERE id='$uid';";
		if(mysqli_query($conn, $sql)){
			header("Location: ../chgdesc.php?Update_Success");
			exit();		
		}
		
	}
	else {
		header("Location: ../chgdesc.php");
		exit();
	}
?>