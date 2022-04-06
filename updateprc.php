<?php

	if(isset($_POST['submit'])) {
		session_start();

		require 'includes/dbh.inc.php';

		$first = mysqli_real_escape_string($conn, $_POST['fname']);
		$last = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$skills = mysqli_real_escape_string($conn, $_POST['skills']);
		$skill1 = mysqli_real_escape_string($conn, $_POST['skill1']);
		$skill2 = mysqli_real_escape_string($conn, $_POST['skill2']);
		$desc = mysqli_real_escape_string($conn, $_POST['bio']);
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
		$file = $_FILES['image'];
		$filename = $file['name'];
	
		if ($filename=="" && $skill1=="" || $skill2=="") {
			if (empty($first) || empty($last) || empty($email) || empty($address) || empty($contact)) {
			header("Location: profile.php?Update=Empty_field1");
			exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

						$uid = $_SESSION['u_id'];
						$sql = "UPDATE realartists SET artist_first='$first', artist_last='$last', artist_email='$email', artist_address='$address', artist_desc='$desc', artist_skills='$skills' artist_contact='$contact' WHERE artist_id='$uid';";
						$result = mysqli_query($conn, $sql);
						header("Location: profile.php?only_detail_Update_Success");
						exit();		
					}
				}
			}
		}

		elseif ($filename=="" && $skill1!="" || $skill2!="") {
			if (empty($first) || empty($last) || empty($email) || empty($address) || empty($contact)) {
			header("Location: profile.php?Update=state_Empty_field");
			exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

						$uid = $_SESSION['u_id'];
						$sql = "UPDATE realartists SET artist_first='$first', artist_last='$last', artist_email='$email', artist_address='$address', artist_desc='$desc',artist_skills='$skills', artist_skill1='$skill1', artist_skill2='$skill2', artist_contact='$contact' WHERE artist_id='$uid';";
						$result = mysqli_query($conn, $sql);
						header("Location: profile.php?detail_Update_Success");
						exit();		
					}
				}
			}
		}

		elseif ($filename!="" && $skill1=="" || $skill2=="") {
			
			$fileerror = $file['error'];
			$filetmp = $file['tmp_name'];

			$fileext = explode('.',$filename);
			$filecheck = strtolower(end($fileext));

			$allowed = array('png', 'jpg', 'jpeg');

			if (in_array($filecheck,$allowed)) {
				$destinationfile='upload/'.$filename;
				move_uploaded_file($filetmp, $destinationfile);
			}

			else {
				header("Location: profile.php?couldn't_upload_image");
				exit();
			}

			if (empty($first) || empty($last) || empty($email) || empty($address) || empty($contact)) {
				header("Location: profile.php?Update=Empty_field");
				exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

							$uid = $_SESSION['u_id'];
							$sql = "UPDATE realartists SET artist_first='$first', artist_last='$last', artist_email='$email', artist_address='$address', artist_desc='$desc', artist_skills='$skills', artist_contact='$contact', artist_img='$destinationfile' WHERE artist_id='$uid';";
							$result = mysqli_query($conn, $sql);
							header("Location: profile.php?picture_Update_Success");
							exit();		
					}
				}
			}
		}
		elseif ($filename!="" && $skill1!="" || $skill2!="") {
			
			$fileerror = $file['error'];
			$filetmp = $file['tmp_name'];

			$fileext = explode('.',$filename);
			$filecheck = strtolower(end($fileext));

			$allowed = array('png', 'jpg', 'jpeg');

			if (in_array($filecheck,$allowed)) {
				$destinationfile='upload/'.$filename;
				move_uploaded_file($filetmp, $destinationfile);
			}

			else {
				header("Location: profile.php?couldn't_upload_image");
				exit();
			}

			if (empty($first) || empty($last) || empty($email) || empty($address) || empty($skill1) || empty($skill2) || empty($contact)) {
				header("Location: profile.php?Update=Empty_field");
				exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

							$uid = $_SESSION['u_id'];
							$sql = "UPDATE realartists SET artist_first='$first', artist_last='$last', artist_email='$email', artist_address='$address', artist_desc='$desc', artist_skills='$skills', artist_skill1='$skill1', artist_skill2='$skill2', artist_contact='$contact', artist_img='$destinationfile' WHERE artist_id='$uid';";
							$result = mysqli_query($conn, $sql);
							header("Location: profile.php?Update_Success");
							exit();		
					}
				}
			}
		}
	}
	else {
		header("Location: profile.php");
		exit();
	}
?>