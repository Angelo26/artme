<?php

    require 'dbh.inc.php';
    session_start();
    if(!isset($_SESSION['u_uid'])) {
        header("location:index.php");
    }

    $aid = $_GET['id'];
    $sql = "DELETE from artists where id = '$aid'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../verifyartists.php?deleted_Successfully");
	exit();
?>