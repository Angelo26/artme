<?php

	session_start();

	if (isset($_POST['submit'])) {

		require 'dbh.inc.php';

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT * FROM realartists WHERE artist_email='$email';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../mechanics.php?login=User not found");
			exit();
		}
		else {
			if ($row = mysqli_fetch_assoc($result)) {
				
				$hashedPwdCheck = password_verify($pwd, $row['artist_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../artists.php?login=Wrong password");
					exit();
				}
				elseif($hashedPwdCheck == true) {
					$_SESSION['u_id'] = $row['artist_id'];
					$_SESSION['u_email'] = $row['artist_email'];
					header("Location: ../profile.php?login=Success");
					exit();
				}

			}
		}
			
	}
	else {
		header("Location: ../artists.php?login=Error");
		exit();
	}
