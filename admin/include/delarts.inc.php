<?php

    require 'dbh.inc.php';
    session_start();
    if(!isset($_SESSION['u_uid'])) {
        header("location:index.php");
    }

    $mid = $_GET['id'];
    $sql = "DELETE from artworks where art_id = '$mid'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../adminartworks.php?deleted_Successfully");
	exit();
?>