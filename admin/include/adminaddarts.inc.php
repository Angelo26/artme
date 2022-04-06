<?php

	if(isset($_POST['submit'])) {
		
		require 'dbh.inc.php';

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$style = mysqli_real_escape_string($conn, $_POST['style']);
		$artist = mysqli_real_escape_string($conn, $_POST['artist']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);

		$file = $_FILES['image'];
		$filename = $file['name'];

		$fileerror = $file['error'];
		$filetmp = $file['tmp_name'];

		$fileext = explode('.',$filename);
		$filecheck = strtolower(end($fileext));

		$allowed = array('png', 'jpg', 'jpeg');

		if(in_array($filecheck,$allowed)) {
			$destinationfile = 'artsupload/'.$filename;
			move_uploaded_file($filetmp, $destinationfile);
		}

		else {
			header("Location: ../addartworks.php?couldn't_upload_image");
		}

		$sql = "INSERT INTO artworks (art_name, art_style, artist, price, astatus, picture) VALUES ('$name', '$style', '$artist', '$price', 'Available','$destinationfile');";
		if(mysqli_query($conn, $sql)){
			header("Location: ../addartworks.php?Successfully added");
			exit();
		}
		
	}
	else {
		header("Location: ../addartworks.php");
		exit();
	}
?>