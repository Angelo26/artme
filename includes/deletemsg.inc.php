<?php

    require 'dbh.inc.php';
    session_start();
    if(!isset($_SESSION['u_uid'])) {
        header("location:index.php");
    }

    $rid = $_GET['id'];
    $tbl = $_GET['arttbl'];
    $sql = "DELETE from $tbl where id = '$rid'";
    mysqli_query($conn2, $sql);
    mysqli_close($conn2);
    header("Location: ../artistmsgs.php?deleted_Successfully");
	exit();
?>