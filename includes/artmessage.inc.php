<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
		
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        

        $aid = $_GET['id'];
		$sql = "SELECT * FROM realartists WHERE artist_id='$aid';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
		$tabmsg = $row["artist_first"].$aid;
		mysqli_close();
		
		$sql2 = "INSERT INTO $tabmsg (username, contact, usermessage) VALUES ('$name', '$contact', '$message');";
		if(mysqli_query($conn2, $sql2)){
			header("Location: ../artistdetail.php?id=$aid");
			exit();
		}
	}
	else {
		header("Location: ../artistdetail.php");
		exit();
	}
?>